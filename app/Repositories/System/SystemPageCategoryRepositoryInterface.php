<?php

namespace App\Repositories\System;

use Illuminate\Http\Request;

/**
 * Interface SystemPageCategoryRepositoryInterface
 *
 * @package App\Repositories\System
 */
interface SystemPageCategoryRepositoryInterface
{
    /**
     * @param string|null $limit
     *
     * @return mixed
     */
    public function getAllSystemPageCategoriesRecords(string $limit = null);

    /**
     * @return mixed
     */
    public function listAllSystemCategoriesByTitleAndId();

}
