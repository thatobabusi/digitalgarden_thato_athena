<?php

namespace App\Repositories\Blog;

use App\Http\Requests\MassDestroyBlogPostTagRequest;
use App\Http\Requests\StoreBlogPostTagRequest;
use App\Http\Requests\UpdateBlogPostTagRequest;
use App\Models\Blog\BlogPostTag;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * Class BlogPostTagRepository
 *
 * @package App\Repositories\Blog
 */
class BlogPostTagRepository  implements BlogPostTagRepositoryInterface
{
    /* Get ********************************************************************************************************* */

    /**
     * @param string|null $limit
     *
     * @return Collection|mixed
     */
    public function getAllTags(string $limit = null)
    {
        if($limit === null) {
            return BlogPostTag::orderBy('title')->get();
        }

        return BlogPostTag::orderBy('title')->orderBy('created_at', 'DESC')->get()->take((int)$limit);
    }

    /**
     * @param string|null $limit
     *
     * @return BlogPostTag[]|Builder[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function getAllTagsWhereHasBlogPosts(string $limit = null)
    {

        if($limit === null) {
            return BlogPostTag::whereHas('blogPosts')->get();
        }

        return BlogPostTag::whereHas('blogPosts')->get()->take((int)$limit);
    }

    /**
     * @param string $id
     *
     * @return Builder|Model|object|null
     */
    public function getBlogPostTagRecordById(string $id)
    {
        return BlogPostTag::whereId($id)->first();
    }

    /**
     * @param string $slug
     *
     * @return Builder|Model|mixed|object|null
     */
    public function getBlogPostTagRecordBySlug(string $slug)
    {
        return BlogPostTag::whereSlug($slug)->first();
    }

    /* List ********************************************************************************************************* */

    /**
     * @return Collection
     */
    public function listAllTagsByTitleAndId() :Collection
    {
        return BlogPostTag::orderBy('title')->get()->pluck('title', 'id');
    }

    /* Store ******************************************************************************************************** */

    /**
     * @param StoreBlogPostTagRequest $request
     *
     * @return BlogPostTag
     */
    public function storeNewBlogPostTagRecord(StoreBlogPostTagRequest $request) :BlogPostTag
    {
        $blog_post_tag = BlogPostTag::create($request->all());
        $blog_post_tag->save();
        return $blog_post_tag;
    }

    /* Update ******************************************************************************************************* */

    /**
     * @param UpdateBlogPostTagRequest $request
     * @param string                   $id
     *
     * @return BlogPostTag|BlogPostTag[]|\Illuminate\Database\Eloquent\Collection|Model|mixed|null
     */
    public function updateExistingBlogPostTagRecord(UpdateBlogPostTagRequest $request, string $id)
    {
        $blog_post_tag = BlogPostTag::find($id);
        $blog_post_tag->update($request->all());
        $blog_post_tag->save();

        return $blog_post_tag;
    }

    /* Delete ******************************************************************************************************* */

    /**
     * @param string $blog_post_tag_id
     *
     * @return bool|mixed
     * @throws Exception
     */
    public function destroySingleBlogPostTagRecord(string $blog_post_tag_id)
    {
        $blogPostTag = $this->getBlogPostTagRecordById($blog_post_tag_id);
        $blogPostTag->delete();

        return true;
    }

    /**
     * @param MassDestroyBlogPostTagRequest $request
     *
     * @return int
     */
    public function massDestroyBlogPostTagRecords(MassDestroyBlogPostTagRequest $request): int
    {
        return BlogPostTag::whereIn('id', request('ids'))->delete();
    }

    /* Sanitize ***************************************************************************************************** */

}
