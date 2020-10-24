<?php

namespace App\Models\AccessControl;

use Carbon\Carbon;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AccessControl\Plugin
 *
 * @property int $id
 * @property string $title
 * @property int $enabled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Plugin disabled()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Plugin enabled()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Plugin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Plugin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Plugin query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Plugin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Plugin whereEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Plugin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Plugin whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Plugin whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $backend_frontend Backend or Frontend
 * @property int|null $parent_id
 * @property string|null $realted_id List Ids of modules that are related to this so when it gets archived they also get archived
 * @property string|null $core_or_optional
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Plugin whereBackendFrontend($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Plugin whereCoreOrOptional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Plugin whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Plugin whereRealtedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Plugin disableCache()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Plugin withCacheCooldownSeconds($seconds = null)
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Plugin whereDeletedAt($value)
 */
class Plugin extends Model
{
    use Cachable;

    /**
     * @var string
     */
    public $table = 'system_config_plugins';

    /**
     * @var array
     */
    protected $dates = [
        'updated_at',
        'created_at',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'title',
        'backend_frontend',
        'parent_id',
        'realted_id', //TODO::change to related_id
        'core_or_optional', //TODO::change to related_id
        'enabled',
    ];

    /* RELATIONS **************************************************************************************************** */

    /* GETTERS ****************************************************************************************************** */

    /**
     * @param Model $query
     *
     * @return mixed
     */
    public function getEnabledPlugins(Model $query)
    {
        return $this->scopeEnabled($query)->get();
    }

    /**
     * @param Model $query
     *
     * @return mixed
     */
    public function getDisabledPlugins(Model $query)
    {
        return $this->scopeDisabled($query)->get();
    }

    /* SCOPES******************************************************************************************************** */

    /**
     * @param Model $query
     *
     * @return mixed
     */
    public function scopeEnabled(Model $query)
    {
        return $query->where('enabled', 1);
    }

    /**
     * @param Model $query
     *
     * @return mixed
     */
    public function scopeDisabled(Model $query)
    {
        return $query->where('enabled', 0);
    }


}
