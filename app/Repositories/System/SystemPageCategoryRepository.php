<?php

namespace App\Repositories\System;

use App\Models\System\SystemPageCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Meta;

/**
 * Class SystemPageCategoryRepository
 *
 * @package App\Repositories\System
 */
class SystemPageCategoryRepository implements SystemPageCategoryRepositoryInterface
{

    /* Get ********************************************************************************************************* */

    /**
     * @param string|null $limit
     *
     * @return Builder[]|Collection|mixed
     */
    public function getAllSystemPageCategoriesRecords(string $limit = null)
    {
        if($limit === null) {
            return SystemPageCategory::with('systemPages')->all();
        }

        return SystemPageCategory::with('systemPages')
            ->orderBy('created_at', 'DESC')
            ->get()
            ->take((int)$limit);
    }

    /* List ********************************************************************************************************* */

    /**
     * @return \Illuminate\Support\Collection|mixed
     */
    public function listAllSystemCategoriesByTitleAndId()
    {
        return SystemPageCategory::orderBy('title')->get()->pluck('title', 'id');
    }

}
