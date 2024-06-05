<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodominioCaracteristicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codominio_caracteristicas', function (Blueprint $table) {
            $table->uuid('condominio_id');
            $table->unsignedBigInteger('caracteristicas_condominio_id');


            $table->foreign('condominio_id')->references('id')->on('condominios')->onDelete('cascade');
            $table->foreign('caracteristicas_condominio_id')->references('id')->on('caracteristicas_condominios');

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
        Schema::dropIfExists('codominio_caracteristicas');
    }
}
