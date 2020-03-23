<?php

//use Illuminate\Support\Facades\Route;

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


/**
 * NOTE: helper method "plugin_is_enabled" these remove certain routes when plugins are not enabled
 * Good to use when in dev and trying to limit the number of routes being displayed
 */

//TODO::Going to break these routes down between front and back and perhaps by entity as well

/*****************************************BACKEND*********************************************************************/
//Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {

    Route::get('/', 'HomeController@index')->name('home');

    //Access Control Management
    if(plugin_is_enabled('Access Control Management')) {
        // Permissions
        Route::delete('permissions/destroy', 'AccessControl\PermissionsController@massDestroy')->name('permissions.massDestroy');
        Route::resource('permissions', 'AccessControl\PermissionsController');

        // Roles
        Route::delete('roles/destroy', 'AccessControl\RolesController@massDestroy')->name('roles.massDestroy');
        Route::resource('roles', 'AccessControl\RolesController');
    }

    //User Management
    if(plugin_is_enabled('User Management')) {
        // Users
        Route::delete('users/destroy', 'User\UsersController@massDestroy')->name('users.massDestroy');
        Route::resource('users', 'User\UsersController');
    }

    //Blog Management
    if(plugin_is_enabled('Blog')) {
        // BlogPosts
        Route::delete('blog/destroy', 'Blog\BlogPostsController@massDestroy')->name('blog.massDestroy');
        Route::resource('blog', 'Blog\BlogPostsController');
    }

    //Activity Log
    if(plugin_is_enabled('Activity Log')) {
        Route::resource('activity', 'ActivityLog\ActivityLogController');
        Route::get('/get-activity',
            'ActivityLog\ActivityLogController@getAllAcitivityLogs')->name('activity.getAllAcitivityLogsByAjax');
    }

    //System Config/Plugins/Menu Items/Page Management
    Route::resource('system-config-plugins', 'System\SystemConfigPluginsController');
    Route::resource('system-menu-items', 'System\SystemMenuItemsController');
    Route::resource('system-page-categories', 'System\SystemPageCategoriesController');
    Route::resource('system-pages', 'System\SystemPagesController');

});

/*****************************************FRONTEND*******************************************************************/
//Landing Page
Route::get('/', 'Frontend\GenericFrontendPagesController@index')->name('frontend.home');

//Blog Pages
if(plugin_is_enabled('Blog')) {
    Route::get('/blog', 'Frontend\BlogController@index')->name('frontend.viewBlogHome');
    Route::get('/blog-get-more-by-ajax', 'Frontend\BlogController@getMoreByAjax')->name('frontend.getMorePostsByAjax');
    Route::get('/blog/{slug}', 'Frontend\BlogController@showBlogPostBySlug')->name('frontend.viewBlogSinglePostBySlug');
    Route::get('/blog-archives/{archiveDate}', 'Frontend\BlogController@indexArchive')->name('frontend.viewAllBlogPostsByArchive');
    Route::get('/blog-category/{categorySlug}', 'Frontend\BlogController@indexCategory')->name('frontend.viewAllBlogPostsByCategory');
    Route::get('/blog-tag/{tagSlug}', 'Frontend\BlogController@indexTag')->name('frontend.viewAllBlogPostsByTag');
}

/*****************************************REDIRECTS*****************************************************************/

//TODO::Not sure I really need these here.
//Home Redirects
Route::get('/home', function () {

    $routeName = auth()->user() && (auth()->user()->is_student || auth()->user()->is_teacher) ? 'admin.calendar.index' : 'admin.home';
    if (session('status')) {
        return redirect()->route($routeName)->with('status', session('status'));
    }

    return redirect()->route($routeName);
});

/*****************************************AUTH ROUTES***************************************************************/
//Add all Auth Routes but prevent the register one because that would allow anyone access into the system.
Auth::routes(['register' => false]);

/*****************************************STATIC FRONTEND PAGES ROUTES**********************************************/
#Include these last because the wild card messes with most of my other routes
Route::get('/{page?}', 'Frontend\GenericFrontendPagesController@index');
