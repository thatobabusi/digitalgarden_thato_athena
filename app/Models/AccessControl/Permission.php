<?php

namespace App\Models\AccessControl;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\AccessControl\Permission
 *
 * @property int $id
 * @property string|null $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AccessControl\Role[] $permissionsRoles
 * @property-read int|null $permissions_roles_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Permission newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AccessControl\Permission onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Permission query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Permission whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Permission whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Permission whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AccessControl\Permission withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AccessControl\Permission withoutTrashed()
 * @mixin \Eloquent
 */
class Permission extends Model
{
    use SoftDeletes;

    /**
     * @var string
     */
    public $table = 'permissions';

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
        'title',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /*******************************************************************************************************************
     *############################                  RELATIONS           ################################################
     ******************************************************************************************************************/

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissionsRoles()
    {
        return $this->belongsToMany(Role::class);
    }
}