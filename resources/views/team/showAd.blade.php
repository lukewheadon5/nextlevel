@extends('layouts.app')



@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/tHighlight.js') }}" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{ asset('css/video2.css') }}" rel="stylesheet">
<link href="{{ asset('css/table.css') }}" rel="stylesheet">

<ul style="list-style-type: none;
  margin: 0;
  padding:0px;
  overflow: hidden;
  background-color: #333;"> 

<li style="float:left; padding-left:5px; padding-top:5px;">
  @if(empty($team->image ))
    <img src="/images/sportsballs.png" alt="Team Logo" 
        width="40px" height="40px" class="rounded-circle"/>
  @else
    <img src="{{asset('images/'. $team->image)}}" alt="Team Logo" 
        width="40px" height="40px" class="rounded-circle"/>                    
    @endif
  </li>
  <li style="float:left"><a class="active" href="{{route('team.show' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Home</a></li>
  <li style="float:left"><a href="{{route('calendar' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Calendar</a></li>
  <li style="float:left"><a href="{{route('roster' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Lineup</a></li>
  <li style="float:left"><a href="{{route('player' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Video</a></li>
  <li style="float:left"><a href="{{route('stats' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Statistics</a></li>
  <li style="float:left"><a href="{{route('members' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Membership</a></li>
</ul>




<div class="container-fluid">
	<div class="row pt-3">
		<div class="col-md-3 text-center">
        @if(empty($team->image ))
                            <img src="/images/sportsballs.png" alt="Team Logo" 
                           width="200px" height="200px" class="rounded-circle"/>
                        @else
                            <img src="{{asset('images/'. $team->image)}}" alt="Team Logo" 
                           width="200px" height="200px" class="rounded-circle"/>

                        
                        @endif
		</div>
		<div class="col-md-7 pt-5">
            <h1>
                {{$team->name}}
            </h1>
            <p>Sport: {{$team->sport->name}}</p>
		</div>
		<div class="col-md-2">
        <a href="{{ route('team.edit', $team->id) }}" class="profile-edit-btn pr-3" role="button">Edit Page</a>
        <span class="badge badge-info">Admin</span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-7">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="highlight-tab" data-toggle="tab" href="#highlight" role="tab" aria-controls="highlight" aria-selected="false">Highlights</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="members-tab" data-toggle="tab" href="#members" role="tab" aria-controls="member" aria-selected="false">Members</a>
                </li>
            </ul>
			<div class="tab-content about-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                    <div class="row pt-4 pl-4">
                        <div class="col-md-6">
                            <label>Email:</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$team->email}}</p>
                        </div>
                    </div>
                    <div class="row pl-4">
                        <div class="col-md-6">
                            <label>Country:</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$team->country}}</p>
                        </div>
                    </div>
                    <div class="row pl-4">
                        <div class="col-md-6">
                            <label>City:</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$team->city}}</p>
                        </div>
                    </div>
                    <div class="row pl-4">
                        <div class="col-md-6">
                            <label>Sport:</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{$team->sport->name}}</p>
                        </div>
                    </div>
                </div>



                <div class="tab-pane fade pt-3" id="highlight" role="tabpanel" aria-labelledby="highlight-tab">
                    @foreach ($team->thighlights as $highlight)
                        <div class="card" style="width:100%; height:100%; padding:5px; margin:10px; background-color:black">
                            <div class="row">
                                <div class = "col-md-4">
                                </div> 
                                <div class = "col-md-4">
                                    <h2 style="padding:2px;text-align:center; color:white;">{{$highlight->title}}</h2>
                                </div> 
                                <div class = "col-md-4 text-right pr-4">
                                <button type="submit" class="btn btn-danger" onClick="del({{$highlight->id}})">Delete</button>
                                </div>
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

                <div class="tab-pane fade pt-3" id="members" role="tabpanel" aria-labelledby="members-tab">
                    <h2>Members:</h2>
                    <table class="table table-striped table-sm">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Players</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($team->users as $user)
                              @if($team->admins()->where('user_id' , $user->id)->exists())

                              @else
                              @if($team->coaches()->where('user_id' , $user->id)->exists())

                              @else
                                <tr>
                                <td class="text-center"><a href="{{ route('profile.show', $user->profile->id) }}">{{$user->name}}</a></td>
                                <td>
                                @if(empty($user->profile->image ))
                                    <img src="/images/blankPhoto.png" alt="Profile Picture" 
                                    width="40px" height="40px" class="rounded-circle"/> 
                                     @else
                                        <img src="{{asset('images/'. $user->profile->image)}}" alt="Profile Picture" 
                                    width="40px" height="40px" class="rounded-circle"/> 
                        
                                     @endif
                                    </td>
                                    </tr>
                                @endif
                                @endif
                                @endforeach
                    </table> 

                    <table class="table table-striped table-sm pt-2">
                        <thead class="thead-dark">
                         <tr>
                         <th scope="col">Coaches</th>
                         <th></th>
                         </tr>
                         </thead>
                         <tbody>
                            @foreach ($team->coaches as $coach)
                                <tr>
                                    <td class="text-center"><a href="{{ route('profile.show', $coach->user->profile->id) }}">{{$coach->user->name}}</a></td>
                                    <td class="text-left">
                                    @if(empty($coach->user->profile->image ))
                                        <img src="/images/blankPhoto.png" alt="Profile Picture" 
                                    width="40px" height="40px" class="rounded-circle"/> 
                                    @else
                                        <img src="{{asset('images/'. $user->profile->image)}}" alt="Profile Picture" 
                                    width="40px" height="40px" class="rounded-circle"/> 

                                    @endif

                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>   
		</div>
		<div class="col-md-2">
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