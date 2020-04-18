<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Team;
use App\Playlist; 

class VideoController extends Controller
{
    public function index(Playlist $playlist){
        return response()->json($playlist->videos()->get());
    }

    public function highlight($id){
        $video = Video::findOrFail($id);
        $team = $video->team;
        $exists = $team->admins()->where('user_id', auth()->id())->exists();
        $exists2 = $team->users()->where('user_id', auth()->id())->exists();
        

        if($exists == true){
            return view('video.highlightAd' , ['video'=>$video]);
        }
        else{
            return view('video.highlight' , ['video'=>$video]);
        } 

    }


    public function player($id){
        $team = Team::findOrFail($id);
        $exists = $team->admins()->where('user_id', auth()->id())->exists();
        $exists2 = $team->coaches()->where('user_id', auth()->id())->exists();

        if($exists == true || $exists2 == true){
            if($team->sport_id == 2){
                return view('footyVid.player', ['team'=>$team]);
            }else{
                return view('video.player', ['team'=>$team]);
            }
        }
        else{
            return view('video.playerUser', ['team'=>$team]);
        } 
    }

    public function playlist($teamid , $playid){
        $team = Team::findOrFail($teamid);
        $playlist = Playlist::findOrFail($playid);
        return view ('video.playlist', ['team'=>$team],['playlist'=>$playlist]);
    }


    public function create($id){
        $team = Team::findOrFail($id);
        return view('video.create',['team'=>$team]);
    }

    public function store(Request $request, $id){
        $validatedData = $request->validate([
            'name'=>'required|max:250',
            'season'=>'required',
            'game'=>'required',
            'training'=>'required',
            'file.*' => 'required|file|mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv',
            
        ]);

        $team = Team::findOrFail($id);

        $playlist = new Playlist;
        $playlist->team_id = $team->id;
        $playlist->name = $request->name;
        $playlist->season_id = $request->season;
        $playlist->game_id = $request->game;
        $playlist->isTraining = $request->training;
        $playlist->save();


        if($request->hasFile('file')){
            foreach ($request->file as $file){

                $filename = $file->getClientOriginalName();
                
                $file->move(public_path("/videos"),$filename);
                $filem = new Video;
                $filem->team_id = $team->id;
                $filem->playlist_id = $playlist->id;
                $filem->video = $filename;
                $filem->save();

            }
            
        }
        return redirect()->route('player',$team->id)->with('success','Video Uploaded successfully.');

    }

    public function edit(){

    }

    public function update(){

    }

    public function destroy(){

    }
    
}
