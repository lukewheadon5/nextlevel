@extends('layouts.app')



@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/tHighlight.js') }}" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{ asset('css/video2.css') }}" rel="stylesheet">

<ul style="list-style-type: none;
  margin: 0;
  padding:0px;
  overflow: hidden;
  background-color: #333;"> 

  <li style="float:left"><a class="active" href="{{route('team.show' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Home</a></li>
  <li style="float:left"><a href="#news" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  News</a></li>
  <li style="float:left"><a href="{{route('player' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Video</a></li>
  <li style="float:left"><a href="#stats" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Statistics</a></li>
</ul>
<div class="container emp-profile">
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
                    <div class="col-md-1">
                    <a href="{{ route('team.edit', $team->id) }}" class="profile-edit-btn" role="button">Edit Page</a>
                    </div>
                    <div class="col-md-1">
                    <span class="badge badge-info">Admin</span>
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
                            @foreach ($team->thighlights as $highlight)
                                <div class="card" style="width:100%; height:100%; padding:5px; margin:10px; background-color:black">
                                <div style="display: inline-block;"> 
                                <h2 style="padding:2px;text-align:center; color:white;">{{$highlight->title}}</h2>
                                <button type="submit" class="btn btn-danger" onClick="del({{$highlight->id}})">Delete</button>
                                </div>
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

                            <div class="tab-pane fade" id="members" role="tabpanel" aria-labelledby="members-tab">

                            <h2>Members:</h2>
                            @foreach ($team->users as $team1)
                            <div>
                            <a href="{{ route('profile.show', $team1->profile()->value('id')) }}">{{$team1->name}}</a>
                            </div>
                            @endforeach

                            </div>
                        </div>
                    </div>
                </div>           
        </div>

<script>
var high = <?php echo json_encode($team->thighlights); ?>;
var team = <?php echo json_encode($team->id); ?>;

function del(id){
  $.ajax({
    type: 'POST', 
        url: '/thighlight/delete',
        data: {"_token": "{{ csrf_token() }}", "id":id},
        success: function (data) {
            alert("Successfully deleted highlight")
            window.location = '/team/'+team;
        },
        error:function(data){ 
           console.log(data);
           alert("Something went wrong.");
        }
        
});
}
</script>



@endsection