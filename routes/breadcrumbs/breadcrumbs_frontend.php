<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;


// Home > Blog
Breadcrumbs::for('frontend.home', function ($trail) {
    $trail->push('Home', route('frontend.home'));
    $trail->push('Blog', route('frontend.home'));
});

// Home > Blog > [Category]
Breadcrumbs::for('frontend.blog.category', function ($trail, $category) {
    $trail->push('Home', route('frontend.home'));
    $trail->push('Blog', route('frontend.home'));
    $trail->push($category, route('frontend.viewAllBlogPostsByCategory', $category));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::for('frontend.blog.slug', function ($trail, $category, $post) {
    $trail->push('Home', route('frontend.home'));
    $trail->push('Blog', route('frontend.home'));
    $trail->push($category, route('frontend.viewAllBlogPostsByCategory', $category));
    $trail->push($post->title, route('frontend.viewBlogSinglePostBySlug', $post->slug));
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
