<?php

#Landing Page
Route::get('/', 'GenericFrontendPagesController@index')->name('frontend.home');

#Blog Pages
Route::get('/blog', 'BlogController@index')->name('frontend.viewBlogHome');
Route::get('/blog/{slug}', 'BlogController@showBlogPostBySlug')->name('frontend.viewBlogSinglePostBySlug');
Route::get('/blog-archives/{archiveDate}', 'BlogController@indexArchive')->name('frontend.viewAllBlogPostsByArchive');
Route::get('/blog-category/{categorySlug}', 'BlogController@indexCategory')->name('frontend.viewAllBlogPostsByCategory');
Route::get('/blog-tag/{tagSlug}', 'BlogController@indexTag')->name('frontend.viewAllBlogPostsByTag');

#Search
Route::any('/search', 'BlogController@search')->name('frontend.search');

#Contact Page
Route::get('/contact', 'GenericFrontendPagesController@contact')->name('frontend.contact');
Route::post('/contact', 'GenericFrontendPagesController@contactSubmit')->name('frontend.contact.submit');

Route::get('/music', 'GenericFrontendPagesController@music')->name('frontend.music');

#Sitemaps
Route::get('/sitemap', 'SitemapController@index')->name('frontend.sitemap');
Route::get('/sitemap.xml', 'SitemapController@index')->name('frontend.sitemap');
Route::get('/sitemap.xml/blogposts', 'SitemapController@blogPosts')->name('frontend.sitemap.blogPosts');
Route::get('/sitemap.xml/blogcategories', 'SitemapController@blogPostCategories')->name('frontend.sitemap.blogCategories');
Route::get('/sitemap.xml/blogtags', 'SitemapController@blogPostTags')->name('frontend.sitemap.blogTags');




