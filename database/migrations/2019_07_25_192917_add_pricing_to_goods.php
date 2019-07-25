<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPricingToGoods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('goods', static function (Blueprint $table) {
            $table->float('price')->nullable();
            $table->boolean('will_trade')->default(false);
            $table->boolean('free')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('goods', static function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('will_trade');
            $table->dropColumn('free');
        });
    }
}
