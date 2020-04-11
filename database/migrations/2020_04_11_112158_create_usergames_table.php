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
            $table->bigInteger('us_id')->unsigned();
            $table->string('tackles');
            $table->timestamps();

            $table->foreign('game_id')->references('id')->on('games')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('us_id')->references('id')->on('userseasons')
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
