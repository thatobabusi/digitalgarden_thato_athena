<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlogPostImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blog_post_images', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->integer('blog_post_id');
			$table->string('title', 191);
			$table->string('slug', 191);
			$table->string('blog_post_image_path', 191);
			$table->string('blog_post_image_caption', 191);
			$table->string('credits_if_applicable', 191)->nullable();
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
		Schema::drop('blog_post_images');
	}

}
