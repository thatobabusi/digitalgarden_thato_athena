<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumeWorkDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('resume_work_details')) {
            Schema::create('resume_work_details', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('resume_id');
                $table->string('company', 191)->nullable()->default(null);
                $table->string('title', 191)->nullable()->default(null);
                $table->string('dates', 191)->nullable()->default(null);
                $table->longText('details')->nullable()->default(null);
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
        Schema::dropIfExists('resume_work_details');
    }
}
