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
  <li style="float:left"><a href="{{route('stats' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Statistics</a></li>
  <li style="float:left"><a href="{{route('members' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Membership</a></li>
</ul>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center">
				<u>Statistics Hub</u>
			</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<h3>
				Seasons
			</h3>

            <table class="table">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Season</th>
                <th></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($team->seasons as $season)
            <tr>
            <td>{{$season->year}}</td>
            <td><a href="/statistic/team/{{$team->id}}/season/{{$season->id}}" class="btn btn-secondary" tabindex="-1" role="button" >View Season</a></td>
            </tr>
        @endforeach
    </table> 

		</div>
		<div class="col-md-4">
        <a href="/statistic/{{$team->id}}/season/create" class="btn btn-secondary" tabindex="-1" role="button" >Add Season</a>
        <a href="/statistic/{{$team->id}}/game/create" class="btn btn-secondary" tabindex="-1" role="button" >Add Game</a>
		</div>
		<div class="col-md-4">
			<h3>
				Games
			</h3>
            <table class="table">
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
            <td>Vs {{$game->opponent}}</td>
            <td>{{$game->season->year}}</td>
            <td><a href="/statistic/team/{{$team->id}}/game/{{$game->id}}" class="btn btn-secondary" tabindex="-1" role="button" >View Game</a></td>
            </tr>
        @endforeach
    </table>

		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h3>
				Players
			</h3>

            <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Name</th>
            <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($team->users as $user)
            <tr>
            <td>{{$user->name}}</td>
            <td><a href="/statistic/team/{{$team->id}}/career/{{$user->id}}" class="btn btn-secondary" tabindex="-1" role="button" >View Player</a></td>
            </tr>
        @endforeach
    </table>

		</div>
	</div>
</div>


@endsection










