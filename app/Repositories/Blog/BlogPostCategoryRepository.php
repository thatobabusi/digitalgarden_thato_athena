<?php

namespace App\Repositories\Blog;

use App\Http\Requests\MassDestroyBlogPostCategoryRequest;
use App\Http\Requests\StoreBlogPostCategoryRequest;
use App\Http\Requests\UpdateBlogPostCategoryRequest;
use App\Models\Blog\BlogPostCategory;

/**
 * Class BlogPostCategoryRepository
 *
 * @package App\Repositories\Blog
 */
class BlogPostCategoryRepository  implements BlogPostCategoryRepositoryInterface
{
    #Get

    /**
     * @param string|null $limit
     *
     * @return \Illuminate\Support\Collection|mixed
     */
    public function getAllCategories(string $limit = null)
    {
        if($limit === null) {
            return BlogPostCategory::orderBy('title')->get();
        }

        return BlogPostCategory::orderBy('title')->orderBy('created_at', 'DESC')->get()->take((int)$limit);
    }

    /**
     * @param string|null $limit
     *
     * @return BlogPostCategory[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection|mixed
     */
    public function getAllCategoriesWhereHasBlogPosts(string $limit = null)
    {
        if($limit === null) {
            return BlogPostCategory::whereHas('blogPosts')->orderBy('title')->get();
        }

        return BlogPostCategory::whereHas('blogPosts')->orderBy('title')->get()->take((int)$limit);

    }

    /**
     * @param string $id
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|mixed|object|null
     */
    public function getBlogPostCategoryRecordById(string $id)
    {
        return BlogPostCategory::whereId($id)->first();
    }

    /**
     * @param string $slug
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|mixed|object|null
     */
    public function getBlogPostCategoryRecordBySlug(string $slug)
    {
        return BlogPostCategory::whereSlug($slug)->first();
    }
    #Check

    #List

    /**
     * @return \Illuminate\Support\Collection
     */
    public function listAllCategoriesByTitleAndId()
    {
        return BlogPostCategory::orderBy('title')->get()->pluck('title', 'id');
    }

    #Store

    /**
     * @param StoreBlogPostCategoryRequest $request
     *
     * @return BlogPostCategory
     */
    public function storeNewBlogPostCategoryRecord(StoreBlogPostCategoryRequest $request)
    {
        $blog_post_category = new BlogPostCategory();
        $blog_post_category->title = $request->input('title');
        $blog_post_category->slug = $request->input('slug');
        $blog_post_category->save();

        return $blog_post_category;
    }

    #Update

    /**
     * @param UpdateBlogPostCategoryRequest $request
     * @param string                        $id
     *
     * @return BlogPostCategory|BlogPostCategory[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed|null
     */
    public function updateExistingBlogPostCategoryRecord(UpdateBlogPostCategoryRequest $request, string $id)
    {
        $blog_post_category = BlogPostCategory::find($id);
        $blog_post_category->update($request->all());
        $blog_post_category->save();

        return $blog_post_category;
    }

    #Delete

    /**
     * @param string $blog_post_category_id
     *
     * @return bool|mixed|null
     * @throws \Exception
     */
    public function destroySingleBlogPostCategoryRecord(string $blog_post_category_id)
    {
        $blogPostCategory = $this->getBlogPostCategoryRecordById($blog_post_category_id);

        return $blogPostCategory->delete();
    }

    /**
     * @param MassDestroyBlogPostCategoryRequest $request
     *
     * @return int
     */
    public function massDestroyBlogPostCategoryRecords(MassDestroyBlogPostCategoryRequest $request)
    {
        return BlogPostCategory::whereIn('id', request('ids'))->delete();
    }
}
