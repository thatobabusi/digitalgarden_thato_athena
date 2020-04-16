<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlogPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blog_posts', function(Blueprint $table)
		{
			$table->unsignedBigInteger('id', true);
			$table->unsignedBigInteger('user_id')->nullable()->default(1);
			$table->unsignedBigInteger('blog_post_category_id');
			$table->unsignedBigInteger('blog_post_status_id')->default(1);
			$table->string('title', 191);
			$table->string('slug', 191);
			$table->longText('summary');
			$table->longText('body');
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
		Schema::drop('blog_posts');
	}

}
