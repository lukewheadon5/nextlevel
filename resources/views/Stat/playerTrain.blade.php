@extends('layouts.app')



@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<ul style="list-style-type: none;
  margin: 0;
  padding:0px;
  overflow: hidden;
  background-color: #333;"> 

<li style="float:left; padding-left:5px; padding-top:5px;">
  @if(empty($usertraining->game->team->image ))
    <img src="/images/sportsballs.png" alt="Team Logo" 
        width="40px" height="40px" class="rounded-circle"/>
  @else
    <img src="{{asset('images/'. $usertraining->game->team->image)}}" alt="Team Logo" 
        width="40px" height="40px" class="rounded-circle"/>                    
    @endif
  </li>
  <li style="float:left"><a class="active" href="{{route('team.show' , $usertraining->game->team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Home</a></li>
  <li style="float:left"><a href="{{route('calendar' , $usertraining->game->team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Calendar</a></li>
  <li style="float:left"><a href="{{route('roster' , $usertraining->game->team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Lineup</a></li>
  <li style="float:left"><a href="{{route('playIndex' , $usertraining->game->team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Playbook</a></li>
  <li style="float:left"><a href="{{route('player' , $usertraining->game->team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Video</a></li>
  <li style="float:left"><a href="{{route('stats' , $usertraining->game->team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Statistics</a></li>
  <li style="float:left"><a href="{{route('quizIndex' , $usertraining->game->team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Quizzes</a></li>
</ul>

<div class="container-fluid">

	<div class="row pt-2">
		<div class="col-md-12">
			<h3  class="text-center">
				<u>{{$usertraining->game->team->name}} Vs {{$usertraining->game->opponent}}</u>
			</h3>
      <h3  class="text-center">
				<u>{{$usertraining->user->name}} Training Statistics</u>
			</h3>
      <h3  class="text-center">
      @if(empty($usertraining->user->profile->image ))
          <img src="/images/blankPhoto.png" alt="Profile Picture" 
        width="200px" height="200px" class="rounded-circle"/> 
     @else
          <img src="{{asset('images/'. $usertraining->user->profile->image)}}" alt="Profile Picture" 
        width="200px" height="200px" class="rounded-circle"/> 
     @endif
      <h3>
		</div>
	</div>
	<div class="row pt-1">
		<div class="col-md-12">
        <h4>
				Defensive Statistics 
		</h4>
        <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Tackles</th>
                <th scope="col">Tackles For Loss</th>
                <th scope="col">Sacks</th>
                <th scope="col">Interceptions</th>
                <th scope="col">Pick 6</th>
                <th scope="col">Penalties</th>
                </tr>
                </thead>
        <tbody>
       
            <tr>
            <td>{{$usertraining->tackles}}</td>
            <td>{{$usertraining->tacklesFL}}</td>
            <td>{{$usertraining->sacks}}</td>
            <td>{{$usertraining->interceptions}}</td>
            <td>{{$usertraining->pick6}}</td>
            <td>{{$usertraining->penalties}}</td>
            </tr>
       
    </table> 

		</div>
	</div>

    <div class="row">
		<div class="col-md-12 pt-1">
			<h4>
				Offence Statistics 
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Passing TD's</th>
                <th scope="col">Passing Yards</th>
                <th scope="col">Rushing TD's</th>
                <th scope="col">Rushing Yards</th>
                <th scope="col">Carries</th>
                <th scope="col">Receptions</th>
                <th scope="col">Receiving Yards</th>
                </tr>
                </thead>
        <tbody>
            <tr>
            <td>{{$usertraining->passingTD}}</td>
            <td>{{$usertraining->passingYards}}</td>
            <td>{{$usertraining->RushingTD}}</td>
            <td>{{$usertraining->RushingYards}}</td>
            <td>{{$usertraining->Carries}}</td>
            <td>{{$usertraining->Receptions}}</td>
            <td>{{$usertraining->ReceivingYards}}</td>
            </tr>
    </table> 

		</div>
	</div>
</div>



@endsection
