@extends('layouts.app')

@section('content')
<head>
<script src="{{ asset('js/app.js') }}" defer></script>
</head>

<ul style="list-style-type: none;
  margin: 0;
  padding-bottom:5px;
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
	<div class="row pt-3">
		<div class="col-md-12 text-center">
            <h2>
            Create Event:
            </h2>   
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4 text-center">
        {{ csrf_field() }}
        Event name:
        <br />
        <input type="text" class="form-control" name="name" id="name" />
        <br />
        Event description:
        <br />
        <textarea class="form-control" name="description" id="description"></textarea>
        <br />
        Start date & time:
        <br />
        <input type="datetime-local" class="form-control" id="start" name="start">
        <br />
        End date & time:
        <br />
        <input type="datetime-local" class="form-control" id="end" name="end">
        <br />
        Badge Colour:
        <br />
        <input type="color" id="color" class="form-control" name="color" value="#ff0000">
        <br />
        <button onClick="save()">Save</button>

		</div>
		<div class="col-md-4">
		</div>
	</div>
</div>




<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script>
var id = <?php echo json_encode($team->id); ?>;
    function save(){
        var start = document.getElementById("start").value;
        var end = document.getElementById("end").value;
        var color = document.getElementById("color").value;
        var name = document.getElementById("name").value;
        var description = document.getElementById("description").value;
        console.log(start);
        console.log(end);
        console.log(color);

        $.ajax({
      type: 'POST', 
          url: '/tasks/store',
          data: {"_token": "{{ csrf_token() }}", "name":name, "description":description, "start":start, "id":id, "end":end, "color":color},
          success: function (data) {
              alert("Successfully added Event")
              window.location = '/calendar/'+id;
          },
          error:function(data){ 
             console.log(data);
             alert("Something went wrong. Make sure you enter a valid year");
          }
          
      });
    }

    $('.date').datepicker({
        autoclose: true,
        dateFormat: "yy-mm-dd"
    });
</script>

@endsection