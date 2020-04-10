<?php

#Landing Page
Route::get('/', 'GenericFrontendPagesController@index')->name('frontend.home');

#Blog Pages
Route::get('/blog', 'BlogController@index')->name('frontend.viewBlogHome');
Route::get('/blog-get-more-by-ajax', 'BlogController@getMoreByAjax')->name('frontend.getMorePostsByAjax');
Route::get('/blog/{slug}', 'BlogController@showBlogPostBySlug')->name('frontend.viewBlogSinglePostBySlug');
Route::get('/blog-archives/{archiveDate}', 'BlogController@indexArchive')->name('frontend.viewAllBlogPostsByArchive');
Route::get('/blog-category/{categorySlug}', 'BlogController@indexCategory')->name('frontend.viewAllBlogPostsByCategory');
Route::get('/blog-tag/{tagSlug}', 'BlogController@indexTag')->name('frontend.viewAllBlogPostsByTag');



