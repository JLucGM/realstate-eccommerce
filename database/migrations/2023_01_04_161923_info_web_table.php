<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InfoWebTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_web', function (Blueprint $table) {
            $table->id();
            $table->string('select_us');
            $table->string('sell_home');
            $table->string('rent_home');
            $table->string('buy_home');
            $table->string('marketing_free');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_web');
    }
}
