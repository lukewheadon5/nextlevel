<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roster;
use App\Team;
use App\Game;
use App\Lineup;
use App\Position;

class RosterController extends Controller
{
    

    public function rosterCenter($id){
        $team = Team::findOrFail($id);
        $exists = $team->admins()->where('user_id', auth()->id())->exists();
        $exists2 = $team->coaches()->where('user_id', auth()->id())->exists();
        if($exists == true || $exists2 == true){
            if($team->sport_id == 2){
                return view('roster.rosterA', ['team'=>$team]);
            }else{
                return view('roster.rosterAFA', ['team'=>$team]);
            }
        }else{
            if($team->sport_id == 2){
                return view('roster.roster', ['team'=>$team]);
            }else{
                return view('roster.rosterA', ['team'=>$team]);
            }
        }
    }

    public function rosterCreate($id){
        $team = Team::findOrFail($id);
        return view('roster.createF', ['team'=>$team]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name'=>'required|string|max:255',
        ]);
        $roster = new Roster;
        $roster->team_id = $request->team_id;
        $roster->game_id = $request->game_id;
        $roster->name = $request->name;
        $roster->canvas = $request->canvas;
        $roster->save();
    }

    public function show($id){
        $roster = Roster::findOrFail($id);
        $team = $roster->team;
        $exists = $team->admins()->where('user_id', auth()->id())->exists();
        $exists2 = $team->coaches()->where('user_id', auth()->id())->exists();
        if($exists == true || $exists2 == true){
            return view('roster.viewA', ['team'=>$team] , ['roster'=>$roster]);
        }else{
            return view('roster.view', ['team'=>$team] , ['roster'=>$roster]);
        }
    }

    public function destroy($id){
        $roster = Roster::findOrFail($id);
        $team = $roster->team;
        $roster->delete();
        if($team->sport_id == 2){
            return view('roster.rosterA', ['team'=>$team]);
        }else{
            return view('roster.rosterAFA', ['team'=>$team]);
        }
    }

    public function lineup($id){
        $team = Team::findOrFail($id);

        if($team->sport_id == 2){
            return view('lineup.createF', ['team'=>$team]);
        }else{
            return view('lineup.createAF', ['team'=>$team]);
        }
    }

    public function lineupStore(Request $request){
        $team = Team::findOrFail($request->team_id);
        foreach($team->lineup->positions as $position){
            $position->delete();
        }

        $lineup = Team::findOrFail($request->team_id)->lineup->id;
        $positionN = New Position;
        $positionN->type = $request->type;
        $positionN->pName = $request->player1;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position1;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type;
        $positionN->pName = $request->player2;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position2;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type;
        $positionN->pName = $request->player3;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position3;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type;
        $positionN->pName = $request->player4;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position4;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type;
        $positionN->pName = $request->player5;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position5;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type;
        $positionN->pName = $request->player6;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position6;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type;
        $positionN->pName = $request->player7;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position7;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type;
        $positionN->pName = $request->player8;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position8;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type;
        $positionN->pName = $request->player9;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position9;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type;
        $positionN->pName = $request->player10;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position10;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type;
        $positionN->pName = $request->player11;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position11;
        $positionN->save();

    }


    public function lineupAFStore(Request $request){
        $team = Team::findOrFail($request->team_id);
        foreach($team->lineup->positions as $position){
            $position->delete();
        }

        $lineup = Team::findOrFail($request->team_id)->lineup->id;
        $positionN = New Position;
        $positionN->type = $request->type1;
        $positionN->pName = $request->player1;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position1;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type1;
        $positionN->pName = $request->player2;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position2;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type1;
        $positionN->pName = $request->player3;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position3;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type1;
        $positionN->pName = $request->player4;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position4;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type1;
        $positionN->pName = $request->player5;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position5;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type1;
        $positionN->pName = $request->player6;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position6;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type1;
        $positionN->pName = $request->player7;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position7;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type1;
        $positionN->pName = $request->player8;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position8;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type1;
        $positionN->pName = $request->player9;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position9;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type1;
        $positionN->pName = $request->player10;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position10;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type1;
        $positionN->pName = $request->player11;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position11;
        $positionN->save();


        $positionN = New Position;
        $positionN->type = $request->type2;
        $positionN->pName = $request->player12;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position12;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type2;
        $positionN->pName = $request->player13;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position13;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type2;
        $positionN->pName = $request->player14;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position14;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type2;
        $positionN->pName = $request->player15;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position15;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type2;
        $positionN->pName = $request->player16;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position16;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type2;
        $positionN->pName = $request->player17;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position17;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type2;
        $positionN->pName = $request->player18;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position18;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type2;
        $positionN->pName = $request->player19;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position19;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type2;
        $positionN->pName = $request->player20;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position20;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type2;
        $positionN->pName = $request->player21;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position21;
        $positionN->save();
        $positionN = New Position;
        $positionN->type = $request->type2;
        $positionN->pName = $request->player22;
        $positionN->lineup_id = $lineup;
        $positionN->position = $request->position22;
        $positionN->save();

    }



}
