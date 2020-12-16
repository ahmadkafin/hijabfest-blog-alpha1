<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToTblTenantsEventsBooths extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_tenants_events_booths', function (Blueprint $table) {
            $table->bigInteger('booth_id')->unsigned();
            $table->foreign('booth_id')->references('id')->on('tbl_booth_event')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_tenants_events_booths', function (Blueprint $table) {
            //
        });
    }
}
