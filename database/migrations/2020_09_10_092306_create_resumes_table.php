<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('resumes')) {
            Schema::create('resumes', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id')->nullable()->default(null);
                $table->unsignedBigInteger('image_id')->nullable()->default(null);
                $table->string('firstname', 191);
                $table->string('surname', 191);
                $table->date('date_of_birth')->nullable()->default(null);
                $table->string('gender', 191)->nullable()->default(null);
                $table->string('marital_status', 191)->nullable()->default(null);
                $table->string('nationality', 191)->nullable()->default(null);
                $table->string('location', 191)->nullable()->default(null);
                $table->string('industry', 191)->nullable()->default(null);
                $table->string('job_title', 191)->nullable()->default(null);
                $table->string('highest_qualification', 191)->nullable()->default(null);
                $table->string('headline', 191)->nullable()->default(null);
                $table->longText('bio')->nullable()->default(null);
                $table->longText('bio_what_i_do')->nullable()->default(null);
                $table->longText('about')->nullable()->default(null);
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
        Schema::dropIfExists('resumes');
    }
}
