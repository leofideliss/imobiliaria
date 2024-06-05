<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->uuid('id');
            $table->timestamps();
            $table->string('CPF',14);
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->boolean('status');
            $table->string('password');
            $table->timestamp('data_nasc')->nullable();
            $table->boolean('terms');
            $table->rememberToken();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
