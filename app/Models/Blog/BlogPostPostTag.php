<?php

namespace App\Models\Blog;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Blog\BlogPostPostTag
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostPostTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostPostTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostPostTag query()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostPostTag disableCache()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostPostTag withCacheCooldownSeconds($seconds = null)
 * @property int $id
 * @property int $blog_post_id
 * @property int $blog_post_tag_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPostPostTag whereBlogPostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPostPostTag whereBlogPostTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPostPostTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPostPostTag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogPostPostTag whereUpdatedAt($value)
 */
class BlogPostPostTag extends Model
{
    use Cachable;

    /**
     * @var string
     */
    protected $table = 'blog_post_blog_post_tag';

    /* RELATIONS **************************************************************************************************** */
}
