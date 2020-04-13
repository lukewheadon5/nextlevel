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
            $table->string('passingTD');
            $table->string('passingYards');
            $table->string('RushingTD');
            $table->string('RushingYards');
            $table->string('Receptions');
            $table->string('Carries');
            $table->string('ReceivingYards');
            $table->string('allowedPassTD');
            $table->string('allowedPassYards');
            $table->string('allowedRunTD');
            $table->string('allowedRunYards');
            $table->string('tacklesFL');
            $table->string('tackles');
            $table->string('sacks');
            $table->string('interceptions');
            $table->string('pick6');
            $table->string('penalties');
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
