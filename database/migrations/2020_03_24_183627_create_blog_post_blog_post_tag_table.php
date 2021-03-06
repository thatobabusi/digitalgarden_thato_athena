<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlogPostBlogPostTagTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if (!Schema::hasTable('blog_post_blog_post_tag')) {
            Schema::create('blog_post_blog_post_tag', function (Blueprint $table) {
                $table->unsignedBigInteger('id', true);
                $table->unsignedBigInteger('blog_post_id');
                $table->unsignedBigInteger('blog_post_tag_id');
                $table->timestamps();
            });
        }
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('blog_post_blog_post_tag');
	}

}
