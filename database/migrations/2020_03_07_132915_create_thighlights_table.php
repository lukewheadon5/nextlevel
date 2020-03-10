<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThighlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thighlights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('video_id')->unsigned();
            $table->bigInteger('team_id')->unsigned();
            $table->string('title');
            $table->float('startTime');
            $table->float('endTime');

            $table->timestamps();

            $table->foreign('team_id')->references('id')->on('teams')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('video_id')->references('id')->on('videos')
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
        Schema::dropIfExists('thighlights');
    }
}
