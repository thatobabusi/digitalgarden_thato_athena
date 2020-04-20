<?php

namespace App\Transformers;

use App\Models\Blog\BlogPost;
use League\Fractal\TransformerAbstract;

class BlogPostTransformer extends TransformerAbstract
{

    public function transform(BlogPost $blogPost)
    {
        return [
            'id' => (int) $blogPost->id,
            'user_id' => (int) $blogPost->user_id,
            'blog_post_category_id' => (int) $blogPost->blog_post_category_id,
            'blog_post_status_id' => (int) $blogPost->blog_post_status_id,
            'title' => (string) $blogPost->title,
            'slug' => (string) $blogPost->slug,
            'summary' => (string) $blogPost->summary,
            'body' => (string) $blogPost->body,
            'created_at' => (string) $blogPost->created_at,
            'updated_at' => (string) $blogPost->updated_at,
            'deleted_at' => (string) $blogPost->deleted_at,
            'route' => (string) $blogPost->route,

            #Because in some parts I want direct access where eloquent methods are not allowed (AngularJS side)
            'author' => (string) $blogPost->blogPostAuthor->name,
            'category' => (string) $blogPost->blogPostCategory->title,
            'status' => (string) $blogPost->blogPostStatus->title,
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }

    public function transformCollection($blogPosts)
    {

        return $blogPosts->map(function ($blogPost) {
            return $this->transform($blogPost);
        });

    }

}
