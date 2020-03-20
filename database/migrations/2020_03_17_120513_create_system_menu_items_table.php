<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_menu_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('url_link');
            $table->integer('page_id');
            $table->string('type'); //frontend/backend
            $table->string('route');
            $table->string('icon');
            $table->string('permissions');
            $table->string('parent_id');
            $table->string('has_children'); //true or false
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_items');
    }
}
