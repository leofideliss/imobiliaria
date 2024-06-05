<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileXMLPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_x_m_l_properties', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("prop_code");
            $table->string("publication_type");

            $table->bigInteger("file_id")->unsigned();
            $table->foreign('file_id')->references('id')->on('file_x_m_l_s')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_x_m_l_properties');
    }
}
