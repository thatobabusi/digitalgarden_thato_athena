<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\AccessControl\Role;
use App\Models\School\SchoolClass;
use App\Models\User\User;
use App\Repositories\AccessControl\RoleRepository;
use App\Repositories\User\UserRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UsersController
 *
 * @package App\Http\Controllers\Admin
 */
class UsersController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;
    /**
     * @var RoleRepository
     */
    protected $roleRepository;

    /**
     * UsersController constructor.
     *
     * @param UserRepository $userRepository
     * @param RoleRepository $roleRepository
     */
    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = ['users' => $this->userRepository->getUsersRecords($request)];

        return view('admin.users.index', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = ['roles' => $this->roleRepository->listAllRolesByTitleAndId()];

        return view('admin.users.create', $data);
    }

    /**
     * @param StoreUserRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUserRequest $request)
    {
        $this->userRepository->storeNewUserRecord($request);

        return redirect()->route('admin.users.index');
    }

    /**
     * @param User $user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');

        $data = ['user' =>$user, 'roles' => $this->roleRepository->listAllRolesByTitleAndId()];

        return view('admin.users.edit', $data);
    }

    /**
     * @param UpdateUserRequest $request
     * @param User              $user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->userRepository->updateExistingUserRecord($request,  $user);

        return redirect()->route('admin.users.index');
    }

    /**
     * @param User $user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(User $user)
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->load('roles');

        $data = ['user' => $user];

        return view('admin.users.show', $data);
    }

    /**
     * @param User $user
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        abort_if(Gate::denies('user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->userRepository->destroySingleUserRecord($user);

        return back();
    }

    /**
     * @param MassDestroyUserRequest $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyUserRequest $request)
    {
        $this->userRepository->massDestroyUserRecords($request);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
