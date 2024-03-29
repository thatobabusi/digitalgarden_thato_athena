<?php

namespace App\Repositories\AccessControl;

use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\AccessControl\Permission;
use Exception;
use Illuminate\Support\Collection;

/**
 * Class PermissionRepository
 *
 * @package App\Repositories\AccessControl
 */
class PermissionRepository implements PermissionRepositoryInterface
{
    /* Get ********************************************************************************************************* */

    /**
     * @return Permission[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllPermissions()
    {
        return Permission::all();
    }

    /**
     * @param string|null $criteria
     * @param string|null $value
     *
     * @return int
     */
    public function getPermissionsCountByCriteria(string $criteria = null, string $value = null) :int
    {
        if($criteria === null) {
            return Permission::all()->count();
        }

        return Permission::where("$criteria", "$value")->get()->count();
    }

    /* List ********************************************************************************************************* */

    /**
     * @return Collection
     */
    public function listAllPermissionsByTitleAndId() :Collection
    {
        return Permission::all()->pluck('title', 'id');
    }

    /* Store ******************************************************************************************************** */

    /**
     * @param StorePermissionRequest $request
     *
     * @return mixed
     */
    public function storeNewPermissionRecord(StorePermissionRequest $request)
    {
        return Permission::create($request->all());
    }

    /* Update ******************************************************************************************************* */

    /**
     * @param UpdatePermissionRequest $request
     * @param Permission              $permission
     *
     * @return bool
     */
    public function updateExistingPermissionRecord(UpdatePermissionRequest $request, Permission $permission) :bool
    {
        return $permission->update($request->all());
    }

    /* Delete ******************************************************************************************************* */

    /**
     * @param Permission $permission
     *
     * @return bool|mixed|null
     * @throws Exception
     */
    public function destroySinglePermissionRecord(Permission $permission)
    {
        return $permission->delete();
    }

    /**
     * @param MassDestroyPermissionRequest $request
     *
     * @return mixed
     */
    public function massDestroyPermissionRecords(MassDestroyPermissionRequest $request)
    {
        return Permission::whereIn('id', request('ids'))->delete();
    }
}
