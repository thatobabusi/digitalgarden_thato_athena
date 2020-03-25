<?php

namespace App\Models\System;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\System\SystemConfigPlugin
 *
 * @property int $id
 * @property string $title
 * @property string|null $backend_frontend Backend or Frontend
 * @property int|null $parent_id
 * @property string|null $realted_id List Ids of modules that are related to this so when it gets archived they also get archived
 * @property string|null $core_or_optional
 * @property int $enabled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemConfigPlugin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemConfigPlugin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemConfigPlugin query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemConfigPlugin whereBackendFrontend($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemConfigPlugin whereCoreOrOptional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemConfigPlugin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemConfigPlugin whereEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemConfigPlugin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemConfigPlugin whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemConfigPlugin whereRealtedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemConfigPlugin whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\System\SystemConfigPlugin whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SystemConfigPlugin extends Model
{
    use Cachable;

    public $table = 'system_config_plugins';
}
