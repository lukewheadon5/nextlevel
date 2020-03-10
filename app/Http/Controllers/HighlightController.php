<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Highlight;
use App\Thighlight;
use App\User;
use App\Video;
use App\Team;

class HighlightController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            'title'=>'required|string|max:255',
        ]);
        $id = $request->id;
        $video = Video::findOrFail($id);
        $tid = $video->team_id;
        $team = Team::findOrFail($tid);
        $start= $request->start;
        $end= $request->end;
        $title= $request->title;
        $highlight = new Highlight;
        $highlight->video_id = $id;
        $highlight->user_id = Auth::id();
        $highlight->title = $title;
        $highlight->startTime = $start;
        $highlight->endTime = $end;
        $highlight->save();

        

    }

    public function storeT(Request $request){
        $validatedData = $request->validate([
            'title'=>'required|string|max:255',
        ]);
        $id = $request->id;
        $video = Video::findOrFail($id);
        $tid = $video->team_id;
        $team = Team::findOrFail($tid);
        $start= $request->start;
        $end= $request->end;
        $title= $request->title;
        $highlight = new Thighlight;
        $highlight->video_id = $id;
        $highlight->team_id = $tid;
        $highlight->title = $title;
        $highlight->startTime = $start;
        $highlight->endTime = $end;
        $highlight->save();

    }

    public function destroyH(Request $request){
        $id = $request->id;
        $hightlight = Highlight::findOrFail($id);
        $hightlight->delete();
    }

    public function destroyTH(Request $request){
        $id = $request->id;
        $thightlight = Thighlight::findOrFail($id);
        $thightlight->delete();
    
    }


    
}
