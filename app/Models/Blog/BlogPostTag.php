<?php

namespace App\Models\Blog;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Blog\BlogPostTag
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Blog\BlogPost[] $blogPosts
 * @property-read int|null $blog_posts_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostTag whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostTag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostTag whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostTag whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostTag whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostTag disableCache()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostTag withCacheCooldownSeconds($seconds = null)
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\BlogPostTag onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\BlogPostTag withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\BlogPostTag withoutTrashed()
 */
class BlogPostTag extends Model
{
    use SoftDeletes, Cachable;

    protected $table = 'blog_post_tags';

    /**
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'id',
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
     * @return BelongsToMany
     */
    public function blogPosts(): BelongsToMany
    {
        return $this->belongsToMany(BlogPost::class);
    }
}
