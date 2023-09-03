<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MensajesSoporte extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes_soporte', function (Blueprint $table) {
            $table->id();
            $table->string('asuntoticket');
            $table->string('descripcionticket');
            $table->string('prioridadticket');
            $table->string('estadoticket');
            $table->string('archivoticket')->nullable();
            $table->bigInteger('product_id')->unsigned()->nullable();//propiedad
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            
            $table->bigInteger('contacto_id')->unsigned()->nullable();
            $table->bigInteger('asignado_id')->unsigned()->nullable();

            $table->foreign('asignado_id')->references('id')->on('users')->onUpdate('cascade');




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
        Schema::dropIfExists('mensajes_soporte');
    }
}
