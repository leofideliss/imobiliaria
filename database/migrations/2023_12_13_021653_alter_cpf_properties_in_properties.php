<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCpfPropertiesInProperties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->string('cpf_vendor',14)->nullable()->change();
            $table->string('number')->nullable()->change();
            $table->string('district')->nullable()->change();
            $table->string('state')->nullable()->change();
            $table->string('street')->nullable()->change();
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
            $table->dropColumn('cpf_vendor');
            $table->dropColumn('number');
            $table->dropColumn('district');
        });
    }
}
