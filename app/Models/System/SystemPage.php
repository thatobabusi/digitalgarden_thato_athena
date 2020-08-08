<?php

namespace App\Models\System;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\System\SystemPage
 *
 * @property int $id
 * @property int $page_category_id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\System\SystemPageCategory $systemPageCategory
 * @method static bool|null forceDelete()
 * @method static Builder|\App\Models\System\SystemPage newModelQuery()
 * @method static Builder|\App\Models\System\SystemPage newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\System\SystemPage onlyTrashed()
 * @method static Builder|\App\Models\System\SystemPage query()
 * @method static bool|null restore()
 * @method static Builder|\App\Models\System\SystemPage whereBody($value)
 * @method static Builder|\App\Models\System\SystemPage whereCreatedAt($value)
 * @method static Builder|\App\Models\System\SystemPage whereDeletedAt($value)
 * @method static Builder|\App\Models\System\SystemPage whereDescription($value)
 * @method static Builder|\App\Models\System\SystemPage whereId($value)
 * @method static Builder|\App\Models\System\SystemPage wherePageCategoryId($value)
 * @method static Builder|\App\Models\System\SystemPage whereSlug($value)
 * @method static Builder|\App\Models\System\SystemPage whereTitle($value)
 * @method static Builder|\App\Models\System\SystemPage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\System\SystemPage withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\System\SystemPage withoutTrashed()
 * @mixin \Eloquent
 * @method static Builder|\App\Models\System\SystemPage disableCache()
 * @method static Builder|\App\Models\System\SystemPage withCacheCooldownSeconds($seconds = null)
 */
class SystemPage extends Model
{
    use SoftDeletes, Cachable;

    public $table = 'system_pages';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'system_page_category_id',
        'title',
        'slug',
        'description',
        'body',
        'status',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    /**
     * @return BelongsTo
     */
    public function systemPageCategory(): BelongsTo
    {
        return $this->belongsTo(SystemPageCategory::class);
    }

    /**
     * @return HasOne
     */
    public function systemPageMetadata()
    {
        return $this->hasOne(SystemPageMetaData::class);
    }

    public function systemPageSections()
    {
        return $this->hasMany(SystemPageSection::class);
    }
}
