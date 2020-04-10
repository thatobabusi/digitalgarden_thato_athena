<?php

namespace App\Http\Controllers\Backend\Admin\AccessControl;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\AccessControl\Permission;
use App\Repositories\AccessControl\PermissionRepository;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class PermissionsController
 *
 * @package App\Http\Controllers\Backend\Admin\AccessControl
 */
class PermissionsController extends Controller
{
    /**
     * @var PermissionRepository
     */
    protected $permissionRepository;

    /**
     * PermissionsController constructor.
     *
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = ['permissions' => $this->permissionRepository->getAllPermissions()];

        activity('back-end | admin | permissions')
            ->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User landed on the Permissions Page.');

        return view('admin.permissions.index', $data);
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        activity('back-end | admin | permissions')
            ->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User landed on the Create Permissions Page.');

        return view('admin.permissions.create');
    }

    /**
     * @param StorePermissionRequest $request
     *
     * @return RedirectResponse
     */
    public function store(StorePermissionRequest $request): RedirectResponse
    {
        $this->permissionRepository->storeNewPermissionRecord($request);

        activity('back-end | admin | permissions')
            ->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User created a new Permission.');

        return redirect()->route('admin.permissions.index');
    }

    /**
     * @param Permission $permission
     *
     * @return Factory|View
     */
    public function edit(Permission $permission)
    {
        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = ['permission' =>$permission];

        activity('back-end | admin | permissions')
            ->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User landed on the Edit Permissions Page.');

        return view('admin.permissions.edit', $data);
    }

    /**
     * @param UpdatePermissionRequest $request
     * @param Permission              $permission
     *
     * @return RedirectResponse
     */
    public function update(UpdatePermissionRequest $request, Permission $permission): RedirectResponse
    {
        $this->permissionRepository->updateExistingPermissionRecord($request, $permission);

        activity('back-end | admin | permissions')
            ->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User updated an existing Permission.');

        return redirect()->route('admin.permissions.index');
    }

    /**
     * @param Permission $permission
     *
     * @return Factory|View
     */
    public function show(Permission $permission)
    {
        abort_if(Gate::denies('permission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permission->load('permissionsRoles');

        $data = ['permission' => $permission];

        activity('back-end | admin | permissions')
            ->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User landed on the Show Permission Page.');

        return view('admin.permissions.show', $data);
    }

    /**
     * @param Permission $permission
     *
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Permission $permission): RedirectResponse
    {
        abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->permissionRepository->destroySinglePermissionRecord($permission);

        activity('back-end | admin | permissions')
            ->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User delete an existing Permission.');

        return back();
    }

    /**
     * @param MassDestroyPermissionRequest $request
     *
     * @return ResponseFactory|\Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyPermissionRequest $request)
    {
        $this->permissionRepository->massDestroyPermissionRecords($request);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
