<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamSportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_sport', function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->primary(['sport_id', 'team_id']);
            $table->bigInteger('sport_id')->unsigned();
            $table->bigInteger('team_id')->unsigned();
            $table->timestamps();

            $table->foreign('sport_id')->references('id')->
            on('sports')->onDelete('cascade')->
            onUpdate('cascade');

            $table->foreign('team_id')->references('id')->
            on('teams')->onDelete('cascade')->
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
        Schema::dropIfExists('team_sport');
    }
}
