<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NotificationWebPushTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webPushNotification', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('body');
            $table->string('link', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->string('icon', 255)->nullable();
            $table->dateTime('date')->nullable();
            $table->boolean('status')->default(0)->nullable();
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
        Schema::dropIfExists('webPushNotification');
    }
}
