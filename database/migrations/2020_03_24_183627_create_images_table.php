<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigInteger('id', true)->unsigned();
            $table->integer('image_type_id')->nullable()->default(1);
            $table->string('title');
            $table->string('slug');
            $table->string('src');
            $table->string('mime_type')->nullable();
            $table->text('description')->nullable();
            $table->longText('base64')->nullable();
            $table->string('credits_if_applicable', 191)->nullable();
            $table->string('alt')->nullable();
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
        Schema::dropIfExists('images');
    }
}
