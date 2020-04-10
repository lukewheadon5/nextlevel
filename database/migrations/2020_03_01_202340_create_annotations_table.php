<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annotations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('team_id')->unsigned();
            $table->bigInteger('video_id')->unsigned();
            $table->string('share')->nullable();
            $table->float('cWidth')->nullable();
            $table->float('cHeight')->nullable();
            $table->float('vidTime')->nullable();
            $table->string('type')->nullable();
            $table->float('left')->nullable();
            $table->float('top')->nullable();
            $table->float('width')->nullable();
            $table->float('height')->nullable();
            $table->float('scaleX')->nullable();
            $table->float('scaleY')->nullable();
            $table->float('angle')->nullable();
            $table->float('x1')->nullable();
            $table->float('x2')->nullable();
            $table->float('y1')->nullable();
            $table->float('y2')->nullable();
            $table->float('translateX')->nullable();
            $table->float('translateY')->nullable();
            $table->string('text')->nullable();
            $table->string('isArrow')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->
            on('users')->onDelete('cascade')->
            onUpdate('cascade');
            
            $table->foreign('team_id')->references('id')->
            on('teams')->onDelete('cascade')->
            onUpdate('cascade');

            
            $table->foreign('video_id')->references('id')->
            on('videos')->onDelete('cascade')->
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
        Schema::dropIfExists('annotations');
    }
}
