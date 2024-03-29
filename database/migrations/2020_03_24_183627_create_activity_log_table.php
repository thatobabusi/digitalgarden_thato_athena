<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateActivityLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        if (!Schema::hasTable('activity_log')) {
            Schema::create('activity_log', function (Blueprint $table) {
                $table->unsignedBigInteger('id', true);
                $table->string('log_name', 191)->nullable()->index();
                $table->longText('description');
                $table->unsignedBigInteger('subject_id')->nullable();
                $table->string('subject_type', 191)->nullable();
                $table->unsignedBigInteger('causer_id')->nullable();
                $table->string('causer_type', 191)->nullable();
                $table->text('properties')->nullable();
                $table->timestamps();

                $table->index(['subject_id', 'subject_type'], 'subject');
                $table->index(['causer_id', 'causer_type'], 'causer');
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
		Schema::drop('activity_log');
	}

}
