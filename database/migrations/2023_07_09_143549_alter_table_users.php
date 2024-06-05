<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          
            $table->string('CPF',14);
            $table->string('phone');
            $table->boolean('status');
            $table->string('type')->default('master');


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
            "users", function (Blueprint $table) {
            $table->dropColumn("CPF");
            $table->dropColumn("phone");
            $table->dropColumn("status");
            $table->dropColumn('type');


        }
        );
    }
}
