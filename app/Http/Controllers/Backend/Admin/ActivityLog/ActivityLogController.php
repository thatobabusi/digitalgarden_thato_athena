<?php

namespace App\Http\Controllers\Backend\Admin\ActivityLog;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;

/**
 * Class ActivityLogController
 *
 * @package App\Http\Controllers\Backend\Admin\ActivityLog
 */
class ActivityLogController extends Controller
{
    /**
     * @return mixed
     * @throws \Exception
     */
    public function getAllActivityLogs()
    {
        $data = \App\Models\ActivityLog::latest()->get();
        //$data = Activity::latest()->get();

        return Datatables::of($data)->make(true);
    }

    /**
     * @return Factory|View
     * @throws \Exception
     */
    public function index()
    {

        $dataTable = $this->getAllActivityLogs();

        activity('back-end | admin | activity log')
            ->withProperties(['ip_address' => get_user_ip_address_via_helper()])
            ->log('User landed on the Activity Log Page.');

        return view('system_backend.admin.activity.index', ['dataTable'=>$dataTable]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): ?Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request): ?Response
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id): ?Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id): ?Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int    $id
     *
     * @return Response
     */
    public function update(Request $request, $id): ?Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id): ?Response
    {
        //
    }
}
