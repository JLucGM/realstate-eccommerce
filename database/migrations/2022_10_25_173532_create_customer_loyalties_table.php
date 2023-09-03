<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerLoyaltiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_loyalties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->double('monto');
            $table->integer ('points');
            $table->longtext('productos');
            $table->tinyinteger('active');
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
        Schema::dropIfExists('customer_loyalties');
    }
}
