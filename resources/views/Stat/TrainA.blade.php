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

  <li style="float:left"><a class="active" href="{{route('team.show' , $game->team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Home</a></li>
  <li style="float:left"><a href="#news" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  News</a></li>
  <li style="float:left"><a href="{{route('player' ,  $game->team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Video</a></li>
  <li style="float:left"><a href="{{route('stats' ,  $game->team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Statistics</a></li>
  <li style="float:left"><a href="{{route('members' ,  $game->team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Membership</a></li>
</ul>

<div class="container-fluid">

	<div class="row pt-2">
		<div class="col-md-12">
        <a href="" class="btn btn-secondary pr-2" tabindex="-1" role="button" >Update Stats</a>
			<h3  class="text-center">
				<u>{{$game->team->name}} Vs {{$game->opponent}}</u>
			</h3>
      <h3  class="text-center">
				<u> Training Statistics</u>
			</h3>
      <h3  class="text-center">
      @if(empty($game->team->image ))
          <img src="/images/sportsballs.png" alt="Profile Picture" 
        width="200px" height="200px" class="rounded-circle"/> 
     @else
          <img src="{{asset('images/'. $usertraining->user->profile->image)}}" alt="Profile Picture" 
        width="200px" height="200px" class="rounded-circle"/> 
     @endif
      <h3>
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
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}">{{$ust->user->name}}</a></td>
            <td>{{$ust->passingYards}}</td>
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
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}">{{$ust->user->name}}</a></td>
            <td>{{$ust->passingTD}}</td>
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
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}">{{$ust->user->name}}</a></td>
            <td>{{$ust->RushingYards}}</td>
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
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}">{{$ust->user->name}}</a></td>
            <td>{{$ust->RushingTD}}</td>
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
            @foreach ($game->usertrainings as $ust)
                <tr>
                <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}">{{$ust->user->name}}</a></td>
                <td>{{$ust->Carries}}</td>
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
            @foreach ($game->usertrainings as $ust)
                <tr>
                <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}">{{$ust->user->name}}</a></td>
                <td>{{$ust->Receptions}}</td>
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
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}">{{$ust->user->name}}</a></td>
            <td>{{$ust->ReceivingYards}}</td>
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
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}">{{$ust->user->name}}</a></td>
            <td>{{$ust->tackles}}</td>
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
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}">{{$ust->user->name}}</a></td>
            <td>{{$ust->tacklesFL}}</td>
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
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}">{{$ust->user->name}}</a></td>
            <td>{{$ust->sacks}}</td>
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
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}">{{$ust->user->name}}</a></td>
            <td>{{$ust->interceptions}}</td>
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
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}">{{$ust->user->name}}</a></td>
            <td>{{$ust->pick6}}</td>
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
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}">{{$ust->user->name}}</a></td>
            <td>{{$ust->penalties}}</td>
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
