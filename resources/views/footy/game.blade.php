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
  <li style="float:left"><a href="{{route('player' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Video</a></li>
  <li style="float:left"><a href="{{route('stats' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Statistics</a></li>
</ul>

<div class="container-fluid">
	<div class="row pt-2">
        <div class="col-md-4 text-left pl-2">
            <h3>
            <a href="/statistic/team/{{$team->id}}/season/{{$game->season->id}}" tabindex="-1" role="button" ><i class="fa fa-arrow-circle-o-left" style="color:#000000" aria-hidden="true"></i></a>
            </h3>
        </div>
		<div class="col-md-4">
			<h3 class="text-center">
				<u>{{$team->name}} Vs {{$game->opponent}} <a href="/statistic/team/{{$team->id}}/season/{{$game->season->id}}" style="color: #000000; text-decoration: none;">{{$game->season->year}}</a></u>
                
                </h3>
        </div>
        <div class="col-md-4">
                <h3 class="text-right pt-3">
                <a href="/statistic/team/{{$team->id}}/game/{{$game->id}}/training" class="btn btn-secondary pr-2" tabindex="-1" role="button" >View Training</a>
                </h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h4>
				Team Statistics 
			</h4>
            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Goals</th>
                <th scope="col">Goals Conceded</th>
                <th scope="col">Assists</th>
                <th scope="col">Shots</th>
                <th scope="col">Shots on Target</th>
                <th scope="col">Passes</th>
                <th scope="col">Dribbles</th>
                </tr>
                </thead>
        <tbody style="height:50px;">
            <tr>
            <td>{{$game->goals}}</td>
            <td>{{$game->goalsCon}}</td>
            <td>{{$game->assists}}</td>
            <td>{{$game->shots}}</td>
            <td>{{$game->shotOT}}</td>
            <td>{{$game->passes}}</td>
            <td>{{$game->dribbles}}</td>
            </tr>
    </table> 

		</div>
	</div>
  <div class="row">
		<div class="col-md-12">
            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Crosses</th>
                <th scope="col">Tackles</th>
                <th scope="col">Headers Won</th>
                <th scope="col">Clearances</th>
                <th scope="col">Interceptions</th>
                <th scope="col">Saves</th>
                <th scope="col">Fouls</th>
                </tr>
                </thead>
        <tbody style="height:50px;">
            <tr>
            <td>{{$game->crosses}}</td>
            <td>{{$game->tackles}}</td>
            <td>{{$game->headers}}</td>
            <td>{{$game->clearances}}</td>
            <td>{{$game->interceptions}}</td>
            <td>{{$game->saves}}</td>
            <td>{{$game->penalties}}</td>
            </tr>
    </table> 

		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<h4>
				<u>Player Statistics</u>
			</h4>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<h4>
				Goals 
			</h4>
            <table class="table table-striped table-sm" id="myTable0">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player <i class="fa fa-sort" onclick="sortTable2(0)" title="sort"></i></th>
                <th scope="col">Goals <i class="fa fa-sort" onclick="sortTable(0)" title="sort"></i></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usergames as $usg)
            <tr>
            <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}">{{$usg->user->name}}</a></td>
            <td>{{$usg->goals}}</td>
            </tr>
        @endforeach
    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Assists 
			</h4>

            <table class="table table-striped table-sm" id="myTable1">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player <i class="fa fa-sort" onclick="sortTable2(1)" title="sort"></i></th>
                <th scope="col">Assists <i class="fa fa-sort" onclick="sortTable(1)" title="sort"></i></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usergames as $usg)
            <tr>
            <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}">{{$usg->user->name}}</a></td>
            <td>{{$usg->assists}}</td>
            </tr>
        @endforeach
    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Passes
			</h4>

            <table class="table table-striped table-sm" id="myTable2">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player <i class="fa fa-sort" onclick="sortTable2(2)" title="sort"></i></th>
                <th scope="col">Passes <i class="fa fa-sort" onclick="sortTable(2)" title="sort"></i></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usergames as $usg)
            <tr>
            <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}">{{$usg->user->name}}</a></td>
            <td>{{$usg->passes}}</td>
            </tr>
        @endforeach
    </table> 

		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<h4>
				Shots 
			</h4>

            <table class="table table-striped table-sm" id="myTable3">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player <i class="fa fa-sort" onclick="sortTable2(3)" title="sort"></i></th>
                <th scope="col">Shots <i class="fa fa-sort" onclick="sortTable(3)" title="sort"></i></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usergames as $usg)
            <tr>
            <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}">{{$usg->user->name}}</a></td>
            <td>{{$usg->shots}}</td>
            </tr>
        @endforeach
    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Shots on Target 
			</h4>

            <table class="table table-striped table-sm" id="myTable4">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player <i class="fa fa-sort" onclick="sortTable2(4)" title="sort"></i></th>
                <th scope="col">Shots on Target <i class="fa fa-sort" onclick="sortTable(4)" title="sort"></i></th>
                </tr>
                </thead>
            <tbody>
            @foreach ($game->usergames as $usg)
                <tr>
                <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}">{{$usg->user->name}}</a></td>
                <td>{{$usg->shotOT}}</td>
                </tr>
            @endforeach
            </table> 

		</div>
		<div class="col-md-4">
            <h4>
				Crosses 
			</h4>

            <table class="table table-striped table-sm" id="myTable5">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player <i class="fa fa-sort" onclick="sortTable2(5)" title="sort"></i></th>
                <th scope="col">Crosses <i class="fa fa-sort" onclick="sortTable(5)" title="sort"></i></th>
                </tr>
                </thead>
                <tbody>
            @foreach ($game->usergames as $usg)
                <tr>
                <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}">{{$usg->user->name}}</a></td>
                <td>{{$usg->crosses}}</td>
                </tr>
            @endforeach
            </table> 

	    </div>
	</div>
	<div class="row">
		<div class="col-md-4">
    <h4>
				Successful Dribbles
			</h4>

            <table class="table table-striped table-sm" id="myTable6">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player <i class="fa fa-sort" onclick="sortTable2(6)" title="sort"></i></th>
                <th scope="col">Dribbles <i class="fa fa-sort" onclick="sortTable(6)" title="sort"></i></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usergames as $usg)
            <tr>
            <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}">{{$usg->user->name}}</a></td>
            <td>{{$usg->dribbles}}</td>
            </tr>
        @endforeach
        </table>
		</div>
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
        @foreach ($game->usergames as $usg)
            <tr>
            <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}">{{$usg->user->name}}</a></td>
            <td>{{$usg->tackles}}</td>
            </tr>
        @endforeach
        </table>
       
		</div>
		<div class="col-md-4">
    <h4>
				Interceptions
			</h4>

            <table class="table table-striped table-sm" id="myTable8">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player <i class="fa fa-sort" onclick="sortTable2(8)" title="sort"></i></th>
                <th scope="col">Interceptions <i class="fa fa-sort" onclick="sortTable(8)" title="sort"></i></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usergames as $usg)
            <tr>
            <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}">{{$usg->user->name}}</a></td>
            <td>{{$usg->interceptions}}</td>
            </tr>
        @endforeach
        </table>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4">
			<h4>
				Clearances 
			</h4>
            
            <table class="table table-striped table-sm" id="myTable9">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player <i class="fa fa-sort" onclick="sortTable2(9)" title="sort"></i></th>
                <th scope="col">Clearances <i class="fa fa-sort" onclick="sortTable(9)" title="sort"></i></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usergames as $usg)
            <tr>
            <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}">{{$usg->user->name}}</a></td>
            <td>{{$usg->clearances}}</td>
            </tr>
        @endforeach
    </table> 

		</div>
		<div class="col-md-4">
			<h4>
				Headers Won 
			</h4>

            <table class="table table-striped table-sm" id="myTable10">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player <i class="fa fa-sort" onclick="sortTable2(10)" title="sort"></i></th>
                <th scope="col">Headers <i class="fa fa-sort" onclick="sortTable(10)" title="sort"></i></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usergames as $usg)
            <tr>
            <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}">{{$usg->user->name}}</a></td>
            <td>{{$usg->headers}}</td>
            </tr>
        @endforeach

    </table> 

		</div>
		<div class="col-md-4">
            <h4>
				Saves
			</h4>

            <table class="table table-striped table-sm" id="myTable11">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player <i class="fa fa-sort" onclick="sortTable2(11)" title="sort"></i></th>
                <th scope="col">Saves <i class="fa fa-sort" onclick="sortTable(11)" title="sort"></i></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usergames as $usg)
            <tr>
            <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}">{{$usg->user->name}}</a></td>
            <td>{{$usg->saves}}</td>
            </tr>
        @endforeach
        </table>
		</div>
	</div>
    <div class="row">
		<div class="col-md-4">
        <h4>
				Fouls
			</h4>

            <table class="table table-striped table-sm" id="myTable12">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player <i class="fa fa-sort" onclick="sortTable2(12)" title="sort"></i></th>
                <th scope="col">Fouls <i class="fa fa-sort" onclick="sortTable(12)" title="sort"></i></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usergames as $usg)
            <tr>
            <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}">{{$usg->user->name}}</a></td>
            <td>{{$usg->penalties}}</td>
            </tr>
        @endforeach
        </table>
        </div>
        <div class="col-md-4">
        <h4>
				Bookings
			</h4>

            <table class="table table-striped table-sm" id="myTable13">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player <i class="fa fa-sort" onclick="sortTable2(13)" title="sort"></i></th>
                <th scope="col">Bookings <i class="fa fa-sort" onclick="sortTable(13)" title="sort"></i></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($game->usergames as $usg)
            <tr>
            <td><a href="/statistic/game/{{$usg->id}}/user/{{$usg->user_id}}">{{$usg->user->name}}</a></td>
            <td>{{$usg->bookings}}</td>
            </tr>
        @endforeach
        </table>
        </div>
        <div class="col-md-4">
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
