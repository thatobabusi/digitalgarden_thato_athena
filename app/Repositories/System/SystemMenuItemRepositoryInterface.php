<?php

namespace App\Repositories\System;

use Illuminate\Http\Request;

/**
 * Interface SystemMenuItemRepositoryInterface
 *
 * @package App\Repositories\System
 */
interface SystemMenuItemRepositoryInterface
{
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
    public function formatMetaData(string $robots, string $title, string $author = null, string $keywords = null, string $description = null, string $image = null);

}
