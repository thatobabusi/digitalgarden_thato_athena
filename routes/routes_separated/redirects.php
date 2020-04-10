<?php

/*****************************************REDIRECTS*****************************************************************/

//TODO::Not sure I really need these here.
#Home Redirects
Route::get('/home', function () {

    $routeName = auth()->user() && (auth()->user()->is_student || auth()->user()->is_teacher) ? 'admin.calendar.index' : 'admin.home';
    if (session('status')) {
        return redirect()->route($routeName)->with('status', session('status'));
    }

    return redirect()->route($routeName);
});
