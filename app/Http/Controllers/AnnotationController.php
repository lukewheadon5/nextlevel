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

    public function store(Request $request){
       $team = $request->team_id;
       $video = $request->video_id;
       $time = $request->vidTime;
       $type = $request->type;
       $cWidth = $request->cWidth;
       $cHeight = $request->cHeight;
       $version = $request->version;
       $originX = $request->originX;
       $originY = $request->originY;
       $left = $request->left;
       $top = $request->top;
       $width = $request->width;
       $height = $request->height;
       $fill = $request->fill;
       $stroke = $request->stroke;
       $strokeWidth = $request->strokeWidth;
       $strokeDashArray = $request->strokeDashArray;
       $strokeLineCap = $request->strokeLineCap;
       $strokeDashOffset = $request->strokeDashOffset;
       $strokeLineJoin = $request->strokeLineJoin;
       $strokeMiterLimit = $request->strokeMiterLimit;
       $scaleX = $request->scaleX;
       $scaleY = $request->scaleY;
       $angle = $request->angle;
       $flipX = $request->flipX;
       $flipY = $request->flipY;
       $opacity = $request->opacity;
       $shadow = $request->shadow;
       $visible = $request->visible;
       $clipTo = $request->clipTo;
       $backgroundColor = $request->backgroundColor;
       $fillRule = $request->fillRule;
       $paintFirst = $request->paintFirst;
       $globalCompositeOperation = $request->globalCompositeOperation;
       $trosformMatrix = $request->trosformMatrix;
       $skewX = $request->skewX;
       $skewY = $request->skewY;
       $x1 = $request->x1;
       $x2 = $request->x2;
       $y1 = $request->y1;
       $y2 = $request->y2;   
        

       $annotation = new Annotation;
       $annotation->team_id = $team;
       $annotation->video_id = $video;
       $annotation->vidTime = $time;
       $annotation->cWidth = $cWidth;
       $annotation->cHeight = $cHeight;
       $annotation->type = $type;
       $annotation->version = $version;
       $annotation->originX = $originX;
       $annotation->originY = $originY;
       $annotation->left = $left;
       $annotation->top = $top;
       $annotation->width = $width;
       $annotation->height = $height;
       $annotation->fill = $fill;
       $annotation->stroke = $stroke;
       $annotation->strokeWidth = $strokeWidth;
       $annotation->strokeDashArray = $strokeDashArray;
       $annotation->strokeLineCap = $strokeLineCap;
       $annotation->strokeDashOffset = $strokeDashOffset;
       $annotation->strokeLineJoin = $strokeLineJoin;
       $annotation->strokeMiterLimit = $strokeMiterLimit;
       $annotation->scaleX = $scaleX;
       $annotation->scaleY = $scaleY;
       $annotation->angle = $angle;
       $annotation->flipX = $flipX;
       $annotation->flipY = $flipY;
       $annotation->opacity = $opacity;
       $annotation->shadow = $shadow;
       $annotation->visible = $visible;
       $annotation->clipTo = $clipTo;
       $annotation->backgroundColor = $backgroundColor;
       $annotation->fillRule = $fillRule;
       $annotation->paintFirst = $paintFirst;
       $annotation->globalCompositeOperation = $globalCompositeOperation;
       $annotation->transformMatrix = $trosformMatrix;
       $annotation->skewX = $skewX;
       $annotation->skewY = $skewY;
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

    public function destroy(Request $request){
        $id = $request->id;
        $annotation = Annotation::findOrFail($id);
        $annotation->delete();
    }
    
}
