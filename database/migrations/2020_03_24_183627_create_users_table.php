<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->unsignedBigInteger('id', true);
                $table->string('name');
                $table->string('email')->unique();
                $table->dateTime('email_verified_at')->nullable();
                $table->string('password');
                $table->string('remember_token')->nullable();
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
		Schema::drop('users');
	}

}
