<?php

namespace App\Http\Controllers\Admin\AccessControl;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\AccessControl\Permission;
use App\Repositories\AccessControl\PermissionRepository;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class PermissionsController
 *
 * @package App\Http\Controllers\Admin
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = ['permissions' => $this->permissionRepository->getAllPermissions()];

        return view('admin.permissions.index', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.permissions.create');
    }

    /**
     * @param StorePermissionRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePermissionRequest $request)
    {
        $this->permissionRepository->storeNewPermissionRecord($request);

        return redirect()->route('admin.permissions.index');
    }

    /**
     * @param Permission $permission
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Permission $permission)
    {
        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data = ['permission' =>$permission];

        return view('admin.permissions.edit', $data);
    }

    /**
     * @param UpdatePermissionRequest $request
     * @param Permission              $permission
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $this->permissionRepository->updateExistingPermissionRecord($request, $permission);

        return redirect()->route('admin.permissions.index');
    }

    /**
     * @param Permission $permission
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Permission $permission)
    {
        abort_if(Gate::denies('permission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permission->load('permissionsRoles');

        $data = ['permission' => $permission];

        return view('admin.permissions.show', $data);
    }

    /**
     * @param Permission $permission
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Permission $permission)
    {
        abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->permissionRepository->destroySinglePermissionRecord($permission);

        return back();
    }

    /**
     * @param MassDestroyPermissionRequest $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyPermissionRequest $request)
    {
        $this->permissionRepository->massDestroyPermissionRecords($request);

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
