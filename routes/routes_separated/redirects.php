<?php

/*****************************************REDIRECTS*****************************************************************/

/*if(Auth::user()) {
    Route::get('/schematics', function () {
        return redirect()->to('/schematics');
    });
}
else {
    Route::get('/schematics', function () {
        return redirect()->to('/');
    });
}*/


//TODO::Not sure I really need these here.
#Home Redirects
Route::get('/home', function () {

    $routeName = auth()->user() && (auth()->user()->is_student || auth()->user()->is_teacher) ? 'frontend.home' : 'admin.home';
    if (session('status')) {
        return redirect()->route($routeName)->with('status', session('status'));
    }

    return redirect()->route($routeName);
});
