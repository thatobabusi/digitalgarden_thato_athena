<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPostImage extends Model
{
    protected $table = 'blog_post_images';

    ###RELATIONS########################################################################################################
    public function blogPost()
    {
        return $this->belongsTo(BlogPost::class);
    }
    ####################################################################################################################
}
