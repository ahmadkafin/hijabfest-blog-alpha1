<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPivotsVideos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pivots_videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_videos')->unsigned();
            $table->foreign('id_videos')->references('id')->on('tbl_videos');
            $table->bigInteger('id_categories')->unsigned();
            $table->foreign('id_categories')->references('id')->on('tbl_categories');
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
        Schema::dropIfExists('tbl_pivots_videos');
    }
}
