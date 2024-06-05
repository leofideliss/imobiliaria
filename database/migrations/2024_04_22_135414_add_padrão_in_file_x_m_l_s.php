<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPadrãoInFileXMLS extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('file_x_m_l_s', function (Blueprint $table) {
            $table->string("padrao")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('file_x_m_l_s', function (Blueprint $table) {
           $table->dropColumn('padrao');
        });
    }
}
