<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyCaracteristicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_caracteristicas', function (Blueprint $table) {
            $table->uuid('property_id');
            $table->unsignedBigInteger('caracteristicas_id');


            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->foreign('caracteristicas_id')->references('id')->on('caracteristicas');


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
        Schema::dropIfExists('property_caracteristicas');
    }
}
