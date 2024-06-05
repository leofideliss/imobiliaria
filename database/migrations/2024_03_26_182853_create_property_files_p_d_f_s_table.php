<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyFilesPDFSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_files_p_d_f_s', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('filename');
            $table->string('name');
            $table->string('public_path');
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
        Schema::dropIfExists('property_files_p_d_f_s');
    }
}
