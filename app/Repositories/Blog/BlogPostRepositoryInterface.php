<?php

namespace App\Repositories\Blog;

use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Models\Blog\BlogPost;
use Illuminate\Support\Facades\Request;

interface BlogPostRepositoryInterface
{
    #Get

    /**
     * @param int|null $limit
     *
     * @return mixed
     */
    public function getAllBlogPostsRecords(int $limit = null);

    /**
     * @param string $criteria
     * @param string $value
     * @param int    $limit
     *
     * @return mixed
     */
    public function getAllBlogPostsRecordsByCriteria(string $criteria, string $value, int $limit);

    /**
     * @param BlogPost $blogPost
     * @param int      $limit
     *
     * @return mixed
     */
    public function getAllBlogPostsRecordsRelatedToThisBlogPostByCategoryOrTag(BlogPost $blogPost, int $limit);

    /**
     * @param int|null $limit
     *
     * @return mixed
     */
    public function getAllDistinctArchiveYearAndMonthsArray(int $limit = null);

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
}
