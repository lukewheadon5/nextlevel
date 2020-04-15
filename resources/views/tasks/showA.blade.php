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
	<div class="row pt-2">
		<div class="col-md-1">
		</div>
		<div class="col-md-8">
            <div class="card">
                    <h5 class="card-header text-center" style="color:white; background:{{$task->color}}">
                        <u>{{$task->name}}</u>
                    </h5>
                    <div class="card-body">
                        <p class="card-text text-center">
                            {{$task->description}}
                        </p>
                    </div>
                    <div class="card-footer text-center " style="color:white; background:{{$task->color}}">
                        <b>Start date:</b> {{ \Carbon\Carbon::parse($task->start)->format('d /M /Y')}}       <b>Start Time:</b> {{ \Carbon\Carbon::parse($task->start)->format('H:i')}} 
                        <br /> 
                        <b>End date:</b> {{ \Carbon\Carbon::parse($task->end)->format('d /M /Y')}}       <b>End Time:</b> {{ \Carbon\Carbon::parse($task->end)->format('H:i')}} 
                    </div>
            </div>
		</div>
		<div class="col-md-3 text-right pt-2 pr-2">
        <a href="{{ route('cEdit' , $task->id)}}" class="btn btn-secondary" tabindex="-1" role="button" >Edit Event</a>
        <a href="{{ route('taskDestroy' , $task->id)}}" class="btn btn-danger" tabindex="-1" role="button" >Delete Event</a>
		</div>
	</div>
</div>


@endsection