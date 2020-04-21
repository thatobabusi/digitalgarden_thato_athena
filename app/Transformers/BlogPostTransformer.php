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
            'tags' => $blogPost->blogPostTagsString(),
            'actions' => $blogPost->getCrudButtonsWithGateChecks(),
            /*
            'actions' => '<div class="btn-group">
                            <a class="btn btn-xs btn-primary" href="' . route("admin.blog.show", $blogPost->slug) . '" type="button">
                                ' . trans("global.view") . '
                            </a>
                            <a class="btn btn-xs btn-info" href="' . route("admin.blog.edit", $blogPost->slug) . '" type="button">
                                ' . trans("global.edit") . '
                            </a>
                            <a class="btn btn-xs btn-danger" href="#" type="button">
                                <form action="' . route("admin.blog.destroy", $blogPost->id) . '"
                                      method="POST" onsubmit="return confirm(\'' . trans("global.areYouSure") . '\');"
                                      style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '">
                                    <input type="submit" class="btn btn-xs btn-danger" value="' . trans("global.delete") . '">
                                </form>
                            </a>
                            <div class="btn-group">',
            */
        ];
    }

    public function transformCollection($blogPosts)
    {

        return $blogPosts->map(function ($blogPost) {
            return $this->transform($blogPost);
        });

    }

}
