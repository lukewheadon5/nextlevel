@extends('layouts.app')

@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/tHighlight.js') }}" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{ asset('css/video2.css') }}" rel="stylesheet">

<div class="container emp-profile">
                <div class="row">
                    
                    <div class="col-md-3 pl-5">
                        <div class="profile-img">

                        @if(empty($user->profile->image ))
                            <img src="/images/blankPhoto.png" alt="Profile Picture" 
                           width="200px" height="200px" class="rounded-circle"/> 
                        @else
                            <img src="{{asset('images/'. $user->profile->image)}}" alt="Profile Picture" 
                           width="200px" height="200px" class="rounded-circle"/> 
                        
                        @endif
                            
                        </div>
                    </div>
                    <div class="col-md-7 pt-3">
                        <div class="profile-head">
                                    <h5>
                                       {{$user->profile->screen_name}}
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
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 pt-2">
                        <div class="profile-work">
                        <h4>
                            <u>Career Statistics</u>
                         </h4>
                                    @foreach($user->usercareers as $usc)
                                        <a href="/statistic/career/{{$usc->id}}/user/{{$user->id}}">{{$usc->team->name}}</a>
                                    @endforeach

                                    <h4 class="pt-3">
                                        <u>Season Statistics</u>
                                    </h4>
                                    @foreach($user->userseasons as $uss)
                                        <div>
                                        <a href="/statistic/season/{{$uss->id}}/user/{{$user->id}}">{{$uss->season->year}} {{$uss->season->team->name}}</a>
                                        </div>
                                    @endforeach
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
                                                <p>{{$user->profile->user->email}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Gender:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$user->profile->gender}}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Height:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$user->profile->height}}cm</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Weight:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$user->profile->weight}}kg</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>{{$user->profile->phone_num}}</p>
                                            </div>
                                        </div>

                                        <div class="row">
                                    <div class="col-md-12">
                                        <label>Bio:</label><br/>
                                        <p>{{$user->profile->bio}}</p>
                                    </div>
                                </div>
                                        
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            @foreach ($user->highlights as $highlight)
                            <div class="card" style="width:100%; height:100%; padding:5px; margin:10px; background-color:black"> 
                            <h2 style="padding:2px;text-align:center; color:white;">{{$highlight->title}}</h2>
                            <div class="containerP" id="playerH" style="position: relative; width:100%; height:100%;">
                            <video class="vid" id="{{$highlight->id}}" style="
                                top: 0;
                                left: 0;
                                z-index: 1;
                                width:100%; 
                                height:90%;
                                border:5px solid black;
                                border-radius: 2px;

                                background: #000000;">
                            <source src="{{asset('videos/'. $highlight->video->video)}}" type="video/mp4">
                            </video>
                            <div class="controls" >
                            <div class="progress-bar">
                            <input class="bar" id="prog-bar{{$highlight->id}}" type="range" min="0" max="100" value="0" step="1">
                            </input>
                                <div class="progress-juice" id="prog-juice" >
                                </div>
                            </div>
                            <div class="buttons">
                                <button><i  id ="play{{$highlight->id}}" onClick="play(this.id)" class="fa fa-play" title="Play/Pause" style="font-size: 30px;"></i></button>
                            </div>
                            <div class="extraBtn">
                            <button><i id ="fullscreen{{$highlight->id}}" class="fa fa-expand" title="FullScreen" style="font-size: 30px;"></i></button>
                            </div>
                            </div>

                            </div>
                            </div>
                            @endforeach 
                                
                            </div>
                        </div>
                    </div>
                </div>          
        </div>

<script>
var high = <?php echo json_encode($user->highlights); ?>;
</script>

@endsection