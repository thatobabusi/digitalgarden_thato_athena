<?php

namespace App\Repositories\AccessControl;

use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\AccessControl\Permission;
use App\Models\User\User;
use Illuminate\Support\Facades\Request;

class PermissionRepository implements PermissionRepositoryInterface
{
    #Get
    /**
     * @return Permission[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllPermissions()
    {
        return Permission::all();
    }

    #Check

    #List
    /**
     * @return \Illuminate\Support\Collection
     */
    public function listAllPermissionsByTitleAndId()
    {
        return Permission::all()->pluck('title', 'id');
    }

    #Store

    /**
     * @param StorePermissionRequest $request
     *
     * @return mixed
     */
    public function storeNewPermissionRecord(StorePermissionRequest $request)
    {
        return Permission::create($request->all());
    }

    #Update

    /**
     * @param UpdatePermissionRequest $request
     * @param Permission              $permission
     *
     * @return bool
     */
    public function updateExistingPermissionRecord(UpdatePermissionRequest $request, Permission $permission)
    {
        return $permission->update($request->all());
    }

    #Delete

    /**
     * @param Permission $permission
     *
     * @return bool|null
     * @throws \Exception
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
