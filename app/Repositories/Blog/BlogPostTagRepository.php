<?php

namespace App\Repositories\Blog;

use App\Models\Blog\BlogPostTag;

class BlogPostTagRepository  implements BlogPostTagRepositoryInterface
{
    #Get
    /**
     * @return BlogPostTag[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllTags(){
        return BlogPostTag::all();
    }

    /**
     * @param int|null $limit
     *
     * @return BlogPostTag[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllTagsWhereHasBlogPosts(int $limit = null){

        if(is_null($limit)) {
            return BlogPostTag::whereHas('blogPosts')->get();
        }
        else {
            return BlogPostTag::whereHas('blogPosts')->get()->take($limit);
        }
    }

    #Check

    #List

    /**
     * @return \Illuminate\Support\Collection
     */
    public function listAllTagsByTitleAndId()
    {
        return BlogPostTag::orderBy('title')->get()->pluck('title', 'id');
    }
    #Store

    #Update
}
