<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\System\SystemMenuItem
 *
 * @property int $id
 * @property int|null $order
 * @property string $title
 * @property string $url_link
 * @property int|null $page_id
 * @property string $type
 * @property string $route
 * @property string $icon
 * @property string $permissions
 * @property string|null $parent_id
 * @property string $has_children
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemMenuItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemMenuItem newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\System\SystemMenuItem onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemMenuItem query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemMenuItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemMenuItem whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemMenuItem whereHasChildren($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemMenuItem whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemMenuItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemMenuItem whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemMenuItem wherePageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemMenuItem whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemMenuItem wherePermissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemMenuItem whereRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemMenuItem whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemMenuItem whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemMenuItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemMenuItem whereUrlLink($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\System\SystemMenuItem withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\System\SystemMenuItem withoutTrashed()
 * @mixin \Eloquent
 */
class SystemMenuItem extends Model
{
    use SoftDeletes;

    public $table = 'system_menu_items';

    /**
     * @var array
     */
    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];
}
