<?php

namespace App\Repositories\AccessControl;

use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\AccessControl\Permission;

/**
 * Interface PermissionRepositoryInterface
 *
 * @package App\Repositories\AccessControl
 */
interface PermissionRepositoryInterface
{
    /* Get ********************************************************************************************************* */

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

    /* List ********************************************************************************************************* */

    /**
     * @return mixed
     */
    public function listAllPermissionsByTitleAndId();

    /* Store ******************************************************************************************************** */

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

    /* Delete ******************************************************************************************************* */

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
