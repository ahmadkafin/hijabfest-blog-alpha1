<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblVideosImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_videos_image', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_videos')->unsigned();
            $table->foreign('id_videos')->references('id')->on('tbl_videos');
            $table->string('images_cover', 40);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_videos_image');
    }
}
