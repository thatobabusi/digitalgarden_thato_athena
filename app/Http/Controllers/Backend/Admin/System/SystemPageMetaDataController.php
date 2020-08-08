<?php

namespace App\Http\Controllers\Backend\Admin\System;

use App\Http\Controllers\Controller;
use App\Repositories\System\SystemMetaRepository;
use App\Repositories\System\SystemPageCategoryRepository;
use App\Repositories\System\SystemPageRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SystemPageMetaDataController extends Controller
{

    /**
     * @var SystemMetaRepository
     */
    protected $systemMetadataRepository;

    /**
     * SystemPageMetaDataController constructor.
     *
     * @param SystemMetaRepository $systemMetadataRepository
     */
    public function __construct( SystemMetaRepository $systemMetadataRepository)
    {
        $this->systemMetadataRepository = $systemMetadataRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd("store");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * @param Request $request
     * @param         $id
     *
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $system_meta_data = $this->systemMetadataRepository->updateMetaData($request, $id);

        if($system_meta_data) {
            alert()->success('Success', 'System Page Meta Data Updated Successfully.')->timerProgressBar();
        }

        return redirect()->route('admin.system-pages.edit', $system_meta_data->system_page_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
