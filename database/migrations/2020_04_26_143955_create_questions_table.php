<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('quiz_id')->unsigned();
            $table->string('question');
            $table->string('type');
            $table->string('mc1')->nullable();
            $table->string('mc2')->nullable();
            $table->string('mc3')->nullable();
            $table->string('mc4')->nullable();
            $table->string('answer');
            $table->timestamps();

            $table->foreign('quiz_id')->references('id')->on('quizzes')
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
        Schema::dropIfExists('questions');
    }
}
