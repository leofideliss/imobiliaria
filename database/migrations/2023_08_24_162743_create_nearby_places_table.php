<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNearbyPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nearby_places', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('dist');
            $table->string('name')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('vicinity')->nullable();
            $table->string('type')->nullable();
            $table->string('place_id')->nullable();
            $table->uuid('property_id');

            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');

       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nearby_places');
    }
}
