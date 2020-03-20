<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Blog\BlogPostImage
 *
 * @property int $id
 * @property int $blog_post_id
 * @property string $title
 * @property string $slug
 * @property string $blog_post_image_path
 * @property string $blog_post_image_caption
 * @property string|null $credits_if_applicable
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Blog\BlogPost $blogPost
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostImage whereBlogPostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostImage whereBlogPostImageCaption($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostImage whereBlogPostImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostImage whereCreditsIfApplicable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostImage whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostImage whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostImage whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostImage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BlogPostImage extends Model
{
    protected $table = 'blog_post_images';

    /*******************************************************************************************************************
     *############################                  RELATIONS           ################################################
     ******************************************************************************************************************/

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function blogPost()
    {
        return $this->belongsTo(BlogPost::class);
    }
}
