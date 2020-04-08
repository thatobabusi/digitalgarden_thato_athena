<?php

namespace App\Models\Image;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Image\ImageType
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Image\Image[] $images
 * @property-read int|null $images_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image\ImageType disableCache()
 * @method static bool|null forceDelete()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Image\ImageType newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Image\ImageType newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Image\ImageType onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|\App\Models\Image\ImageType query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image\ImageType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image\ImageType whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image\ImageType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image\ImageType whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image\ImageType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image\ImageType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image\ImageType withCacheCooldownSeconds($seconds = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Image\ImageType withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Image\ImageType withoutTrashed()
 * @mixin \Eloquent
 * @property string $folder
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Image\ImageType whereFolder($value)
 */
class ImageType extends Model
{
    use SoftDeletes, Cachable;

    protected $table = 'image_types';

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
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
