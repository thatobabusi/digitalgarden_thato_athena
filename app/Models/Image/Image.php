<?php

namespace App\Models\Image;

use App\Models\Blog\BlogPost;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Image\Image
 *
 * @property int $id
 * @property int|null $image_type_id
 * @property string $title
 * @property string $slug
 * @property string $src
 * @property string|null $mime_type
 * @property string|null $description
 * @property string|null $base64
 * @property string|null $credits_if_applicable
 * @property string|null $alt
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Blog\BlogPost $blogPost
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Blog\BlogPost[] $blogPosts
 * @property-read int|null $blog_posts_count
 * @property-read \App\Models\Image\ImageType|null $imageType
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image\Image disableCache()
 * @method static bool|null forceDelete()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Image\Image newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Image\Image newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Image\Image onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Image\Image query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image\Image whereAlt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image\Image whereBase64($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image\Image whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image\Image whereCreditsIfApplicable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image\Image whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image\Image whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image\Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image\Image whereImageTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image\Image whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image\Image whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image\Image whereSrc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image\Image whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image\Image whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image\Image withCacheCooldownSeconds($seconds = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Image\Image withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Image\Image withoutTrashed()
 * @mixin \Eloquent
 */
class Image extends Model
{
    use Cachable;

    /**
     * @var string
     */
    protected $table = 'images';

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
        'image_type_id',
        'title',
        'slug',
        'src', //the path you uploaded the image
        'mime_type',
        'description',
        'base64',
        'credits_if_applicable',
        'alt',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function imageType()
    {
        return $this->belongsTo(ImageType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function blogPost()
    {
        return $this->hasOne(BlogPost::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function blogPosts()
    {
        return $this->belongsToMany(BlogPost::class);
    }
}
