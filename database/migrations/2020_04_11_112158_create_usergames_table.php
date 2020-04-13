<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsergamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usergames', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('game_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('userseason_id')->unsigned();
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

            $table->foreign('game_id')->references('id')->on('games')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('userseason_id')->references('id')->on('userseasons')
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
        Schema::dropIfExists('usergames');
    }
}
