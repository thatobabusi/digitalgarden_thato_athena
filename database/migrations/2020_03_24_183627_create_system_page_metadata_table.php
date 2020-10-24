<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemPageMetadataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('system_page_metadata')) {
            Schema::create('system_page_metadata', function (Blueprint $table) {
                $table->unsignedBigInteger('id', true);
                $table->unsignedBigInteger('system_page_id');
                $table->string('title', 191);
                $table->string('author', 191);
                $table->string('robots', 191);
                $table->longText('keywords');
                $table->longText('description');
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
        Schema::dropIfExists('system_page_metadata');
    }
}
