<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProductsImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_products_image', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('products_id');
            $table->foreign('products_id')->references('id')->on('tbl_products')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('images_name', 128);
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
        Schema::dropIfExists('tbl_products_image');
    }
}
