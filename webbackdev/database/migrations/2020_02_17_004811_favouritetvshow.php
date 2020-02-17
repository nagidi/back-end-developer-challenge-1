<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Favouritetvshow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('FavouriteTVshow', function (Blueprint $table) {
            $table->increments('id');
            $table->longtext('season');
            $table->longtext('episode');
            $table->longtext('quote');
            $table->longtext('image');
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
        //
    }
}
