<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Userseason;
use App\Usergame;
use App\Sport;
use App\User;
use App\Usercareer;
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
        $game->passingTD = "0";
        $game->passingYards = "0";
        $game->rushingTD = "0";
        $game->rushingYards = "0";
        $game->receptions = "0";
        $game->ReceivingYards = "0";
        $game->allowedPassTD = "0";
        $game->allowedPassYards = "0";
        $game->allowedRunTD = "0";
        $game->allowedRunYards = "0";
        $game->carries = "0";
        $game->tacklesFL = "0";
        $game->tackles = "0";
        $game->sacks = "0";
        $game->interceptions = "0";
        $game->pick6 = "0";
        $game->penalties = "0";
        $game->save();

        $team = Team::findOrFail($request->id);
        $userseason = $game->season->userseasons->where('season_id' , $game->season->id)->first();
        foreach($team->users as $user){
            if($user->admins()->where('team_id' , $team->id)->exists()){

            }else{
            
            $usergame = new Usergame;
            $usergame->game_id = $game->id;
            $usergame->user_id = $user->id;
            $usergame->us_id = $userseason->id;
            $usergame->passingTD = "0";
            $usergame->passingYards = "0";
            $usergame->rushingTD = "0";
            $usergame->rushingYards = "0";
            $usergame->receptions = "0";
            $usergame->ReceivingYards = "0";
            $usergame->carries = "0";
            $usergame->tacklesFL = "0";
            $usergame->tackles = "0";
            $usergame->sacks = "0";
            $usergame->interceptions = "0";
            $usergame->pick6 = "0";
            $usergame->penalties = "0";
            $usergame->save();
            }
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
        $season->passingTD = "0";
        $season->passingYards = "0";
        $season->rushingTD = "0";
        $season->rushingYards = "0";
        $season->receptions = "0";
        $season->ReceivingYards = "0";
        $season->allowedPassTD = "0";
        $season->allowedPassYards = "0";
        $season->allowedRunTD = "0";
        $season->allowedRunYards = "0";
        $season->carries = "0";
        $season->tacklesFL = "0";
        $season->tackles = "0";
        $season->sacks = "0";
        $season->interceptions = "0";
        $season->pick6 = "0";
        $season->penalties = "0";
        $season->save();

        $team = Team::findOrFail($request->id);
        foreach($team->users as $user){
            if($user->admins()->where('team_id' , $team->id)->exists()){

            }else{

            $usercareer = $team->usercareers()->where('user_id' , $user->id)->first(); 
    
            $userseason = new UserSeason;
            $userseason->season_id = $season->id;
            $userseason->user_id = $user->id;
            $userseason->career_id = $usercareer->id;
            $userseason->passingTD = "0";
            $userseason->passingYards = "0";
            $userseason->rushingTD = "0";
            $userseason->rushingYards = "0";
            $userseason->receptions = "0";
            $userseason->ReceivingYards = "0";
            $userseason->carries = "0";
            $userseason->tacklesFL = "0";
            $userseason->tackles = "0";
            $userseason->sacks = "0";
            $userseason->interceptions = "0";
            $userseason->pick6 = "0";
            $userseason->penalties = "0";
            $userseason->save();
            }
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
        $team = Team::findOrFail($tid);
        $usercareer = $team->usercareers->where('user_id' , $uid)->first();
        
        
        return view('Stat.playerCareer' , ['usercareer'=>$usercareer] , ['team'=>$team]);
    }

    
    public function playerCareer2($cid, $uid){
        $user = User::findOrFail($uid);
        $usercareer = UserCareer::findOrFail($cid);
        $team = $usercareer->team;
        
        return view('Stat.playerCareer' , ['usercareer'=>$usercareer], ['team'=>$team]);
    }

    public function updatePGame(Request $request){
        $ugid = $request->ugid;
        $usergame = Usergame::findOrFail($ugid);
        $user = $usergame->user;
        $team = $usergame->game->team;
        $game = $usergame->game;
        $season = $game->season;
        $userseason = $user->userseasons()->where('season_id' , $season->id)->first();
        $usercareer = $user->usercareers()->where('team_id' , $team->id)->first();
        $type = $request->type;
        $amount = $request->amount;

        $game->decrement($type, $usergame->$type);
        $season->decrement($type, $usergame->$type);
        $userseason->decrement($type, $usergame->$type);
        $usercareer->decrement($type, $usergame->$type);
        

        $usergame->decrement($type, $usergame->$type);
        $usergame->increment($type,$amount);

        $game->increment($type,$amount);
        $season->increment($type,$amount);
        $userseason->increment($type,$amount);
        $usercareer->increment($type,$amount);
   
     


        return view('Stat.game', ['game'=>$game], ['team'=>$team]);
    }

    public function updateView($tid, $gid){
        $team = Team::findOrFail($tid);
        $game = Game::findOrFail($gid);

        return view('Stat.gameEdit', ['game'=>$game], ['team'=>$team]);
    }

    public function updateOGame(Request $request){
        $game = Game::findOrFail($request->game);
        $season = $game->season;

        $season->decrement("passingTD", $game->passingTD);
        $season->decrement("passingYards", $game->passingYards);
        $season->decrement("RushingTD", $game->RushingTD);
        $season->decrement("RushingYards", $game->RushingYards);
        $season->decrement("Carries", $game->Carries);
        $season->decrement("Receptions", $game->Receptions);
        $season->decrement("ReceivingYards", $game->ReceivingYards);
        

        $game->decrement("passingTD", $game->passingTD);
        $game->decrement("passingYards", $game->passingYards);
        $game->decrement("RushingTD", $game->RushingTD);
        $game->decrement("RushingYards", $game->RushingYards);
        $game->decrement("Carries", $game->Carries);
        $game->decrement("Receptions", $game->Receptions);
        $game->decrement("ReceivingYards", $game->ReceivingYards);
        
    

        $game->increment("passingTD", $request->ptd);
        $game->increment("passingYards", $request->pay);
        $game->increment("RushingTD", $request->rtd);
        $game->increment("RushingYards", $request->ruy);
        $game->increment("Carries", $request->car);
        $game->increment("Receptions", $request->rec);
        $game->increment("ReceivingYards", $request->rey);
        

        $season->increment("passingTD", $request->ptd);
        $season->increment("passingYards", $request->pay);
        $season->increment("RushingTD", $request->rtd);
        $season->increment("RushingYards", $request->ruy);
        $season->increment("Carries", $request->car);
        $season->increment("Receptions", $request->rec);
        $season->increment("ReceivingYards", $request->rey);

    }

    public function updateDGame(Request $request){
        $game = Game::findOrFail($request->game);
        $season = $game->season;

        $season->decrement("allowedPassTD", $game->allowedPassTD);
        $season->decrement("allowedPassYards", $game->allowedPassYards);
        $season->decrement("allowedRunTD", $game->allowedRunTD);
        $season->decrement("allowedRunYards", $game->allowedRunYards);
        $season->decrement("tacklesFL", $game->tacklesFL);
        $season->decrement("sacks", $game->sacks);
        $season->decrement("tackles", $game->tackles);
        $season->decrement("interceptions", $game->interceptions);
        $season->decrement("pick6", $game->pick6);
        $season->decrement("penalties", $game->penalties);

        $game->decrement("allowedPassTD", $game->allowedPassTD);
        $game->decrement("allowedPassYards", $game->allowedPassYards);
        $game->decrement("allowedRunTD", $game->allowedRunTD);
        $game->decrement("allowedRunYards", $game->allowedRunYards);
        $game->decrement("tacklesFL", $game->tacklesFL);
        $game->decrement("sacks", $game->sacks);
        $game->decrement("tackles", $game->tackles);
        $game->decrement("interceptions", $game->interceptions);
        $game->decrement("pick6", $game->pick6);
        $game->decrement("penalties", $game->penalties);

    


        $game->increment("allowedPassTD", $request->apt);
        $game->increment("allowedPassYards", $request->apy);
        $game->increment("allowedRunTD", $request->art);
        $game->increment("allowedRunYards", $request->ary);
        $game->increment("tacklesFL", $request->tfl);
        $game->increment("sacks", $request->sac);
        $game->increment("tackles", $request->tac);
        $game->increment("interceptions", $request->int);
        $game->increment("pick6", $request->pic);
        $game->increment("penalties", $request->pen);

        $season->increment("allowedPassTD", $request->apt);
        $season->increment("allowedPassYards", $request->apy);
        $season->increment("allowedRunTD", $request->art);
        $season->increment("allowedRunYards", $request->ary);
        $season->increment("tacklesFL", $request->tfl);
        $season->increment("sacks", $request->sac);
        $season->increment("tackles", $request->tac);
        $season->increment("interceptions", $request->int);
        $season->increment("pick6", $request->pic);
        $season->increment("penalties", $request->pen);

    }


    public function get_by_season($sid){
        $season = Season::findOrFail($sid);
            $html = '';
            $games = Game::where('season_id', $sid)->get();
            foreach ($games as $game) {
                $html .= '<option value="'.$game->id.'">Vs '.$game->opponent.'</option>';
            }

    
        return response()->json(['html' => $html]);

    }







}
