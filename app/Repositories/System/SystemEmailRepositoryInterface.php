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

    /* Process ****************************************************************************************************** */

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function processContactFormEmail(Request $request);

}
