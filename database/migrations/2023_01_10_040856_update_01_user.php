<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update01User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            
            //estos link mas que todo son para los agentes del sistemas(vendedor, arrendador, agente) ha estos hay que registrarlos y pedir su link de redes sociales para mostrarlos en las tarjetas del home
            $table->string('link_facebook')->nullable();
            $table->string('link_instagram')->nullable();
            $table->string('link_twitter')->nullable();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('link_facebook');
            $table->dropColumn('link_instagram');
            $table->dropColumn('link_twitter');

        });
    }
}
