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
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
            <div class="card">
                    <h5 class="card-header text-center">
                        <u>{{$task->name}}</u>
                    </h5>
                    <div class="card-body">
                        <p class="card-text text-center">
                            {{$task->description}}
                        </p>
                    </div>
                    <div class="card-footer">
                        <b><u>Start date/time:</b></u> {{$task->start}} 
                        <br /> 
                        <b><u>End date/time:</b></u> {{$task->end}}
                    </div>
                </div>
            </div>
		</div>
		<div class="col-md-2">
		</div>
	</div>
</div>

@endsection 