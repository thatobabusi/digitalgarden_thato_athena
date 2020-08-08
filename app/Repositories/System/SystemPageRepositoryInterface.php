<?php

namespace App\Repositories\System;

use Illuminate\Http\Request;

/**
 * Interface SystemPageRepositoryInterface
 *
 * @package App\Repositories\System
 */
interface SystemPageRepositoryInterface
{
    /**
     * @param string|null $limit
     *
     * @return mixed
     */
    public function getAllSystemPageRecords(string $limit = null);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getSystemPageById($id);

    /**
     * @param $slug
     *
     * @return mixed
     */
    public function getSystemPageBySlug($slug);

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function storeSystemPage(Request $request);

    /**
     * @param Request $request
     * @param         $id
     *
     * @return mixed
     */
    public function updateSystemPage(Request $request, $id);

    /**
     * @return mixed
     */
    public function listAllSystemPagesByTitleAndId();

    /**
     * @return mixed
     */
    public function listAllSystemPagesBySlug();


}
