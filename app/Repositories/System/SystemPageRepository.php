<?php

namespace App\Repositories\System;

use App\Models\System\SystemPage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Meta;

/**
 * Class SystemPageRepository
 *
 * @package App\Repositories\System
 */
class SystemPageRepository implements SystemPageRepositoryInterface
{

    /**
     * @param string|null $limit
     *
     * @return Builder[]|Collection|mixed
     */
    public function getAllSystemPageRecords(string $limit = null)
    {
        if($limit === null) {
            return SystemPage::with('systemPageCategory')->all();
        }

        return SystemPage::with('systemPageCategory')
            ->orderBy('created_at', 'DESC')
            ->get()
            ->take((int)$limit);
    }

    /**
     * @param $id
     *
     * @return SystemPage|Builder|Model|object|null
     */
    public function getSystemPageById($id)
    {
        $system_page = SystemPage::whereId($id)->first();
        $system_page->load('systemPageMetadata', 'systemPageCategory');

        return $system_page;
    }

    /**
     * @param $slug
     *
     * @return SystemPage|Builder|Model|object|null
     */
    public function getSystemPageBySlug($slug)
    {
        $system_page = SystemPage::whereSlug($slug)->first();
        $system_page->load('systemPageMetadata', 'systemPageCategory', 'systemPageSections');

        return $system_page;
    }

    /**
     * @param Request $request
     *
     * @return SystemPage|Model
     */
    public function storeSystemPage(Request $request)
    {
        $system_page = SystemPage::create([
            'system_page_category_id' => $request->system_page_category_id,
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return $system_page;
    }

    /**
     * @param Request $request
     * @param         $id
     *
     * @return SystemPage|Builder|Model|mixed|object|null
     */
    public function updateSystemPage(Request $request, $id)
    {
        $system_page = $this->getSystemPageById($id);
        if($system_page) {
            $system_page->system_page_category_id = $request->system_page_category_id;
            $system_page->title = $request->title;
            $system_page->slug = $request->slug;
            $system_page->description = $request->description;
            $system_page->status = $request->status;
            $system_page->save();
        }

        return $system_page;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function listAllSystemPagesByTitleAndId()
    {
        return SystemPage::orderBy('title')->get()->pluck('title', 'id');
    }

    /**
     * @return array
     */
    public function listAllSystemPagesBySlug()
    {
        return SystemPage::orderBy('title')->get()->pluck('slug')->toArray();
    }

}
