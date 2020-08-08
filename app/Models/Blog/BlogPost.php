<?php

namespace App\Models\Blog;

use App\Models\Image\Image;
use App\Models\User\User;
use Carbon\Carbon;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Gate;


/**
 * App\Models\Blog\BlogPost
 *
 * @property int $id
 * @property int|null $user_id
 * @property int $blog_post_category_id
 * @property int $blog_post_status_id
 * @property string $title
 * @property string $slug
 * @property string $summary
 * @property string $body
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\User\User|null $blogPostAuthor
 * @property-read \App\Models\Blog\BlogPostCategory $blogPostCategory
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Image\Image[] $blogPostImages
 * @property-read int|null $blog_post_images_count
 * @property-read \App\Models\Blog\BlogPostStatus $blogPostStatus
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Blog\BlogPostTag[] $blogPostTags
 * @property-read int|null $blog_post_tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost disableCache()
 * @method static bool|null forceDelete()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Blog\BlogPost newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Blog\BlogPost newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\BlogPost onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Blog\BlogPost query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost whereBlogPostCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost whereBlogPostStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost whereSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Blog\BlogPost withCacheCooldownSeconds($seconds = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\BlogPost withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Blog\BlogPost withoutTrashed()
 * @mixin \Eloquent
 */
class BlogPost extends Model
{
    use SoftDeletes, Cachable;

    /**
     * @var string
     */
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
        'route',

        'author',
        'category',
        'status',
        'actions',
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

    /**
     * @return string
     */
    public function blogPostTagsString(): string
    {
        $tags = '';
        $count = 0;
        foreach($this->blogPostTags as $tag) {
            $count++;
            if ($count === 1) {
                $tags .= $tag->title;
            }
            else {
                $tags .= ' | ' . $tag->title;
            }
        }
        return $tags;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->attributes['id'] = $this->id;
    }

    /**
     * @return string|null
     */
    public function getAuthor(): ?string
    {
        return $this->attributes['author'] = $this->blogPostAuthor->name;
    }

    /**
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->attributes['category'] = $this->blogPostCategory->title;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->attributes['status'] = $this->blogPostStatus->title;
    }

    /**
     * @return string|null
     */
    public function getTags(): ?string
    {
        return $this->attributes['tags'] = $this->blogPostTagsString();
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

    public function visits()
    {
        return visits($this);
    }

}
