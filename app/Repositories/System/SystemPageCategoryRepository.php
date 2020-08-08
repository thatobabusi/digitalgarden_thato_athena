<?php

namespace App\Repositories\System;

use App\Models\System\SystemPageCategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Meta;

/**
 * Class SystemPageCategoryRepository
 *
 * @package App\Repositories\System
 */
class SystemPageCategoryRepository implements SystemPageCategoryRepositoryInterface
{

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

    /**
     * @return \Illuminate\Support\Collection
     */
    public function listAllSystemCategoriesByTitleAndId()
    {
        return SystemPageCategory::orderBy('title')->get()->pluck('title', 'id');
    }

}
