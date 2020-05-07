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
  <li style="float:left"><a href="{{route('playIndex' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Playbook</a></li>
  <li style="float:left"><a href="{{route('player' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Video</a></li>
  <li style="float:left"><a href="{{route('stats' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Statistics</a></li>
  <li style="float:left"><a href="{{route('quizIndex' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Quizzes</a></li>
  <li style="float:left"><a href="{{route('members' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Membership</a></li>
</ul>


<div class="container-fluid">
	<div class="row pt-3">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
        <h1>
            Pick the Starting 22
        </h1>
		</div>
		<div class="col-md-2">
		</div>
	</div>
	<div class="row pt-3">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
        <h3>
            Offence
        </h3>
        <table class="table table-striped table-sm pt-1" id="myTable1">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th> 
                <th scope="col">Position</th>
                </tr>
                </thead>
        <tbody>
        
            <tr>
            <td class="text-center">
                <select class="form-control" name="player" id="player1">
                    <option value="" selected disabled hidden>Choose player</option>
                    @foreach($team->users as $user)
                        @if($team->admins()->where('user_id' , $user->id)->exists())

                        @else
                        @if($team->coaches()->where('user_id' , $user->id)->exists())

                        @else
                        <option value="{{$user->name}}">{{$user->name}}</option>
                        @endif
                        @endif
                        @endforeach
                </select>
            </td>
            <td class="text-center">
                <select class="form-control" name="position" id="position1">
                <option value="" selected disabled hidden>Choose position</option>
                <option value="QB">QB</option>
                <option value="RB">RB</option>
                <option value="HB">HB</option>
                <option value="FB">FB</option>
                <option value="TE">TE</option>
                <option value="WR">WR</option>
                <option value="C">C</option>
                <option value="LT">LT</option>
                <option value="RT">RT</option>
                <option value="LG">LG</option>
                <option value="RG">RG</option>
                </select>
            </td>
            </tr>
            <tr>
            <td class="text-center">
                <select class="form-control" name="player" id="player2">
                    <option value="" selected disabled hidden>Choose player</option>
                    @foreach($team->users as $user)
                        @if($team->admins()->where('user_id' , $user->id)->exists())

                        @else
                        @if($team->coaches()->where('user_id' , $user->id)->exists())

                        @else
                        <option value="{{$user->name}}">{{$user->name}}</option>
                        @endif
                        @endif
                        @endforeach
                </select>
            </td>
            <td class="text-center">
                <select class="form-control" name="position" id="position2">
                <option value="" selected disabled hidden>Choose position</option>
                <option value="QB">QB</option>
                <option value="RB">RB</option>
                <option value="HB">HB</option>
                <option value="FB">FB</option>
                <option value="TE">TE</option>
                <option value="WR">WR</option>
                <option value="C">C</option>
                <option value="LT">LT</option>
                <option value="RT">RT</option>
                <option value="LG">LG</option>
                <option value="RG">RG</option>
                </select>
            </td>
            </tr>
            <tr>
            <td class="text-center">
                <select class="form-control" name="player" id="player3">
                    <option value="" selected disabled hidden>Choose player</option>
                    @foreach($team->users as $user)
                        @if($team->admins()->where('user_id' , $user->id)->exists())

                        @else
                        @if($team->coaches()->where('user_id' , $user->id)->exists())

                        @else
                        <option value="{{$user->name}}">{{$user->name}}</option>
                        @endif
                        @endif
                        @endforeach
                </select>
            </td>
            <td class="text-center">
                <select class="form-control" name="position" id="position3">
                <option value="" selected disabled hidden>Choose position</option>
                <option value="QB">QB</option>
                <option value="RB">RB</option>
                <option value="HB">HB</option>
                <option value="FB">FB</option>
                <option value="TE">TE</option>
                <option value="WR">WR</option>
                <option value="C">C</option>
                <option value="LT">LT</option>
                <option value="RT">RT</option>
                <option value="LG">LG</option>
                <option value="RG">RG</option>
                </select>
            </td>
            </tr>
            <tr>
            <td class="text-center">
                <select class="form-control" name="player" id="player4">
                    <option value="" selected disabled hidden>Choose player</option>
                    @foreach($team->users as $user)
                        @if($team->admins()->where('user_id' , $user->id)->exists())

                        @else
                        @if($team->coaches()->where('user_id' , $user->id)->exists())

                        @else
                        <option value="{{$user->name}}">{{$user->name}}</option>
                        @endif
                        @endif
                        @endforeach
                </select>
            </td>
            <td class="text-center">
                <select class="form-control" name="position" id="position4">
                <option value="" selected disabled hidden>Choose position</option>
                <option value="QB">QB</option>
                <option value="RB">RB</option>
                <option value="HB">HB</option>
                <option value="FB">FB</option>
                <option value="TE">TE</option>
                <option value="WR">WR</option>
                <option value="C">C</option>
                <option value="LT">LT</option>
                <option value="RT">RT</option>
                <option value="LG">LG</option>
                <option value="RG">RG</option>
                </select>
            </td>
            </tr>
            <tr>
            <td class="text-center">
                <select class="form-control" name="player" id="player5">
                    <option value="" selected disabled hidden>Choose player</option>
                    @foreach($team->users as $user)
                        @if($team->admins()->where('user_id' , $user->id)->exists())

                        @else
                        @if($team->coaches()->where('user_id' , $user->id)->exists())

                        @else
                        <option value="{{$user->name}}">{{$user->name}}</option>
                        @endif
                        @endif
                        @endforeach
                </select>
            </td>
            <td class="text-center">
                <select class="form-control" name="position" id="position5">
                <option value="" selected disabled hidden>Choose position</option>
                <option value="QB">QB</option>
                <option value="RB">RB</option>
                <option value="HB">HB</option>
                <option value="FB">FB</option>
                <option value="TE">TE</option>
                <option value="WR">WR</option>
                <option value="C">C</option>
                <option value="LT">LT</option>
                <option value="RT">RT</option>
                <option value="LG">LG</option>
                <option value="RG">RG</option>
                </select>
            </td>
            </tr>
            <tr>
            <td class="text-center">
                <select class="form-control" name="player" id="player6">
                    <option value="" selected disabled hidden>Choose player</option>
                    @foreach($team->users as $user)
                        @if($team->admins()->where('user_id' , $user->id)->exists())

                        @else
                        @if($team->coaches()->where('user_id' , $user->id)->exists())

                        @else
                        <option value="{{$user->name}}">{{$user->name}}</option>
                        @endif
                        @endif
                        @endforeach
                </select>
            </td>
            <td class="text-center">
                <select class="form-control" name="position" id="position6">
                <option value="" selected disabled hidden>Choose position</option>
                <option value="QB">QB</option>
                <option value="RB">RB</option>
                <option value="HB">HB</option>
                <option value="FB">FB</option>
                <option value="TE">TE</option>
                <option value="WR">WR</option>
                <option value="C">C</option>
                <option value="LT">LT</option>
                <option value="RT">RT</option>
                <option value="LG">LG</option>
                <option value="RG">RG</option>
                </select>
            </td>
            </tr>
            <tr>
            <td class="text-center">
                <select class="form-control" name="player" id="player7">
                    <option value="" selected disabled hidden>Choose player</option>
                    @foreach($team->users as $user)
                        @if($team->admins()->where('user_id' , $user->id)->exists())

                        @else
                        @if($team->coaches()->where('user_id' , $user->id)->exists())

                        @else
                        <option value="{{$user->name}}">{{$user->name}}</option>
                        @endif
                        @endif
                        @endforeach
                </select>
            </td>
            <td class="text-center">
                <select class="form-control" name="position" id="position7">
                <option value="" selected disabled hidden>Choose position</option>
                <option value="QB">QB</option>
                <option value="RB">RB</option>
                <option value="HB">HB</option>
                <option value="FB">FB</option>
                <option value="TE">TE</option>
                <option value="WR">WR</option>
                <option value="C">C</option>
                <option value="LT">LT</option>
                <option value="RT">RT</option>
                <option value="LG">LG</option>
                <option value="RG">RG</option>
                </select>
            </td>
            </tr>
            <tr>
            <td class="text-center">
                <select class="form-control" name="player" id="player8">
                    <option value="" selected disabled hidden>Choose player</option>
                    @foreach($team->users as $user)
                        @if($team->admins()->where('user_id' , $user->id)->exists())

                        @else
                        @if($team->coaches()->where('user_id' , $user->id)->exists())

                        @else
                        <option value="{{$user->name}}">{{$user->name}}</option>
                        @endif
                        @endif
                        @endforeach
                </select>
            </td>
            <td class="text-center">
                <select class="form-control" name="position" id="position8">
                <option value="" selected disabled hidden>Choose position</option>
                <option value="QB">QB</option>
                <option value="RB">RB</option>
                <option value="HB">HB</option>
                <option value="FB">FB</option>
                <option value="TE">TE</option>
                <option value="WR">WR</option>
                <option value="C">C</option>
                <option value="LT">LT</option>
                <option value="RT">RT</option>
                <option value="LG">LG</option>
                <option value="RG">RG</option>
                </select>
            </td>
            </tr>
            <tr>
            <td class="text-center">
                <select class="form-control" name="player" id="player9">
                    <option value="" selected disabled hidden>Choose player</option>
                    @foreach($team->users as $user)
                        @if($team->admins()->where('user_id' , $user->id)->exists())

                        @else
                        @if($team->coaches()->where('user_id' , $user->id)->exists())

                        @else
                        <option value="{{$user->name}}">{{$user->name}}</option>
                        @endif
                        @endif
                        @endforeach
                </select>
            </td>
            <td class="text-center">
                <select class="form-control" name="position" id="position9">
                <option value="" selected disabled hidden>Choose position</option>
                <option value="QB">QB</option>
                <option value="RB">RB</option>
                <option value="HB">HB</option>
                <option value="FB">FB</option>
                <option value="TE">TE</option>
                <option value="WR">WR</option>
                <option value="C">C</option>
                <option value="LT">LT</option>
                <option value="RT">RT</option>
                <option value="LG">LG</option>
                <option value="RG">RG</option>
                </select>
            </td>
            </tr>
            <tr>
            <td class="text-center">
                <select class="form-control" name="player" id="player10">
                    <option value="" selected disabled hidden>Choose player</option>
                    @foreach($team->users as $user)
                        @if($team->admins()->where('user_id' , $user->id)->exists())

                        @else
                        @if($team->coaches()->where('user_id' , $user->id)->exists())

                        @else
                        <option value="{{$user->name}}">{{$user->name}}</option>
                        @endif
                        @endif
                        @endforeach
                </select>
            </td>
            <td class="text-center">
                <select class="form-control" name="position" id="position10">
                <option value="" selected disabled hidden>Choose position</option>
                <option value="QB">QB</option>
                <option value="RB">RB</option>
                <option value="HB">HB</option>
                <option value="FB">FB</option>
                <option value="TE">TE</option>
                <option value="WR">WR</option>
                <option value="C">C</option>
                <option value="LT">LT</option>
                <option value="RT">RT</option>
                <option value="LG">LG</option>
                <option value="RG">RG</option>
                </select>
            </td>
            </tr>
            <tr>
            <td class="text-center">
                <select class="form-control" name="player" id="player11">
                    <option value="" selected disabled hidden>Choose player</option>
                    @foreach($team->users as $user)
                        @if($team->admins()->where('user_id' , $user->id)->exists())

                        @else
                        @if($team->coaches()->where('user_id' , $user->id)->exists())

                        @else
                        <option value="{{$user->name}}">{{$user->name}}</option>
                        @endif
                        @endif
                        @endforeach
                </select>
            </td>
            <td class="text-center">
                <select class="form-control" name="position11" id="position11">
                <option value="" selected disabled hidden>Choose position</option>
                <option value="QB">QB</option>
                <option value="RB">RB</option>
                <option value="HB">HB</option>
                <option value="FB">FB</option>
                <option value="TE">TE</option>
                <option value="WR">WR</option>
                <option value="C">C</option>
                <option value="LT">LT</option>
                <option value="RT">RT</option>
                <option value="LG">LG</option>
                <option value="RG">RG</option>
                </select>
            </td>
            </tr>
        </tbody>
    </table> 
		</div>
		<div class="col-md-2">
		</div>
	</div>




    <div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
        <h3>
            Defence
        </h3>
        <table class="table table-striped table-sm pt-1" id="myTable1">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Player</th> 
                <th scope="col">Position</th>
                </tr>
                </thead>
        <tbody>
        
            <tr>
            <td class="text-center">
                <select class="form-control" name="player" id="player12">
                    <option value="" selected disabled hidden>Choose player</option>
                    @foreach($team->users as $user)
                        @if($team->admins()->where('user_id' , $user->id)->exists())

                        @else
                        @if($team->coaches()->where('user_id' , $user->id)->exists())

                        @else
                        <option value="{{$user->name}}">{{$user->name}}</option>
                        @endif
                        @endif
                        @endforeach
                </select>
            </td>
            <td class="text-center">
                <select class="form-control" name="position" id="position12">
                <option value="" selected disabled hidden>Choose position</option>
                <option value="LDE">LDE</option>
                <option value="RDE">RDE</option>
                <option value="LDT">LDT</option>
                <option value="RDT">RDT</option>
                <option value="NT">NT</option>
                <option value="MLB">MLB</option>
                <option value="WLB">WLB</option>
                <option value="SLB">SLB</option>
                <option value="FS">FS</option>
                <option value="SS">SS</option>
                <option value="WS">WS</option>
                <option value="CB">CB</option>
                </select>
            </td>
            </tr>
            <tr>
            <td class="text-center">
                <select class="form-control" name="player" id="player13">
                    <option value="" selected disabled hidden>Choose player</option>
                    @foreach($team->users as $user)
                        @if($team->admins()->where('user_id' , $user->id)->exists())

                        @else
                        @if($team->coaches()->where('user_id' , $user->id)->exists())

                        @else
                        <option value="{{$user->name}}">{{$user->name}}</option>
                        @endif
                        @endif
                        @endforeach
                </select>
            </td>
            <td class="text-center">
                <select class="form-control" name="position" id="position13">
                <option value="" selected disabled hidden>Choose position</option>
                <option value="LDE">LDE</option>
                <option value="RDE">RDE</option>
                <option value="LDT">LDT</option>
                <option value="RDT">RDT</option>
                <option value="NT">NT</option>
                <option value="MLB">MLB</option>
                <option value="WLB">WLB</option>
                <option value="SLB">SLB</option>
                <option value="FS">FS</option>
                <option value="SS">SS</option>
                <option value="WS">WS</option>
                <option value="CB">CB</option>
                </select>
            </td>
            </tr>
            <tr>
            <td class="text-center">
                <select class="form-control" name="player" id="player14">
                    <option value="" selected disabled hidden>Choose player</option>
                    @foreach($team->users as $user)
                        @if($team->admins()->where('user_id' , $user->id)->exists())

                        @else
                        @if($team->coaches()->where('user_id' , $user->id)->exists())

                        @else
                        <option value="{{$user->name}}">{{$user->name}}</option>
                        @endif
                        @endif
                        @endforeach
                </select>
            </td>
            <td class="text-center">
                <select class="form-control" name="position" id="position14">
                <option value="" selected disabled hidden>Choose position</option>
                <option value="LDE">LDE</option>
                <option value="RDE">RDE</option>
                <option value="LDT">LDT</option>
                <option value="RDT">RDT</option>
                <option value="NT">NT</option>
                <option value="MLB">MLB</option>
                <option value="WLB">WLB</option>
                <option value="SLB">SLB</option>
                <option value="FS">FS</option>
                <option value="SS">SS</option>
                <option value="WS">WS</option>
                <option value="CB">CB</option>
                </select>
            </td>
            </tr>
            <tr>
            <td class="text-center">
                <select class="form-control" name="player" id="player15">
                    <option value="" selected disabled hidden>Choose player</option>
                    @foreach($team->users as $user)
                        @if($team->admins()->where('user_id' , $user->id)->exists())

                        @else
                        @if($team->coaches()->where('user_id' , $user->id)->exists())

                        @else
                        <option value="{{$user->name}}">{{$user->name}}</option>
                        @endif
                        @endif
                        @endforeach
                </select>
            </td>
            <td class="text-center">
                <select class="form-control" name="position" id="position15">
                <option value="" selected disabled hidden>Choose position</option>
                <option value="LDE">LDE</option>
                <option value="RDE">RDE</option>
                <option value="LDT">LDT</option>
                <option value="RDT">RDT</option>
                <option value="NT">NT</option>
                <option value="MLB">MLB</option>
                <option value="WLB">WLB</option>
                <option value="SLB">SLB</option>
                <option value="FS">FS</option>
                <option value="SS">SS</option>
                <option value="WS">WS</option>
                <option value="CB">CB</option>
                </select>
            </td>
            </tr>
            <tr>
            <td class="text-center">
                <select class="form-control" name="player" id="player16">
                    <option value="" selected disabled hidden>Choose player</option>
                    @foreach($team->users as $user)
                        @if($team->admins()->where('user_id' , $user->id)->exists())

                        @else
                        @if($team->coaches()->where('user_id' , $user->id)->exists())

                        @else
                        <option value="{{$user->name}}">{{$user->name}}</option>
                        @endif
                        @endif
                        @endforeach
                </select>
            </td>
            <td class="text-center">
                <select class="form-control" name="position" id="position16">
                <option value="" selected disabled hidden>Choose position</option>
                <option value="LDE">LDE</option>
                <option value="RDE">RDE</option>
                <option value="LDT">LDT</option>
                <option value="RDT">RDT</option>
                <option value="NT">NT</option>
                <option value="MLB">MLB</option>
                <option value="WLB">WLB</option>
                <option value="SLB">SLB</option>
                <option value="FS">FS</option>
                <option value="SS">SS</option>
                <option value="WS">WS</option>
                <option value="CB">CB</option>
                </select>
            </td>
            </tr>
            <tr>
            <td class="text-center">
                <select class="form-control" name="player" id="player17">
                    <option value="" selected disabled hidden>Choose player</option>
                    @foreach($team->users as $user)
                        @if($team->admins()->where('user_id' , $user->id)->exists())

                        @else
                        @if($team->coaches()->where('user_id' , $user->id)->exists())

                        @else
                        <option value="{{$user->name}}">{{$user->name}}</option>
                        @endif
                        @endif
                        @endforeach
                </select>
            </td>
            <td class="text-center">
                <select class="form-control" name="position" id="position17">
                <option value="" selected disabled hidden>Choose position</option>
                <option value="LDE">LDE</option>
                <option value="RDE">RDE</option>
                <option value="LDT">LDT</option>
                <option value="RDT">RDT</option>
                <option value="NT">NT</option>
                <option value="MLB">MLB</option>
                <option value="WLB">WLB</option>
                <option value="SLB">SLB</option>
                <option value="FS">FS</option>
                <option value="SS">SS</option>
                <option value="WS">WS</option>
                <option value="CB">CB</option>
                </select>
            </td>
            </tr>
            <tr>
            <td class="text-center">
                <select class="form-control" name="player" id="player18">
                    <option value="" selected disabled hidden>Choose player</option>
                    @foreach($team->users as $user)
                        @if($team->admins()->where('user_id' , $user->id)->exists())

                        @else
                        @if($team->coaches()->where('user_id' , $user->id)->exists())

                        @else
                        <option value="{{$user->name}}">{{$user->name}}</option>
                        @endif
                        @endif
                        @endforeach
                </select>
            </td>
            <td class="text-center">
                <select class="form-control" name="position" id="position18">
                <option value="" selected disabled hidden>Choose position</option>
                <option value="LDE">LDE</option>
                <option value="RDE">RDE</option>
                <option value="LDT">LDT</option>
                <option value="RDT">RDT</option>
                <option value="NT">NT</option>
                <option value="MLB">MLB</option>
                <option value="WLB">WLB</option>
                <option value="SLB">SLB</option>
                <option value="FS">FS</option>
                <option value="SS">SS</option>
                <option value="WS">WS</option>
                <option value="CB">CB</option>
                </select>
            </td>
            </tr>
            <tr>
            <td class="text-center">
                <select class="form-control" name="player" id="player19">
                    <option value="" selected disabled hidden>Choose player</option>
                    @foreach($team->users as $user)
                        @if($team->admins()->where('user_id' , $user->id)->exists())

                        @else
                        @if($team->coaches()->where('user_id' , $user->id)->exists())

                        @else
                        <option value="{{$user->name}}">{{$user->name}}</option>
                        @endif
                        @endif
                        @endforeach
                </select>
            </td>
            <td class="text-center">
                <select class="form-control" name="position" id="position19">
                <option value="" selected disabled hidden>Choose position</option>
                <option value="LDE">LDE</option>
                <option value="RDE">RDE</option>
                <option value="LDT">LDT</option>
                <option value="RDT">RDT</option>
                <option value="NT">NT</option>
                <option value="MLB">MLB</option>
                <option value="WLB">WLB</option>
                <option value="SLB">SLB</option>
                <option value="FS">FS</option>
                <option value="SS">SS</option>
                <option value="WS">WS</option>
                <option value="CB">CB</option>
                </select>
            </td>
            </tr>
            <tr>
            <td class="text-center">
                <select class="form-control" name="player" id="player20">
                    <option value="" selected disabled hidden>Choose player</option>
                    @foreach($team->users as $user)
                        @if($team->admins()->where('user_id' , $user->id)->exists())

                        @else
                        @if($team->coaches()->where('user_id' , $user->id)->exists())

                        @else
                        <option value="{{$user->name}}">{{$user->name}}</option>
                        @endif
                        @endif
                        @endforeach
                </select>
            </td>
            <td class="text-center">
                <select class="form-control" name="position" id="position20">
                <option value="" selected disabled hidden>Choose position</option>
                <option value="LDE">LDE</option>
                <option value="RDE">RDE</option>
                <option value="LDT">LDT</option>
                <option value="RDT">RDT</option>
                <option value="NT">NT</option>
                <option value="MLB">MLB</option>
                <option value="WLB">WLB</option>
                <option value="SLB">SLB</option>
                <option value="FS">FS</option>
                <option value="SS">SS</option>
                <option value="WS">WS</option>
                <option value="CB">CB</option>
                </select>
            </td>
            </tr>
            <tr>
            <td class="text-center">
                <select class="form-control" name="player" id="player21">
                    <option value="" selected disabled hidden>Choose player</option>
                    @foreach($team->users as $user)
                        @if($team->admins()->where('user_id' , $user->id)->exists())

                        @else
                        @if($team->coaches()->where('user_id' , $user->id)->exists())

                        @else
                        <option value="{{$user->name}}">{{$user->name}}</option>
                        @endif
                        @endif
                        @endforeach
                </select>
            </td>
            <td class="text-center">
                <select class="form-control" name="position" id="position21">
                <option value="" selected disabled hidden>Choose position</option>
                <option value="LDE">LDE</option>
                <option value="RDE">RDE</option>
                <option value="LDT">LDT</option>
                <option value="RDT">RDT</option>
                <option value="NT">NT</option>
                <option value="MLB">MLB</option>
                <option value="WLB">WLB</option>
                <option value="SLB">SLB</option>
                <option value="FS">FS</option>
                <option value="SS">SS</option>
                <option value="WS">WS</option>
                <option value="CB">CB</option>
                </select>
            </td>
            </tr>
            <tr>
            <td class="text-center">
                <select class="form-control" name="player" id="player22">
                    <option value="" selected disabled hidden>Choose player</option>
                    @foreach($team->users as $user)
                        @if($team->admins()->where('user_id' , $user->id)->exists())

                        @else
                        @if($team->coaches()->where('user_id' , $user->id)->exists())

                        @else
                        <option value="{{$user->name}}">{{$user->name}}</option>
                        @endif
                        @endif
                        @endforeach
                </select>
            </td>
            <td class="text-center">
                <select class="form-control" name="position11" id="position22">
                <option value="" selected disabled hidden>Choose position</option>
                <option value="LDE">LDE</option>
                <option value="RDE">RDE</option>
                <option value="LDT">LDT</option>
                <option value="RDT">RDT</option>
                <option value="NT">NT</option>
                <option value="MLB">MLB</option>
                <option value="WLB">WLB</option>
                <option value="SLB">SLB</option>
                <option value="FS">FS</option>
                <option value="SS">SS</option>
                <option value="WS">WS</option>
                <option value="CB">CB</option>
                </select>
            </td>
            </tr>
        </tbody>
    </table> 
            


		</div>
		<div class="col-md-2">
		</div>
    </div>
    <div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
            <button  class="btn btn-success" onClick="saveLineup()">Submit</button>
            <a href="{{ route('roster', $team->id) }}" class="btn btn-danger">Cancel</a>
		</div>
		<div class="col-md-2">
	</div>
    </div>
</div>

<script>
    var team = <?php echo json_encode($team->id); ?>;
    var type1 = "offence";
    var type2 = "defence";

function saveLineup(){
    var player1 = document.getElementById("player1").value;
    var player2 = document.getElementById("player2").value;
    var player3 = document.getElementById("player3").value;
    var player4 = document.getElementById("player4").value;
    var player5 = document.getElementById("player5").value;
    var player6 = document.getElementById("player6").value;
    var player7 = document.getElementById("player7").value;
    var player8 = document.getElementById("player8").value;
    var player9 = document.getElementById("player9").value;
    var player10 = document.getElementById("player10").value;
    var player11 = document.getElementById("player11").value;
    var player12 = document.getElementById("player12").value;
    var player22 = document.getElementById("player22").value;
    var player13 = document.getElementById("player13").value;
    var player14 = document.getElementById("player14").value;
    var player15 = document.getElementById("player15").value;
    var player16 = document.getElementById("player16").value;
    var player17 = document.getElementById("player17").value;
    var player18 = document.getElementById("player18").value;
    var player19 = document.getElementById("player19").value;
    var player20 = document.getElementById("player20").value;
    var player21 = document.getElementById("player21").value;
    
    var position1 = document.getElementById("position1").value;
    var position2 = document.getElementById("position2").value;
    var position3 = document.getElementById("position3").value;
    var position4 = document.getElementById("position4").value;
    var position5 = document.getElementById("position5").value;
    var position6 = document.getElementById("position6").value;
    var position7 = document.getElementById("position7").value;
    var position8 = document.getElementById("position8").value;
    var position9 = document.getElementById("position9").value;
    var position10 = document.getElementById("position10").value;
    var position11 = document.getElementById("position11").value;
    var position12 = document.getElementById("position12").value;
    var position22 = document.getElementById("position22").value;
    var position13 = document.getElementById("position13").value;
    var position14 = document.getElementById("position14").value;
    var position15 = document.getElementById("position15").value;
    var position16 = document.getElementById("position16").value;
    var position17 = document.getElementById("position17").value;
    var position18 = document.getElementById("position18").value;
    var position19 = document.getElementById("position19").value;
    var position20 = document.getElementById("position20").value;
    var position21 = document.getElementById("position21").value;


    $.ajax({
      type: 'POST',
      url: '/lineup/af/store',
      data: {"_token": "{{ csrf_token() }}", 
            'player1': player1,
            'player2': player2,
            'player3': player3,
            'player4': player4,
            'player5': player5,
            'player6': player6,
            'player7': player7,
            'player8': player8,
            'player9': player9,
            'player10': player10,
            'player11': player11,
            'player12': player12,
            'player22': player22,
            'player13': player13,
            'player14': player14,
            'player15': player15,
            'player16': player16,
            'player17': player17,
            'player18': player18,
            'player19': player19,
            'player20': player20,
            'player21': player21,
            'player22': player22,
            'position1': position1,
            'position2': position2,
            'position3': position3,
            'position4': position4,
            'position5': position5,
            'position6': position6,
            'position7': position7,
            'position8': position8,
            'position9': position9,
            'position10': position10,
            'position11': position11,
            'position12': position12,
            'position22': position22,
            'position13': position13,
            'position14': position14,
            'position15': position15,
            'position16': position16,
            'position17': position17,
            'position18': position18,
            'position19': position19,
            'position20': position20,
            'position21': position21,
            'position22': position22,
            'team_id': team,
            'type1':type1,
            'type2':type2,
          },
          success: function(data){
            window.location = "{{route('roster' , $team->id)}}";
          },error:function(data){ 
             console.log(data);
             alert("Something went wrong.");
          }
    });
    

    
}

</script>

@endsection