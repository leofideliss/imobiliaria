<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableConfigurations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('configurations', function (Blueprint $table) {
            $table->string('link_vender')->nullable();
            $table->string('link_indicar')->nullable();
            $table->string('link_corretores')->nullable();
            $table->string('link_fotografos')->nullable();
            $table->string('link_avaliadores')->nullable();
            $table->string('img_name')->nullable();
            $table->string('image_path')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('configurations', function (Blueprint $table) {
            $table->dropColumn("link_vender");
            $table->dropColumn("link_indicar");
            $table->dropColumn("link_corretores");
            $table->dropColumn("link_fotografos");
            $table->dropColumn("link_avaliadores");
            $table->dropColumn("img_name");
            $table->dropColumn("image_path");
        });
    }
}
