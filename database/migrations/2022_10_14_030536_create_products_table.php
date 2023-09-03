<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');// nombre del producto(propiedad)
            $table->integer('stock');// eliminar
            $table->double('price');
            $table->string('status');//status 
            
            $table->string('category');
            $table->string('subcategory'); ///no se usara(eliminar)
            $table->longText('description'); //description
            $table->longText('details');//ficha cliente
            $table->string('sku');//eliminar
            $table->string('barcode');//eliminar
            $table->longText('image');
            $table->string('attributes');//eliminar
            $table->string('meta_title');//eliminar
            $table->string('meta_description');//eliminar
            $table->integer('sales')->default(0)->nullable();//eliminar
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
        Schema::dropIfExists('products');
    }
}
