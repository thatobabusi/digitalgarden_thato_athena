<?php

namespace App\Repositories\Blog;

use App\Http\Requests\MassDestroyBlogPostRequest;
use App\Http\Requests\StoreBlogPostRequest;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Models\Blog\BlogPost;

/**
 * Interface BlogPostRepositoryInterface
 *
 * @package App\Repositories\Blog
 */
interface BlogPostRepositoryInterface
{
    #Get

    /**
     * @param string|null $limit
     *
     * @return mixed
     */
    public function getAllBlogPostsByAjaxAndBuildDatatable(string $limit = null);

    /**
     * @param string|null $limit
     *
     * @return mixed
     */
    public function getAllBlogPostsRecords(string $limit = null);

    /**
     * @param string|null $limit
     *
     * @return mixed
     */
    public function getAllBlogPostsRecordsWithPagination(string $limit = null);

    /**
     * @param string|null $criteria
     * @param string|null $value
     * @param string|null $limit
     *
     * @return mixed
     */
    public function getAllBlogPostsRecordsByCriteria(string $criteria = null, string $value = null, string $limit = null);

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
     * @param BlogPost $blogPost
     *
     * @return mixed
     */
    public function getBlogPostKeywords(BlogPost $blogPost);

    /**
     * @param string|null $criteria
     * @param string|null $criteria_value
     *
     * @return mixed
     */
    public function getDynamicIndexContent(string $criteria = null, string $criteria_value = null);

    /**
     * @param string|null $criteria
     * @param string|null $value
     *
     * @return mixed
     */
    public function getBlogPostCountByCriteria(string $criteria = null, string $value = null);

    /**
     * @param string|null $id
     *
     * @return mixed
     */
    public function getFeaturedBlogPosts(string $id = null);

    #Check

    #List

    /**
     * @return mixed
     */
    public function listAllStatussesByTitleAndId();

    #Store

    /**
     * @param StoreBlogPostRequest $request
     * @param array                $image_id_array
     *
     * @return mixed
     */
    public function storeNewBlogPostRecord(StoreBlogPostRequest $request, array $image_id_array);

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

    #Format
    /**
     * @param BlogPost $blogPost
     *
     * @return array
     */
    public function formatBlogPostDataDetailsForDisplay(BlogPost $blogPost): array;
}
