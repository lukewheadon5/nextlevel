@extends('layouts.app')



@section('content')
<link href="{{ asset('css/video.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<ul style="list-style-type: none;
  margin: 0;
  padding:0px;
  overflow: hidden;
  background-color: #333;"> 

  <li style="float:left"><a class="active" href="{{route('team.show' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Home</a></li>
  <li style="float:left"><a href="#news" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  News</a></li>
  <li style="float:left"><a href="{{route('player' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Video</a></li>
  <li style="float:left"><a href="#stats" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Statistics</a></li>
</ul>

<div class="container-fluid" style="background-color: #333;">

<div class="row">
<div class="col-md-5 pt-3">

<div class="container" style="position: relative; height:500px; ">


<div class="container" style="position: relative; height:400px; ">

<video id="video" width="700" height="400" style="position: absolute;
  top: 0;
  left: 0;
  z-index: 1;
  border:5px solid #000000;">
<source src="/videos/test.mp4" type="video/mp4">
</video>

<div class="controls">

  <div class="progress-bar">
  <input id="prog-bar" type="range" min="0" max="100" value="0" step="1">
</input>
    <div class="progress-juice" id="prog-juice" >
    </div>
  </div>
  <div class="buttons">
    <button><i  id ="replay" class="fa fa-refresh"  style="font-size: 30px;"></i></button>
    <button><i  id ="skipBack" class="fa fa-step-backward"  style="font-size: 30px;"></i></button>
    <button><i onclick="togglePP()" id ="play-pause" class="fa fa-play" style="font-size: 30px;"></i></button>
    <button><i  id ="skipFor" class="fa fa-step-forward"  style="font-size: 30px;"></i></button>
    <button><i id ="lineDraw" class="fa fa-arrow-up"  style="font-size: 30px;"></i></button>
    <button><i class="fa fa-expand"  style="font-size: 30px;"></i></button>
    <button><i class="fa fa-cog"  style="font-size: 30px;"></i></button>
  </div>
</div>

<script src="{{ asset('js/video.js') }}" defer></script>

<canvas id="videoCanvas" width="700" height="350" style="position: absolute;
  top: 0;
  left: 0;
  z-index: 2; ">
</canvas>

<script src="{{ asset('js/canvas.js') }}" defer></script>



</div>
</div>
</div>
</div>

<div class="row">
<div class="col-md-5 pt-3">
</div>
</div>






</div>

            
@endsection

@section('scripts')

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


@endsection