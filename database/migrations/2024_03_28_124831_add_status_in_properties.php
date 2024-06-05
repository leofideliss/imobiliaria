<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusInProperties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->string('status_imovel');
            $table->datetime('inicioObra')->nullable();
            $table->datetime('fimObra')->nullable();
            $table->string('tempoConstrução')->nullable();

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
         $table->dropColumn("status_imovel");
         $table->dropColumn("inicioObra");
         $table->dropColumn("fimObra");
         $table->dropColumn("tempoConstrução");
        });
    }
}
