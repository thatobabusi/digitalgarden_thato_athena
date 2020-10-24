<?php

namespace App\Repositories\User;

use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

/**
 * Interface UserRepositoryInterface
 *
 * @package App\Repositories\User
 */
interface UserRepositoryInterface
{
    /* Get ********************************************************************************************************* */

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function getUsersRecords(Request $request);

    /**
     * @param string|null $criteria
     * @param string|null $value
     *
     * @return mixed
     */
    public function getUserCountByCriteria(string $criteria = null, string $value = null);

    /* List ********************************************************************************************************* */

    /**
     * @param Request|null $request
     *
     * @return mixed
     */
    public function listUsersRecordsByNameAndId(Request $request = null);

    /* Store ******************************************************************************************************** */

    /**
     * @param StoreUserRequest $request
     *
     * @return mixed
     */
    public function storeNewUserRecord(StoreUserRequest $request);

    /* Update ******************************************************************************************************* */

    /**
     * @param UpdateUserRequest $request
     * @param User              $user
     *
     * @return mixed
     */
    public function updateExistingUserRecord(UpdateUserRequest $request, User $user);

    /* Delete ******************************************************************************************************* */

    /**
     * @param User $user
     *
     * @return mixed
     */
    public function destroySingleUserRecord(User $user);

    /**
     * @param MassDestroyUserRequest $request
     *
     * @return mixed
     */
    public function massDestroyUserRecords(MassDestroyUserRequest $request);

    /* Sanitize ***************************************************************************************************** */

}
