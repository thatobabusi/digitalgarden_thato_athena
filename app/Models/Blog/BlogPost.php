<?php

namespace App\Models\Blog;

use App\Models\User\User;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function blogPostAuthor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function blogPostCategory()
    {
        return $this->belongsTo(BlogPostCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function blogPostTags()
    {
        return $this->belongsToMany(BlogPostTag::class);
    }

    public function blogPostStatus()
    {
        return $this->belongsTo(BlogPostStatus::class, 'blog_post_status_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function blogPostImage()
    {
        return $this->hasOne(BlogPostImage::class, 'blog_post_id');
    }

    /*public function blogPostImages()
    {
        return $this->hasMany(BlogPostImage::class);
    }*/

}
