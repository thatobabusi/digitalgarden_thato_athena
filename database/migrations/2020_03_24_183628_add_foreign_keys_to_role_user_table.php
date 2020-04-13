<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToRoleUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::disableForeignKeyConstraints();
		Schema::table('role_user', function(Blueprint $table)
		{
			//$table->foreign('role_id', 'role_id_fk_1001484')->references('id')->on('roles')->onUpdate('RESTRICT')->onDelete('CASCADE');
			//$table->foreign('user_id', 'user_id_fk_1001484')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
        Schema::enableForeignKeyConstraints();
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('role_user', function(Blueprint $table)
		{
			$table->dropForeign('role_id_fk_1001484');
			$table->dropForeign('user_id_fk_1001484');
		});
	}

}
