<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSystemPagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('system_pages', function(Blueprint $table)
		{
			$table->unsignedBigInteger('id', true);
			$table->unsignedBigInteger('page_category_id');
			$table->string('title', 191);
			$table->string('slug', 191);
			$table->longText('description')->nullable();
			$table->longText('body')->nullable();
			$table->integer('status')->default(1); //1 draft,2 active ,3 archive
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
		Schema::drop('system_pages');
	}

}
