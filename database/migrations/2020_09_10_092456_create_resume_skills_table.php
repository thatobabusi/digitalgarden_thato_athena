<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumeSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('resume_skills')) {
            Schema::create('resume_skills', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('resume_id');
                $table->unsignedBigInteger('resume_skill_type_id');
                $table->string('skill', 191)->nullable()->default(null);
                $table->dateTime('since')->nullable()->default(null);
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
        Schema::dropIfExists('resume_skills');
    }
}
