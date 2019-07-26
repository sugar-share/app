<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllowAddressNullFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addresses', static function (Blueprint $table) {
            $table->string('city')->nullable()->change();
            $table->string('administrative_area_level_1')->nullable()->comment('State or Province')->change();
            $table->string('administrative_area_level_2')->nullable()->comment('County')->change();
            $table->string('postalCode')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', static function (Blueprint $table) {
            $table->string('city')->nullable(false)->change();
            $table->string('administrative_area_level_1')->comment('State or Province')->nullable(false)->change();
            $table->string('administrative_area_level_2')->comment('County')->nullable(false)->change();
            $table->string('postalCode')->nullable(false)->change();
        });
    }
}
