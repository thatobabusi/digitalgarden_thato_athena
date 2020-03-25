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
			$table->bigInteger('id', true)->unsigned();
			$table->integer('page_category_id');
			$table->string('title', 191);
			$table->string('slug', 191);
			$table->text('description', 65535);
			$table->text('body', 65535);
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
