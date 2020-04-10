<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Team;
use App\User;
use App\Annotation;
 

class AnnotationController extends Controller
{

    public function index(Video $video){
        return response()->json($video->annotations()->get());
    }

    public function share(Request $request){
        $id = $request->id;
        $annotation = Annotation::findOrFail($id);
        $annotation->share = "true";
        $annotation->save();
    }

    public function storeText(Request $request){
       $team = $request->team_id;
       $video = $request->video_id;
       $time = $request->vidTime;
       $type = $request->type;
       $cWidth = $request->cWidth;
       $cHeight = $request->cHeight;
       $left = $request->left;
       $top = $request->top;
       $width = $request->width;
       $height = $request->height;
       $scaleX = $request->scaleX;
       $scaleY = $request->scaleY;
       $angle = $request->angle;
       $x1 = $request->x1;
       $x2 = $request->x2;
       $y1 = $request->y1;
       $y2 = $request->y2; 
       $text = $request->text;

       $annotation = new Annotation;
       $annotation->user_id = auth()->id();
       $annotation->team_id = $team;
       $annotation->video_id = $video;
       $annotation->vidTime = $time;
       $annotation->cWidth = $cWidth;
       $annotation->cHeight = $cHeight;
       $annotation->type = $type;
       $annotation->left = $left;
       $annotation->top = $top;
       $annotation->width = $width;
       $annotation->height = $height;
       $annotation->scaleX = $scaleX;
       $annotation->scaleY = $scaleY;
       $annotation->angle = $angle;
       $annotation->x1 = $x1;
       $annotation->x2 = $x2;
       $annotation->y1 = $y1;
       $annotation->y2 = $y2;
       $annotation->text = $text;
       $annotation->save();
    }

    public function storeArrow(Request $request){
       $team = $request->team_id;
       $video = $request->video_id;
       $time = $request->vidTime;
       $type = $request->type;
       $cWidth = $request->cWidth;
       $cHeight = $request->cHeight;
       $left = $request->left;
       $top = $request->top;
       $width = $request->width;
       $height = $request->height;
       $scaleX = $request->scaleX;
       $scaleY = $request->scaleY;
       $angle = $request->angle;
       $x1 = $request->x1;
       $x2 = $request->x2;
       $y1 = $request->y1;
       $y2 = $request->y2;   
       $arrow = $request->isArrow;
        

       $annotation = new Annotation;
       $annotation->user_id = auth()->id();
       $annotation->team_id = $team;
       $annotation->video_id = $video;
       $annotation->vidTime = $time;
       $annotation->cWidth = $cWidth;
       $annotation->cHeight = $cHeight;
       $annotation->type = $type;
       $annotation->left = $left;
       $annotation->top = $top;
       $annotation->width = $width;
       $annotation->height = $height;
       $annotation->scaleX = $scaleX;
       $annotation->scaleY = $scaleY;
       $annotation->angle = $angle;
       $annotation->x1 = $x1;
       $annotation->x2 = $x2;
       $annotation->y1 = $y1;
       $annotation->y2 = $y2;
       $annotation->isArrow = $arrow;
       $annotation->save();
    }

    public function storeRect(Request $request){
       $team = $request->team_id;
       $video = $request->video_id;
       $time = $request->vidTime;
       $type = $request->type;
       $cWidth = $request->cWidth;
       $cHeight = $request->cHeight;
       $left = $request->left;
       $top = $request->top;
       $width = $request->width;
       $height = $request->height;
       $scaleX = $request->scaleX;
       $scaleY = $request->scaleY;
       $angle = $request->angle;
       $x1 = $request->x1;
       $x2 = $request->x2;
       $y1 = $request->y1;
       $y2 = $request->y2; 

       $annotation = new Annotation;
       $annotation->user_id = auth()->id();
       $annotation->team_id = $team;
       $annotation->video_id = $video;
       $annotation->vidTime = $time;
       $annotation->cWidth = $cWidth;
       $annotation->cHeight = $cHeight;
       $annotation->type = $type;
       $annotation->left = $left;
       $annotation->top = $top;
       $annotation->width = $width;
       $annotation->height = $height;
       $annotation->scaleX = $scaleX;
       $annotation->scaleY = $scaleY;
       $annotation->angle = $angle;
       $annotation->x1 = $x1;
       $annotation->x2 = $x2;
       $annotation->y1 = $y1;
       $annotation->y2 = $y2;
       $annotation->save();
    }

    public function storeCirc(Request $request){
       $team = $request->team_id;
       $video = $request->video_id;
       $time = $request->vidTime;
       $type = $request->type;
       $cWidth = $request->cWidth;
       $cHeight = $request->cHeight;
       $left = $request->left;
       $top = $request->top;
       $width = $request->width;
       $height = $request->height;
       $scaleX = $request->scaleX;
       $scaleY = $request->scaleY;
       $angle = $request->angle;
       $x1 = $request->x1;
       $x2 = $request->x2;
       $y1 = $request->y1;
       $y2 = $request->y2;  

       $annotation = new Annotation;
       $annotation->user_id = auth()->id();
       $annotation->team_id = $team;
       $annotation->video_id = $video;
       $annotation->vidTime = $time;
       $annotation->cWidth = $cWidth;
       $annotation->cHeight = $cHeight;
       $annotation->type = $type;
       $annotation->left = $left;
       $annotation->top = $top;
       $annotation->width = $width;
       $annotation->height = $height;
       $annotation->scaleX = $scaleX;
       $annotation->scaleY = $scaleY;
       $annotation->angle = $angle;
       $annotation->x1 = $x1;
       $annotation->x2 = $x2;
       $annotation->y1 = $y1;
       $annotation->y2 = $y2;
       $annotation->save();
    }

    public function store(Request $request){
       $team = $request->team_id;
       $video = $request->video_id;
       $time = $request->vidTime;
       $type = $request->type;
       $cWidth = $request->cWidth;
       $cHeight = $request->cHeight;
       $left = $request->left;
       $top = $request->top;
       $width = $request->width;
       $height = $request->height;
       $scaleX = $request->scaleX;
       $scaleY = $request->scaleY;
       $angle = $request->angle;
       $x1 = $request->x1;
       $x2 = $request->x2;
       $y1 = $request->y1;
       $y2 = $request->y2;   
        

       $annotation = new Annotation;
       $annotation->user_id = auth()->id();
       $annotation->team_id = $team;
       $annotation->video_id = $video;
       $annotation->vidTime = $time;
       $annotation->cWidth = $cWidth;
       $annotation->cHeight = $cHeight;
       $annotation->type = $type;
       $annotation->left = $left;
       $annotation->top = $top;
       $annotation->width = $width;
       $annotation->height = $height;
       $annotation->scaleX = $scaleX;
       $annotation->scaleY = $scaleY;
       $annotation->angle = $angle;
       $annotation->x1 = $x1;
       $annotation->x2 = $x2;
       $annotation->y1 = $y1;
       $annotation->y2 = $y2;
       $annotation->save();


    }

    public function update(Request $request){
        $id = $request->id;
        $cWidth = $request->cWidth;
        $cHeight = $request->cHeight;
        $left = $request->left;
        $top = $request->top;
        $scaleX = $request->scaleX;
        $scaleY = $request->scaleY;
        $angle = $request->angle;
        $annotation = Annotation::findOrFail($id);
        $annotation->cWidth = $cWidth;
        $annotation->cHeight = $cHeight;
        $annotation->left = $left;
        $annotation->top = $top;
        $annotation->scaleX = $scaleX;
        $annotation->scaleY = $scaleY;
        $annotation->angle = $angle;
        $annotation->save();


    }

    public function updateArrow(Request $request){
        $id = $request->id;
        $cWidth = $request->cWidth;
        $cHeight = $request->cHeight;
        $left = $request->left;
        $top = $request->top;
        $scaleX = $request->scaleX;
        $scaleY = $request->scaleY;
        $angle = $request->angle;
        $x1 = $request->x1;
        $x2 = $request->x2;
        $y1 = $request->y1;
        $y2 = $request->y2;
        $annotation = Annotation::findOrFail($id);
        $annotation->cWidth = $cWidth;
        $annotation->cHeight = $cHeight;
        $annotation->left = $left;
        $annotation->top = $top;
        $annotation->x1 = $x1;
        $annotation->x2 = $x2;
        $annotation->y1 = $y1;
        $annotation->y2 = $y2;
        $annotation->scaleX = $scaleX;
        $annotation->scaleY = $scaleY;
        $annotation->angle = $angle;
        $annotation->save();
    }


    public function updateText(Request $request){
        $id = $request->id;
        $cWidth = $request->cWidth;
        $cHeight = $request->cHeight;
        $left = $request->left;
        $top = $request->top;
        $scaleX = $request->scaleX;
        $scaleY = $request->scaleY;
        $angle = $request->angle;
        $text = $request->text;
        $annotation = Annotation::findOrFail($id);
        $annotation->cWidth = $cWidth;
        $annotation->cHeight = $cHeight;
        $annotation->left = $left;
        $annotation->top = $top;
        $annotation->scaleX = $scaleX;
        $annotation->scaleY = $scaleY;
        $annotation->angle = $angle;
        $annotation->text = $text; 
        $annotation->save();


    }

    public function destroy(Request $request){
        $id = $request->id;
        $annotation = Annotation::findOrFail($id);
        $annotation->delete();
    }
    
}
