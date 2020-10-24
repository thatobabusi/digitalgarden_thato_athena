<?php

namespace App\Models\System;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\System\SystemPageMetaData
 *
 * @property int $id
 * @property int $system_page_id
 * @property string $title
 * @property string $author
 * @property string $robots
 * @property string $keywords
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\System\SystemPage $systemPage
 * @method static \Illuminate\Database\Eloquent\Builder|SystemPageMetaData disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SystemPageMetaData newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SystemPageMetaData newQuery()
 * @method static \Illuminate\Database\Query\Builder|SystemPageMetaData onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SystemPageMetaData query()
 * @method static \Illuminate\Database\Eloquent\Builder|SystemPageMetaData whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemPageMetaData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemPageMetaData whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemPageMetaData whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemPageMetaData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemPageMetaData whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemPageMetaData whereRobots($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemPageMetaData whereSystemPageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemPageMetaData whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemPageMetaData whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemPageMetaData withCacheCooldownSeconds($seconds = null)
 * @method static \Illuminate\Database\Query\Builder|SystemPageMetaData withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SystemPageMetaData withoutTrashed()
 * @mixin \Eloquent
 */
class SystemPageMetaData extends Model
{
    use SoftDeletes, Cachable;

    /**
     * @var string
     */
    public $table = 'system_page_metadata';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'system_page_id',
        'title',
        'author',
        'robots',
        'keywords',
        'description',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    /* RELATIONS **************************************************************************************************** */

    /**
     * @return BelongsTo
     */
    public function systemPage(): BelongsTo
    {
        return $this->belongsTo(SystemPage::class);
    }
}
