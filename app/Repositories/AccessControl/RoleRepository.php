<?php

namespace App\Repositories\AccessControl;

use App\Http\Requests\MassDestroyRoleRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\AccessControl\Role;
use App\Models\User\User;
use Illuminate\Support\Facades\Request;

class RoleRepository implements RoleRepositoryInterface
{
    #Get
    /**
     * @return Role[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllRoles()
    {
        return Role::all();
    }

    #Check

    #List
    /**
     * @return \Illuminate\Support\Collection
     */
    public function listAllRolesByTitleAndId()
    {
        return Role::all()->pluck('title', 'id');
    }

    #Store

    /**
     * @param StoreRoleRequest $request
     *
     * @return bool|mixed
     */
    public function storeNewRoleRecord(StoreRoleRequest $request)
    {
        $role = Role::create($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return true;
    }

    #Update

    /**
     * @param UpdateRoleRequest $request
     * @param Role              $role
     *
     * @return bool|mixed
     */
    public function updateExistingRoleRecord(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return true;
    }

    #Delete

    /**
     * @param Role $role
     *
     * @return bool|null
     * @throws \Exception
     */
    public function destroySingleRoleRecord(Role $role)
    {
        return $role->delete();
    }

    /**
     * @param MassDestroyRoleRequest $request
     *
     * @return mixed
     */
    public function massDestroyRoleRecords(MassDestroyRoleRequest $request)
    {
        return Role::whereIn('id', request('ids'))->delete();
    }
}
