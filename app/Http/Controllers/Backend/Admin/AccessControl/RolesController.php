<?php

namespace App\Http\Controllers\Backend\Admin\AccessControl;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\MassDestroyRoleRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\AccessControl\Role;
use App\Repositories\AccessControl\PermissionRepository;
use App\Repositories\AccessControl\RoleRepository;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class RolesController
 *
 * @package App\Http\Controllers\Backend\Admin\AccessControl
 */
class RolesController extends Controller
{
    /**
     * @var PermissionRepository
     */
    protected $permissionRepository;
    /**
     * @var RoleRepository
     */
    protected $roleRepository;

    /**
     * RolesController constructor.
     *
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = ['roles' => $this->roleRepository->getAllRoles()];

        activity('back-end | admin | roles')
            ->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User landed on the Roles Page.');

        return view('admin.roles.index', $data);
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = ['permissions' => $this->permissionRepository->listAllPermissionsByTitleAndId()];

        activity('back-end | admin | roles')
            ->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User landed on the Create Roles Page.');

        return view('admin.roles.create', $data);
    }

    /**
     * @param StoreRoleRequest $request
     *
     * @return RedirectResponse
     */
    public function store(StoreRoleRequest $request): RedirectResponse
    {
        $this->roleRepository->storeNewRoleRecord($request);

        activity('back-end | admin | roles')
            ->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User created a new Role.');

        return redirect()->route('admin.roles.index');
    }

    /**
     * @param Role $role
     *
     * @return Factory|View
     */
    public function edit(Role $role)
    {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->load('permissions');

        $data = ['role' => $role,  'permissions' => $this->permissionRepository->listAllPermissionsByTitleAndId()];

        activity('back-end | admin | roles')
            ->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User landed on the Edit Roles Page.');

        return view('admin.roles.edit', $data);
    }

    /**
     * @param UpdateRoleRequest $request
     * @param Role              $role
     *
     * @return RedirectResponse
     */
    public function update(UpdateRoleRequest $request, Role $role): RedirectResponse
    {
        $this->roleRepository->updateExistingRoleRecord($request, $role);

        activity('back-end | admin | roles')
            ->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User updated an existing Role.');

        return redirect()->route('admin.roles.index');
    }

    /**
     * @param Role $role
     *
     * @return Factory|View
     */
    public function show(Role $role)
    {
        abort_if(Gate::denies('role_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->load('permissions', 'rolesUsers');

        $data = ['role' => $role];

        activity('back-end | admin | roles')
            ->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User landed on the Roles Page.');

        return view('admin.roles.show', $data);
    }

    /**
     * @param Role $role
     *
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Role $role): RedirectResponse
    {
        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->roleRepository->destroySingleRoleRecord($role);

        return back();
    }

    /**
     * @param MassDestroyRoleRequest $request
     *
     * @return ResponseFactory|\Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyRoleRequest $request)
    {
        $this->roleRepository->massDestroyRoleRecords($request);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
