<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('whatsapp')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->float('indicate_com')->nullable();
            $table->float('photo_com')->nullable();
            $table->float('eval_com')->nullable();
            $table->float('realtor_com')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();

            // $table->uuid('user_code');
            // $table->foreign('user_code')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configurations');
    }
}
