<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->string('CEP');
            $table->string('street');
            $table->string('number');
            $table->string('district');
            $table->string('complement')->nullable();
            $table->string('state');  
            $table->float('prop_size');  
            $table->string('bedroom');  
            $table->string('bathrooms');  
            $table->string('garage')->default('0');  
            $table->longText('description')->nullable();  
            $table->string('category');  
            $table->decimal('prop_price',15,2)->nullable();  
            $table->decimal('prop_rent',15,2)->nullable();  
            $table->decimal('iptu_price',15,2)->nullable();  
            $table->boolean('condominium')->default(0);  
            $table->decimal('condominium_price',15,2)->nullable();  
            $table->boolean('available')->default(1);  
            $table->string('prop_code')->nullable();  
            $table->string('url_video')->nullable();  
            


            $table->uuid('user_code');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('type_prop_id'); // foreign
            $table->timestamps();

            
            $table->foreign('user_code')->references('id')->on('users');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('type_prop_id')->references('id')->on('type_properties');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
