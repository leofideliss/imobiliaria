<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableProperties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->string('cpf_vendor',14);
            $table->string('phone_vendor');
            $table->string('name_vendor');
            $table->string('email_vendor');
            $table->string('suites');
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
            $table->dropColumn("cpf_vendor");
            $table->dropColumn("phone_vendor");
            $table->dropColumn("name_vendor");
            $table->dropColumn("email_vendor");
            $table->dropColumn("suites");
        }
        );
    }
}
