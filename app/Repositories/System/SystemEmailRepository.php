<?php

namespace App\Repositories\System;

use App\Mail\SendContactFormEmail;
use App\User;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

/**
 * Class EmailRepository
 *
 * @package App\Repositories\Notifications
 */
class SystemEmailRepository implements SystemEmailRepositoryInterface
{

    #Get
    /**
     * @param Request $request
     *
     * @return User[]|Collection|mixed|mixed[]|null
     */
    public function processContactFormEmail(Request $request)
    {
        $validator = Validator::make($request->toArray(), [
            'captcha'   => 'required|captcha',
            'firstname' => 'required|min:3',
            'surname'   => 'required|min:3',
            'email'     => 'required|email|min:5',
            'cellphone' => 'required|min:7',
            'subject'   => 'required|min:3',
            'message'   => 'required|min:5',
        ]);

        if ($validator->fails()) {

            #keeping track of this to monitor spam attempts
            activity('front-end | contact form')->withProperties(['ip_address' => get_user_ip_address_via_helper()])
                ->log('User entered invalid data on the contact form');

            alert()->error('Validation Error','Error in form, please check that all input fields are correct.')->timerProgressBar();

            return Redirect::back()->withErrors($validator)->withInput();
        }

        $user = User::where("name", "Thato Babusi")->first();
        Mail::to($user)->send(new SendContactFormEmail($request));

        #log it so you know if it ends up in the spam folder what went wrong
        activity('front-end | contact form')->withProperties([
            'ip_address' => get_user_ip_address_via_helper(),
            'user' => $request->firstname. ' ' .$request->surname,
            'email' => $request->email,
            'subject' => $request->subject,
        ])
            ->log('User submitted valid contact form data');

        #If it was successful
        alert()->success('Success:', 'Contact form submitted successfully');

        return redirect()->action('Frontend\BlogController@index');

    }

}
