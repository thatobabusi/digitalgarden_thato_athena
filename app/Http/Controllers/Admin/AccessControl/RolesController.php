<?php

namespace App\Http\Controllers\Admin\AccessControl;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRoleRequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\AccessControl\Permission;
use App\Models\AccessControl\Role;
use App\Repositories\AccessControl\PermissionRepository;
use App\Repositories\AccessControl\RoleRepository;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class RolesController
 *
 * @package App\Http\Controllers\Admin
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = ['roles' => $this->roleRepository->getAllRoles()];

        return view('admin.roles.index', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = ['permissions' => $this->permissionRepository->listAllPermissionsByTitleAndId()];

        return view('admin.roles.create', $data);
    }

    /**
     * @param StoreRoleRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRoleRequest $request)
    {
        $this->roleRepository->storeNewRoleRecord($request);

        return redirect()->route('admin.roles.index');
    }

    /**
     * @param Role $role
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Role $role)
    {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->load('permissions');

        $data = ['role' => $role,  'permissions' => $this->permissionRepository->listAllPermissionsByTitleAndId()];

        return view('admin.roles.edit', $data);
    }

    /**
     * @param UpdateRoleRequest $request
     * @param Role              $role
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $this->roleRepository->updateExistingRoleRecord($request, $role);

        return redirect()->route('admin.roles.index');
    }

    /**
     * @param Role $role
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Role $role)
    {
        abort_if(Gate::denies('role_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->load('permissions', 'rolesUsers');

        $data = ['role' => $role];

        return view('admin.roles.show', $data);
    }

    /**
     * @param Role $role
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Role $role)
    {
        abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->roleRepository->destroySingleRoleRecord($role);

        return back();
    }

    /**
     * @param MassDestroyRoleRequest $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyRoleRequest $request)
    {
        $this->roleRepository->massDestroyRoleRecords($request);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
