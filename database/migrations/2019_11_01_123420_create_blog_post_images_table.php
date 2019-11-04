<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogPostImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_post_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('blog_post_id');
            $table->string('title');
            $table->string('slug');
            $table->string('blog_post_image_path');
            $table->string('blog_post_image_caption');
            $table->string('credits_if_applicable')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_post_images');
    }
}
