<?php

namespace App\Repositories\Blog;

use App\Models\Blog\BlogPostCategory;

class BlogPostCategoryRepository  implements BlogPostCategoryRepositoryInterface
{
    #Get

    /**
     * @return BlogPostCategory[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function getAllCategories()
    {
        return BlogPostCategory::orderBy('title')->get();
    }

    /**
     * @param int|null $limit
     *
     * @return BlogPostCategory[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllCategoriesWhereHasBlogPosts(int $limit = null)
    {
        if($limit === null) {
            return BlogPostCategory::whereHas('blogPosts')->orderBy('title')->get();
        }

        return BlogPostCategory::whereHas('blogPosts')->orderBy('title')->get()->take($limit);

    }

    #Check

    #List
    /**
     * @return \Illuminate\Support\Collection
     */
    public function listAllCategoriesByTitleAndId()
    {
        return BlogPostCategory::all()->pluck('title', 'id');
    }

    #Store

    #Update
}
