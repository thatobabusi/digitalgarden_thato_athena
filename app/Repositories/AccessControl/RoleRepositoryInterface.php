<?php

namespace App\Repositories\AccessControl;

use App\Http\Requests\MassDestroyRoleRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\AccessControl\Role;

/**
 * Interface RoleRepositoryInterface
 *
 * @package App\Repositories\AccessControl
 */
interface RoleRepositoryInterface
{
    /* Get ********************************************************************************************************* */

    /**
     * @return mixed
     */
    public function getAllRoles();

    /**
     * @param string|null $criteria
     * @param string|null $value
     *
     * @return mixed
     */
    public function getRolesCountByCriteria(string $criteria = null, string $value = null);

    /* List ********************************************************************************************************* */

    /**
     * @return mixed
     */
    public function listAllRolesByTitleAndId();

    /* Store ******************************************************************************************************** */

    /**
     * @param StoreRoleRequest $request
     *
     * @return mixed
     */
    public function storeNewRoleRecord(StoreRoleRequest $request);

    /* Update ******************************************************************************************************* */

    /**
     * @param UpdateRoleRequest $request
     * @param Role              $role
     *
     * @return mixed
     */
    public function updateExistingRoleRecord(UpdateRoleRequest $request, Role $role);

    /* Delete ******************************************************************************************************* */

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
