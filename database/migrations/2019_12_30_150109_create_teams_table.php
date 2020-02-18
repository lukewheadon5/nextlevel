<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sport_id')->unsigned();
            $table->string('name');
            $table->string('country');
            $table->string('city');
            $table->string('email')->unique();
            $table->string('image')->nullable();
            
            $table->foreign('sport_id')->references('id')->
            on('sports')->onDelete('cascade')->
            onUpdate('cascade');
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
        Schema::dropIfExists('teams');
    }
}
