<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlogPostCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if (!Schema::hasTable('blog_post_categories')) {
            Schema::create('blog_post_categories', function (Blueprint $table) {
                $table->unsignedBigInteger('id', true);
                $table->string('title', 191);
                $table->string('slug', 191);
                $table->timestamps();
                $table->softDeletes();
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
		Schema::drop('blog_post_categories');
	}

}
