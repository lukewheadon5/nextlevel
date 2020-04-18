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
use App\Video;
use App\Playlist;
use App\Usertraining;
use App\Task;

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
        $game->passes = "0";
        $game->crosses = "0";
        $game->goals = "0";
        $game->assists = "0";
        $game->clearances = "0";
        $game->saves = "0";
        $game->headers = "0";
        $game->shots = "0";
        $game->shotOT = "0";
        $game->goalsCon = "0";
        $game->dribbles = "0";
        $game->bookings = "0";
        $game->save();


        $team = Team::findOrFail($request->id);
        $userseason = $game->season->userseasons->where('season_id' , $game->season->id)->first();
        foreach($team->users as $user){
            if($user->admins()->where('team_id' , $team->id)->exists()){

            }else{
            
            $usergame = new Usergame;
            $usergame->game_id = $game->id;
            $usergame->user_id = $user->id;
            $usergame->userseason_id = $userseason->id;
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
            $usergame->passes = "0";
            $usergame->crosses = "0";
            $usergame->goals = "0";
            $usergame->assists = "0";
            $usergame->clearances = "0";
            $usergame->saves = "0";
            $usergame->headers = "0";
            $usergame->shots = "0";
            $usergame->shotOT = "0";
            $usergame->goalsCon = "0";
            $usergame->dribbles = "0";
            $usergame->bookings = "0";
            $usergame->save();

            $usertraining = new Usertraining;
            $usertraining->game_id = $game->id;
            $usertraining->user_id = $user->id;
            $usertraining->us_id = $userseason->id;
            $usertraining->passingTD = "0";
            $usertraining->passingYards = "0";
            $usertraining->rushingTD = "0";
            $usertraining->rushingYards = "0";
            $usertraining->receptions = "0";
            $usertraining->ReceivingYards = "0";
            $usertraining->carries = "0";
            $usertraining->tacklesFL = "0";
            $usertraining->tackles = "0";
            $usertraining->sacks = "0";
            $usertraining->interceptions = "0";
            $usertraining->pick6 = "0";
            $usertraining->penalties = "0";
            $usertraining->passes = "0";
            $usertraining->crosses = "0";
            $usertraining->goals = "0";
            $usertraining->assists = "0";
            $usertraining->clearances = "0";
            $usertraining->saves = "0";
            $usertraining->headers = "0";
            $usertraining->shots = "0";
            $usertraining->shotOT = "0";
            $usertraining->goalsCon = "0";
            $usertraining->dribbles = "0";
            $usertraining->bookings = "0";
            $usertraining->save();
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
        $season->passes = "0";
        $season->crosses = "0";
        $season->goals = "0";
        $season->assists = "0";
        $season->clearances = "0";
        $season->saves = "0";
        $season->headers = "0";
        $season->shots = "0";
        $season->shotOT = "0";
        $season->goalsCon = "0";
        $season->dribbles = "0";
        $season->bookings = "0";
        $season->save();

        $team = Team::findOrFail($request->id);
        foreach($team->users as $user){
            if($user->admins()->where('team_id' , $team->id)->exists()){

            }else{

            $usercareer = $team->usercareers()->where('user_id' , $user->id)->first(); 
    
            $userseason = new UserSeason;
            $userseason->season_id = $season->id;
            $userseason->user_id = $user->id;
            $userseason->usercareer_id = $usercareer->id;
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
            $userseason->passes = "0";
            $userseason->crosses = "0";
            $userseason->goals = "0";
            $userseason->assists = "0";
            $userseason->clearances = "0";
            $userseason->saves = "0";
            $userseason->headers = "0";
            $userseason->shots = "0";
            $userseason->shotOT = "0";
            $userseason->goalsCon = "0";
            $userseason->dribbles = "0";
            $userseason->bookings = "0";
            $userseason->save();
            }
        }

    }

    public function update(){

    }

    public function incStat(Request $request){
        $user = $request->user_id;
        $type = $request->type;
        $vidI = $request->vgid;
        $play = Video::findOrFail($request->vid_id)->playlist;
        $game = $play->game;
        $train = $play->isTraining; 

        if($train == "true"){
            $usertraining = $game->usertrainings->where('user_id', $user)->first();
            $usertraining->increment($type);
        }else{
            $usergame = $game->usergames->where('user_id', $user)->first();
            $userseason = $usergame->game->season->userseasons->where('user_id', $user)->first();
            $usercareer = $userseason->season->team->usercareers->where('user_id', $user)->first();
            $season = $game->season;


            $usergame->increment($type);
            $userseason->increment($type);
            $usercareer->increment($type);
            $season->increment($type);
            $game->increment($type);
        }

    }

    public function statScreen($id){
        $team = Team::findOrFail($id);
        $exists = $team->admins()->where('user_id', auth()->id())->exists();
        $exists2 = $team->coaches()->where('user_id', auth()->id())->exists();
        $exists3 = $team->users()->where('user_id', auth()->id())->exists();
        if($exists == true || $exists2 == true){
            return view('Stat.statsA', ['team'=>$team]);
        }else if($exists3 == true){
            return view('Stat.stats', ['team'=>$team]);
        }
    }

    public function showSeason($tid , $sid){
        $team = Team::findOrFail($tid);
        $season = Season::findOrFail($sid);
        $exists = $team->admins()->where('user_id', auth()->id())->exists();
        $exists2 = $team->coaches()->where('user_id', auth()->id())->exists();
        $exists3 = $team->users()->where('user_id', auth()->id())->exists();
        if($exists == true || $exists2 == true){
            if($team->sport_id == 2){
                return view('footy.seasonA', ['season'=>$season], ['team'=>$team]);
            }else{
                return view('Stat.seasonA', ['season'=>$season], ['team'=>$team]);
            }
        }else if($exists3 == true){
            if($team->sport_id == 2){
                return view('footy.season', ['season'=>$season], ['team'=>$team]);
            }else{
                return view('Stat.season', ['season'=>$season], ['team'=>$team]);
            }   
        }
    }

    public function showGame($tid , $gid){
        $team = Team::findOrFail($tid);
        $game = Game::findOrFail($gid);
        $exists = $team->admins()->where('user_id', auth()->id())->exists();
        $exists2 = $team->coaches()->where('user_id', auth()->id())->exists();
        $exists3 = $team->users()->where('user_id', auth()->id())->exists();
        if($exists == true || $exists2 == true){
            if($team->sport_id == 2){
                return view('footy.gameA', ['game'=>$game], ['team'=>$team]);
            }else{
                return view('Stat.gameA', ['game'=>$game], ['team'=>$team]);
            }
        }else if($exists3 == true){
            if($team->sport_id == 2){
                return view('footy.game', ['game'=>$game], ['team'=>$team]);
            }else{
                return view('Stat.game', ['game'=>$game], ['team'=>$team]);
            }
        }
    }

    public function showTrain($tid, $gid){
        $team = Team::findOrFail($tid);
        $game = Game::findOrFail($gid);
        $exists = $team->admins()->where('user_id', auth()->id())->exists();
        $exists2 = $team->coaches()->where('user_id', auth()->id())->exists();
        $exists3 = $team->users()->where('user_id', auth()->id())->exists();
        if($exists == true || $exists2 == true){
            if($team->sport_id == 2){
                return view('footy.TrainA', ['game'=>$game], ['team'=>$team]);
            }else{
                return view('Stat.TrainA', ['game'=>$game], ['team'=>$team]);
            }
        }else if($exists3 == true){
            if($team->sport_id == 2){
                return view('footy.Train', ['game'=>$game], ['team'=>$team]);
            }else{
                return view('Stat.Train', ['game'=>$game], ['team'=>$team]);
            }
        }
    }


    public function playerGame($gid, $uid){
        $user = User::findOrFail($uid);
        $usergame = Usergame::findOrFail($gid);
        $team = $usergame->game->team;
        $exists = $team->admins()->where('user_id', auth()->id())->exists();
        $exists2 = $team->coaches()->where('user_id', auth()->id())->exists();
        $exists3 = $team->users()->where('user_id', auth()->id())->exists();
        if($exists == true || $exists2 == true){
            if($team->sport_id == 2){
                return view('footy.playerGameA', ['usergame'=>$usergame], ['team'=>$team]);
            }else{
                return view('Stat.playerGameA' , ['usergame'=>$usergame]);
            }
        }else if($exists3 == true){
            if($team->sport_id == 2){
                return view('footy.playerGame', ['usergame'=>$usergame], ['team'=>$team]);
            }else{
                return view('Stat.playerGame' , ['usergame'=>$usergame]);
            }
        }else{
            if($team->sport_id == 2){
                return view('footy.playerGameNP', ['usergame'=>$usergame], ['team'=>$team]);
            }else{
                return view('Stat.playerGameNP' , ['usergame'=>$usergame]);
            }
        }
    }

    public function playerTrain($gid, $uid){
        $user = User::findOrFail($uid);
        $usertraining = Usertraining::findOrFail($gid);
        $team = $usertraining->game->team;
        $exists = $team->admins()->where('user_id', auth()->id())->exists();
        $exists2 = $team->coaches()->where('user_id', auth()->id())->exists();
        $exists3 = $team->users()->where('user_id', auth()->id())->exists();
        if($exists == true || $exists2 == true){
            if($team->sport_id == 2){
                return view('footy.playerTrainA', ['usertraining'=>$usertraining], ['team'=>$team]);
            }else{
                return view('Stat.playerTrainA' , ['usertraining'=>$usertraining]);
            }
        }else{
            if($team->sport_id == 2){
                return view('footy.playerTrain', ['usertraining'=>$usertraining], ['team'=>$team]);
            }else{
                return view('Stat.playerTrain' , ['usertraining'=>$usertraining]);
            }
        }
    }



    public function playerSeason($sid, $uid){
        $user = User::findOrFail($uid);
        $userseason = Userseason::findOrFail($sid);
        $team = $userseason->season->team;
        $exists = $team->admins()->where('user_id', auth()->id())->exists();
        $exists2 = $team->coaches()->where('user_id', auth()->id())->exists();
        $exists3 = $team->users()->where('user_id', auth()->id())->exists();
        if($exists == true || $exists2 == true){
            if($team->sport_id == 2){
                return view('footy.playerSeasonA', ['userseason'=>$userseason], ['team'=>$team]);
            }else{
                return view('Stat.playerSeasonA' , ['userseason'=>$userseason]);
            }
        }else if($exists3 == true){
            if($team->sport_id == 2){
                return view('footy.playerSeasonA', ['userseason'=>$userseason], ['team'=>$team]);
            }else{
                return view('Stat.playerSeason' , ['userseason'=>$userseason]);
            }
        }else{
            if($team->sport_id == 2){
                return view('footy.playerSeasonA', ['userseason'=>$userseason], ['team'=>$team]);
            }else{
                return view('Stat.playerSeasonNP' , ['userseason'=>$userseason]);
            }
        }
    }

    public function playerCareer($tid, $uid){
        $team = Team::findOrFail($tid);
        $usercareer = $team->usercareers->where('user_id' , $uid)->first();
        $exists = $team->admins()->where('user_id', auth()->id())->exists();
        $exists2 = $team->coaches()->where('user_id', auth()->id())->exists();
        $exists3 = $team->users()->where('user_id', auth()->id())->exists();
        
        if($exists == true || $exists2 == true){
            if($team->sport_id == 2){
                return view('footy.playerCareerA', ['usercareer'=>$usercareer], ['team'=>$team]);
            }else{
                return view('Stat.playerCareerA' , ['usercareer'=>$usercareer] , ['team'=>$team]);
            }
        }else if($exists3 == true){
            if($team->sport_id == 2){
                return view('footy.playerCareer', ['usercareer'=>$usercareer], ['team'=>$team]);
            }else{
                return view('Stat.playerCareer' , ['usercareer'=>$usercareer] , ['team'=>$team]);
            }
        }else{  
            if($team->sport_id == 2){
                return view('footy.playerCareerNP', ['usercareer'=>$usercareer], ['team'=>$team]);
            }else{
                return view('Stat.playerCareerNP' , ['usercareer'=>$usercareer] , ['team'=>$team]);
            }
        }
    }

    
    public function playerCareer2($cid, $uid){
        $user = User::findOrFail($uid);
        $usercareer = UserCareer::findOrFail($cid);
        $team = $usercareer->team;
        $exists = $team->admins()->where('user_id', auth()->id())->exists();
        $exists2 = $team->coaches()->where('user_id', auth()->id())->exists();
        $exists3 = $team->users()->where('user_id', auth()->id())->exists();
        
        if($exists == true || $exists2 == true){
            if($team->sport_id == 2){
                return view('footy.playerCareerA', ['usercareer'=>$usercareer], ['team'=>$team]);
            }else{
                return view('Stat.playerCareerA' , ['usercareer'=>$usercareer] , ['team'=>$team]);
            }
        }else if($exists3 == true){
            if($team->sport_id == 2){
                return view('footy.playerCareer', ['usercareer'=>$usercareer], ['team'=>$team]);
            }else{
                return view('Stat.playerCareer' , ['usercareer'=>$usercareer] , ['team'=>$team]);
            }
        }else{  
            if($team->sport_id == 2){
                return view('footy.playerCareerNP', ['usercareer'=>$usercareer], ['team'=>$team]);
            }else{
                return view('Stat.playerCareerNP' , ['usercareer'=>$usercareer] , ['team'=>$team]);
            }
        }
    }

    public function updateTrainView($gid){
        $game = Game::findOrFail($gid);
        $team = $game->team;
        if($team->sport_id == 2){
            return view('footy.trainEdit', ['game'=>$game], ['team'=>$team]);
        }else{
            return view('Stat.trainEdit', ['game'=>$game], ['team'=>$team]);
        }
    }

    public function updatePTrain(Request $request){
        $utid = $request->utid;
        $type = $request->type;
        $amount = $request->amount;
        $usertraining = Usertraining::findOrFail($utid);
        $team = $usertraining->game->team;
        $game = $usertraining->game;
        $usertraining->decrement($type, $usertraining->$type);
        $usertraining->increment($type,$amount);

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
        if($team->sport_id == 2){
            return view('footy.gameEdit', ['game'=>$game], ['team'=>$team]);
        }else{
            return view('Stat.gameEdit', ['game'=>$game], ['team'=>$team]);
        }
    }

    public function updateOGame(Request $request){
        $game = Game::findOrFail($request->game);
        $season = $game->season;
        $team = $season->team;

        if($team->sport_id == 2){
            $season->decrement("goals", $game->goals);
            $season->decrement("assists", $game->assists);
            $season->decrement("goalsCon", $game->goalsCon);
            $season->decrement("shots", $game->shots);
            $season->decrement("shotOT", $game->shotOT);
            $season->decrement("passes", $game->passes);
            $season->decrement("dribbles", $game->dribbles);
            

            $game->decrement("goals", $game->goals);
            $game->decrement("assists", $game->assists);
            $game->decrement("goalsCon", $game->goalsCon);
            $game->decrement("shots", $game->shots);
            $game->decrement("shotOT", $game->shotOT);
            $game->decrement("passes", $game->passes);
            $game->decrement("dribbles", $game->dribbles);
            
        

            $game->increment("goals", $request->gol);
            $game->increment("assists", $request->ass);
            $game->increment("goalsCon", $request->goc);
            $game->increment("shots", $request->sho);
            $game->increment("shotOT", $request->sot);
            $game->increment("passes", $request->pas);
            $game->increment("dribbles", $request->dri);
            

            $season->increment("goals", $request->gol);
            $season->increment("assists", $request->ass);
            $season->increment("goalsCon", $request->goc);
            $season->increment("shots", $request->sho);
            $season->increment("shotOT", $request->sot);
            $season->increment("passes", $request->pas);
            $season->increment("dribbles", $request->dri);

        }else{

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

    }

    public function updateDGame(Request $request){
        $game = Game::findOrFail($request->game);
        $season = $game->season;
        $team = $season->team;

        if($team->sport_id == 2){
            $season->decrement("crosses", $game->crosses);
            $season->decrement("headers", $game->headers);
            $season->decrement("clearances", $game->clearances);
            $season->decrement("saves", $game->saves);
            $season->decrement("tackles", $game->tackles);
            $season->decrement("interceptions", $game->interceptions);
            $season->decrement("penalties", $game->penalties);

            $game->decrement("crosses", $game->crosses);
            $game->decrement("headers", $game->headers);
            $game->decrement("clearances", $game->clearances);
            $game->decrement("saves", $game->saves);
            $game->decrement("tackles", $game->tackles);
            $game->decrement("interceptions", $game->interceptions);
            $game->decrement("penalties", $game->penalties);

        
            $game->increment("crosses", $request->cro);
            $game->increment("headers", $request->hea);
            $game->increment("clearances", $request->cle);
            $game->increment("saves", $request->sav);
            $game->increment("tackles", $request->tac);
            $game->increment("interceptions", $request->int);
            $game->increment("penalties", $request->pen);

            $season->increment("crosses", $request->cro);
            $season->increment("headers", $request->hea);
            $season->increment("clearances", $request->cle);
            $season->increment("saves", $request->sav);
            $season->increment("tackles", $request->tac);
            $season->increment("interceptions", $request->int);
            $season->increment("penalties", $request->pen);
        
        }else{
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

    public function addPG($tid, $gid){
        $team = Team::findOrFail($tid);
        $game = Game::findOrFail($gid);

        return view('Stat.addPG', ['team'=>$team] , ['game'=>$game]);
    }

    public function addPS($tid, $sid){
        $team = Team::findOrFail($tid);
        $season = Season::findOrFail($sid);

        return view('Stat.addPS', ['team'=>$team] , ['season'=>$season]);
    }

    public function addPGU($tid, $gid, $uid){
        $team = Team::findOrFail($tid);
        $game = Game::findOrFail($gid);
        $season = $game->season;
        $user = User::findOrFail($uid);
        $userseason = $user->userseasons->where('season_id' , $season->id)->first();

        $usergame = new Usergame;
        $usergame->game_id = $game->id;
        $usergame->user_id = $user->id;
        $usergame->userseason_id = $userseason->id;
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
        $usergame->passes = "0";
        $usergame->crosses = "0";
        $usergame->goals = "0";
        $usergame->assists = "0";
        $usergame->clearances = "0";
        $usergame->saves = "0";
        $usergame->headers = "0";
        $usergame->shots = "0";
        $usergame->shotOT = "0";
        $usergame->goalsCon = "0";
        $usergame->dribbles = "0";
        $usergame->bookings = "0";
        $usergame->save();

            $usertraining = new Usertraining;
            $usertraining->game_id = $game->id;
            $usertraining->user_id = $user->id;
            $usertraining->us_id = $userseason->id;
            $usertraining->passingTD = "0";
            $usertraining->passingYards = "0";
            $usertraining->rushingTD = "0";
            $usertraining->rushingYards = "0";
            $usertraining->receptions = "0";
            $usertraining->ReceivingYards = "0";
            $usertraining->carries = "0";
            $usertraining->tacklesFL = "0";
            $usertraining->tackles = "0";
            $usertraining->sacks = "0";
            $usertraining->interceptions = "0";
            $usertraining->pick6 = "0";
            $usertraining->penalties = "0";
            $usertraining->passes = "0";
            $usertraining->crosses = "0";
            $usertraining->goals = "0";
            $usertraining->assists = "0";
            $usertraining->clearances = "0";
            $usertraining->saves = "0";
            $usertraining->headers = "0";
            $usertraining->shots = "0";
            $usertraining->shotOT = "0";
            $usertraining->goalsCon = "0";
            $usertraining->dribbles = "0";
            $usertraining->bookings = "0";
            $usertraining->save();

        
        return view('Stat.addPG', ['team'=>$team] , ['game'=>$game]);
    }

    public function addPSU($tid, $sid, $uid){

        $team = Team::findOrFail($tid);
        $season = Season::findOrFail($sid);
        $user = User::findOrFail($uid);
        $usercareer = $user->usercareers->where('team_id' , $team->id)->first();

            $userseason = new UserSeason;
            $userseason->season_id = $season->id;
            $userseason->user_id = $user->id;
            $userseason->usercareer_id = $usercareer->id;
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
            $userseason->passes = "0";
            $userseason->crosses = "0";
            $userseason->goals = "0";
            $userseason->assists = "0";
            $userseason->clearances = "0";
            $userseason->saves = "0";
            $userseason->headers = "0";
            $userseason->shots = "0";
            $userseason->shotOT = "0";
            $userseason->goalsCon = "0";
            $userseason->dribbles = "0";
            $userseason->bookings = "0";
            $userseason->save();
        
        return view('Stat.addPS', ['team'=>$team] , ['season'=>$season]);
    }

    







}
