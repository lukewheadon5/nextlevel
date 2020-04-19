<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sport;
use App\Profile;
use App\Team;
use App\User;
use App\Admin;
use App\Coach;
use App\Country;
use App\Usercareer;
use Image;
use App\Lineup;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::paginate(10);
       return view('team.index',['teams'=>$teams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sports = Sport::all();
        $countries = Country::all();
        return view('team.create')->withSports($sports)->withCountries($countries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'required|string|max:255',
            'sport'=>'required',
            'email' => 'required|string|email|max:255|unique:teams',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            ]);

        $team = new Team;

        $team->name=$request->name;
        $team->sport_id=$request->sport;
        $team->country=$request->country;
        $team->city=$request->city;
        $team->email=$request->email;


        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(250,250)->save($location);

            $team->image = $filename;
        }
    
       
        $team->save();

        $lineup = new Lineup;
        $lineup->team_id = $team->id;
        $lineup->save();

        $admin = new Admin;
        $admin->user_id=auth()->id();
        $admin->team_id=$team->id;
        $admin->save();

        auth()->user()->teams()->attach($team);

        
        return redirect()->route('team.show', $team->id)->with('success','Team created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::findOrFail($id);
        $exists = $team->admins()->where('user_id', auth()->id())->exists();
        $exists2 = $team->users()->where('user_id', auth()->id())->exists();
        $exists3 = $team->coaches()->where('user_id', auth()->id())->exists();

        if($exists == true || $exists3 == true){
            return view('team.showAd', ['team'=>$team]);
        }
        elseif($exists2 == true){
            return view('team.showMem', ['team'=>$team]);
        } 
        else{
            return view('team.show', ['team'=>$team]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::findOrFail($id);
        $exists = $team->admins()->where('user_id', auth()->id())->exists();
        $exists2 = $team->users()->where('user_id', auth()->id())->exists();
        $sports = Sport::all();
        $countries = Country::all();
        

        if($exists == true){
            return view('team.edit', ['team'=>$team])->withSports($sports)->withCountries($countries);
        }
        elseif($exists2 == true){
            return view('team.show', ['team'=>$team]);
        } 
        else{
            return view('team.show', ['team'=>$team])->with('Danger','You do not have permission to edit this team.');;
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name'=>'required|string|max:255',
            'sport'=>'required',
            'email' => 'required|string|email|max:255|unique:teams',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            ]);

            $team = Team::findOrFail($id);
            $team->name=$request->input('name');
            $team->sport_id=$request->input('sport');
            $team->country=$request->input('country');
            $team->city=$request->input('city');
            $team->email=$request->input('email');


        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(250,250)->save($location);

            $team->image = $filename;
        }

        
        
            $team->save();

        
        return redirect()->route('team.show',$team->id)->with('success','Team profile updated successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function join($id)
    {
        $team = Team::findOrFail($id);
        $exists = $team->users()->where('user_id', auth()->id())->exists();
        if($exists == false){
            auth()->user()->teams()->attach($team);
            $usercareer = new Usercareer;
            $usercareer->user_id = auth()->id();
            $usercareer->team_id = $team->id;
            $usercareer->passingTD = "0";
            $usercareer->passingYards = "0";
            $usercareer->rushingTD = "0";
            $usercareer->rushingYards = "0";
            $usercareer->receptions = "0";
            $usercareer->carries = "0";
            $usercareer->ReceivingYards = "0";
            $usercareer->tacklesFL = "0";
            $usercareer->tackles = "0";
            $usercareer->sacks = "0";
            $usercareer->interceptions = "0";
            $usercareer->pick6 = "0";
            $usercareer->penalties = "0";
            $usercareer->passes = "0";
            $usercareer->crosses = "0";
            $usercareer->goals = "0";
            $usercareer->assists = "0";
            $usercareer->clearances = "0";
            $usercareer->saves = "0";
            $usercareer->headers = "0";
            $usercareer->shots = "0";
            $usercareer->shotOT = "0";
            $usercareer->goalsCon = "0";
            $usercareer->dribbles = "0";
            $usercareer->bookings = "0";
            $usercareer->save();
            return view('team.showMem', ['team'=>$team]);
        }else{
            return view('team.show', ['team'=>$team])->with('danger','You are already a member');
        }

    }

    public function myTeams()
    { 
        $user = auth()->user();
        $teams = Team::get();
        
        return view('team.userTeams', ['user'=>$user],['teams'=>$teams]);
        
    }


    public function members($id){
        $team = Team::findOrFail($id);
        return view('team.members', ['team'=>$team]);
    }

    public function addCoach($tid, $uid){
        $team = Team::findOrFail($tid);
        $coach = new Coach;
        $coach->user_id = $uid;
        $coach->team_id = $tid;
        $coach->save();

        return view('team.members', ['team'=>$team]);
    }

    public function search(Request $request){
        if($request->entry == ""){

        }else{
                $teams = Team::where('name' , $request->entry)->paginate(10);
                return view('team.index', ['teams'=>$teams]);
        }
    }
}
