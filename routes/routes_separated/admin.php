<?php

/****************************************************************************************************************/
#Permissions
Route::delete('permissions/destroy', 'AccessControl\PermissionsController@massDestroy')->name('permissions.massDestroy');
Route::resource('permissions', 'AccessControl\PermissionsController');
/****************************************************************************************************************/
#Roles
Route::delete('roles/destroy', 'AccessControl\RolesController@massDestroy')->name('roles.massDestroy');
Route::resource('roles', 'AccessControl\RolesController');
/****************************************************************************************************************/
#Users
Route::delete('users/destroy', 'User\UsersController@massDestroy')->name('users.massDestroy');
Route::resource('users', 'User\UsersController');
/****************************************************************************************************************/
#BlogPosts
Route::delete('blog/destroy', 'Blog\BlogPostsController@massDestroy')->name('blog.massDestroy');
Route::resource('blog', 'Blog\BlogPostsController');
/****************************************************************************************************************/
#BlogPostCategories
Route::delete('blog-category/destroy', 'Blog\BlogPostCategoriesController@massDestroy')->name('blog-category.massDestroy');
Route::resource('blog-category', 'Blog\BlogPostCategoriesController');
/****************************************************************************************************************/
#BlogPostTags
Route::delete('blog-tag/destroy', 'Blog\BlogPostTagsController@massDestroy')->name('blog-tag.massDestroy');
Route::resource('blog-tag', 'Blog\BlogPostTagsController');
/****************************************************************************************************************/
#Images
Route::delete('image/destroy', 'Image\ImageController@massDestroy')->name('image.massDestroy');
Route::resource('image', 'Image\ImageController');
Route::post('image-upload', 'Image\ImageController@imageUploadPost')->name('image.upload.post');
/****************************************************************************************************************/
#Activity Log
Route::resource('activity', 'ActivityLog\ActivityLogController');
Route::get('/get-activity',
    'ActivityLog\ActivityLogController@getAllAcitivityLogs')->name('activity.getAllAcitivityLogsByAjax');
/****************************************************************************************************************/
#System Config/Plugins/Menu Items/Page Management
Route::resource('system-config-plugins', 'System\SystemConfigPluginsController');
Route::resource('system-menu-items', 'System\SystemMenuItemsController');
Route::resource('system-page-categories', 'System\SystemPageCategoriesController');
Route::resource('system-pages', 'System\SystemPagesController');
/****************************************************************************************************************/
Route::get('crud', 'CRUD\CrudController@index')->name('crud.index');
