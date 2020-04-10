<?php

namespace App\Models\Blog;

use App\Models\Image\Image;
use App\Models\User\User;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Blog\BlogPost
 *
 * @property int $id
 * @property int|null $user_id
 * @property int $blog_post_category_id
 * @property string $title
 * @property string $slug
 * @property string $summary
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\User\User|null $blogPostAuthor
 * @property-read \App\Models\Blog\BlogPostCategory $blogPostCategory
 * @property-read \App\Models\Blog\BlogPostImage $blogPostImage
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Blog\BlogPostTag[] $blogPostTags
 * @property-read int|null $blog_post_tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost whereBlogPostCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost whereSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost whereUserId($value)
 * @mixin \Eloquent
 * @property int|null $blog_post_status_id
 * @property-read \App\Models\Blog\BlogPostStatus|null $blogPostStatus
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost whereBlogPostStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost disableCache()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost withCacheCooldownSeconds($seconds = null)
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\BlogPost onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\BlogPost withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\BlogPost withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Image\Image[] $blogPostImages
 * @property-read int|null $blog_post_images_count
 */
class BlogPost extends Model
{
    use SoftDeletes, Cachable;

    protected $table = 'blog_posts';

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
        'user_id',
        'blog_post_category_id',
        'blog_post_status_id',
        'title',
        'slug',
        'summary',
        'body',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /*******************************************************************************************************************
     *############################                  RELATIONS           ################################################
     ******************************************************************************************************************/

    /**
     * @return BelongsTo
     */
    public function blogPostAuthor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return BelongsTo
     */
    public function blogPostCategory(): BelongsTo
    {
        return $this->belongsTo(BlogPostCategory::class);
    }

    /**
     * @return mixed
     */
    public function blogPostImage()
    {
        return $this->blogPostImages()->first();
    }

    /**
     * @return BelongsToMany
     */
    public function blogPostImages(): BelongsToMany
    {
        return $this->belongsToMany(Image::class);
    }

    /**
     * @return BelongsToMany
     */
    public function blogPostTags(): BelongsToMany
    {
        return $this->belongsToMany(BlogPostTag::class);
    }

    /**
     * @return BelongsTo
     */
    public function blogPostStatus(): BelongsTo
    {
        return $this->belongsTo(BlogPostStatus::class, 'blog_post_status_id');
    }

}
