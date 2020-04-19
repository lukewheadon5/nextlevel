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
	<div class="row">
		<div class="col-md-12">
    <h1 class="text-center">
    <u>{{$team->name}} Members</u>
    </h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
    Club Admin = <a href="{{ route('profile.show', '$team->admins->first()->user->profile->id') }}">{{$team->admins->first()->user->name}}</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
    <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
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
            <td class="text-center">
            <a href="/coach/{{$team->id}}/{{$user->id}}" class="btn btn-secondary" tabindex="-1" role="button" >Add Coach</a>
            </td>
            </tr>
          @endif
          @endif
          @endforeach
    </table> 
		</div>
		<div class="col-md-6">
    <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Coaches</th>
                </tr>
                </thead>
    <tbody>
    @foreach ($team->coaches as $coach)
            <tr>
            <td class="text-center"><a href="{{ route('profile.show', $coach->user->profile->id) }}">{{$coach->user->name}}</a></td>
            </tr>
    @endforeach
    </table>
		</div>
	</div>
</div>







@endsection