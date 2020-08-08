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
Route::get('/get-blog-posts','Blog\BlogPostsController@getAllBlogPostsByAjax')->name('blog.getAllBlogPostsByAjax');

/****************************************************************************************************************/
#BlogPostCategories
Route::delete('blog-category/destroy', 'Blog\BlogPostCategoriesController@massDestroy')->name('blog-category.massDestroy');
Route::resource('blog-category', 'Blog\BlogPostCategoriesController');

/****************************************************************************************************************/
#BlogPostTags
Route::delete('blog-tag/destroy', 'Blog\BlogPostTagsController@massDestroy')->name('blog-tag.massDestroy');
Route::resource('blog-tag', 'Blog\BlogPostTagsController');

/****************************************************************************************************************/
#Uploads
Route::get('uploads', 'Upload\UploadsController@index')->name('upload.index');

/****************************************************************************************************************/
#Activity Log
Route::resource('activity', 'ActivityLog\ActivityLogController');
Route::get('/get-activity',
    'ActivityLog\ActivityLogController@getAllActivityLogs')->name('activity.getAllAcitivityLogsByAjax');

/****************************************************************************************************************/
#System Config/Plugins/Menu Items/Page Management
Route::resource('system-config-plugins', 'System\SystemConfigPluginsController');
Route::resource('system-menu-items', 'System\SystemMenuItemsController');
Route::resource('system-page-categories', 'System\SystemPageCategoriesController');
Route::resource('system-page-fields', 'System\SystemPageFieldsController');
Route::resource('system-page-metadata', 'System\SystemPageMetaDataController');
Route::resource('system-page-sections', 'System\SystemPageSectionsController');
Route::get('system-page-sections-ajaxGetById', 'System\SystemPageSectionsController@ajaxGetById')->name('pages.ajaxGetById');
Route::get('system-page-sections-ajaxUpdate', 'System\SystemPageSectionsController@ajaxUpdate')->name('pages.ajaxUpdate');
Route::get('system-page-sections-ajaxStore', 'System\SystemPageSectionsController@ajaxStore')->name('pages.ajaxStore');
Route::resource('system-pages', 'System\SystemPagesController');
/****************************************************************************************************************/
#Images
Route::delete('image/destroy', 'System\SystemImageController@massDestroy')->name('image.massDestroy');
Route::resource('image', 'System\SystemImageController');
Route::post('image-upload', 'System\SystemImageController@imageUploadPost')->name('image.upload.post');

/****************************************************************************************************************/
Route::get('crud', 'CRUD\CrudController@index')->name('crud.index');
