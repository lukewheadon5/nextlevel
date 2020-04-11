<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('team_id')->unsigned();
            $table->bigInteger('season_id')->unsigned();
            $table->bigInteger('sport_id')->unsigned();
            $table->string('opponent');
            $table->string('tackles');
            $table->timestamps();

            $table->foreign('team_id')->references('id')->on('teams')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('sport_id')->references('id')->on('sports')
                ->onDelete('cascade')->onUpdate('cascade');
            
            $table->foreign('season_id')->references('id')->on('seasons')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
