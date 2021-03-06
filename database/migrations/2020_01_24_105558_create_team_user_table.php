<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_user', function (Blueprint $table) {
            $table->primary(['team_id','user_id']);
            $table->bigInteger('team_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
           // $table->bigIncrements('id');
            $table->timestamps();

            $table->foreign('team_id')->references('id')->
            on('teams')->onDelete('cascade')->
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
        Schema::dropIfExists('team_user');
    }
}
