<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosCondominiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos_condominios', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('pathname');
            $table->uuid('condominio_id');

            $table->foreign('condominio_id')->references('id')->on('condominios')->onDelete('cascade');

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
        Schema::dropIfExists('photos_condominios');
    }
}
