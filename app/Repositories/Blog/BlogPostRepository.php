<?php

namespace App\Repositories\Blog;

use App\Http\Requests\MassDestroyBlogPostRequest;
use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Models\Blog\BlogPost;
use App\Models\Blog\BlogPostCategory;
use App\Models\Blog\BlogPostPostTag;
use App\Models\Blog\BlogPostStatus;
use App\Models\Blog\BlogPostTag;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

/**
 * Class BlogPostRepository
 *
 * @package App\Repositories\Blog
 */
class BlogPostRepository  implements BlogPostRepositoryInterface
{

    /**
     * @var BlogPostCategoryRepository
     */
    protected $blogPostCategory;
    /**
     * @var BlogPostTagRepository
     */
    protected $blogPostTagRepository;

    /**
     * BlogPostRepository constructor.
     *
     * @param BlogPostCategoryRepository $blogPostCategory
     * @param BlogPostTagRepository      $blogPostTagRepository
     */
    public function __construct(BlogPostCategoryRepository $blogPostCategory, BlogPostTagRepository $blogPostTagRepository)
    {
        $this->blogPostCategory = $blogPostCategory;
        $this->blogPostTagRepository = $blogPostTagRepository;
    }

    /* Get ********************************************************************************************************** */

    /**
     * @param string|null $limit
     *
     * @return mixed
     * @throws Exception
     */
    public function getAllBlogPostsByAjaxAndBuildDatatable(string $limit = null)
    {
        core_helper_extend_timeout_time();

        #TODO:: (1)Speed this up, (2)Search doesnt work on other columns
        return (new \Yajra\DataTables\DataTables)->eloquent(BlogPost::query())
            ->editColumn('author', static function($blogPost) {
                return $blogPost->getAuthor();
            })
            ->editColumn('category', static function($blogPost) {
                return $blogPost->getCategory();
            })
            ->editColumn('status',static function($blogPost) {
                return $blogPost->getStatus();
            })
            ->addColumn('actions', function($row) {
                return '<div class="btn-group">
                        <a class="btn btn-xs btn-primary" href="' . route("admin.blog.show", $row->slug) . '" type="button">
                            ' . trans("global.view") . '
                        </a>
                        <a class="btn btn-xs btn-info" href="' . route("admin.blog.edit", $row->slug) . '" type="button">
                            ' . trans("global.edit") . '
                        </a>
                        <a class="btn btn-xs btn-danger" href="#" type="button">
                            <form action="' . route("admin.blog.destroy", $row->id) . '"
                                  method="POST" onsubmit="return confirm(\'' . trans("global.areYouSure") . '\');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <input type="submit" class="btn btn-xs btn-danger" value="' . trans("global.delete") . '">
                            </form>
                        </a>
                        </div>';
            })
            ->rawColumns(['actions' => 'actions'])
            ->make(true);
    }

    /**
     * @param string|null $limit
     *
     * @return BlogPost[]|Collection|\Illuminate\Support\Collection|mixed
     */
    public function getAllBlogPostsRecords(string $limit = null)
    {
        if($limit === null) {
            return BlogPost::with('blogPostImages')->all();
        }

        return BlogPost::with('blogPostImages')
                        ->orderBy('created_at', 'DESC')
                        ->get()
                        ->take((int)$limit);
    }

    /**
     * @param string|null $limit
     *
     * @return BlogPost[]|LengthAwarePaginator|Collection|mixed
     */
    public function getAllBlogPostsRecordsWithPagination(string $limit = null)
    {
        if($limit === null) {
            return BlogPost::all();
        }

        return BlogPost::paginate(4);
        //return BlogPost::orderBy('created_at', 'DESC')->get()->take((int)$limit);
    }

    /**
     * @param string|null $criteria
     * @param string|null $value
     * @param string|null $limit
     *
     * @return BlogPost[]|Collection|\Illuminate\Support\Collection|mixed|null
     */
    public function getAllBlogPostsRecordsByCriteria(string $criteria = null, string $value = null, string $limit = null)
    {

        $blogPosts = null;
        switch ($criteria) {

            case 'archive_date': #Get where year and month matches that of the archive value
                if(isset($value)) {
                    $archive_date = explode('-', $value);

                    $blogPosts = BlogPost::whereYear('created_at', '=', $archive_date[0])
                        ->whereMonth('created_at', '=', $archive_date[1])
                        ->orderBy('created_at', 'DESC')
                        ->get()
                        ->take((int)$limit);
                }

                break;

            case 'category': #Get by Category Slug
                if(isset($value)) {
                    $blogPostCategory = BlogPostCategory::whereSlug($value)->first();
                    if($blogPostCategory) {
                        $blogPosts = $this->getAllBlogPostsRecordsByCategoryId($blogPostCategory->id, $limit);
                    }
                }
                break;

            case 'tag': #Get by Tag Slug
                if(isset($value)) {
                    $blogPosts = $this->getAllBlogPostsRecordsByTagSlug($value, $limit);
                }
                break;

            default:
                #None of the above, get everything
                $blogPosts =  $this->getAllBlogPostsRecords($limit);
        }
        return $blogPosts;
    }

    /**
     * @param int         $blog_post_category_id
     * @param string|null $limit
     *
     * @return BlogPost[]|Builder[]|Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection
     */
    public function getAllBlogPostsRecordsByCategoryId(int $blog_post_category_id, string $limit = null)
    {
        return BlogPost::whereBlogPostCategoryId($blog_post_category_id)
            ->with('blogPostImages')
            ->orderBy('created_at', 'DESC')
            ->get()
            ->take((int)$limit);
    }

    /**
     * @param string      $blog_post_tag_slug
     * @param string|null $limit
     *
     * @return Collection
     */
    public function getAllBlogPostsRecordsByTagSlug(string $blog_post_tag_slug, string $limit = null): Collection
    {
        $blogPostTag = BlogPostTag::whereSlug($blog_post_tag_slug)->first();
        if($blogPostTag) {

            #Not the cleanest way, but self-explainatory
            $blogPostsIdsArray = [];

            #Foreach Blog Post that belongs to this Tag
            foreach ($blogPostTag->blogPosts as $post) {

                #Push the Blog Post ID into the array if it is not in there already
                if (!in_array($post->id, $blogPostsIdsArray, true)) {
                    $blogPostsIdsArray[] = $post->id;
                }

            }

            return BlogPost::WhereIn('id', $blogPostsIdsArray)
                ->with('blogPostImages')
                ->orderBy('created_at', 'DESC')
                ->take((int)$limit)
                ->get();
        }

        return new Collection();

    }

    /**
     * @param BlogPost $blogPost
     * @param string   $limit
     *
     * @return BlogPost[]|Builder[]|Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection|mixed
     */
    public function getAllBlogPostsRecordsRelatedToThisBlogPostByCategoryOrTag(BlogPost $blogPost, string $limit)
    {
        #Not the cleanest way, but self-explainatory
        $blogPostsIdsArray = [];

        #Foreach Tag that is related to the current Blog Post
        foreach($blogPost->blogPostTags as $tag) {

            #Foreach Blog Post that belongs to this Tag
            foreach($tag->blogPosts as $post) {

                #Push the Blog Post ID into the array if it is not in there already
                if (!in_array($post->id, $blogPostsIdsArray, true)) {
                    if($post->id !== $blogPost->id) {
                        $blogPostsIdsArray[] = $post->id;
                    }
                }

            }
        }

        #Get all Blog Posts where they share the same category as this Blog Post OR where they share the same Tag
        return BlogPost::where('id', '<>', $blogPost->id)
                        ->whereBlogPostCategoryId($blogPost->blog_post_category_id)
                        ->orWhereIn('id', $blogPostsIdsArray)
                        ->orderBy('created_at', 'DESC')
                        ->take((int)$limit)
                        ->with('blogPostImages')
                        ->get();

    }

    /**
     * @param string|null $limit
     *
     * @return array|mixed
     */
    public function getAllDistinctArchiveYearAndMonthsArray(string $limit = null)
    {
        $year_months = BlogPost::orderBy('created_at', 'desc')->get()
                            ->groupBy(function ($val) {
                                return Carbon::parse($val->created_at)->format('Y-m');
                            })
                            ->take((int)$limit);

        $distinct_year_months = [];

        foreach ($year_months as $year_month => $value) {
            $distinct_year_months[] = $year_month;
        }

        return $distinct_year_months;
    }

    /**
     * @param string|null $criteria
     * @param string|null $value
     *
     * @return int|mixed
     */
    public function getBlogPostCountByCriteria(string $criteria = null, string $value = null)
    {
        if($criteria === null) {
            return BlogPost::all()->count();
        }

        return BlogPost::where("$criteria", "$value")->get()->count();
    }

    /**
     * @param string $id
     *
     * @return BlogPost|Builder|Model|mixed|object|null
     */
    public function getBlogPostRecordById(string $id)
    {
        $blogPost = BlogPost::whereId($id)->first();
        $blogPost->load('blogPostAuthor', 'blogPostImages', 'blogPostCategory', 'blogPostTags');

        return $blogPost;
    }

    /**
     * @param string $slug
     *
     * @return BlogPost|Builder|Model|mixed|object|null
     */
    public function getBlogPostRecordBySlug(string $slug)
    {
        $blogPost = BlogPost::whereSlug($slug)->first();
        $blogPost->load('blogPostAuthor', 'blogPostImages', 'blogPostCategory', 'blogPostTags');

        return $blogPost;
    }

    /**
     * @param BlogPost $blogPost
     *
     * @return string
     */
    public function getBlogPostKeywords(BlogPost $blogPost) :string
    {
        $keywords = "";

        $author = $blogPost->blogPostAuthor->name ?? null;
        if($author) {
            $keywords .= $author;
        }

        $category = $blogPost->blogPostCategory->title;
        if($category) {
            $keywords .= ", ". Str::of($category)->replace('-', ' ');
        }

        $tags = $blogPost->blogPostTags;

        foreach($tags as $tag) {
            $keywords .= ", ". Str::of($tag->title)->replace('-', ' ');
        }

        return $keywords;
    }

    /**
     * @param string|null $criteria
     * @param string|null $criteria_value
     *
     * @return array
     */
    public function getDynamicIndexContent(string $criteria = null, string $criteria_value = null): array
    {
        if( is_null($criteria) && is_null($criteria_value)) {

            $blogPosts =  BlogPost::orderBy('created_at','desc')->whereIn('blog_post_status_id', [4,6])->paginate(5);
            $blogPostsRecommended =  BlogPost::inRandomOrder()->paginate(8);

            $data = [
                'page_header' =>  'BLOG',
                'page_title' => Str::title('Blog'),
                'blogPosts' => $blogPosts,
                'blogPostsRecommended' => $blogPostsRecommended,
                'blogPostCategories' => $this->blogPostCategory->getAllCategoriesWhereHasBlogPosts('15'),
                'blogPostTags' => $this->blogPostTagRepository->getAllTagsWhereHasBlogPosts('10'),
                'blogPostDistinctArchiveYearAndMonthsArray' => $this->getAllDistinctArchiveYearAndMonthsArray('15'),
                'featuredBlogPost' => $this->getFeaturedBlogPosts('1')
            ];
        }

        else {

            if (isset($criteria)) {
                if (Str::contains($criteria, '_')) {
                    $page_header = strtoupper(Str::replaceFirst('_', ' ', $criteria));
                }
            }

            $blogPostsRecommended = BlogPost::inRandomOrder()->paginate(8);

            $data = [
                'page_header' => $page_header ?? 'BLOG',
                'page_title' => Str::title($criteria_value ?? 'Blog'),
                'blogPosts' => $this->getAllBlogPostsRecordsByCriteria($criteria, $criteria_value, '5'),
                'blogPostsRecommended' => $blogPostsRecommended,
                'blogPostCategories' => $this->blogPostCategory->getAllCategoriesWhereHasBlogPosts('15'),
                'blogPostTags' => $this->blogPostTagRepository->getAllTagsWhereHasBlogPosts('10'),
                'blogPostDistinctArchiveYearAndMonthsArray' => $this->getAllDistinctArchiveYearAndMonthsArray('15'),
                'featuredBlogPost' => $this->getFeaturedBlogPosts('1')
            ];
        }

        return $data;
    }

    /**
     * @param string|null $limit
     *
     * @return Model|\Illuminate\Database\Query\Builder|mixed|object|null
     */
    public function getFeaturedBlogPosts(string $limit = null)
    {
        $blogPost = BlogPost::inRandomOrder()->first();
        $blogPost->load(/*'blogPostAuthor',*/ 'blogPostImages', 'blogPostCategory', 'blogPostTags');

        return $blogPost;
    }

    /* List ********************************************************************************************************* */

    /**
     * @return \Illuminate\Support\Collection|mixed
     */
    public function listAllStatussesByTitleAndId()
    {
        return BlogPostStatus::all()->pluck('title', 'id');
    }

    /* Store ******************************************************************************************************** */

    /**
     * @param StoreBlogPostRequest $request
     * @param array                $image_id_array
     *
     * @return BlogPost|mixed
     */
    public function storeNewBlogPostRecord(StoreBlogPostRequest $request, array $image_id_array)
    {
        $blog_post = BlogPost::create($request->all());
        $blog_post->save();

        #Sync Tags Associated with this Blog Post
        $blog_post->blogPostTags()->sync($request->tags);

        #Sync Images Associated with this Blog Post
        $blog_post->blogPostImages()->sync($image_id_array);

        return $blog_post;
    }

    /* Update ******************************************************************************************************* */

    /**
     * @param UpdateBlogPostRequest $request
     * @param string                $id
     *
     * @return mixed
     */
    public function updateExistingBlogPostRecord($request, string $id)
    {
        $blog_post = BlogPost::find($id);
        $blog_post->update($request->all());
        $blog_post->save();

        $blog_post->blogPostTags()->detach();
        $blog_post->blogPostTags()->sync($request->tags);

        return $blog_post;
    }

    /* Delete ******************************************************************************************************* */

    /**
     * @param string $blog_post_id
     *
     * @return bool|mixed|null
     * @throws Exception
     */
    public function destroySingleBlogPostRecord(string $blog_post_id)
    {
        $blogPost = $this->getBlogPostRecordById($blog_post_id);
        BlogPostPostTag::where("blog_post_id", $blog_post_id)->delete();

        $blogPostImageFile = $blogPost->blogPostImage();

        if(isset($blogPostImageFile->src)) {
            //Delete physical copy
            File::delete(public_path($blogPostImageFile->src));
            //Delete pivot
            $blogPost->blogPostImages()->detach();
            //Delete Image record
            $blogPostImageFile->delete();
        }

        return $blogPost->delete();
    }

    /**
     * @param MassDestroyBlogPostRequest $request
     *
     * @return int|mixed
     */
    public function massDestroyBlogPostRecords(MassDestroyBlogPostRequest $request)
    {
        return BlogPost::whereIn('id', request('ids'))->delete();
    }

    /* Format ******************************************************************************************************* */

    /**
     * @param BlogPost $blogPost
     *
     * @return array
     */
    public function formatBlogPostDataDetailsForDisplay(BlogPost $blogPost): array
    {
        $data = [
            'page_header' => Str::title($blogPost->title ?? 'Blog'),
            'page_title' => Str::title($blogPost->title ?? 'Blog'),
            'blogPost' => $blogPost,
            'blogPosts' => $this->getAllBlogPostsRecords('5'),
            'blogPostsRecommended' => $this->getAllBlogPostsRecordsRelatedToThisBlogPostByCategoryOrTag($blogPost, '6'),
            'blogPostCategories' => $this->blogPostCategory->getAllCategoriesWhereHasBlogPosts('15'),
            'blogPostTags' => $this->blogPostTagRepository->getAllTagsWhereHasBlogPosts('10'),
            'blogPostDistinctArchiveYearAndMonthsArray' => $this->getAllDistinctArchiveYearAndMonthsArray('15'),
            'featuredBlogPost' => $this->getFeaturedBlogPosts('1')
        ];

        return $data;
    }

    /* Sanitize ***************************************************************************************************** */

}
