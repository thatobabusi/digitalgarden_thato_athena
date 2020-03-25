<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

/**
 * Class HomeController
 *
 * @package App\Http\Controllers\Admin
 */
class HomeController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        if( Str::contains(URL::previous(), 'login') === true ) {

            $user_roles = '';
            foreach(Auth::user()->roles()->get() as $role) {
                $user_roles .= $role->title . ' |';
            }
            $user_roles = substr($user_roles, 0, -2);

            alert()->success('Welcome Back, ' . Auth::user()->getFullName(), 'Logged in as ' .  $user_roles)->timerProgressBar();

        }

        return view('home');
    }

}
