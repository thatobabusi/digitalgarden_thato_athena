<?php

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1','namespace' => 'API'], function(){
    Route::apiResource('blogPosts', 'BlogPostsController');
    Route::get('blogPostCategories/category/{category_slug}', 'BlogPostsController@indexCategory')->name('blogPosts.getByCategorySlug');
    Route::get('blogPostTags/tag/{tag_slug}', 'BlogPostsController@indexTag')->name('blogPosts.getByTagSlug');
    //Route::get('blogPostTags/{tag}', 'BlogPostsController@indexTag');
    //Route::get('blogPostTags/archive/{slug}', 'BlogPostsController@index');
});

#Commented out because its just filling up space when i havent even started this dev yet
/*Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');
});

//Work in progress...
Route::group(['prefix' => 'v1','namespace' => 'API'], function(){
    Route::apiResource('users', 'UserController');
    Route::apiResource('blogPosts', 'BlogPostController');
});*/
