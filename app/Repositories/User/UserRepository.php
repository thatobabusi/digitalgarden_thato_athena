<?php

namespace App\Repositories\User;

use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User\User;
//use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;

class UserRepository implements UserRepositoryInterface
{
    #Get
    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function getUsersRecords(Request $request)
    {
        $users = User::when($request->role, function ($query) use ($request) {
            $query->whereHas('roles', function ($query) use ($request) {
                $query->whereId($request->role);
            });
        })
        ->get();

        return $users;
    }
    #Check

    #List
    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function listUsersRecordsByNameAndId(Request $request = null)
    {

        if(!is_null($request)) {
            $users = User::when($request->role, function ($query) use ($request) {
                $query->whereHas('roles', function ($query) use ($request) {
                    $query->whereId($request->role);
                });
            })->pluck('name', 'id');
        }
        else {
            $users = User::pluck('name', 'id');
        }

        return $users;
    }

    #Store

    /**
     * @param StoreUserRequest $request
     *
     * @return mixed
     */
    public function storeNewUserRecord(StoreUserRequest $request)
    {
        $user = User::create($request->all());
        $user->roles()->sync($request->input('roles', []));

        return $user;
    }

    #Update

    /**
     * @param UpdateUserRequest $request
     * @param User              $user
     *
     * @return User|mixed
     */
    public function updateExistingUserRecord(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return $user;
    }

    #Delete

    /**
     * @param User $user
     *
     * @return bool|mixed|null
     * @throws \Exception
     */
    public function destroySingleUserRecord(User $user)
    {
        return $user->delete();
    }

    /**
     * @param MassDestroyUserRequest $request
     *
     * @return mixed
     */
    public function massDestroyUserRecords(MassDestroyUserRequest $request)
    {
        return User::whereIn('id', request('ids'))->delete();
    }
}
