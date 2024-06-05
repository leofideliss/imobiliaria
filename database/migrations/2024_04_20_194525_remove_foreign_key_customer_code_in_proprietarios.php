<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveForeignKeyCustomerCodeInProprietarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proprietarios', function (Blueprint $table) {
            $table->dropForeign("proprietarios_user_code_foreign");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proprietarios', function (Blueprint $table) {
            //
        });
    }
}
