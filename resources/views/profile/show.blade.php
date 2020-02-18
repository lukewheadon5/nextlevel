@extends('layouts.app')

@section('content')

<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    
                    <div class="col-md-3 pl-5">
                        <div class="profile-img">
                        @if(empty($profile->image ))
                            <img src="/images/blankPhoto.png" alt="Profile Picture" 
                           width="200px" height="200px" class="rounded-circle"/>
                        @else
                            <img src="{{asset('images/'. $profile->image)}}" alt="Profile Picture" 
                           width="200px" height="200px" class="rounded-circle"/>

                        
                        @endif
                            
                        </div>
                    </div>
                    <div class="col-md-7 pt-3">
                        <div class="profile-head">
                                    <h5>
                                       {{$profile->screen_name}}
                                    </h5>
                                    <h6>
                                       Teams: 
                                       @foreach ($teams as $team)
                                      
                                        <a href="{{ route('team.show', $team->id) }}">{{$team->name}},</a>
                                     
                                        @endforeach
                                    </h6>
                                    <p class="proile-rating">Positons : <span></span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Highlights</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                    <a href="{{ route('profile.edit', $profile->id) }}" class="profile-edit-btn" role="button">Edit Profile</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 pt-2">
                        <div class="profile-work">
                            <p>Stats</p>
                            
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$profile->user->email}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Gender:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$profile->gender}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Height:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$profile->height}}cm</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Weight:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$profile->weight}}kg</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$profile->phone_num}}</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                    <div class="col-md-12">
                                        <label>Bio:</label><br/>
                                        <p>{{$profile->bio}}</p>
                                    </div>
                                </div>
                                        
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        
                                
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>



@endsection

