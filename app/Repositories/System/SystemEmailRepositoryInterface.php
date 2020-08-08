<?php

namespace App\Repositories\System;

use Illuminate\Http\Request;

/**
 * Interface EmailRepositoryInterface
 *
 * @package App\Repositories\Notifications
 */
interface SystemEmailRepositoryInterface
{
    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function processContactFormEmail(Request $request);

}
