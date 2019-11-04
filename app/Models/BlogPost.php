<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $table = 'blog_posts';

    ###RELATIONS########################################################################################################
    public function blogPostAuthor()
    {
        return $this->belongsTo(User::class);
    }

    public function blogPostImage()
    {
        return $this->hasOne(BlogPostImage::class, 'blog_post_id');
    }

    public function blogPostImages()
    {
        return $this->hasMany(BlogPostImage::class);
    }
    ####################################################################################################################
}
