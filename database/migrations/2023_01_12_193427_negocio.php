<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Negocio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('negocios', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('status')->nullable();
            $table->string('presupuestoTotal')->nullable();
            $table->integer('cantidadDormitorios')->nullable()->default(0);
            $table->integer('cantidadBaños')->nullable()->default(0);

            $table->bigInteger('contacto_id')->unsigned()->nullable();
            $table->bigInteger('propiedad_id')->unsigned()->nullable();
            $table->bigInteger('agente_id')->unsigned()->nullable();

            $table->foreign('contacto_id')->references('id')->on('contactos')->onDelete('cascade')->onUpdate('cascade');
        
            $table->foreign('propiedad_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('agente_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');







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
        Schema::dropIfExists('negocios');
    }
}
