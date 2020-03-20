<?php

namespace App\Repositories\Blog;

use App\Http\Requests\MassDestroyBlogPostRequest;
use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Models\Blog\BlogPost;
use App\Models\Blog\BlogPostCategory;
use App\Models\Blog\BlogPostTag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request;

class BlogPostRepository  implements BlogPostRepositoryInterface
{
    #Get

    /**
     * @param int|null $limit
     *
     * @return BlogPost[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function getAllBlogPostsRecords(int $limit = null)
    {
        if($limit === null) {
            return BlogPost::all();
        }

        return BlogPost::orderBy('created_at', 'DESC')->get()->take($limit);
    }

    /**
     * @param string   $criteria
     * @param string   $value
     * @param int|null $limit
     *
     * @return BlogPost[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function getAllBlogPostsRecordsByCriteria(string $criteria, string $value, int $limit = null)
    {

        //dd($criteria, $value, $limit);
        switch ($criteria) {

            case 'archive_date': #Get where year and month matches that of the archive value
                $archive_date = explode("-",$value);
                return BlogPost::whereYear('created_at', '=', $archive_date[0])
                                ->whereMonth('created_at', '=', $archive_date[1])
                                ->orderBy('created_at', 'DESC')
                                ->get()
                                ->take($limit);

                break;

            case 'category': #Get by Category Slug
                $blogPostCategory = BlogPostCategory::whereSlug($value)->first();
                return $blogPostCategory->blogPosts->take($limit);

                break;

            case 'tag': #Get by Tag Slug
                $blogPostTag = BlogPostTag::whereSlug($value)->first();
                return $blogPostTag->blogPosts->take($limit);

                break;

            default:
                #None of the above, get everything
                return $this->getAllBlogPostsRecords($limit);
        }

    }

    /**
     * @param BlogPost $blogPost
     * @param int|null $limit
     *
     * @return BlogPost[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection|mixed
     */
    public function getAllBlogPostsRecordsRelatedToThisBlogPostByCategoryOrTag(BlogPost $blogPost, int $limit = null)
    {
        #Not the cleanest way, but self-explainatory
        $blogPostsIdsArray = [];

        #Foreach Tag that is related to the current Blog Post
        foreach($blogPost->blogPostTags as $tag) {

            #Foreach Blog Post that belongs to this Tag
            foreach($tag->blogPosts as $post) {

                #Push the Blog Post ID into the array if it is not in there already
                if (!in_array($post->id, $blogPostsIdsArray)) {
                    $blogPostsIdsArray[] = $post->id;
                }

            }
        }

        #Get all Blog Posts where they share the same category as this Blog Post OR where they share the same Tag
        return BlogPost::whereBlogPostCategoryId($blogPost->blog_post_category_id)
                        ->orWhereIn("id", $blogPostsIdsArray)
                        ->orderBy('created_at', 'DESC')
                        ->get();

    }

    /**]
     * @param int|null $limit
     *
     * @return array
     */
    public function getAllDistinctArchiveYearAndMonthsArray(int $limit = null)
    {
        $year_months = BlogPost::orderBy('created_at', 'desc')
                            ->get()
                            ->groupBy(function ($val) {
                                return Carbon::parse($val->created_at)->format('Y-m');
                            });

        $distinct_year_months = [];

        foreach ($year_months as $year_month => $value) {
            $distinct_year_months[] = $year_month;
        }

        return $distinct_year_months;
    }

    /**
     * @param string $slug
     *
     * @return mixed
     */
    public function getBlogPostRecordBySlug(string $slug)
    {
        return BlogPost::where("slug", "=", $slug)->first();
    }

    #Check

    #List

    #Store

    /**
     * @param StoreBlogPostRequest $request
     *
     * @return BlogPost
     */
    public function storeNewBlogPostRecord(StoreBlogPostRequest $request)
    {
        $blog_post = new BlogPost();
        $blog_post->blog_post_category_id = $request->input('blog_post_category_id');
        $blog_post->title = $request->input('title');
        $blog_post->slug = $request->input('slug');
        $blog_post->summary = $request->input('summary');
        $blog_post->body = $request->input('body');
        $blog_post->save();

        return $blog_post;
    }

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

        return $blog_post;
    }

    #Delete

    /**
     * @param BlogPost $blogPost
     *
     * @return bool|null
     * @throws \Exception
     */
    public function destroySingleBlogPostRecord(BlogPost $blogPost)
    {
        return $blogPost->delete();
    }

    /**
     * @param MassDestroyBlogPostRequest $request
     *
     * @return mixed
     */
    public function massDestroyBlogPostRecords(MassDestroyBlogPostRequest $request)
    {
        return BlogPost::whereIn('id', request('ids'))->delete();
    }
}
