<?php

namespace App\Repositories\System;

use App\Models\System\SystemPage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Interface SystemPageRepositoryInterface
 *
 * @package App\Repositories\System
 */
interface SystemPageRepositoryInterface
{

    /* Get ********************************************************************************************************* */

    /**
     * @param string|null $limit
     *
     * @return mixed
     */
    public function getAllSystemPageRecords(string $limit = null);

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function getSystemPageById(int $id);

    /**
     * @param string $slug
     *
     * @return mixed
     */
    public function getSystemPageBySlug(string $slug);

    /* Store ******************************************************************************************************** */

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function storeSystemPage(Request $request);

    /* Update ******************************************************************************************************* */

    /**
     * @param Request $request
     * @param int     $id
     *
     * @return mixed
     */
    public function updateSystemPage(Request $request, int $id);

    /* List ********************************************************************************************************* */

    /**
     * @return mixed
     */
    public function listAllSystemPagesByTitleAndId();

    /**
     * @return mixed
     */
    public function listAllSystemPagesBySlug();

    /* Sanitize ***************************************************************************************************** */

}
