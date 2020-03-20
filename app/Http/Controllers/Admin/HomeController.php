<?php

namespace App\Http\Controllers\Admin;

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
        return view('home');
    }
}
