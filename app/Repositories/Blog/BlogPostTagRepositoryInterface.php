<?php

namespace App\Repositories\Blog;

interface BlogPostTagRepositoryInterface
{
    #Get

    /**
     * @return mixed
     */
    public function getAllTags();

    /**
     * @param int|null $limit
     *
     * @return mixed
     */
    public function getAllTagsWhereHasBlogPosts(int $limit = null);

    #Check

    #List

    /**
     * @return mixed
     */
    public function listAllTagsByTitleAndId();

    #Store

    #Update
}
