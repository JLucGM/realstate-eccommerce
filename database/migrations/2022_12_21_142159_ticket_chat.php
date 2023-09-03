<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TicketChat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_chat', function (Blueprint $table) {
            $table->id();
            $table->string('mensaje');
            $table->unsignedBigInteger("sender_id");
            $table->unsignedBigInteger("receiver_id");
            $table->foreign("sender_id")->references('id')->on('users');
            $table->foreign("receiver_id")->references('id')->on('users');
            $table->unsignedBigInteger("mensajes_soporte_id");
            $table->foreign("mensajes_soporte_id")->references('id')->on('mensajes_soporte');
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
        Schema::dropIfExists('ticket_chat');
    }
}
