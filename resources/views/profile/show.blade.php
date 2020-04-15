@extends('layouts.app')

@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/tHighlight.js') }}" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{ asset('css/video2.css') }}" rel="stylesheet">


<div class="container-fluid">
	<div class="row pt-3 ">
		<div class="col-md-3 text-center">
            @if(empty($user->profile->image ))
                <img src="/images/blankPhoto.png" alt="Profile Picture" 
                width="200px" height="200px" class="rounded-circle"/> 
            @else
                <img src="{{asset('images/'. $user->profile->image)}}" alt="Profile Picture" 
                width="200px" height="200px" class="rounded-circle"/> 
                        
            @endif
		</div>

		<div class="col-md-7">
			<div class="row pt-5">
				<div class="col-md-12">
                    <h1>
                        {{$user->name}}
                    </h1>
                    <h6>
                        Teams: 
                        @foreach ($teams as $team)
                        <a href="{{ route('team.show', $team->id) }}">{{$team->name}} </a> 
                        @endforeach
                    </h6>
				</div>
			</div>
		</div>

		<div class="col-md-2 pr-3">
        <a href="{{ route('profile.edit', $user->profile->id) }}" class="profile-edit-btn" role="button">Edit Profile</a>
		</div>
	</div>


	<div class="row">
		<div class="col-md-3  text-center pt-5">
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
		<div class="col-md-7">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="highlight-tab" data-toggle="tab" href="#highlight" role="tab" aria-controls="highlight" aria-selected="false">Highlights</a>
                </li>
            </ul>

            <div class="tab-content about-tab pt-5 pl-3" id="myTabContent">
                <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Date of Birth:</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ \Carbon\Carbon::parse($user->profile->dob)->format('d /M /Y')}}</p>
                        </div>
                    </div>
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
                <div class="tab-pane fade" id="highlight" role="tabpanel" aria-labelledby="highlight-tab">
                    @foreach ($user->highlights as $highlight)
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

		<div class="col-md-2">
		</div>


	</div>
</div>

<script>
var high = <?php echo json_encode($user->highlights); ?>;
var pro = <?php echo json_encode($user->profile->id); ?>;

function del(id){
  $.ajax({
    type: 'POST', 
        url: '/highlight/delete',
        data: {"_token": "{{ csrf_token() }}", "id":id},
        success: function (data) {
            alert("Successfully deleted highlight")
            window.location = '/profile/'+pro;
        },
        error:function(data){ 
           console.log(data);
           alert("Something went wrong.");
        }
        
});
}
</script>


@endsection

