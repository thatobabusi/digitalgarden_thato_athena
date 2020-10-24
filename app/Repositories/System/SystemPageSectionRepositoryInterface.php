<?php

namespace App\Repositories\System;

use App\Models\System\SystemPageSection;
use Illuminate\Http\Request;

/**
 * Interface SystemPageSectionRepositoryInterface
 *
 * @package App\Repositories\System
 */
interface SystemPageSectionRepositoryInterface
{

    /* Get ********************************************************************************************************* */

    /**
     * @param int $page_id
     *
     * @return mixed
     */
    public function getAllSystemPageSectionAndBuildTable(int $page_id);

    /* Store ******************************************************************************************************** */

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function storeNew(Request $request);

    /* Update ******************************************************************************************************* */

    /**
     * @param Request $request
     * @param int     $id
     *
     * @return mixed
     */
    public function updateById(Request $request, int $id);

}
