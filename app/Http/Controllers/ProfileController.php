<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->profile()->exists()==false){
            return view('profile.create');
        }
        else{
            $user = auth()->user();
            return redirect()->route('profile.show', auth()->user()->profile()->value('id'))->with('danger','You Already have a Profile');
        }

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            $validatedData = $request->validate([
                'name'=>'required|max:100',
                'weight'=>'required|digits_between:1,4',
                'height'=>'required|digits_between:1,4',
                'phone'=>'required|max:11',
                'gender'=>'required',

            ]);
    
            $profile = new Profile;
    
            $profile->user_id=auth()->id();
            $profile->screen_name=$request->name;
            $profile->weight=$request->weight;
            $profile->height=$request->height;  
            $profile->phone_num=$request->phone;
            $profile->gender=$request->gender;
            $profile->bio=$request->bio;
            
            if($request->hasFile('image')){
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/'.$filename);
                Image::make($image)->resize(250,250)->save($location);
    
                $profile->image = $filename;
            }
            
            $profile->save();
    
            
            return redirect()->route('profile.show',$profile->id)->with('success','Profile created successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::findOrFail($id);
        $user = $profile->user;
        $teams = $user->teams;

        if(auth()->id() == $user->id){
            return view('profile.show', ['profile'=>$profile], ['teams'=>$teams]);

        }
        else{
            return view('profile.showO', ['profile'=>$profile], ['teams'=>$teams]);
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
        $profile = Profile::findOrFail($id);
        if(auth()->id()==$profile->user->id){
            return view('profile.edit')->withProfile($profile);
        }else{
            return redirect()->route('profile.show', $profile->id)->with('danger','NO!! You may not edit other another persons profile.');
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
            'name'=>'required|max:100',
            'weight'=>'required|digits_between:1,4',
            'height'=>'required|digits_between:1,4',
            'phone'=>'required|max:11',
            'gender'=>'required',

        ]);

        $profile = Profile::findOrFail($id);

        $profile->screen_name=$request->input('name');
        $profile->weight=$request->input('weight');
        $profile->height=$request->input('height');  
        $profile->phone_num=$request->input('phone');
        $profile->gender=$request->input('gender');
        $profile->bio=$request->input('bio');
        
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(250,250)->save($location);

            $profile->image = $filename;
        }
        
        $profile->save();

        
        return redirect()->route('profile.show',$profile->id)->with('success','Profile updated successfully.');
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
}
