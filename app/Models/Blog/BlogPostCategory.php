<?php

namespace App\Models\Blog;

use Carbon\Carbon;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

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
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\BlogPostCategory onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\BlogPostCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\BlogPostCategory withoutTrashed()
 */
class BlogPostCategory extends Model
{
    use SoftDeletes, Cachable;

    /**
     * @var string
     */
    protected $table = 'blog_post_categories';

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

    /* RELATIONS **************************************************************************************************** */

    /**
     * @return HasMany
     */
    public function blogPosts(): HasMany
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

    /**
     * @param string|null $value
     *
     * @return string|null
     */
    public function getCreatedAtAttribute(string $value = null): ?string
    {
        return $this->attributes['created_at'] = Carbon::parse($value)->toDateTimeString() ?? null;
    }

    /**
     * @param string|null $value
     *
     * @return string|null
     */
    public function getUpdatedAtAttribute(string $value = null): ?string
    {
        return $this->attributes['updated_at'] = Carbon::parse($value)->toDateTimeString() ?? null;
    }

    /**
     * @param string|null $value
     *
     * @return string|null
     */
    public function getDeletedAtAttribute(string $value = null): ?string
    {
        return $this->attributes['deleted_at'] = Carbon::parse($value)->toDateTimeString() ?? null;
    }


}
