<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInfoWebTitlesSection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info_web', function (Blueprint $table) {
            $table->string('title_first')->default('Vende tu casa')->after('icon_first');
            $table->string('title_second')->default('Alquila tu casa')->after('icon_second');
            $table->string('title_thrid')->default('Compra una casa')->after('icon_thrid');
            $table->string('title_fourth')->default('Marketing Gratuito')->after('icon_fourth');
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
            $table->dropColumn('title_first');
            $table->dropColumn('title_second');
            $table->dropColumn('title_thrid');
            $table->dropColumn('title_fourth');
        });
    }
}
