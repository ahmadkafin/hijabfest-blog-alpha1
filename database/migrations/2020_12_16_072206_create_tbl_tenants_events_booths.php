<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTenantsEventsBooths extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_tenants_events_booths', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('tenants_id')->unsigned();
            $table->foreign('tenants_id')->references('id')->on('tbl_tenants')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('tbl_tenants_events_booths');
    }
}
