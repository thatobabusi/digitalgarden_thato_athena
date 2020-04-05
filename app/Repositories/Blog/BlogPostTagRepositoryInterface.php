<?php

namespace App\Repositories\Blog;

use App\Http\Requests\StoreBlogPostTagRequest;
use App\Models\Blog\BlogPostTag;

interface BlogPostTagRepositoryInterface
{
    #Get

    /**
     * @param string|null $limit
     *
     * @return mixed
     */
    public function getAllTags(string $limit = null);

    /**
     * @param string|null $limit
     *
     * @return mixed
     */
    public function getAllTagsWhereHasBlogPosts(string $limit = null);

    /**
     * @param string $id
     *
     * @return mixed
     */
    public function getBlogPostTagRecordById(string $id);

    /**
     * @param string $slug
     *
     * @return mixed
     */
    public function getBlogPostTagRecordBySlug(string $slug);

    #Check

    #List

    /**
     * @return mixed
     */
    public function listAllTagsByTitleAndId();

    #Store

    /**
     * @param StoreBlogPostTagRequest $request
     *
     * @return mixed
     */
    public function storeNewBlogPostTagRecord(StoreBlogPostTagRequest $request);

    #Update

    /**
     * @param        $request
     * @param string $id
     *
     * @return mixed
     */
    public function updateExistingBlogPostTagRecord($request, string $id);

    #Delete

    /**
     * @param string $blog_post_tag_id
     *
     * @return mixed
     */
    public function destroySingleBlogPostTagRecord(string $blog_post_tag_id);


}
