<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AmenitiesChecksPropiedadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('propiedad_amenities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('amenities_checks_id')->unsigned()->nullable();///agente de propiedad
            $table->bigInteger('product_id')->unsigned()->nullable();//propiedad
            $table->foreign('amenities_checks_id')->references('id')->on('amenities_checks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
              Schema::dropIfExists('propiedad_amenities');

    }
}
