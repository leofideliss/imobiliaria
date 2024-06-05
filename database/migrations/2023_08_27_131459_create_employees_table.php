<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid('id');
            $table->timestamps();
            $table->string('CPF',14);
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->boolean('status');
            $table->string('password');
            $table->unsignedBigInteger('type');

            $table->foreign('type')->references('id')->on('cargos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
