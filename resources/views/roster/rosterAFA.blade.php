@extends('layouts.app')



@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <div class="col-md-2">
        <a href="{{ route('rosterCreate', $team->id) }}" class="btn btn-secondary" tabindex="-1" role="button" >Add Formation</a>
        </div>
		<div class="col-md-8 text-center">
            <h1>
            Team Lineups and Formations
            </h1>
		</div>

        <div class="col-md-2">
        <a href="{{ route('lineupCreate', $team->id) }}" class="btn btn-secondary" tabindex="-1" role="button" >Create Lineup</a>
        </div>
	</div>
	<div class="row pt-4">
		<div class="col-md-1">
		</div>
		<div class="col-md-4">

        <table class="table table-striped table-sm">
                <thead class="thead-dark text-center">
                <tr>
                <th scope="col">Formation</th>
                <th scope="col">Game</th>
                <th scope="col">Season</th>
                <th></th>
                </tr>
                </thead>
        <tbody>
          @foreach($team->rosters as $roster)
            <tr>
            <td class="text-center">{{$roster->name}}</td>
            <td class="text-center">{{$roster->game->opponent}}</td>
            <td class="text-center">{{$roster->game->season->year}}</td>
            <td>
            <a href="{{route('rosterShow' , $roster->id)}}" class="btn btn-secondary" tabindex="-1" role="button" >View</a>
            </td>
            </tr>
                    
          @endforeach
        </tbody>
    </table> 
        

		</div>
		<div class="col-md-2">
		</div>
		<div class="col-md-4">
      <h3>
      Offence
      </h3>
      <table class="table table-striped table-sm">
               <thead class="thead-dark text-center">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Position</th>
                </tr>
                </thead>
        <tbody>
        @foreach($team->lineup->positions as $position)
          @if($position->type == "offence")
              <tr>
              <td class="text-center">{{$position->pName}}</td>
              <td class="text-center">{{$position->position}}</td>
              </tr>
            @endif
        @endforeach
      </table> 

      <h3>
      Offence
      </h3>
      <table class="table table-striped table-sm">
                <thead class="thead-dark text-center">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Position</th>
                </tr>
                </thead>
        <tbody>
        @foreach($team->lineup->positions as $position)
          @if($position->type == "defence")
              <tr>
              <td class="text-center">{{$position->pName}}</td>
              <td class="text-center">{{$position->position}}</td>
              </tr>
            @endif
        @endforeach
      </table> 
		</div>
		<div class="col-md-1">
		</div>
	</div>
</div>
@endsection