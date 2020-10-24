<?php

namespace App\Repositories\Resume;

use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Resume\Resume;
use App\Models\User\User;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * Class UserRepository
 *
 * @package App\Repositories\User
 */
class ResumeRepository implements ResumeRepositoryInterface
{
    /* Get ********************************************************************************************************* */
    /**
     * @return Resume|Builder|Model|mixed|object|null
     */
    public function getResumeContentForFrontEnd()
    {
        $resume = Resume::whereId(1)->first();
        $resume->load('resumeContactDetails', 'resumeWorkDetails', 'resumeEducationDetails', 'resumeInterests',
        'resumeLanguages', 'resumeLicenses', 'resumeSkills', 'resumeProfilePhotos');

        return $resume;
    }

    /* List ********************************************************************************************************* */

    /* Store ******************************************************************************************************** */

    /* Update ******************************************************************************************************* */

    /* Delete ******************************************************************************************************* */

    /* Sanitize ***************************************************************************************************** */
}
