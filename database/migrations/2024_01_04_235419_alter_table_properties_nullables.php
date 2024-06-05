<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePropertiesNullables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->string('email_vendor')->nullable()->change();
            $table->string('bathrooms')->nullable()->change();
            $table->string('bedroom')->nullable()->change();
            $table->string('suites')->nullable()->change();
            $table->string('garage')->nullable()->change();
            $table->longText('description')->change();
            $table->string('price')->change();
            $table->string('iptu_price')->change();
            $table->string('corretagem')->change();

            
            $table->dropForeign('properties_type_prop_id_foreign');
            $table->foreign('type_prop_id')->references('id')->on('type_properties')->onDelete('cascade'); 
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
            $table->dropColumn('email_vendor');
            $table->dropColumn('bathrooms');
            $table->dropColumn('bedroom');
            $table->dropColumn('suites');
            $table->dropColumn('garage');
            $table->dropColumn('description');
            $table->dropColumn('price');
            $table->dropColumn('iptu_price');
            $table->dropColumn('corretagem');
        });
    }
}
