<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLongLatProperties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->string('lng')->nullable();
            $table->string('lat')->nullable();
            $table->string('formated_address')->nullable();
            $table->string('place_id')->nullable();
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(
            "properties", function (Blueprint $table) {
            $table->dropColumn("lat");
            $table->dropColumn("lng");
            $table->dropColumn("formated_address");
            $table->dropColumn("place_id");
        }
        );
    }
}
