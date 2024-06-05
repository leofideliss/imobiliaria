<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCondominioIdCorretagemInProperties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->decimal('corretagem', 15, 2)->nullable();
            $table->uuid('condominio_id')->nullable();

            $table->foreign('condominio_id')->references('id')->on('condominios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn("corretagem");
            $table->dropColumn("condominio_id");
        });
    }
}
