<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTenantEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_tenant_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('tenant_id')->unsigned();
            $table->foreign('tenant_id')->references('id')->on('tbl_tenants')->cascadeOnUpdate()->cascadeOnDelete();
            $table->bigInteger('events_id')->unsigned();
            $table->foreign('events_id')->references('id')->on('tbl_events')->cascadeOnUpdate()->cascadeOnDelete();
            $table->boolean('is_proove')->default(false);
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
        Schema::dropIfExists('tbl_tenant_events');
    }
}
