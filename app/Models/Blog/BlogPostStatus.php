<?php

namespace App\Models\Blog;

use Carbon\Carbon;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Blog\BlogPostStatus
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Blog\BlogPost[] $blogPost
 * @property-read int|null $blog_post_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostStatus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostStatus whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostStatus whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostStatus disableCache()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPostStatus withCacheCooldownSeconds($seconds = null)
 */
class BlogPostStatus extends Model
{
    use SoftDeletes, Cachable;

    /**
     * @var string
     */
    protected $table = 'blog_post_statusses';

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

    /**
     * @return HasMany
     */
    public function blogPost(): HasMany
    {
        return $this->hasMany(BlogPost::class);
    }

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
