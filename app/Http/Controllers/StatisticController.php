<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Userseason;
use App\Usergame;
use App\Sport;
use App\User;
use App\Season;
use App\Game;

class StatisticController extends Controller
{
    public function createGame($id){
        $team = Team::findOrFail($id);
        return view('Stat.createG' , ['team'=>$team]);
    }

    public function createSeason($id){
        $team = Team::findOrFail($id);
        return view('Stat.createS' , ['team'=>$team]);
    }

    public function storeGame(Request $request){
        $validatedData = $request->validate([
            'opponent'=>'required|string|max:255',
        ]);
        $team = $request->id;
        $opponent = $request->opponent;
        $sport = $request->sport;
        $season = $request->season;

        $game = New Game;
        $game->team_id = $team;
        $game->sport_id = $sport;
        $game->opponent = $opponent;
        $game->season_id = $season;
        $game->tackles = "0";
        $game->save();

        $team = Team::findOrFail($request->id);
        $userseason = $game->season->userseasons->where('season_id' , $game->season->id)->first();
        foreach($team->users as $user){
            
            $usergame = new Usergame;
            $usergame->game_id = $game->id;
            $usergame->user_id = $user->id;
            $usergame->us_id = $userseason->id;
            $usergame->tackles = "0";
            $usergame->save();
        }
    }

    public function storeSeason(Request $request){
        $validatedData = $request->validate([
            'year'=>'required|string|max:255',
        ]);
        $team = $request->id;
        $year = $request->year;
        $sport = $request->sport;

        $season = New Season;
        $season->team_id = $team;
        $season->sport_id = $sport;
        $season->year = $year;
        $season->tackles = "0";
        $season->save();

        $team = Team::findOrFail($request->id);
        foreach($team->users as $user){
    
            $userseason = new UserSeason;
            $userseason->season_id = $season->id;
            $userseason->user_id = $user->id;
            $userseason->tackles = "0";
            $userseason->save();
        }

    }

    public function update(){

    }

    public function increment(){

    }

    public function statScreen($id){
        $team = Team::findOrFail($id);
        return view('Stat.stats', ['team'=>$team]);
    }

    public function showSeason($tid , $sid){
        $team = Team::findOrFail($tid);
        $season = Season::findOrFail($sid);

        return view('Stat.season', ['season'=>$season], ['team'=>$team]);
    }

    public function showGame($tid , $gid){
        $team = Team::findOrFail($tid);
        $game = Game::findOrFail($gid);

        return view('Stat.game', ['game'=>$game], ['team'=>$team]);
    }

    public function playerGame($gid, $uid){
        $user = User::findOrFail($uid);
        $usergame = Usergame::findOrFail($gid);
        
        return view('Stat.playerGame' , ['usergame'=>$usergame]);
    }

    public function playerSeason($sid, $uid){
        $user = User::findOrFail($uid);
        $userseason = Userseason::findOrFail($sid);
        
        return view('Stat.playerSeason' , ['userseason'=>$userseason]);
    }

    public function playerCareer($tid, $uid){
        

    }





}
