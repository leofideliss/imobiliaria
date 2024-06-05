<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableFileXmls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('file_x_m_l_s', function (Blueprint $table) {
            $table->boolean('generated')->default(0);
            $table->string('file_name')->nullable();
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
            $table->dropColumn("generated");
            $table->dropColumn("file_name");
        });
    }
}
