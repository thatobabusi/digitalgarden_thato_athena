<?php

namespace App\Models\Blog;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Blog\BlogPostCategory
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Blog\BlogPost[] $blogPosts
 * @property-read int|null $blog_posts_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostCategory disableCache()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostCategory withCacheCooldownSeconds($seconds = null)
 */
class BlogPostCategory extends Model
{
    use Cachable;

    protected $table = 'blog_post_categories';

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /*******************************************************************************************************************
     *############################                  RELATIONS           ################################################
     ******************************************************************************************************************/

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blogPosts()
    {
        return $this->hasMany(BlogPost::class);
    }

    /*public function parentOfThisCategory()
    {
        return $this->belongsTo(BlogPostCategory::class);
    }

    public function childrenOfThisCategory()
    {
        return $this->hasMany(BlogPostCategory::class);
    }*/


}
