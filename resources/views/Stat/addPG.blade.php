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

        <div class="col-md-4">
            <h2 class="text-left pl-1 pt-1">
            <a href="/statistic/team/{{$team->id}}/game/{{$game->id}}" class="btn btn-secondary" tabindex="-1" role="button" >Back</a>
            </h2>
        </div>
		<div class="col-md-4">
			<h2 class="text-center">
            <u>Players</u>
            </h2>
        </div>
        <div class="col-md-4">
		</div>
    </div>

    <div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
        <table class="table">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player Name:</th>
                <th></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->team->users as $user)
        @if($user->admins()->where('team_id' , $team->id)->exists())

        @else
        @if($user->usergames()->where('game_id',$game->id)->exists())
        
        @else
            <tr>
            <td>{{$user->name}}</td>
            <td>
            <a href="/statistic/add/{{$team->id}}/game/{{$game->id}}/user/{{$user->id}}" class="btn btn-secondary" tabindex="-1" role="button" >Add Player</a>
            </td>
            </tr>
        @endif
        @endif
        @endforeach
    </table> 


		</div>
		<div class="col-md-4">
		</div>
	</div>


</div>

@endsection