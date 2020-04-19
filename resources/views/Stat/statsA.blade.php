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
	<div class="row pt-2">
		<div class="col-md-12">
			<h3 class="text-center">
				<u>{{$team->name}} Statistics Hub</u>
			</h3>
		</div>
	</div>
	<div class="row pt-1">
		<div class="col-md-4">
			<h3>
				Seasons <a href="/statistic/{{$team->id}}/season/create" class="btn btn-secondary" tabindex="-1" role="button" >Add Season</a>
			</h3>

            <table class="table table-striped table-sm pt-1" id="myTable1">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Season <i class="fa fa-sort" onclick="sortTable3(1)" title="sort"></th> 
                <th></th>
                </tr>
                </thead>
        <tbody>
        @foreach ($team->seasons as $season)
            <tr>
            <td class="text-center">{{$season->year}}</td>
            <td class="text-center"><a href="/statistic/team/{{$team->id}}/season/{{$season->id}}" class="btn btn-secondary" tabindex="-1" role="button" >View</a></td>
            </tr>
        @endforeach
        </tbody>
    </table> 

		</div>
		<div class="col-md-4">
        <h3>
        Player Careers
        </h3>
        <table class="table table-striped table-sm" id="myTable2">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Name <i class="fa fa-sort" onclick="sortTable2(2)" title="sort"></th>
            <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($team->usercareers as $usercareer)
        @if($usercareer->user->admins()->where('team_id' , $team->id)->exists())
        @else
            <tr>
            <td class="text-center">{{$usercareer->user->name}}</td>
            <td class="text-center"><a href="/statistic/career/{{$usercareer->id}}/user/{{$usercareer->user->id}}" class="btn btn-secondary" tabindex="-1" role="button" >View</a></td>
            </tr>
        @endif
        @endforeach
        </tbody>
    </table>
		</div>
		<div class="col-md-4">
			<h3>
				Games  <a href="/statistic/{{$team->id}}/game/create" class="btn btn-secondary" tabindex="-1" role="button" >Add Game</a>
			</h3>
            <table class="table table-striped table-sm" id="myTable3">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Game <i class="fa fa-sort" onclick="sortTable2(3)" title="sort"></th>
            <th scope="col">Season <i class="fa fa-sort" onclick="sortTable(3)" title="sort"></th>
            <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($team->games as $game)
            <tr>
            <td class="text-center">Vs {{$game->opponent}}</td>
            <td class="text-center">{{$game->season->year}}</td>
            <td class="text-center"><a href="/statistic/team/{{$team->id}}/game/{{$game->id}}" class="btn btn-secondary" tabindex="-1" role="button" >View</a></td>
            </tr>
        @endforeach
        </tbody>
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

function sortTable3(num) {
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
      x = rows[i].getElementsByTagName("TD")[0];
      y = rows[i + 1].getElementsByTagName("TD")[0];
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