<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

#Redirects authenticated users to the correct home page
use Illuminate\Support\Facades\Auth;

require_once 'routes_separated/redirects.php';

Route::get('/spotify-callback', function () {
    return view('system_frontend.pages.music-spotify');
})->name('test');

Route::group(['domain' => config('app.app_domain_name')], function(){

    Route::group(['as' => 'professional.', 'namespace' => 'Frontend'], function () {
        Route::get('/about-me', 'ResumeController@aboutMe')->name('about-me');
    });

    Route::group(['as' => 'professional.', 'namespace' => 'Frontend'], function () {
        Route::get('/my-resume', 'ResumeController@resume')->name('my-resume');
    });

});

Route::group(['domain' => config('app.app_domain_name_personal')], function() {

    /*****************************************BACKEND******************************************************************/
    Route::group(['middleware' => ['auth']], function () {

        #!!! Careful With this.... User must be logged in... But still a threat if they guess passwords correctly !!! #
        Route::get('/checking/letsnameitsomethingsillytheywouldntguess', 'Backend\Admin\System\SystemEnvController@test');

        #For Admin Users and Admin Functionality
        Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Backend\Admin'], function () {

            Route::get('/', 'HomeController@index')->name('home');

            require_once 'routes_separated/admin.php';

            Route::get('/developer-tools/schematics', function() {
                $user_logged_in = Auth::user();
                if($user_logged_in && $user_logged_in->is_admin) {
                    return redirect()->to('/schematics');
                }
                return redirect()->to('/');
            });
        });

        #For Other Users and General Backend Functionality
        /**
         Route::group(['prefix' => 'admin', 'as' => 'user.', 'namespace' => 'Backend\AuthorizedUser'], function () {
            //
        });
         */
    });

    /*****************************************FRONTEND*****************************************************************/
    Route::group(['namespace' => 'Frontend'], function () {
        require_once 'routes_separated/frontend.php';
    });

    /*****************************************AUTH ROUTES**************************************************************/
    #Add all Auth Routes but prevent the register one because that would allow anyone access into the system.
    #TODO::Maybe allow register for regular users who wont get access to admin section
    Auth::routes(['register' => false]);

    /*****************************************STATIC FRONTEND PAGES ROUTES*********************************************/
    #Include these last because the wild card messes with most of my other routes
    Route::get('/{page?}', 'Frontend\GenericFrontendPagesController@index');

});
