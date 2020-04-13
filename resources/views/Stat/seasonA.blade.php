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
		<div class="col-md-4 pt-1">
        <h3 class="text-center">
        @if(empty($team->image ))
                <img src="/images/sportsballs.png" alt="Team Logo" 
                width="200px" height="200px" class="rounded-circle"/>
            @else
                <img src="{{asset('images/'. $team->image)}}" alt="Team Logo" 
                width="200px" height="200px" class="rounded-circle"/>         
            @endif
        </h3>
		</div>
		<div class="col-md-4">
        <h3 class="text-right">
        <a href="/statistic/add/{{$team->id}}/season/{{$season->id}}" class="btn btn-secondary pr-2" tabindex="-1" role="button" >Add players</a>
		</h3>	
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
            <td>{{$season->passingTD}}</td>
            <td>{{$season->passingYards}}</td>
            <td>{{$season->RushingTD}}</td>
            <td>{{$season->RushingYards}}</td>
            <td>{{$season->Carries}}</td>
            <td>{{$season->Receptions}}</td>
            <td>{{$season->ReceivingYards}}</td>
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
                <th scope="col">Allowed Passing Yards</th>
                <th scope="col">Allowed Rushing TD's</th>
                <th scope="col">Allowed Rushing Yards</th>
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
            <td>{{$season->allowedPassTD}}</td>
            <td>{{$season->allowedPassYards}}</td>
            <td>{{$season->allowedRunTD}}</td>
            <td>{{$season->allowedRunYards}}</td>
            <td>{{$season->tackles}}</td>
            <td>{{$season->tacklesFL}}</td>
            <td>{{$season->sacks}}</td>
            <td>{{$season->interceptions}}</td>
            <td>{{$season->pick6}}</td>
            <td>{{$season->penalties}}</td>
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
				Passing Yards <button> <i class="fa fa-sort" onclick="sortTable(0)" title="sort"></i></button>
			</h4>
            <table class="table" id="myTable0">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Yards</th>
                </tr>
                </thead>
        <tbody>
        @foreach ($season->userseasons as $usses)
            <tr>
            <td><a href="/statistic/season/{{$usses->id}}/user/{{$usses->user_id}}">{{$usses->user->name}}</a></td>
            <td>{{$usses->passingYards}}</td>
            </tr>
        @endforeach
    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Passing TDs <button> <i class="fa fa-sort" onclick="sortTable(1)" title="sort"></i></button></p>
			</h4>

            <table class="table" id="myTable1">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">TDs</th>
                </tr>
                </thead>
        <tbody>
        @foreach ($season->userseasons as $usses)
            <tr>
            <td><a href="/statistic/season/{{$usses->id}}/user/{{$usses->user_id}}">{{$usses->user->name}}</a></td>
            <td>{{$usses->passingTD}}</td>
            </tr>
        @endforeach
    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Rushing Yards <button> <i class="fa fa-sort" onclick="sortTable(2)" title="sort"></i></button></p>
			</h4>

            <table class="table" id="myTable2">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Yards</th>
                </tr>
                </thead>
        <tbody>
        @foreach ($season->userseasons as $usses)
            <tr>
            <td><a href="/statistic/season/{{$usses->id}}/user/{{$usses->user_id}}">{{$usses->user->name}}</a></td>
            <td>{{$usses->RushingYards}}</td>
            </tr>
        @endforeach
    </table> 

		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<h4>
				Rushing TDs <button> <i class="fa fa-sort" onclick="sortTable(3)" title="sort"></i></button></p>
			</h4>

            <table class="table" id="myTable3">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">TDs</th>
                </tr>
                </thead>
        <tbody>
        @foreach ($season->userseasons as $usses)
            <tr>
            <td><a href="/statistic/season/{{$usses->id}}/user/{{$usses->user_id}}">{{$usses->user->name}}</a></td>
            <td>{{$usses->RushingTD}}</td>
            </tr>
        @endforeach
    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Carries <button> <i class="fa fa-sort" onclick="sortTable(4)" title="sort"></i></button></p>
			</h4>

            <table class="table" id="myTable4">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Carries</th>
                </tr>
                </thead>
            <tbody>
            @foreach ($season->userseasons as $usses)
                <tr>
                <td><a href="/statistic/season/{{$usses->id}}/user/{{$usses->user_id}}">{{$usses->user->name}}</a></td>
                <td>{{$usses->Carries}}</td>
                </tr>
            @endforeach
            </table> 

		</div>
		<div class="col-md-4">
            <h4>
				Receptions <button> <i class="fa fa-sort" onclick="sortTable(5)" title="sort"></i></button></p>
			</h4>

            <table class="table" id="myTable5">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Receptions</th>
                </tr>
                </thead>
                <tbody>
            @foreach ($season->userseasons as $usses)
                <tr>
                <td><a href="/statistic/season/{{$usses->id}}/user/{{$usses->user_id}}">{{$usses->user->name}}</a></td>
                <td>{{$usses->Receptions}}</td>
                </tr>
            @endforeach
            </table> 

	    </div>
	</div>
	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
        <h4>
				Receiving Yards <button> <i class="fa fa-sort" onclick="sortTable(6)" title="sort"></i></button></p>
			</h4>

            <table class="table" id="myTable6">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Yards</th>
                </tr>
                </thead>
        <tbody>
        @foreach ($season->userseasons as $usses)
            <tr>
            <td><a href="/statistic/season/{{$usses->id}}/user/{{$usses->user_id}}">{{$usses->user->name}}</a></td>
            <td>{{$usses->ReceivingYards}}</td>
            </tr>
        @endforeach
        </table>
		</div>
		<div class="col-md-4">
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
				Tackles <button> <i class="fa fa-sort" onclick="sortTable(7)" title="sort"></i></button>
			</h4>
            
            <table class="table" id="myTable7">
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
				Tackle-for-loss <button> <i class="fa fa-sort" onclick="sortTable(8)" title="sort"></i></button></p>
			</h4>

            <table class="table" id="myTable8">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">TFL</th>
                </tr>
                </thead>
        <tbody>
        @foreach ($season->userseasons as $usses)
            <tr>
            <td><a href="/statistic/season/{{$usses->id}}/user/{{$usses->user_id}}">{{$usses->user->name}}</a></td>
            <td>{{$usses->tacklesFL}}</td>
            </tr>
        @endforeach

    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Sacks <button> <i class="fa fa-sort" onclick="sortTable(9)" title="sort"></i></button></p>
			</h4>

            <table class="table" id="myTable9">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Sacks</th>
                </tr>
                </thead>
        <tbody>
        @foreach ($season->userseasons as $usses)
            <tr>
            <td><a href="/statistic/season/{{$usses->id}}/user/{{$usses->user_id}}">{{$usses->user->name}}</a></td>
            <td>{{$usses->sacks}}</td>
            </tr>
        @endforeach
    </table> 
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<h4>
				Interceptions <button> <i class="fa fa-sort" onclick="sortTable(10)" title="sort"></i></button></p>
			</h4>

            <table class="table" id="myTable10">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Interceptions</th>
                </tr>
                </thead>
        <tbody>
        @foreach ($season->userseasons as $usses)
            <tr>
            <td><a href="/statistic/season/{{$usses->id}}/user/{{$usses->user_id}}">{{$usses->user->name}}</a></td>
            <td>{{$usses->interceptions}}</td>
            </tr>
        @endforeach
    </table> 


		</div>
		<div class="col-md-4">
			<h4>
				Pick 6's <button> <i class="fa fa-sort" onclick="sortTable(11)" title="sort"></i></button></p>
			</h4>

            <table class="table" id="myTable11">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Pick 6's</th>
                </tr>
                </thead>
        <tbody>
        @foreach ($season->userseasons as $usses)
            <tr>
            <td><a href="/statistic/season/{{$usses->id}}/user/{{$usses->user_id}}">{{$usses->user->name}}</a></td>
            <td>{{$usses->pick6}}</td>
            </tr>
        @endforeach
    </table> 
		</div>

		<div class="col-md-4">
			<h4>
				Penalties <button> <i class="fa fa-sort" onclick="sortTable(12)" title="sort"></i></button></p>
			</h4>

            <table class="table" id="myTable12">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th>
                <th scope="col">Penalties</th>
                </tr>
                </thead>
        <tbody>
        @foreach ($season->userseasons as $usses)
            <tr>
            <td><a href="/statistic/season/{{$usses->id}}/user/{{$usses->user_id}}">{{$usses->user->name}}</a></td>
            <td>{{$usses->penalties}}</td>
            </tr>
        @endforeach
    </table> 
		</div>
	</div>
</div>

<script>

function sortTable(num) {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable"+num);
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[1];
      y = rows[i + 1].getElementsByTagName("TD")[1];
      console.log(x.innerHTML);
      console.log(y.innerHTML);
      //check if the two rows should switch place:
      if (Number(x.innerHTML) < Number(y.innerHTML)) {
        //if so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }

}
</script>

@endsection