<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCondominiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condominios', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('CEP');
            $table->string('street');
            $table->string('number');
            $table->string('district');
            $table->string('complement')->nullable();
            $table->string('state');  
            $table->string('url_video')->nullable();;  
            $table->string('user_code');  
            $table->string('condominio_code')->nullable();;  


            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities');

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
        Schema::dropIfExists('condominios');
    }
}
