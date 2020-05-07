@extends('layouts.app')



@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/tHighlight.js') }}" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{ asset('css/video2.css') }}" rel="stylesheet">
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
  <li style="float:left"><a href="{{route('playIndex' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Playbook</a></li>
  <li style="float:left"><a href="{{route('player' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Video</a></li>
  <li style="float:left"><a href="{{route('stats' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Statistics</a></li>
  <li style="float:left"><a href="{{route('quizIndex' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Quizzes</a></li>
  <li style="float:left"><a href="{{route('members' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Membership</a></li>
</ul>


<div class="container-fluid">
	<div class="row pt-3">
		<div class="col-md-2">
    </div>
    <div class="col-md-4">
    <h1 class="text-left">
    Playbook 
    </h1>
    </div>
    <div class="col-md-4 text-right pl-1">
    <a href="{{ route('playCreate', $team->id) }}" class="btn btn-secondary" tabindex="-1" role="button" >Create Play</a>
      
    </div>
    <div class="col-md-2">
    </div>
  </div>
  
  
	<div class="row">
		<div class="col-md-2">
		</div>
    <div class="col-md-8">
      
      <table class="table table-sm table-striped text-center" id="myTable">
        <thead class="thead-dark">
          <tr>
          <th scope="col">Play Name</th>
          <th></th>
          <th></th>
        </tr>
        </thead>
        <tbody>
          @foreach ($team->plays as $play)
            <tr>
            <td>{{$play->name}}</td>
            <td><a href="{{ route('playShow', $play->id) }}" class="btn btn-secondary" tabindex="-1" role="button" >View Play</a></td>
            </tr>
          @endforeach
      </table>   
    </div>
    <div class="col-md-2">
    </div>
	</div>
  <div class="row">
		<div class="col-md-4">
    </div>
    <div class="col-md-4">
      
    </div>
      <div class="col-md-4">
      </div>
    </div>
  </div>
</div>

@endsection