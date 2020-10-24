<?php

namespace App\Http\Controllers\Backend\Admin\System;

use App\Http\Controllers\Controller;
use App\Models\System\SystemPage;
use App\Models\System\SystemPageSection;
use App\Repositories\System\SystemMetaRepository;
use App\Repositories\System\SystemPageCategoryRepository;
use App\Repositories\System\SystemPageRepository;
use App\Repositories\System\SystemPageSectionRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class SystemPageSectionsController
 *
 * @package App\Http\Controllers\Backend\Admin\System
 */
class SystemPageSectionsController extends Controller
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
     * @var SystemPageSectionRepository
     */
    protected $systemPageSectionRepository;

    /**
     * SystemPageSectionsController constructor.
     *
     * @param SystemMetaRepository         $systemMetadataRepository
     * @param SystemPageRepository         $systemPageRepository
     * @param SystemPageCategoryRepository $systemPageCategoryRepository
     * @param SystemPageSectionRepository  $systemPageSectionRepository
     */
    public function __construct( SystemMetaRepository $systemMetadataRepository, SystemPageRepository $systemPageRepository,
        SystemPageCategoryRepository $systemPageCategoryRepository, SystemPageSectionRepository $systemPageSectionRepository)
    {
        $this->systemMetadataRepository = $systemMetadataRepository;
        $this->systemPageRepository = $systemPageRepository;
        $this->systemPageCategoryRepository = $systemPageCategoryRepository;
        $this->systemPageSectionRepository = $systemPageSectionRepository;
    }

    /**
     * @param Request $request
     *
     * @return mixed
     * @throws \Exception]
     */
    public function index(Request $request)
    {
        return $this->systemPageSectionRepository->getAllSystemPageSectionAndBuildTable($request->system_page_id);
    }

    /**
     * @param SystemPage $systemPage
     *
     * @return Application|Factory|View
     */
    public function create(SystemPage $systemPage)
    {
        $data = compact('systemPage');

        return view("system_backend.admin.system_pages.sections", $data);
    }

    /**
     * @param Request $request
     *
     * @return Application|Factory|View
     */
    public function store(Request $request)
    {
        $system_page_section = $this->systemPageSectionRepository->storeNew($request);
        $system_pages = $this->systemPageRepository->getAllSystemPageRecords();

        $data = compact('system_pages');

        alert()->success('Success', 'System Page Section Created Successfully. ')->timerProgressBar();

        return view("system_backend.admin.system_pages.index", $data);
    }

    /**
     * @param int $id
     */
    public function show(int $id): void
    {
        //
    }

    /**
     * @param SystemPageSection $systemPageSection
     *
     * @return Application|Factory|View
     */
    public function edit(SystemPageSection $systemPageSection )
    {
        $systemPage = SystemPage::whereId($systemPageSection->systemPage->id)->first();

        $data = compact('systemPage', 'systemPageSection');

        return view("system_backend.admin.system_pages.sections", $data);
    }

    /**
     * @param Request $request
     * @param int     $id
     *
     * @return Application|Factory|View
     */
    public function update(Request $request, int $id)
    {
        $system_page_section = $this->systemPageSectionRepository->updateById($request, $id);
        $system_pages = $this->systemPageRepository->getAllSystemPageRecords();

        $data = compact('system_pages');

        if($system_page_section) {
            alert()->success('Success', 'System Page Section Updated Successfully. ')->timerProgressBar();
        }

        return view("system_backend.admin.system_pages.index", $data);
    }

    /**
     * @param int $id
     *
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $systemPageSection = systemPageSection::whereId($id)->first();

        if (isset($systemPageSection->system_page_id)) {

            $system_page_sections = SystemPageSection::orderBy("order", "ASC")
                ->whereSystemPageId($systemPageSection->system_page_id)
                ->where("id", "<>", $id)
                ->get();

            $systemPageSection->delete();

            $count = 1;

            foreach ($system_page_sections as $section) {
                $section->order = "$count";
                $section->save();
                $count++;
            }

            alert()->success('Success', 'System Page Section Deleted Successfully. ')->timerProgressBar();
        }

        return back();
    }
}
