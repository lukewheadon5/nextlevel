@extends('layouts.app')



@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/tHighlight.js') }}" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{ asset('css/video2.css') }}" rel="stylesheet">


<div class="container-fluid">

	<div class="row pt-2">
		<div class="col-md-12">
			<h3  class="text-center">
				<u>{{$usergame->game->team->name}} Vs {{$usergame->game->opponent}}</u>
			</h3>
      <h3  class="text-center">
				<u>{{$usergame->user->name}}'s Statistics</u>
			</h3>
      <h3  class="text-center">
      @if(empty($usergame->user->profile->image ))
          <img src="/images/blankPhoto.png" alt="Profile Picture" 
        width="200px" height="200px" class="rounded-circle"/> 
     @else
          <img src="{{asset('images/'. $usergame->user->profile->image)}}" alt="Profile Picture" 
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
        <table class="table">
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
            <td>{{$usergame->tackles}}</td>
            <td>{{$usergame->tacklesFL}}</td>
            <td>{{$usergame->sacks}}</td>
            <td>{{$usergame->interceptions}}</td>
            <td>{{$usergame->pick6}}</td>
            <td>{{$usergame->penalties}}</td>
            </tr>
       
    </table> 

		</div>
	</div>

    <div class="row">
		<div class="col-md-12 pt-1">
			<h4>
				Offence Statistics 
			</h4>

            <table class="table">
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
            <td>{{$usergame->passingTD}}</td>
            <td>{{$usergame->passingYards}}</td>
            <td>{{$usergame->RushingTD}}</td>
            <td>{{$usergame->RushingYards}}</td>
            <td>{{$usergame->Carries}}</td>
            <td>{{$usergame->Receptions}}</td>
            <td>{{$usergame->ReceivingYards}}</td>
            </tr>
    </table> 

		</div>
	</div>
</div>



@endsection
