<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserscoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userscores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('quiz_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('complete');
            $table->string('score')->nullable();
            $table->timestamps();

            $table->foreign('quiz_id')->references('id')->on('quizzes')
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
        Schema::dropIfExists('userscores');
    }
}
