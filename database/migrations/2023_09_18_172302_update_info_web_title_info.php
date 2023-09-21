<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInfoWebTitleInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info_web', function (Blueprint $table) {
            $table->string('title_info')->default('titulo por defecto')->after('id')->nullable();
            $table->string('icon_first')->default('bi bi-house')->after('select_us')->nullable();
            $table->string('icon_second')->default('fa-solid fa-building')->after('sell_home')->nullable();
            $table->string('icon_thrid')->default('fa-solid fa-person-shelter')->after('rent_home')->nullable();
            $table->string('icon_fourth')->default('fa-solid fa-magnifying-glass')->after('buy_home')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('info_web', function (Blueprint $table) {
            $table->dropColumn('title_info');
            $table->dropColumn('icon_first');
            $table->dropColumn('icon_second');
            $table->dropColumn('icon_thrid');
            $table->dropColumn('icon_fourth');
        });
    }
}
