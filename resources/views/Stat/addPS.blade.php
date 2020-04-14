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
  <li style="float:left"><a href="{{route('calendar' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Calendar</a></li>
  <li style="float:left"><a href="{{route('player' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Video</a></li>
  <li style="float:left"><a href="{{route('stats' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Statistics</a></li>
  <li style="float:left"><a href="{{route('members' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Membership</a></li>
</ul>

<div class="container-fluid">
	<div class="row pt-2">
        <div class="col-md-4">
            <h3 class="text-left pl-2 ">
            <a href="/statistic/team/{{$team->id}}/season/{{$season->id}}" tabindex="-1" role="button" ><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i></a>
            </h3>
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
        <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player Name:</th>
                <th></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($season->team->users as $user)
        @if($user->admins()->where('team_id' , $team->id)->exists())

        @else
        @if($user->userseasons()->where('season_id',$season->id)->exists())
        
        @else
            <tr>
            <td>{{$user->name}}</td>
            <td>
            <a href="/statistic/add/{{$team->id}}/season/{{$season->id}}/user/{{$user->id}}" class="btn btn-secondary" tabindex="-1" role="button" >Add Player</a>
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