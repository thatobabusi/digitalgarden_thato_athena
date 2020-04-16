<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_post_image', function (Blueprint $table)
        {
            $table->unsignedBigInteger('blog_post_id')->index('blog_post_id_fk_1001484');
            $table->unsignedBigInteger('image_id')->index('image_id_fk_1001484');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_post_image');
    }
}
