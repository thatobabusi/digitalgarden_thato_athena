<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// Home > Blog
Breadcrumbs::for('frontend.home', function ($trail) {
    $trail->push('Home', route('frontend.home'));
    $trail->push('Blog', route('frontend.home'));
});

// Home > Blog > [Archive]
Breadcrumbs::for('frontend.blog.archive', function ($trail, $archive) {
    $trail->push('Home', route('frontend.home'));
    $trail->push('Blog', route('frontend.home'));
    $trail->push('Archive - ' . $archive, route('frontend.viewAllBlogPostsByCategory', $archive));
});

// Home > Blog > [Category]
Breadcrumbs::for('frontend.blog.category', function ($trail, $category) {
    $trail->push('Home', route('frontend.home'));
    $trail->push('Blog', route('frontend.home'));
    $trail->push('Category - ' . $category, route('frontend.viewAllBlogPostsByCategory', $category));
});

// Home > Blog > [Tag]
Breadcrumbs::for('frontend.blog.tag', function ($trail, $tag) {
    $trail->push('Home', route('frontend.home'));
    $trail->push('Blog', route('frontend.home'));
    $trail->push('Tag - ' . $tag, route('frontend.viewAllBlogPostsByCategory', $tag));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::for('frontend.blog.slug', function ($trail, $category, $post) {
    $trail->push('Home', route('frontend.home'));
    $trail->push('Blog', route('frontend.home'));
    $trail->push('Category - ' . $category, route('frontend.viewAllBlogPostsByCategory', $category));
    $trail->push(Str::words($post->title, 3, '...'), route('frontend.viewBlogSinglePostBySlug', $post->slug));
});

//Home > Contact
Breadcrumbs::for('frontend.contact', function ($trail) {
    $trail->push('Home', route('frontend.home'));
    $trail->push('Contact', route('frontend.contact'));
});

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});



/*// Home > About
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
