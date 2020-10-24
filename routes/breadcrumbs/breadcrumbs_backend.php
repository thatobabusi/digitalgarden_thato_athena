<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// Home
Breadcrumbs::for('admin.home', function ($trail) {
    $trail->push('Admin Dashboard', route('admin.home'));
});

Breadcrumbs::for('admin.activity.index', function ($trail) {
    $trail->push('Admin Dashboard', route('admin.home'));
    $trail->push('Activity Logs', route('admin.activity.index'));
});

// Home > Blog
Breadcrumbs::for('admin.blog.index', function ($trail) {
    $trail->push('Admin Dashboard', route('admin.home'));
    $trail->push('Blog Posts', route('admin.blog.index'));
});

// Home > Blog > Create
Breadcrumbs::for('admin.blog.create', function ($trail) {
    $trail->push('Admin Dashboard', route('admin.home'));
    $trail->push('Blog Posts', route('admin.blog.index'));
    $trail->push('Create', route('admin.blog.create'));
});

// Home > Blog > Edit
Breadcrumbs::for('admin.blog.edit', function ($trail, $post) {
    $trail->push('Admin Dashboard', route('admin.home'));
    $trail->push('Blog Posts', route('admin.blog.index'));
    $trail->push('Edit - ' . $post->title, route('admin.blog.edit', $post->slug));
});

// Home > Blog > Show
Breadcrumbs::for('admin.blog.show', function ($trail, $post) {
    $trail->push('Admin Dashboard', route('admin.home'));
    $trail->push('Blog Posts', route('admin.blog.index'));
    $trail->push('Show - ' . $post->title, route('admin.blog.show', $post->slug));
});

/******************************************************************************************************************** */
// Home > Blog Post Category
Breadcrumbs::for('admin.blog-category.index', function ($trail) {
    $trail->push('Admin Dashboard', route('admin.home'));
    $trail->push('Blog Post Categories', route('admin.blog-category.index'));
});

// Home > Blog Post Category > Create
Breadcrumbs::for('admin.blog-category.create', function ($trail) {
    $trail->push('Admin Dashboard', route('admin.home'));
    $trail->push('Blog Post Categories', route('admin.blog-category.index'));
    $trail->push('Create', route('admin.blog-category.create'));
});

// Home > Blog Post Category > Edit
Breadcrumbs::for('admin.blog-category.edit', function ($trail, $category) {
    $trail->push('Admin Dashboard', route('admin.home'));
    $trail->push('Blog Post Categories', route('admin.blog-category.index'));
    $trail->push('Edit - ' . $category->title, route('admin.blog-category.edit', $category->slug));
});

// Home > Blog Post Category > Show
Breadcrumbs::for('admin.blog-category.show', function ($trail, $category) {
    $trail->push('Admin Dashboard', route('admin.home'));
    $trail->push('Blog Post Categories', route('admin.blog-category.index'));
    $trail->push('Show - ' . $category->title, route('admin.blog-category.show', $category->slug));
});

/******************************************************************************************************************** */
// Home > Blog Post Tags
Breadcrumbs::for('admin.blog-tag.index', function ($trail) {
    $trail->push('Admin Dashboard', route('admin.home'));
    $trail->push('Blog Post Tags', route('admin.blog-tag.index'));
});

// Home > Blog Post Tags > Create
Breadcrumbs::for('admin.blog-tag.create', function ($trail) {
    $trail->push('Admin Dashboard', route('admin.home'));
    $trail->push('Blog Post Tags', route('admin.blog-tag.index'));
    $trail->push('Create', route('admin.blog-tag.create'));
});

// Home > Blog Post Tags > Edit
Breadcrumbs::for('admin.blog-tag.edit', function ($trail, $tag) {
    $trail->push('Admin Dashboard', route('admin.home'));
    $trail->push('Blog Post Tags', route('admin.blog-tag.index'));
    $trail->push('Edit - ' . $tag->title, route('admin.blog-tag.edit', $tag->slug));
});

// Home > Blog Post Tags > Show
Breadcrumbs::for('admin.blog-tag.show', function ($trail, $tag) {
    $trail->push('Admin Dashboard', route('admin.home'));
    $trail->push('Blog Post Tags', route('admin.blog-tag.index'));
    $trail->push('Show - ' . $tag->title, route('admin.blog-tag.show', $tag->slug));
});

/******************************************************************************************************************** */
// Home > Users
Breadcrumbs::for('admin.users.index', function ($trail) {
    $trail->push('Admin Dashboard', route('admin.home'));
    $trail->push('Users', route('admin.users.index'));
});

// Home > Users > Create
Breadcrumbs::for('admin.users.create', function ($trail) {
    $trail->push('Admin Dashboard', route('admin.home'));
    $trail->push('Users', route('admin.users.index'));
    $trail->push('Create', route('admin.users.create'));
});

// Home > Users > Edit
Breadcrumbs::for('admin.users.edit', function ($trail, $user) {
    $trail->push('Admin Dashboard', route('admin.home'));
    $trail->push('Users', route('admin.users.index'));
    $trail->push('Edit - ' . $user->name, route('admin.users.edit', $user->id));
});

// Home > Users > Show
Breadcrumbs::for('admin.users.show', function ($trail, $user) {
    $trail->push('Admin Dashboard', route('admin.home'));
    $trail->push('Users', route('admin.users.index'));
    $trail->push('Show - ' . $user->name, route('admin.users.show', $user->id));
});

/******************************************************************************************************************** */
// Home > Images
Breadcrumbs::for('admin.image.index', function ($trail) {
    $trail->push('Admin Dashboard', route('admin.home'));
    $trail->push('Images', route('admin.image.index'));
});

// Home > Images > Show
Breadcrumbs::for('admin.image.show', function ($trail, $image) {
    $trail->push('Admin Dashboard', route('admin.home'));
    $trail->push('Images', route('admin.image.index'));
    $trail->push('Show - ' . $image->title, route('admin.image.show', $image->slug));
});

/******************************************************************************************************************** */

// Home > Menu
Breadcrumbs::for('admin.system-menu-items.index', function ($trail) {
    $trail->push('Admin Dashboard', route('admin.home'));
    $trail->push('Menu Manager', route('admin.system-menu-items.index'));
});

// Home > Pages
Breadcrumbs::for('admin.system-pages.index', function ($trail) {
    $trail->push('Admin Dashboard', route('admin.home'));
    $trail->push('Pages Manager', route('admin.system-pages.index'));
});

// Home > Create
Breadcrumbs::for('admin.system-pages.create', function ($trail) {
    $trail->push('Admin Dashboard', route('admin.home'));
    $trail->push('Pages Manager', route('admin.system-pages.index'));
    $trail->push('Create Page');
});

// Home > Edit
Breadcrumbs::for('admin.system-pages.edit', function ($trail, $page_title) {
    $trail->push('Admin Dashboard', route('admin.home'));
    $trail->push('Pages Manager', route('admin.system-pages.index'));
    $trail->push('Edit Page - ' . $page_title);
});

// Home > Page > Section > Create
Breadcrumbs::for('admin.system-pages.section-create', function ($trail, $page_title) {
    $trail->push('Admin Dashboard', route('admin.home'));
    $trail->push('Pages Manager', route('admin.system-pages.index'));
    $trail->push($page_title, url()->previous());
    $trail->push('Create Section');
});

// Home > Page > Section > Edit
Breadcrumbs::for('admin.system-pages.section-edit', function ($trail, $page_title, $section_title) {
    $trail->push('Admin Dashboard', route('admin.home'));
    $trail->push('Pages Manager', route('admin.system-pages.index'));
    $trail->push($page_title, url()->previous());
    $trail->push('Edit Section - ' . $section_title);
});

// Home > Plugins
Breadcrumbs::for('admin.system-config-plugins.index', function ($trail) {
    $trail->push('Admin Dashboard', route('admin.home'));
    $trail->push('Plugins Manager', route('admin.system-config-plugins.index'));
});

/*// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > About
Breadcrumbs::for('about', function ($trail) {
    $trail->parent('home');
    $trail->push('About', route('about'));
});

// Home > Blog
Breadcrumbs::for('blog', function ($trail) {
    $trail->parent('home');
    $trail->push('Blog', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', $post->id));
});*/
