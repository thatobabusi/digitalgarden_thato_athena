<?php

namespace App\Repositories\Blog;

use App\Http\Requests\MassDestroyBlogPostRequest;
use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Models\Blog\BlogPost;
use App\Models\Blog\BlogPostCategory;
use App\Models\Blog\BlogPostStatus;
use App\Models\Blog\BlogPostTag;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class BlogPostRepository  implements BlogPostRepositoryInterface
{
    #Get

    /**
     * @param string|null $limit
     *
     * @return BlogPost[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|mixed
     */
    public function getAllBlogPostsRecords(string $limit = null)
    {
        if($limit === null) {
            return BlogPost::all();
        }

        return BlogPost::orderBy('created_at', 'DESC')->get()->take((int)$limit);
    }

    /**
     * @param string $criteria
     * @param string $value
     * @param string $limit
     *
     * @return BlogPost[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|mixed|null
     */
    public function getAllBlogPostsRecordsByCriteria(string $criteria, string $value, string $limit)
    {

        $blogPosts = null;
        switch ($criteria) {

            case 'archive_date': #Get where year and month matches that of the archive value
                $archive_date = explode("-",$value);

                $blogPosts = BlogPost::whereYear('created_at', '=', $archive_date[0])
                                ->whereMonth('created_at', '=', $archive_date[1])
                                ->orderBy('created_at', 'DESC')
                                ->get()
                                ->take((int)$limit);

                break;

            case 'category': #Get by Category Slug
                $blogPostCategory = BlogPostCategory::whereSlug($value)->first();

                $blogPosts = new Collection();
                if(isset($blogPostCategory->id)) {
                    $blogPosts =  $blogPostCategory->blogPosts->take((int)$limit);
                }

                break;

            case 'tag': #Get by Tag Slug
                $blogPostTag = BlogPostTag::whereSlug($value)->first();

                $blogPosts = new Collection();
                if(isset($blogPostTag->id)) {
                    $blogPosts = $blogPostTag->blogPosts->take((int)$limit);
                }

                break;

            default:
                #None of the above, get everything
                $blogPosts =  $this->getAllBlogPostsRecords($limit);
        }
        return $blogPosts;
    }

    /**
     * @param BlogPost $blogPost
     * @param string   $limit
     *
     * @return BlogPost[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection|mixed
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
                if (!in_array($post->id, $blogPostsIdsArray)) {
                    $blogPostsIdsArray[] = $post->id;
                }

            }
        }

        #Get all Blog Posts where they share the same category as this Blog Post OR where they share the same Tag
        return BlogPost::whereBlogPostCategoryId($blogPost->blog_post_category_id)
                        ->orWhereIn("id", $blogPostsIdsArray)
                        ->orderBy('created_at', 'DESC')
                        ->take((int)$limit)
                        ->get();

    }

    /**
     * @param string|null $limit
     *
     * @return array|mixed
     */
    public function getAllDistinctArchiveYearAndMonthsArray(string $limit = null)
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
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|mixed|object|null
     */
    public function getBlogPostRecordById(string $id)
    {
        return BlogPost::where("id", "=", $id)->first();
    }

    /**
     * @param string $slug
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|mixed|object|null
     */
    public function getBlogPostRecordBySlug(string $slug)
    {
        return BlogPost::where("slug", "=", $slug)->first();
    }

    #Check

    #List

    /**
     * @return \Illuminate\Support\Collection
     */
    public function listAllStatussesByTitleAndId()
    {
        return BlogPostStatus::all()->pluck('title', 'id');
    }

    #Store

    /**
     * @param StoreBlogPostRequest $request
     *
     * @return BlogPost|mixed
     */
    public function storeNewBlogPostRecord(StoreBlogPostRequest $request)
    {
        $blog_post = new BlogPost();
        $blog_post->user_id = Auth::user()->getId();
        $blog_post->blog_post_category_id = $request->input('blog_post_category_id');
        $blog_post->blog_post_status_id = $request->input('blog_post_status_id');
        $blog_post->title = $request->input('title');
        $blog_post->slug = $request->input('slug');
        $blog_post->summary = $request->input('summary');
        $blog_post->body = $request->input('body');
        $blog_post->save();

        $blog_post->blogPostTags()->sync($request->tags);

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

        $blog_post->blogPostTags()->detach();
        $blog_post->blogPostTags()->sync($request->tags);

        return $blog_post;
    }

    #Delete

    /**
     * @param string $blog_post_id
     *
     * @return bool|mixed|null
     * @throws \Exception
     */
    public function destroySingleBlogPostRecord(string $blog_post_id)
    {
        $blogPost = $this->getBlogPostRecordById($blog_post_id);

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
}
