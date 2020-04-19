@extends('layouts.app')

@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>


<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href="{{asset('fullcalendar/packages/core/main.css')}}" rel='stylesheet' />
<link href="{{asset('fullcalendar/packages/daygrid/main.css')}}" rel='stylesheet' />
<link href="{{asset('fullcalendar/packages/timegrid/main.css')}}" rel='stylesheet' />
<link href="{{asset('fullcalendar/packages/list/main.css')}}" rel='stylesheet' />
<script src="{{asset('fullcalendar/packages/core/main.js')}}"></script>
<script src="{{asset('fullcalendar/packages/interaction/main.js')}}"></script>
<script src="{{asset('fullcalendar/packages/daygrid/main.js')}}"></script>
<script src="{{asset('fullcalendar/packages/timegrid/main.js')}}"></script>
<script src="{{asset('fullcalendar/packages/list/main.js')}}"></script>

<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      
      events: [
        @foreach($team->tasks as $task)
                {
             title : '{{$task->name}}',
             start : '{{ $task->start }}',
             url : '{{ route('taskShow', $task->id) }}',
             textColor : 'white',
             end : '{{$task->end}}',
             color : '{{$task->color}}'
                },
        @endforeach
      ]
    });

    calendar.render();
  });

</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
</head>


<body>
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
  <li style="float:left"><a href="{{route('roster' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Lineup</a></li>
  <li style="float:left"><a href="{{route('player' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Video</a></li>
  <li style="float:left"><a href="{{route('stats' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Statistics</a></li>
</ul>


<div class="container-fluid">
	<div class="row pt-2">
		<div class="col-md-4">
            <h1>
                <u>{{$team->name}} Calendar</u>
            </h1>   
        </div>
        <div class="col-md-4">
            <h1>
                
            </h1>   
        </div>
        <div class="col-md-4">
            <h1 class="text-right pr-3">
            </h1>   
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
        <div id='calendar'></div>
		</div>
		<div class="col-md-2">
		</div>
	</div>
</div>


</body>
</html>

@endsection