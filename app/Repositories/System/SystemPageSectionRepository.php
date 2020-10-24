<?php

namespace App\Repositories\System;

use App\Models\System\SystemPageSection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Meta;

/**
 * Class SystemPageSectionRepository
 *
 * @package App\Repositories\System
 */
class SystemPageSectionRepository implements SystemPageSectionRepositoryInterface
{

    /* Get ********************************************************************************************************* */

    /**
     * @param int $page_id
     *
     * @return mixed
     * @throws \Exception
     */
    public function getAllSystemPageSectionAndBuildTable(int $page_id)
    {
        core_helper_extend_timeout_time();
        $system_page_sections = SystemPageSection::whereSystemPageId($page_id);

        $system_page_sections =  (new \Yajra\DataTables\DataTables)->of($system_page_sections)
            ->addColumn('actions', function($row) {
                return '<div class="btn-group">
                        <a class="btn btn-xs btn-info" href="' . route("admin.system-page-sections.edit", $row->id) . '" type="button">
                            ' . trans("global.edit") . '
                        </a>
                        <a class="btn btn-xs btn-danger" href="#" type="button">
                            <form action="' . route("admin.system-page-sections.destroy", $row->id) . '"
                                  method="POST" onsubmit="return confirm(\'' . trans("global.areYouSure") . '\');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="' . csrf_token() . '">
                                <input type="submit" class="btn btn-xs btn-danger" value="' . trans("global.delete") . '">
                            </form>
                        </a>
                        </div>';
            })
            ->rawColumns(['actions' => 'actions'])
            ->make(true);

        return $system_page_sections;
    }

    /* Store ******************************************************************************************************** */

    /**
     * @param Request $request
     *
     * @return SystemPageSection
     */
    public function storeNew(Request $request)
    {
        $system_page_section = new SystemPageSection();
        $system_page_section->system_page_id = $request->page_id;
        $system_page_section->title = $request->page_section_title;
        $system_page_section->header = $request->page_section_header;
        $system_page_section->subheader = $request->page_section_subheader;
        $system_page_section->order = $request->page_section_order;
        $system_page_section->body = $request->page_section_body;
        $system_page_section->save();

        $system_page_sections = SystemPageSection::orderBy("order", "ASC")->whereSystemPageId($request->page_id)->get();

        $count = 1;
        foreach($system_page_sections as $section) {
            $section->order = "$count";
            $section->save();
            $count++;
        }

        return $system_page_section;
    }

    /* Update ******************************************************************************************************* */

    /**
     * @param Request $request
     * @param int     $id
     *
     * @return SystemPageSection|Builder|Model|RedirectResponse|object|null
     */
    public function updateById(Request $request, int $id)
    {
        $system_page_section = SystemPageSection::whereId($id)->first();

        if(isset($system_page_section->id)) {
            $system_page_section->title = $request->page_section_title;
            $system_page_section->header = $request->page_section_header;
            $system_page_section->subheader = $request->page_section_subheader;
            $system_page_section->order = $request->page_section_order;
            $system_page_section->body = $request->page_section_body;
            $system_page_section->save();

            $system_page_sections = SystemPageSection::orderBy("order",
                "ASC")->whereSystemPageId($request->page_id)->get();

            $count = 1;
            foreach ($system_page_sections as $section) {
                $section->order = "$count";
                $section->save();
                $count++;
            }

            return $system_page_section;
        }

        else {
            alert()->error('Error:', 'Cannot find resource');
            return redirect()->back();
        }
    }

}
