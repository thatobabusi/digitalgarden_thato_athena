<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemPageSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('system_page_sections')) {
            Schema::create('system_page_sections', function (Blueprint $table) {
                $table->unsignedBigInteger('id', true);
                $table->unsignedBigInteger('system_page_id');
                $table->string('title', 191);
                $table->string('header', 191)->nullable();
                $table->string('subheader', 191)->nullable();
                $table->string('order', 11);
                $table->longText('body');
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
        Schema::dropIfExists('system_page_sections');
    }
}
