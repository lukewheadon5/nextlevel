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
  <li style="float:left"><a class="active" href="{{route('team.show' , $game->team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Home</a></li>
  <li style="float:left"><a href="{{route('calendar' , $game->team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Calendar</a></li>
  <li style="float:left"><a href="{{route('roster' , $game->team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Lineup</a></li>
  <li style="float:left"><a href="{{route('playIndex' , $game->team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Playbook</a></li>
  <li style="float:left"><a href="{{route('player' , $game->team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Video</a></li>
  <li style="float:left"><a href="{{route('stats' , $game->team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Statistics</a></li>
  <li style="float:left"><a href="{{route('quizIndex' , $game->team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Quizzes</a></li>
</ul>

<div class="container-fluid">

	<div class="row pt-2">
        <div class="col-md-4 text-left pl-2">
        <h3 class="text-left pl-2">
            <a href="/statistic/team/{{$team->id}}/game/{{$game->id}}"  tabindex="-1" role="button" ><i class="fa fa-arrow-circle-o-left" style="color:#000000" aria-hidden="true"></i></a>
        </h3>
        </div>
		<div class="col-md-4">
			<h3  class="text-center">
				<u>{{$game->team->name}} Vs {{$game->opponent}} Training Statistics</u>
			</h3>
		</div>
        <div class="col-md-4">
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
            <table class="table table-striped table-sm" id="myTable0">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player <i class="fa fa-sort" onclick="sortTable2(0)" title="sort"></i></th>
                <th scope="col">Yards <i class="fa fa-sort" onclick="sortTable(0)" title="sort"></i></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
            <td>{{$ust->passingYards}}</td>
            </tr>
        @endforeach
    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Passing TDs 
			</h4>

            <table class="table table-striped table-sm" id="myTable1">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player <i class="fa fa-sort" onclick="sortTable2(1)" title="sort"></i></th>
                <th scope="col">TDs <i class="fa fa-sort" onclick="sortTable(1)" title="sort"></i></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
            <td>{{$ust->passingTD}}</td>
            </tr>
        @endforeach
    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Rushing Yards
			</h4>

            <table class="table table-striped table-sm" id="myTable2">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player <i class="fa fa-sort" onclick="sortTable2(2)" title="sort"></i></th>
                <th scope="col">Yards <i class="fa fa-sort" onclick="sortTable(2)" title="sort"></i></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
            <td>{{$ust->RushingYards}}</td>
            </tr>
        @endforeach
    </table> 

		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<h4>
				Rushing TDs 
			</h4>

            <table class="table table-striped table-sm" id="myTable3">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player <i class="fa fa-sort" onclick="sortTable2(3)" title="sort"></i></th>
                <th scope="col">TDs <i class="fa fa-sort" onclick="sortTable(3)" title="sort"></i></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
            <td>{{$ust->RushingTD}}</td>
            </tr>
        @endforeach
    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Carries 
			</h4>

            <table class="table table-striped table-sm" id="myTable4">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player <i class="fa fa-sort" onclick="sortTable2(4)" title="sort"></i></th>
                <th scope="col">Carries <i class="fa fa-sort" onclick="sortTable(4)" title="sort"></i></th>
                </tr>
                </thead>
            <tbody>
            @foreach ($game->usertrainings as $ust)
                <tr>
                <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
                <td>{{$ust->Carries}}</td>
                </tr>
            @endforeach
            </table> 

		</div>
		<div class="col-md-4">
            <h4>
				Receptions 
			</h4>

            <table class="table table-striped table-sm" id="myTable5">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player <i class="fa fa-sort" onclick="sortTable2(5)" title="sort"></i></th>
                <th scope="col">Receptions <i class="fa fa-sort" onclick="sortTable(5)" title="sort"></i></th>
                </tr>
                </thead>
                <tbody>
            @foreach ($game->usertrainings as $ust)
                <tr>
                <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
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
				Receiving Yards 
			</h4>

            <table class="table table-striped table-sm" id="myTable6">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player <i class="fa fa-sort" onclick="sortTable2(6)" title="sort"></i></th>
                <th scope="col">Yards <i class="fa fa-sort" onclick="sortTable(6)" title="sort"></i></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
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
				Tackles 
			</h4>
            
            <table class="table table-striped table-sm" id="myTable7">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player <i class="fa fa-sort" onclick="sortTable2(7)" title="sort"></i></th>
                <th scope="col">Tackles <i class="fa fa-sort" onclick="sortTable(7)" title="sort"></i></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
            <td>{{$ust->tackles}}</td>
            </tr>
        @endforeach
    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Tackle-for-loss 
			</h4>

            <table class="table table-striped table-sm" id="myTable8">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player <i class="fa fa-sort" onclick="sortTable2(8)" title="sort"></i></th>
                <th scope="col">TFL <i class="fa fa-sort" onclick="sortTable(8)" title="sort"></i></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
            <td>{{$ust->tacklesFL}}</td>
            </tr>
        @endforeach

    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Sacks 
			</h4>

            <table class="table table-striped table-sm" id="myTable9">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player <i class="fa fa-sort" onclick="sortTable2(9)" title="sort"></i></th>
                <th scope="col">Sacks <i class="fa fa-sort" onclick="sortTable(9)" title="sort"></i></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
            <td>{{$ust->sacks}}</td>
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

            <table class="table table-striped table-sm" id="myTable10">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player <i class="fa fa-sort" onclick="sortTable2(10)" title="sort"></i></th>
                <th scope="col">Interceptions <i class="fa fa-sort" onclick="sortTable(10)" title="sort"></i></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
            <td>{{$ust->interceptions}}</td>
            </tr>
        @endforeach
    </table> 


		</div>
		<div class="col-md-4">
			<h4>
				Pick 6's 
			</h4>

            <table class="table table-striped table-sm" id="myTable11">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player <i class="fa fa-sort" onclick="sortTable2(11)" title="sort"></i></th>
                <th scope="col">Pick 6's <i class="fa fa-sort" onclick="sortTable(11)" title="sort"></i></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
            <td>{{$ust->pick6}}</td>
            </tr>
        @endforeach
    </table> 
		</div>

		<div class="col-md-4">
			<h4>
				Penalties 
			</h4>

            <table class="table table-striped table-sm" id="myTable12">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player <i class="fa fa-sort" onclick="sortTable2(12)" title="sort"></i></th>
                <th scope="col">Penalties <i class="fa fa-sort" onclick="sortTable(12)" title="sort"></i></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usertrainings as $ust)
            <tr>
            <td><a href="/statistic/game/{{$ust->id}}/user/{{$ust->user_id}}/training">{{$ust->user->name}}</a></td>
            <td>{{$ust->penalties}}</td>
            </tr>
        @endforeach
    </table> 
		</div>
	</div>
</div>

<script>

function sortTable(num) {
    console.log("sorting 1");
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

function sortTable2(num) {
    console.log("sorting");
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
      x = rows[i].getElementsByTagName("TD")[0];
      y = rows[i + 1].getElementsByTagName("TD")[0];
      //check if the two rows should switch place:
      if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
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
