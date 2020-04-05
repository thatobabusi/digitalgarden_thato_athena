<?php

namespace App\Models\AccessControl;

use App\Models\User\User;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\AccessControl\Role
 *
 * @property int $id
 * @property string|null $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AccessControl\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User\User[] $rolesUsers
 * @property-read int|null $roles_users_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Role newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AccessControl\Role onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Role query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Role whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Role whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Role whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AccessControl\Role withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AccessControl\Role withoutTrashed()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Role disableCache()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\AccessControl\Role withCacheCooldownSeconds($seconds = null)
 */
class Role extends Model
{
    use SoftDeletes, Cachable;

    public $table = 'roles';

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
    public function rolesUsers()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
