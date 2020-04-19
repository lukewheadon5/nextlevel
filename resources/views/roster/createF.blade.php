@extends('layouts.app')



@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{ asset('css/table.css') }}" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/3.6.2/fabric.min.js"></script>
<script src="{{ asset('js/menu.js') }}" defer></script>
<script src="{{ asset('js/roster.js') }}" defer></script>

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
	<div class="row pt-2">
		<div class="col-md-12 text-center">
            <h1>
                Create Formation
            </h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
            <label for="name"><b>Formation Name:</b></label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
		</div>
		<div class="col-md-4">
                <label for="season"><b>Season:</b></label>
                <select class="form-control" name="season" id="season">
                    <option value="" selected disabled hidden>Choose here</option>
                    @foreach($team->seasons as $season)
                    <option value='{{ $season->id }}'>{{$season->year}}</option>
                    @endforeach
                </select>
		</div>
		<div class="col-md-4">
                <label for="game"><b>Game:</b></label>
                <select class="form-control" name="game" id="game">
                    <option value="" selected disabled hidden>Choose here</option>
                    <option value=''></option>
                </select>
		</div>
	</div>
	<div class="row pt-3">
		<div class="col-md-2">
        <h3>
            Set Background:
        </h3>
        <div class="pb-2">
        <button class="btn btn-success" onClick="setf()">Football Pitch</button>
        </div>
        <div class="pb-2">
        <button class="btn btn-success" onClick="setaf()">American Football Pitch</button>
        </div>
                
		</div>
		<div class="col-md-8">
            <div class="container" id="wrapper" style="position: relative; width:800px; height:500px; ">
                <canvas id="formationCanvas" style="position: absolute;
                top: 0;
                left: 0;
                z-index: 3;
                width:100%; 
                height:500;
                border:2px solid black; ">
                </canvas>
            </div>
		</div>
		<div class="col-md-2">

                Shirt Colour:
                <br />
                <input type="color" id="color" class="form-control" name="color" value="#ff0000">
                <br />
                <label for="player"><b>Player:</b></label>
                <select class="form-control" name="player" id="player">
                <option value="" selected disabled hidden>Choose here</option>
                @foreach($team->users as $user)
                    @if($team->admins()->where('user_id' , $user->id)->exists())

                    @else
                    @if($team->coaches()->where('user_id' , $user->id)->exists())

                    @else
                    <option value="{{$user->name}}">{{$user->name}}</option>
                    @endif
                    @endif
                    @endforeach
                </select>
                <div class="pt-2">
                <button class="btn btn-secondary" onClick="addPlay()">Add Player</button>
                </div>
		</div>
	</div>
	<div class="row pt-2">
		<div class="col-md-2">
		</div>
		<div class="col-md-4">
            <button  class="btn btn-success" onClick="saveRoster()">Submit</button>
            <a href="{{ route('roster', $team->id) }}" class="btn btn-danger">Cancel</a>
		</div>
		<div class="col-md-4 text-right">
            <button  class="btn btn-secondary" onClick="clearC()">Clear</button>
            <button class="btn btn-secondary" onClick="undo()">Undo</button>
		</div>
		<div class="col-md-2">
		</div>
	</div>
</div>


<script>
var team = <?php echo json_encode($team->id); ?>;

function updateGame(season_id){

$.ajax({
    url: '/statistic/games/get/'+season_id,
    method: 'GET',
    success: function(data) {
        $('#game').html(data.html);
    }
});
}

function undo(){
    var end = canvas._objects[canvas._objects.length-1];
    canvas.remove(end);

}

function clearC(){
    console.log("called");
    canvas.clear();
    canvas.renderAll();
}


function saveRoster(){
    var name = document.getElementById("name").value;
    var game = document.getElementById("game").value;
    canvas.forEachObject(function(o) {
    o.selectable = false;
    });
    var json = JSON.stringify( canvas.toJSON() );
    $.ajax({
      type: 'POST',
      url: '/store/roster',
      data: {"_token": "{{ csrf_token() }}", 
            'team_id': team,
            'game_id': game,
            'name': name,
            'canvas': json,
          },
          success: function(data){
            window.location = "{{route('roster' , $team->id)}}";
          },error:function(data){ 
             console.log(data);
             alert("Something went wrong.");
          }
    });
}

</script>

@endsection