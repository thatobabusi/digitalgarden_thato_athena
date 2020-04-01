<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSystemConfigPluginsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('system_config_plugins', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('title', 191);
			$table->string('backend_frontend', 191)->nullable()->comment('Backend or Frontend');
			$table->integer('parent_id')->nullable();
			$table->string('realted_id', 191)->nullable()->default('(NULL)')->comment('List Ids of modules that are related to this so when it gets archived they also get archived');
			$table->string('core_or_optional', 191)->nullable()->default('Optional');
			$table->boolean('enabled')->default(0);
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
		Schema::drop('system_config_plugins');
	}

}
