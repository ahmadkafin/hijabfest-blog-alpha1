<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sku_products', 100);
            $table->string('products_name', 100);
            $table->string('products_weight', 100);
            $table->float('products_dimension_width');
            $table->float('products_dimension_height');
            $table->float('products_dimension_wide');
            $table->integer('products_qty');
            $table->float('products_price');
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
        Schema::dropIfExists('tbl_products');
    }
}
