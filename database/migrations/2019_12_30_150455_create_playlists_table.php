<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaylistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('team_id')->unsigned();
            $table->bigInteger('game_id')->unsigned();
            $table->bigInteger('season_id')->unsigned();
            $table->string('isTraining');
            $table->string('name');
            $table->timestamps();

            $table->foreign('team_id')->references('id')->
            on('teams')->onDelete('cascade')->
            onUpdate('cascade');

            $table->foreign('season_id')->references('id')->
            on('seasons')->onDelete('cascade')->
            onUpdate('cascade');

            $table->foreign('game_id')->references('id')->
            on('games')->onDelete('cascade')->
            onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('playlists');
    }
}
