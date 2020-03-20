<?php

namespace App\Repositories\User;

use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User\User;
use Illuminate\Support\Facades\Request;

interface UserRepositoryInterface
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function getUsersRecords(\Illuminate\Http\Request $request);

    /**
     * @param StoreUserRequest $request
     *
     * @return mixed
     */
    public function storeNewUserRecord(StoreUserRequest $request);

    public function listUsersRecordsByNameAndId(\Illuminate\Http\Request $request = null);

    /**
     * @param UpdateUserRequest $request
     * @param User              $user
     *
     * @return mixed
     */
    public function updateExistingUserRecord(UpdateUserRequest $request, User $user);

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
}
