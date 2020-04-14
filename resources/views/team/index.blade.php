@extends('layouts.app')

@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.search-container button:hover {
  background: #ccc;
}

   input[type=text], .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
</style>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
    </div>
    <div class="col-md-4">
    <h1 class="text-left">
    All Teams 
    </h1>
    </div>
    <div class="col-md-4 text-right pl-1">
      <form method="post" action="{{ route('search') }}">
      @csrf
        <div class="search-container">
          <input type="text" placeholder="Search.." id="entry" name="entry">
          <button type="submit"><i class="fa fa-search"></i></button>
        </div>
      </form>
    </div>
    <div class="col-md-2">
    </div>
  </div>
  
  
	<div class="row">
		<div class="col-md-2">
		</div>
    <div class="col-md-8">
      
      <table class="table table-sm table-striped" id="myTable">
        <thead class="thead-dark">
          <tr>
          <th scope="col">Name <i class="fa fa-sort" onclick="sortTable(0)" title="sort"></i></th>
          <th scope="col">Sport <i class="fa fa-sort" onclick="sortTable2()" title="sort"></th>
          <th></th>
        </tr>
        </thead>
        <tbody>
          @foreach ($teams as $team)
            <tr>
            <td>{{$team->name}}</td>
            <td>{{$team->sport->name}}</td>
            <td><a href="{{ route('team.show', $team->id) }}" class="btn btn-secondary" tabindex="-1" role="button" >View Team</a></td>
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
      <div class="text-center">
      {!!$teams->links();!!}
      </div>
      <div class="col-md-4">
      </div>
    </div>
  </div>
</div>

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>

function sortTable() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
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
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
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

function sortTable2() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
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
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
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