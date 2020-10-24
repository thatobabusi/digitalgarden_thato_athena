<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResumeDevStackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('resume_dev_stack')) {
            Schema::create('resume_dev_stack', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('resume_id');
                $table->string('title', 191)->nullable()->default(null);
                $table->longText('icons')->nullable()->default(null);
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
        Schema::dropIfExists('resume_dev_stack');
    }
}
