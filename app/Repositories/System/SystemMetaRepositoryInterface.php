<?php

namespace App\Repositories\System;

use App\Models\System\SystemPage;
use Illuminate\Http\Request;

/**
 * Interface SystemMetaRepositoryInterface
 *
 * @package App\Repositories\System
 */
interface SystemMetaRepositoryInterface
{

    /* Store ******************************************************************************************************** */

    /**
     * @param Request    $request
     * @param SystemPage $systemPage
     *
     * @return mixed
     */
    public function storeMetaData(Request $request, SystemPage $systemPage);

    /* Update ******************************************************************************************************* */

    /**
     * @param Request $request
     * @param int     $id
     *
     * @return mixed
     */
    public function updateMetaData(Request $request, int $id);

    /* Format ******************************************************************************************************* */

    /**
     * @param string      $robots
     * @param string      $title
     * @param string|null $author
     * @param string|null $keywords
     * @param string|null $description
     * @param string|null $image
     *
     * @return mixed
     */
    public function formatMetaData(string $robots, string $title, string $author = null, string $keywords = null,
        string $description = null, string $image = null);


}
