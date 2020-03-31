<?php

namespace App\Repositories\AccessControl;

use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\AccessControl\Permission;

interface PermissionRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getAllPermissions();

    /**
     * @param string|null $criteria
     * @param string|null $value
     *
     * @return mixed
     */
    public function getPermissionsCountByCriteria(string $criteria = null, string $value = null);

    /**
     * @return mixed
     */
    public function listAllPermissionsByTitleAndId();

    /**
     * @param StorePermissionRequest $request
     *
     * @return mixed
     */
    public function storeNewPermissionRecord(StorePermissionRequest $request);

    /**
     * @param UpdatePermissionRequest $request
     * @param Permission              $permission
     *
     * @return mixed
     */
    public function updateExistingPermissionRecord(UpdatePermissionRequest $request, Permission $permission);

    /**
     * @param Permission $permission
     *
     * @return mixed
     */
    public function destroySinglePermissionRecord(Permission $permission);

    /**
     * @param MassDestroyPermissionRequest $request
     *
     * @return mixed
     */
    public function massDestroyPermissionRecords(MassDestroyPermissionRequest $request);

}
