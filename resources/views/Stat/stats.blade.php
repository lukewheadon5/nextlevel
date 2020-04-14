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
  <li style="float:left"><a href="#news" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  News</a></li>
  <li style="float:left"><a href="{{route('player' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Video</a></li>
  <li style="float:left"><a href="{{route('stats' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Statistics</a></li>
</ul>

<div class="container-fluid">
	<div class="row pt-2">
		<div class="col-md-12">
			<h3 class="text-center">
				<u>{{$team->name}} Statistics Hub</u>
			</h3>
		</div>
	</div>
	<div class="row pt-1">
		<div class="col-md-4">
			<h3>
				Seasons 
			</h3>

            <table class="table table-striped table-sm pt-1">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Season</th> 
                <th></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($team->seasons as $season)
            <tr>
            <td class="text-center">{{$season->year}}</td>
            <td class="text-center"><a href="/statistic/team/{{$team->id}}/season/{{$season->id}}" class="btn btn-secondary" tabindex="-1" role="button" >View</a></td>
            </tr>
        @endforeach
    </table> 

		</div>
		<div class="col-md-4">
        <h3>
        Player Careers
        </h3>
        <table class="table table-striped table-sm">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Name</th>
            <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($team->usercareers as $usercareer)
        @if($usercareer->user->admins()->where('team_id' , $team->id)->exists())
        @else
            <tr>
            <td class="text-center">{{$usercareer->user->name}}</td>
            <td class="text-center"><a href="/statistic/career/{{$usercareer->id}}/user/{{$usercareer->user->id}}" class="btn btn-secondary" tabindex="-1" role="button" >View</a></td>
            </tr>
        @endif
        @endforeach
    </table>
		</div>
		<div class="col-md-4">
			<h3>
				Games 
			</h3>
            <table class="table table-striped table-sm">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Game</th>
            <th scope="col">Season</th>
            <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($team->games as $game)
            <tr>
            <td class="text-center">Vs {{$game->opponent}}</td>
            <td class="text-center">{{$game->season->year}}</td>
            <td class="text-center"><a href="/statistic/team/{{$team->id}}/game/{{$game->id}}" class="btn btn-secondary" tabindex="-1" role="button" >View</a></td>
            </tr>
        @endforeach
    </table>

		</div>
	</div>
	
</div>


@endsection











