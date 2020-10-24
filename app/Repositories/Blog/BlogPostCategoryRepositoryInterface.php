<?php

namespace App\Repositories\Blog;

use App\Http\Requests\MassDestroyBlogPostCategoryRequest;
use App\Http\Requests\StoreBlogPostCategoryRequest;
use App\Http\Requests\UpdateBlogPostCategoryRequest;

/**
 * Interface BlogPostCategoryRepositoryInterface
 *
 * @package App\Repositories\Blog
 */
interface BlogPostCategoryRepositoryInterface
{
    /* Get ********************************************************************************************************** */

    /**
     * @param string|null $limit
     *
     * @return mixed
     */
    public function getAllCategories(string $limit = null);

    /**
     * @param string|null $limit
     *
     * @return mixed
     */
    public function getAllCategoriesWhereHasBlogPosts(string $limit = null);

    /**
     * @param string $id
     *
     * @return mixed
     */
    public function getBlogPostCategoryRecordById(string $id);

    /**
     * @param string $slug
     *
     * @return mixed
     */
    public function getBlogPostCategoryRecordBySlug(string $slug);

    /* List ********************************************************************************************************* */

    /**
     * @return mixed
     */
    public function listAllCategoriesByTitleAndId();

    /* Store ******************************************************************************************************** */

    /**
     * @param StoreBlogPostCategoryRequest $request
     *
     * @return mixed
     */
    public function storeNewBlogPostCategoryRecord(StoreBlogPostCategoryRequest $request);

    /* Update ******************************************************************************************************* */

    /**
     * @param UpdateBlogPostCategoryRequest $request
     * @param string                        $id
     *
     * @return mixed
     */
    public function updateExistingBlogPostCategoryRecord(UpdateBlogPostCategoryRequest $request, string $id);

    /* Delete ******************************************************************************************************* */

    /**
     * @param string $blog_post_category_id
     *
     * @return mixed
     */
    public function destroySingleBlogPostCategoryRecord(string $blog_post_category_id);

    /**
     * @param MassDestroyBlogPostCategoryRequest $request
     *
     * @return mixed
     */
    public function massDestroyBlogPostCategoryRecords(MassDestroyBlogPostCategoryRequest $request);

    /* Sanitize ***************************************************************************************************** */

}
