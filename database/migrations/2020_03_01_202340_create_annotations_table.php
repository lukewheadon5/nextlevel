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
            $table->bigInteger('team_id')->unsigned();
            $table->bigInteger('video_id')->unsigned();
            $table->string('share')->nullable();
            $table->float('cWidth')->nullable();
            $table->float('cHeight')->nullable();
            $table->float('vidTime')->nullable();
            $table->string('type')->nullable();
            $table->string('version')->nullable()->nullable();
            $table->string('originX')->nullable();
            $table->string('originY')->nullable();
            $table->float('left')->nullable();
            $table->float('top')->nullable();
            $table->float('width')->nullable();
            $table->float('height')->nullable();
            $table->string('fill')->nullable();
            $table->string('stroke')->nullable();
            $table->float('strokeWidth')->nullable();
            $table->string('strokeDashArray')->nullable();
            $table->string('strokeLineCap')->nullable();
            $table->float('strokeDashOffset')->nullable();
            $table->string('strokeLineJoin')->nullable();
            $table->float('strokeMiterLimit')->nullable();
            $table->float('scaleX')->nullable();
            $table->float('scaleY')->nullable();
            $table->float('angle')->nullable();
            $table->string('flipX')->nullable();
            $table->string('flipY')->nullable();
            $table->float('opacity')->nullable();
            $table->string('shadow')->nullable();
            $table->string('visible')->nullable();
            $table->string('clipTo')->nullable();
            $table->string('backgroundColor')->nullable();
            $table->string('fillRule')->nullable();
            $table->string('paintFirst')->nullable();
            $table->string('globalCompositeOperation')->nullable();
            $table->string('transformMatrix')->nullable();
            $table->float('skewX')->nullable();
            $table->float('skewY')->nullable();
            $table->float('x1')->nullable();
            $table->float('x2')->nullable();
            $table->float('y1')->nullable();
            $table->float('y2')->nullable();
            $table->timestamps();


            
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
