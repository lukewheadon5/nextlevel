@extends('layouts.app')



@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/3.6.2/fabric.min.js"></script>
<script src="{{ asset('js/rosterView.js') }}" defer></script>

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
  Roster</a></li>
  <li style="float:left"><a href="{{route('player' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Video</a></li>
  <li style="float:left"><a href="{{route('stats' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Statistics</a></li>
</ul>


<div class="container-fluid">
	<div class="row pt-3">
		<div class="col-md-2">
        <h2>
        <a href="{{route('roster' , $team->id)}}" tabindex="-1" role="button" ><i class="fa fa-arrow-circle-o-left" style="color:#000000" aria-hidden="true"></i></a>
		</h2>
        </div>
		<div class="col-md-8">
        <h1>
        {{$roster->team->name}} {{$roster->name}} for {{$roster->game->opponent}}

        </h1>
		</div>
		<div class="col-md-2">
		</div>
	</div>
	<div class="row pt-3">
		<div class="col-md-2">
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
        
		</div>
	</div>
</div>

<script>

var json = <?php echo json_encode($roster->canvas); ?>;


</script>

@endsection