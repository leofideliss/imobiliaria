<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGamificacaoInProperties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->float("notaComodidade")->nullable();
            $table->float("notaFotos")->nullable();
            $table->float("notaDescricao")->nullable();
            $table->float("notaVideo")->nullable();
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
            $table->dropColumn('notaComodidade');
            $table->dropColumn('notaFotos');
            $table->dropColumn('notaDescricao');
            $table->dropColumn('notaVideo');
        });
    }
}
