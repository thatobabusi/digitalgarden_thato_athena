<?php

namespace App\Http\Controllers\Backend\Admin\System;

use App\Http\Controllers\Controller;
use App\Repositories\System\SystemMetaRepository;
use App\Repositories\System\SystemPageCategoryRepository;
use App\Repositories\System\SystemPageRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

/**
 * Class SystemPagesController
 *
 * @package App\Http\Controllers\Backend\Admin\System
 */
class SystemPagesController extends Controller
{

    /**
     * @var SystemMetaRepository
     */
    protected $systemMetadataRepository;
    /**
     * @var SystemPageRepository
     */
    protected $systemPageRepository;
    /**
     * @var SystemPageCategoryRepository
     */
    protected $systemPageCategoryRepository;

    /**
     * SystemPagesController constructor.
     *
     * @param SystemMetaRepository         $systemMetadataRepository
     * @param SystemPageRepository         $systemPageRepository
     * @param SystemPageCategoryRepository $systemPageCategoryRepository
     */
    public function __construct( SystemMetaRepository $systemMetadataRepository, SystemPageRepository $systemPageRepository,
    SystemPageCategoryRepository $systemPageCategoryRepository)
    {
        $this->systemMetadataRepository = $systemMetadataRepository;
        $this->systemPageRepository = $systemPageRepository;
        $this->systemPageCategoryRepository = $systemPageCategoryRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $system_pages = $this->systemPageRepository->getAllSystemPageRecords();

        $data = compact('system_pages');

        return view("admin.system_pages.index", $data);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $system_page_categories = $this->systemPageCategoryRepository->getAllSystemPageCategoriesRecords();
        $system_page_categories_list = $this->systemPageCategoryRepository->listAllSystemCategoriesByTitleAndId();

        $data = compact('system_page_categories', 'system_page_categories_list');

        return view("admin.system_pages.create", $data);
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $system_page = $this->systemPageRepository->storeSystemPage($request);
        $this->systemMetadataRepository->storeMetaData($request, $system_page);

        if($system_page) {
            alert()->success('Success', 'System Page Created Successfully. You can now begin adding the relevant
            components  that build up the page.')->timerProgressBar();
        }

        return redirect()->route('admin.system-pages.edit', $system_page->id);
    }

    /**
     * @param string $id
     *
     * @return Response|null
     */
    public function show(string $id): ?Response
    {
        //
    }

    /**
     * @param string $id
     *
     * @return Application|Factory|View
     */
    public function edit(string $id)
    {
        $system_page = $this->systemPageRepository->getSystemPageById($id);
        $system_page_categories = $this->systemPageCategoryRepository->getAllSystemPageCategoriesRecords();
        $system_page_categories_list = $this->systemPageCategoryRepository->listAllSystemCategoriesByTitleAndId();

        $data = compact('system_page', 'system_page_categories', 'system_page_categories_list');

        return view("admin.system_pages.edit", $data);
    }

    /**
     * @param Request $request
     * @param string  $id
     *
     * @return RedirectResponse
     */
    public function update(Request $request, string $id)
    {
        $fields = $request->fields;
        $new_array = [];
        foreach($fields as $index => $f) {
            $new_array[][$index] = $f;
        }
        dd($new_array);
        dd($fields);
        dd($request->all());
        $system_page = $this->systemPageRepository->updateSystemPage($request, $id);

        if($system_page) {
            alert()->success('Success', 'System Page Updated Successfully.')->timerProgressBar();
        }

        return redirect()->route('admin.system-pages.edit', $system_page->id);
    }

    /**
     * @param string $id
     *
     * @return Response|null
     */
    public function destroy(string $id): ?Response
    {
        //
    }
}
