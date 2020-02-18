<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Team;

class VideoController extends Controller
{
    public function player($id){
        $team = Team::findOrFail($id);
        return view('video.player',['team'=>$team]);
    }
    
}
