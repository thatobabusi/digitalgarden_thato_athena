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
require_once 'routes_separated/redirects.php';

Route::get('/vue', function() {
    //return File::get(resource_path('views/frontend/vuejs/index.html'));
    return view('welcome');
});

/*****************************************BACKEND**********************************************************************/
Route::group(['middleware' => ['auth']], function ()
{
    #For Admin Users and Admin Functionality
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Backend\Admin'], function ()
    {

        Route::get('/', 'HomeController@index')->name('home');

        require_once 'routes_separated/admin.php';
    });

    #For Other Users and General Backend Functionality
    Route::group(['prefix' => 'admin', 'as' => 'user.', 'namespace' => 'Backend\AuthorizedUser'], function ()
    {
        //
    });
});

/*****************************************FRONTEND*********************************************************************/
Route::group(['namespace' => 'Frontend'], function ()
{
    require_once 'routes_separated/frontend.php';
});

/*****************************************AUTH ROUTES******************************************************************/
#Add all Auth Routes but prevent the register one because that would allow anyone access into the system.
#TODO::Maybe allow register for regular users who wont get access to admin section
Auth::routes(['register' => false]);

/*****************************************STATIC FRONTEND PAGES ROUTES**********************************************/
#Include these last because the wild card messes with most of my other routes
Route::get('/{page?}', 'Frontend\GenericFrontendPagesController@index');
