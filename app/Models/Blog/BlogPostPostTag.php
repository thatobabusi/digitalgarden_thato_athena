<?php

namespace App\Models\Blog;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Blog\BlogPostPostTag
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostPostTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostPostTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostPostTag query()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostPostTag disableCache()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostPostTag withCacheCooldownSeconds($seconds = null)
 */
class BlogPostPostTag extends Model
{
    use Cachable;

    protected $table = 'blog_post_post_tags';

    /*******************************************************************************************************************
     *############################                  RELATIONS           ################################################
     ******************************************************************************************************************/
}
