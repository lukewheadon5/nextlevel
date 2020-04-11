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
				<u>{{$season->year}} Season Statistics</u>
			</h3>
		</div>
	</div>
    <div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
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
        @foreach ($season->games as $game)
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
			<h4>
				Offence Statistics 
			</h4>

            <table class="table">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Passing TD's</th>
                <th scope="col">Rushing TD's</th>
                <th scope="col">Passing Yards</th>
                <th scope="col">Rushing Yards</th>
                <th scope="col">Receptions</th>
                <th scope="col">Carries</th>
                </tr>
                </thead>
        <tbody>
            <tr>
            <td>result</td>
            <td>result</td>
            <td>result</td>
            <td>result</td>
            <td>result</td>
            <td>result</td>
            </tr>
    </table> 

		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h4>
				Defence Statistics
			</h4>

            <table class="table">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Allowed Passing TD's</th>
                <th scope="col">Allowed Rushing TD's</th>
                <th scope="col">Allowed Passing Yards</th>
                <th scope="col">Allowed Rushing Yards</th>
                <th scope="col">Tackles</th>
                <th scope="col">Interceptions</th>
                </tr>
                </thead>
        <tbody>
       
            <tr>
            <td>result</td>
            <td>result</td>
            <td>result</td>
            <td>result</td>
            <td>{{$season->tackles}}</td>
            <td>result</td>
            </tr>
       
    </table> 

		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<h4>
				<u>Offensive Player Statistics</u>
			</h4>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<h4>
				Passing Yards
			</h4>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Yards</th>
                </tr>
                </thead>
        <tbody>
        @foreach ($season->userseasons as $usses)
            <tr>
            <td>result</td>
            <td>result</td>
            </tr>
        @endforeach
    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Passing TDs
			</h4>

            <table class="table">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">TDs</th>
                </tr>
                </thead>
        <tbody>
        @foreach ($season->userseasons as $usses)
            <tr>
            <td>result</td>
            <td>result</td>
            </tr>
        @endforeach
    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Running Yards
			</h4>

            <table class="table">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Yards</th>
                </tr>
                </thead>
        <tbody>
        @foreach ($season->userseasons as $usses)
            <tr>
            <td>result</td>
            <td>result</td>
            </tr>
        @endforeach
    </table> 

		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<h4>
				Running TDs
			</h4>

            <table class="table">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">TDs</th>
                </tr>
                </thead>
        <tbody>
        @foreach ($season->userseasons as $usses)
            <tr>
            <td>result</td>
            <td>result</td>
            </tr>
        @endforeach
    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Catches
			</h4>

            <table class="table">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Catches</th>
                </tr>
                </thead>
        <tbody>
        @foreach ($season->userseasons as $usses)
            <tr>
            <td>result</td>
            <td>result</td>
            </tr>
        @endforeach
    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Receiving Yards
			</h4>

            <table class="table">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Yards</th>
                </tr>
                </thead>
        <tbody>
        @foreach ($season->userseasons as $usses)
            <tr>
            <td>result</td>
            <td>result</td>
            </tr>
        @endforeach
    </table> 

		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h4>
				<u>Defensive Player Statistics</u>
			</h4>
            
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<h4>
				Tackles
			</h4>
            
            <table class="table">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Tackles</th>
                </tr>
                </thead>
        <tbody>
        @foreach ($season->userseasons as $usses)
            <tr>
            <td><a href="/statistic/season/{{$usses->id}}/user/{{$usses->user_id}}">{{$usses->user->name}}</a></td>
            <td>{{$usses->tackles}}</td>
            </tr>
        @endforeach
    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Tackle-for-loss
			</h4>

            <table class="table">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">TFL</th>
                </tr>
                </thead>
        <tbody>
        @foreach ($season->userseasons as $usses)
            <tr>
            <td>{{$usses->user->name}}</td>
            <td>result</td>
            </tr>
        @endforeach

    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Sacks
			</h4>

            <table class="table">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Sacks</th>
                </tr>
                </thead>
        <tbody>
        @foreach ($season->userseasons as $usses)
            <tr>
            <td>{{$usses->user->name}}</td>
            <td>result</td>
            </tr>
        @endforeach
    </table> 
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<h4>
				Interceptions
			</h4>

            <table class="table">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Interceptions</th>
                </tr>
                </thead>
        <tbody>
        @foreach ($season->userseasons as $usses)
            <tr>
            <td>{{$usses->user->name}}</td>
            <td>result</td>
            </tr>
        @endforeach
    </table> 


		</div>
		<div class="col-md-4">
			<h4>
				Pick 6's
			</h4>

            <table class="table">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Pick 6's</th>
                </tr>
                </thead>
        <tbody>
        @foreach ($season->userseasons as $usses)
            <tr>
            <td>{{$usses->user->name}}</td>
            <td>result</td>
            </tr>
        @endforeach
    </table> 
		</div>

		<div class="col-md-4">
			<h4>
				Penalties
			</h4>

            <table class="table">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Penalties</th>
                </tr>
                </thead>
        <tbody>
        @foreach ($season->userseasons as $usses)
            <tr>
            <td>{{$usses->user->name}}</td>
            <td>result</td>
            </tr>
        @endforeach
    </table> 
		</div>
	</div>
</div>

@endsection
