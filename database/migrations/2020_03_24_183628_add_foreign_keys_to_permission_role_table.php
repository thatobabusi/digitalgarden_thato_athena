<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPermissionRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::disableForeignKeyConstraints();

		Schema::table('permission_role', function(Blueprint $table)
		{
			//$table->foreign('permission_id', 'permission_id_fk_1001475')->references('id')->on('permissions')->onUpdate('RESTRICT')->onDelete('CASCADE');
			//$table->foreign('role_id', 'role_id_fk_1001475')->references('id')->on('roles')->onUpdate('RESTRICT')->onDelete('CASCADE');
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
		Schema::table('permission_role', function(Blueprint $table)
		{
			$table->dropForeign('permission_id_fk_1001475');
			$table->dropForeign('role_id_fk_1001475');
		});
	}

}
