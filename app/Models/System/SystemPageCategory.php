<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\System\SystemPageCategory
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\System\SystemPage[] $systemPages
 * @property-read int|null $system_pages_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemPageCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemPageCategory newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\System\SystemPageCategory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemPageCategory query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemPageCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemPageCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemPageCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemPageCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemPageCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemPageCategory whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemPageCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\System\SystemPageCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\System\SystemPageCategory withoutTrashed()
 * @mixin \Eloquent
 */
class SystemPageCategory extends Model
{

    use SoftDeletes;

    public $table = 'system_page_categories';

    /**
     * @var array
     */
    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    public function systemPages()
    {
        return $this->hasMany(SystemPage::class);
    }
}
