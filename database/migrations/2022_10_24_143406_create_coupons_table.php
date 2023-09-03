<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('codigo')->nullable();
            $table->integer('max_change');
            $table->integer('max_change_user')->default(1)->nullable();
            $table->datetime('start_day');
            $table->datetime('final_day');
            $table->integer('number_exchange')->default(0)->nullable();
            $table->boolean('active')->default(0);
            $table->double('amount', 8, 2)->default(0);
            $table->enum('type', ['porcentage','total_amount']);
   
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
        Schema::dropIfExists('coupons');
    }
}
