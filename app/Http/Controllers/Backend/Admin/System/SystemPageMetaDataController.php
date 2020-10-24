<?php

namespace App\Http\Controllers\Backend\Admin\System;

use App\Http\Controllers\Controller;
use App\Repositories\System\SystemMetaRepository;
use App\Repositories\System\SystemPageCategoryRepository;
use App\Repositories\System\SystemPageRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

    public function index(): void
    {
        //
    }


    public function create(): void
    {
        //
    }

    /**
     * @param Request $request
     */
    public function store(Request $request): void
    {
        //
    }

    /**
     * @param int $id
     */
    public function show(int $id): void
    {
        //
    }

    /**
     * @param int $id
     */
    public function edit(int $id): void
    {
        //
    }

    /**
     * @param Request $request
     * @param int     $id
     *
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $system_meta_data = $this->systemMetadataRepository->updateMetaData($request, $id);

        if($system_meta_data) {
            alert()->success('Success', 'System Page Meta Data Updated Successfully.')->timerProgressBar();
        }

        return redirect()->route('admin.system-pages.edit', $system_meta_data->system_page_id);
    }

    /**
     * @param int $id
     */
    public function destroy(int $id): void
    {
        //
    }
}
