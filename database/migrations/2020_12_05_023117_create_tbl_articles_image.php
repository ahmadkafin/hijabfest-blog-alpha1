<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblArticlesImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_articles_image', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_articles')->unsigned();
            $table->foreign('id_articles')->references('id')->on('tbl_articles');
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
        Schema::dropIfExists('tbl_articles_image');
    }
}
