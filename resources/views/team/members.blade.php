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
  <li style="float:left"><a href="#stats" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Statistics</a></li>
  <li style="float:left"><a href="{{route('members' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Membership</a></li>
</ul>
<div class="container emp-profile">
                <div class="row">
                    <div class="col-md-3 pl-5">
<h2>Members:</h2>
@foreach ($team->users as $team1)
<div>
<a href="{{ route('profile.show', $team1->profile()->value('id')) }}">{{$team1->name}}</a> 
<a href="/coach/{{$team->id}}/{{$team1->id}}" class="btn btn-secondary" tabindex="-1" role="button" >Add Coach</a>
</div>
@endforeach
<h2>admins:</h2>
@foreach ($team->admins as $admin)
<div>
<a href="{{ route('profile.show', $admin->user->profile()->value('id')) }}">{{$admin->user->name}}</a>
</div>
@endforeach
<h2>coaches:</h2>
@foreach ($team->coaches as $coach)
<div>
<a href="{{ route('profile.show', $coach->user->profile()->value('id')) }}">{{$coach->user->name}}</a>
</div>
@endforeach
</div>
</div>
</div>





@endsection