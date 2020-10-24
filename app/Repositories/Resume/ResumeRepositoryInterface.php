<?php

namespace App\Repositories\Resume;

use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

/**
 * Interface UserRepositoryInterface
 *
 * @package App\Repositories\User
 */
interface ResumeRepositoryInterface
{
    /* Get ********************************************************************************************************* */
    /**
     * @return mixed
     */
    public function getResumeContentForFrontEnd();

    /* List ********************************************************************************************************* */

    /* Store ******************************************************************************************************** */

    /* Update ******************************************************************************************************* */

    /* Delete ******************************************************************************************************* */

    /* Sanitize ***************************************************************************************************** */

}
