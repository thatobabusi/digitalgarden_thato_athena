<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumeImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('resume_image')) {
            Schema::create('resume_image', function (Blueprint $table) {
                $table->unsignedBigInteger('resume_id')->index('resume_id_fk_1001484');
                $table->unsignedBigInteger('image_id')->index('image_id_fk_1001484');

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
        Schema::dropIfExists('resume_image');
    }
}
