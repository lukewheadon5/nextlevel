<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserseasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userseasons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('season_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('usercareer_id')->unsigned();
            $table->string('passingTD');
            $table->string('passingYards');
            $table->string('RushingTD');
            $table->string('RushingYards');
            $table->string('Receptions');
            $table->string('Carries');
            $table->string('ReceivingYards');
            $table->string('tacklesFL');
            $table->string('tackles');
            $table->string('sacks');
            $table->string('interceptions');
            $table->string('pick6');
            $table->string('penalties');
            $table->timestamps();

            $table->foreign('season_id')->references('id')->on('seasons')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('usercareer_id')->references('id')->on('usercareers')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('userseasons');
    }
}
