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
  @if(empty($task->team->image ))
    <img src="/images/sportsballs.png" alt="Team Logo" 
        width="40px" height="40px" class="rounded-circle"/>
  @else
    <img src="{{asset('images/'. $task->team->image)}}" alt="Team Logo" 
        width="40px" height="40px" class="rounded-circle"/>                    
    @endif
  </li>
  <li style="float:left"><a class="active" href="{{route('team.show' , $task->team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Home</a></li>
  <li style="float:left"><a href="{{route('calendar' , $task->team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Calendar</a></li>
  <li style="float:left"><a href="{{route('player' , $task->team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Video</a></li>
  <li style="float:left"><a href="{{route('stats' , $task->team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Statistics</a></li>
  <li style="float:left"><a href="{{route('members' , $task->team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Membership</a></li>
</ul>


<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
        <form action="{{ route('taskUpdate', $task->id) }}" method="post">
        {{ csrf_field() }}
        Event name:
        <br />
        <input type="text" class="form-control" name="name" id="name" value="{{$task->name}}"/>
        <br />
        Event description:
        <br />
        <textarea class="form-control" name="description" id="description">{{$task->description}}</textarea>
        <br />
        Start date & time:
        <br />
        <input type="datetime-local" class="form-control" id="start" name="start" value="{{$task->start}}"/>
        <br />
        End date & time:
        <br />
        <input type="datetime-local" class="form-control" id="end" name="end" value="{{$task->end}}"/>
        <br />
        Badge Colour:
        <br />
        <input type="color" id="color" class="form-control" name="color" value="{{$task->color}}"/>
        <br />
        <button type="submit">Save</button>
		</div>
		<div class="col-md-2">
		</div>
	</div>
</div>


@endsection