<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblVisitor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_visitor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->ipAddress('ip_visitor')->nullable();
            $table->string('negara', 30)->nullable();
            $table->string('kota', 30)->nullable();
            $table->string('zipcode', 20)->nullable();
            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('long', 10, 7)->nullable();
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
        Schema::dropIfExists('tbl_visitor');
    }
}
