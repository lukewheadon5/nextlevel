<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('position_user', function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->primary(['user_id', 'position_id']);
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('position_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->
            on('users')->onDelete('cascade')->
            onUpdate('cascade');

            $table->foreign('position_id')->references('id')->
            on('positions')->onDelete('cascade')->
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
        Schema::dropIfExists('position_user');
    }
}
