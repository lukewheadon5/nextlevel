<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sport_user', function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->primary(['sport_id', 'user_id']);
            $table->bigInteger('sport_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('sport_id')->references('id')->
            on('sports')->onDelete('cascade')->
            onUpdate('cascade');

            $table->foreign('user_id')->references('id')->
            on('users')->onDelete('cascade')->
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
        Schema::dropIfExists('sport_user');
    }
}
