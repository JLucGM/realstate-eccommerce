<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tipoTarea');
            $table->string('horaInicio');
            $table->string('status')->nullable()->default('Pendiente');

            $table->string('horaFin');
            $table->longText('description');
            $table->bigInteger('contacto_id')->unsigned()->nullable();
            $table->foreign('contacto_id')->references('id')->on('contactos')->onDelete('cascade')->onUpdate('cascade');
             $table->bigInteger('product_id')->unsigned()->nullable();//propiedad
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            

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
        Schema::dropIfExists('tasks');
    }
}
