<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContactoPropiedadTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('contactos_propiedads', function (Blueprint $table) {
            $table->id();
            $table->string('tipoRelacion');
            $table->string('observaciones')->nullable();
            
            $table->bigInteger('product_id')->unsigned()->nullable();//propiedad
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            
            $table->bigInteger('contacto_id')->unsigned()->nullable();//propiedad
            $table->foreign('contacto_id')->references('id')->on('contactos')->onDelete('cascade')->onUpdate('cascade');
            
            
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
        Schema::dropIfExists('contactos_propiedads');
    }
}
