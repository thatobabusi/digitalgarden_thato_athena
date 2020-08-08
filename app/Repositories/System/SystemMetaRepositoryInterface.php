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
    /**
     * @param string      $robots
     * @param string      $title
     * @param string|null $author
     * @param string|null $keywords
     * @param string|null $description
     * @param string|null $image
     *
     * @return mixed|void
     */
    public function formatMetaData(string $robots, string $title, string $author = null, string $keywords = null, string $description = null, string $image = null);

    /**
     * @param Request    $request
     * @param SystemPage $systemPage
     *
     * @return mixed
     */
    public function storeMetaData(Request $request, SystemPage $systemPage);

    /**
     * @param Request $request
     * @param         $id
     *
     * @return mixed
     */
    public function updateMetaData(Request $request, $id);
}
