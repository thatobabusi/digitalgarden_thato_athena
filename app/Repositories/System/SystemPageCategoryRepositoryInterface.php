<?php

namespace App\Repositories\System;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface SystemPageCategoryRepositoryInterface
 *
 * @package App\Repositories\System
 */
interface SystemPageCategoryRepositoryInterface
{

    /* Get ********************************************************************************************************* */

    /**
     * @param string|null $limit
     *
     * @return Builder[]|Collection|mixed
     */
    public function getAllSystemPageCategoriesRecords(string $limit = null);

    /* List ********************************************************************************************************* */

    /**
     * @return \Illuminate\Support\Collection|mixed
     */
    public function listAllSystemCategoriesByTitleAndId();

}
