<?php

namespace App\Models\System;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\System\SystemPageSection
 *
 * @property int $id
 * @property int $system_page_id
 * @property string $title
 * @property string|null $header
 * @property string|null $subheader
 * @property string $order
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\System\SystemPage $systemPage
 * @method static \Illuminate\Database\Eloquent\Builder|SystemPageSection disableCache()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SystemPageSection newModelQuery()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SystemPageSection newQuery()
 * @method static \Illuminate\Database\Query\Builder|SystemPageSection onlyTrashed()
 * @method static \GeneaLabs\LaravelModelCaching\CachedBuilder|SystemPageSection query()
 * @method static \Illuminate\Database\Eloquent\Builder|SystemPageSection whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemPageSection whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemPageSection whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemPageSection whereHeader($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemPageSection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemPageSection whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemPageSection whereSubheader($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemPageSection whereSystemPageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemPageSection whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemPageSection whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SystemPageSection withCacheCooldownSeconds($seconds = null)
 * @method static \Illuminate\Database\Query\Builder|SystemPageSection withTrashed()
 * @method static \Illuminate\Database\Query\Builder|SystemPageSection withoutTrashed()
 * @mixin \Eloquent
 */
class SystemPageSection extends Model
{
    use SoftDeletes, Cachable;

    public $table = 'system_page_sections';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'system_page_id',
        'title',
        'header',
        'subheader',
        'order',
        'body',
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

    public function systemPage(): BelongsTo
    {
        return $this->belongsTo(SystemPage::class);
    }
}
