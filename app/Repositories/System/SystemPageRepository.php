<?php

namespace App\Repositories\System;

use App\Models\System\SystemPage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Meta;

/**
 * Class SystemPageRepository
 *
 * @package App\Repositories\System
 */
class SystemPageRepository implements SystemPageRepositoryInterface
{

    /* Get ********************************************************************************************************* */

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
     * @param int $id
     *
     * @return SystemPage|Builder|Model|object|null
     */
    public function getSystemPageById(int $id)
    {
        $system_page = SystemPage::whereId($id)->first();
        $system_page->load('systemPageMetadata', 'systemPageCategory');

        return $system_page;
    }

    /**
     * @param string $slug
     *
     * @return SystemPage|Builder|Model|object|null
     */
    public function getSystemPageBySlug(string $slug)
    {
        $system_page = SystemPage::whereSlug($slug)->first();
        $system_page->load('systemPageMetadata', 'systemPageCategory');

        return $system_page;
    }

    /* Store ******************************************************************************************************** */

    /**
     * @param Request $request
     *
     * @return SystemPage|Model
     */
    public function storeSystemPage(Request $request)
    {
        $system_page = SystemPage::create($request->all());
        $system_page->save();

        return $system_page;
    }

    /* Update ******************************************************************************************************* */

    /**
     * @param Request $request
     * @param int     $id
     *
     * @return SystemPage|Builder|Model|mixed|object|null
     */
    public function updateSystemPage(Request $request, int $id)
    {
        $system_page = $this->getSystemPageById($id);

        if($system_page) {
            $system_page->update($request->all());
            $system_page->save();
        }

        return $system_page;
    }

    /* List ********************************************************************************************************* */

    /**
     * @return \Illuminate\Support\Collection|mixed
     */
    public function listAllSystemPagesByTitleAndId()
    {
        return SystemPage::orderBy('title')->get()->pluck('title', 'id');
    }

    /**
     * @return array|mixed
     */
    public function listAllSystemPagesBySlug()
    {
        return SystemPage::orderBy('title')->get()->pluck('slug')->toArray();
    }

    /* Sanitize ***************************************************************************************************** */
}
