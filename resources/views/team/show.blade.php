@extends('layouts.app')

@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    
                    <div class="col-md-3 pl-5">
                        <div class="profile-img">
                        @if(empty($team->image ))
                            <img src="/images/sportsballs.png" alt="Team Logo" 
                           width="200px" height="200px" class="rounded-circle"/>
                        @else
                            <img src="{{asset('images/'. $team->image)}}" alt="Team Logo" 
                           width="200px" height="200px" class="rounded-circle"/>

                        
                        @endif
                        </div>
                    </div>
                    <div class="col-md-7 pt-3">
                        <div class="profile-head">
                                    <h1>
                                       {{$team->name}}
                                    </h1>
                                    
                                    <p>Sport: {{$team->sport->name}}</p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Highlights</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="members-tab" data-toggle="tab" href="#members" role="tab" aria-controls="member" aria-selected="false">Members</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                    <a href="{{ route('join', $team->id) }}" class="btn btn-secondary" tabindex="-1" role="button" >Join Team</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 pt-2">
                        
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$team->email}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Country:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$team->country}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>City:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$team->city}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Sport:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$team->sport->name}}</p>
                                            </div>
                                        </div>
                                        
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        
                                
                            </div>

                            <div class="tab-pane fade" id="members" role="tabpanel" aria-labelledby="members-tab">

                            <h2>Members:</h2>
                            @foreach ($team->users as $team)
                            <div>
                            <a href="{{ route('profile.show', $team->profile()->value('id')) }}">{{$team->name}}</a>
                            </div>
                            @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>



@endsection