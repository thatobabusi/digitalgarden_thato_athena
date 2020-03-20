<?php

namespace App\Repositories\AccessControl;

use App\Http\Requests\MassDestroyRoleRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\AccessControl\Role;

interface RoleRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getAllRoles();

    /**
     * @return mixed
     */
    public function listAllRolesByTitleAndId();

    /**
     * @param StoreRoleRequest $request
     *
     * @return mixed
     */
    public function storeNewRoleRecord(StoreRoleRequest $request);

    /**
     * @param UpdateRoleRequest $request
     * @param Role              $role
     *
     * @return mixed
     */
    public function updateExistingRoleRecord(UpdateRoleRequest $request, Role $role);

    /**
     * @param Role $role
     *
     * @return mixed
     */
    public function destroySingleRoleRecord(Role $role);

    /**
     * @param MassDestroyRoleRequest $request
     *
     * @return mixed
     */
    public function massDestroyRoleRecords(MassDestroyRoleRequest $request);
}
