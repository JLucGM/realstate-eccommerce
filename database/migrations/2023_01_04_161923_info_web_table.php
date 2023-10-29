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
            $table->text('select_us');
            $table->text('sell_home');
            $table->text('rent_home');
            $table->text('buy_home');
            $table->text('marketing_free');


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
