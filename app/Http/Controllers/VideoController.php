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


    public function player($id){
        $team = Team::findOrFail($id);
        return view('video.player',['team'=>$team]);
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
            'file' => 'required',
        ]);

        $team = Team::findOrFail($id);

        $playlist = new Playlist;
        $playlist->team_id = $team->id;
        $playlist->name = $request->name;
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
