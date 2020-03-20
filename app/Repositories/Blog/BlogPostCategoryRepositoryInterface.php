<?php

namespace App\Repositories\Blog;

interface BlogPostCategoryRepositoryInterface
{
    #Get
    /**
     * @return mixed
     */
    public function getAllCategories();

    /**
     * @param int|null $limit
     *
     * @return mixed
     */
    public function getAllCategoriesWhereHasBlogPosts(int $limit = null);

    #Check

    #List
    /**
     * @return mixed
     */
    public function listAllCategoriesByTitleAndId();

    #Store

    #Update
}
