<?php

namespace App\Repositories\Blog;

use App\Http\Requests\MassDestroyBlogPostRequest;
use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Models\Blog\BlogPost;
use Illuminate\Support\Facades\Request;

interface BlogPostRepositoryInterface
{
    #Get

    /**
     * @param string|null $limit
     *
     * @return mixed
     */
    public function getAllBlogPostsRecords(string $limit = null);

    /**
     * @param string $criteria
     * @param string $value
     * @param string $limit
     *
     * @return mixed
     */
    public function getAllBlogPostsRecordsByCriteria(string $criteria, string $value, string $limit);

    /**
     * @param BlogPost $blogPost
     * @param string   $limit
     *
     * @return mixed
     */
    public function getAllBlogPostsRecordsRelatedToThisBlogPostByCategoryOrTag(BlogPost $blogPost, string $limit);

    /**
     * @param string|null $limit
     *
     * @return mixed
     */
    public function getAllDistinctArchiveYearAndMonthsArray(string $limit = null);

    /**
     * @param string $id
     *
     * @return mixed
     */
    public function getBlogPostRecordById(string $id);

    /**
     * @param string $slug
     *
     * @return mixed
     */
    public function getBlogPostRecordBySlug(string $slug);

    /**
     * @param string|null $criteria
     * @param string|null $value
     *
     * @return mixed
     */
    public function getBlogPostCountByCriteria(string $criteria = null, string $value = null);

    #Check

    #List

    /**
     * @return mixed
     */
    public function listAllStatussesByTitleAndId();

    #Store

    /**
     * @param StoreBlogPostRequest $request
     *
     * @return mixed
     */
    public function storeNewBlogPostRecord(StoreBlogPostRequest $request);

    #Update

    /**
     * @param UpdateBlogPostRequest $request
     * @param string                $id
     *
     * @return mixed
     */
    public function updateExistingBlogPostRecord(UpdateBlogPostRequest $request, string $id);

    #Delete

    /**
     * @param string $blog_post_id
     *
     * @return mixed
     */
    public function destroySingleBlogPostRecord(string $blog_post_id);

    /**
     * @param MassDestroyBlogPostRequest $request
     *
     * @return mixed
     */
    public function massDestroyBlogPostRecords(MassDestroyBlogPostRequest $request);
}
