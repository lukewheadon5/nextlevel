<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Play;

class PlayController extends Controller
{
    public function create($id){
        $team = Team::findOrFail($id);

        return view('playbook.create' , ['team'=>$team]);
    }


    public function store(Request $request){
        $validatedData = $request->validate([
            'name'=>'required|string|max:255',
        ]);
        $play = new Play;
        $play->team_id = $request->team_id;
        $play->name = $request->name;
        $play->canvas = $request->canvas;
        $play->save();

    }

    public function show($id){
        $play = Play::findOrFail($id);
        $team = $play->team;
        $exists = $team->admins()->where('user_id', auth()->id())->exists();
        $exists3 = $team->coaches()->where('user_id', auth()->id())->exists();

        if($exists == true || $exists3 == true){
            return view('playbook.showA' , ['play'=>$play] , ['team'=>$team]);
        }else{
            return view('playbook.show' , ['play'=>$play] , ['team'=>$team]);
        }
    }

    public function playView($id){
        $team = Team::findOrFail($id);
        $exists = $team->admins()->where('user_id', auth()->id())->exists();
        $exists3 = $team->coaches()->where('user_id', auth()->id())->exists();

        if($exists == true || $exists3 == true){
            return view('playbook.playbookA' , ['team'=>$team]);
        }else{  
            return view('playbook.playbook' , ['team'=>$team]);
        }
    }

    

    public function destroy($id){
        $play = Play::findOrFail($id);
        $team = $play->team;
        $play->delete();

        return view('playbook.playbook' , ['team'=>$team]);
    }
}
