<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSettingGeneralStatusCaracteristicas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('setting_generals', function (Blueprint $table) {
            $table->boolean('status_section_one')->default(1);
            $table->boolean('status_section_two')->default(1);
            $table->boolean('status_section_three')->default(1);

            $table->foreign('moneda')->references('id')->on('moneda');

        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('setting_generals', function (Blueprint $table) {
            $table->dropColumn('status_section_one');
            $table->dropColumn('status_section_two');
            $table->dropColumn('status_section_three');
        });
    }
}
