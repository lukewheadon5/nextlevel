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
		<div class="col-md-12">
			<h3 class="text-center">
				<u>{{$usercareer->user->name}}'s</u>
			</h3>
            <h3 class="text-center">
				<u>{{$usercareer->team->name}} Statistics</u>
        </h3>
      <h3 class="text-center">

      @if(empty($usercareer->user->profile->image ))
          <img src="/images/blankPhoto.png" alt="Profile Picture" 
        width="200px" height="200px" class="rounded-circle"/> 
     @else
          <img src="{{asset('images/'. $usercareer->user->profile->image)}}" alt="Profile Picture" 
        width="200px" height="200px" class="rounded-circle"/> 
     @endif

        </h3>
		</div>
	</div>
  <div class="row pt-1">
  <div class="col-md-12">
            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Goals</th>
                <th scope="col">Assists</th>
                <th scope="col">Shots</th>
                <th scope="col">Shots on Target</th>
                <th scope="col">Passes</th>
                <th scope="col">Dribbles</th>
                <th scope="col">Crosses</th>
                </tr>
                </thead>
        <tbody style="height:50px;">
            <tr>
            <td>{{$usercareer->goals}}</td>
            <td>{{$usercareer->assists}}</td>
            <td>{{$usercareer->shots}}</td>
            <td>{{$usercareer->shotOT}}</td>
            <td>{{$usercareer->passes}}</td>
            <td>{{$usercareer->dribbles}}</td>
            <td>{{$usercareer->crosses}}</td>
            </tr>
    </table> 
		</div>
	</div>
  <div class="row">
		<div class="col-md-12">
            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Tackles</th>
                <th scope="col">Headers Won</th>
                <th scope="col">Clearances</th>
                <th scope="col">Interceptions</th>
                <th scope="col">Saves</th>
                <th scope="col">Fouls</th>
                <th scope="col">Bookings</th>
                </tr>
                </thead>
        <tbody style="height:50px;">
            <tr>
            <td>{{$usercareer->tackles}}</td>
            <td>{{$usercareer->headers}}</td>
            <td>{{$usercareer->clearances}}</td>
            <td>{{$usercareer->interceptions}}</td>
            <td>{{$usercareer->saves}}</td>
            <td>{{$usercareer->penalties}}</td>
            <td>{{$usercareer->bookings}}</td>
            </tr>
    </table> 

		</div>
	</div> 
</div>








@endsection