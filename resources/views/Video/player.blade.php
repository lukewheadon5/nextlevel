@extends('layouts.app')



@section('content')
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{ asset('css/video.css') }}" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/3.6.2/fabric.min.js"></script>
</head>
<ul style="list-style-type: none;
  margin: 0;
  padding-bottom:5px;
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

<div class="container-fluid">

<div class="row">
<div class="col-md-8 pt-3">

<div class="container" id="player" style="position: relative; width:800px; height:500px; ">

<video id="video" style="position: absolute;
  top: 0;
  left: 0;
  z-index: 1;
  width:100%; 
  height:90%;
  border:5px solid #000000;
  border-radius: 2px;
  background: #000000;">
<source src="" type="video/mp4">
</video>

<div class="controls">

  <div class="progress-bar">
  <input id="prog-bar" type="range" min="0" max="100" value="0" step="1">
</input>
    <div class="progress-juice" id="prog-juice" >
    </div>
  </div>
  <div class="buttons">
  <button><i  id ="replay" class="fa fa-refresh" title="Restart Video" style="font-size: 30px;"></i></button>
    <button><i  id ="previous" class="fa fa-fast-backward" title="Previous Clip" style="font-size: 30px;"></i></button>
    <button><i  id ="skipBack" class="fa fa-step-backward" title="Skip Back 10s" style="font-size: 30px;"></i></button>
    <button><i  id ="play-pause" class="fa fa-play" title="Play/Pause" style="font-size: 30px;"></i></button>
    <button><i  id ="skipFor" class="fa fa-step-forward" title="Skip Forward 10s" style="font-size: 30px;"></i></button>
    <button><i  id ="next" class="fa fa-fast-forward" title="Next Clip" style="font-size: 30px;"></i></button>
  </div>
  <div class="drawBtn">
  <button><i id ="selector" class="fa fa-hand-pointer-o" aria-hidden="true" title="Select"style="font-size: 30px;"></i></button>
  <button><i id ="lineDraw" class="fa fa-arrow-up" title="Line" style="font-size: 30px;"></i></button>
  <button><i id ="circleDraw" class="fa fa-circle-o" title="Circle" style="font-size: 30px;"></i></button>
  <button><i id ="deletor" class="fa fa-trash" title="Delete Selected" style="font-size: 30px;"></i></button>
  </div>
  <div class="extraBtn">
  <button><i id ="fullscreen" class="fa fa-expand" title="FullScreen" style="font-size: 30px;"></i></button>
  <button><i class="fa fa-cog" title="Settings" style="font-size: 30px;"></i></button>
  <span id="currentTime" style="color:white">00:00</span><span style="color:white"> / </span><span id="durationTime" style="color:white">00:00</span>
  </div>
</div>

<script src="{{ asset('js/video.js') }}" defer></script>


<div id="canvas-wrapper"style="position: absolute;
  top: 0;
  left: 0;
  z-index: 2;
  width:100%; 
  height:100%; ">
<canvas id="videoCanvas" style="position: absolute;
  top: 0;
  left: 0;
  z-index: 3;
  width:100%; 
  height:100%; ">
</canvas>
</div>

<script src="{{ asset('js/fabric.js') }}" defer></script>
</div>

</div>
<div class="col-md-4 pt-3">

<div style="padding:10px; float:right;">
<a href="{{ route('vidCreate', $team->id) }}" class="btn btn-secondary" tabindex="-1" role="button" >Upload Film</a>
</div>


<div>
<table class="table table-striped table-bordered table-sm" cellspacing="0"
  width="100%">
  <thead class="thead-dark" >
    <tr>
      <th scope="col">PlayList:</th>
      <th></th>
    </tr>
  </thead>
  <tbody>

@foreach ($team->playlists as $play)
 <tr>
<td>{{$play->name}}</td>
<td><button class="btn btn-secondary" id="{{$play->id}}" onClick="getPlaylist(this.id)" tabindex="-1" role="button" >Select Playlist</button></td>
</tr>
@endforeach
</table>
</div>


</div>

</div>

<div style = "padding:10px;">
<table class="table table-striped table-bordered table-sm" cellspacing="0" id="clips" width="100%">
  <thead class="thead-dark" >
  <tr>
      <th></th>
      <th scope="col">Clips:</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
</table>
</div>



</div>




<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
var vidList = [];
function getPlaylist(id){
  $.ajax({
        type: 'GET', 
        videos: {},
        team: {!! $team->toJson() !!},
        url: '/api/video/playlist/'+id+'/videos',
        dataType: 'json',
        success: function (data) {
          vidList = [];
          for(var i = 0; i < data.length; i++){
                var clip = data[i].video;
                vidList.push(clip);
          }
          $('#clips tr').not(':first').remove();
          var html = '';
          for(var i = data.length -1; i >= 0; i--){
              html = '<tr>'+
              '<td>' + (i+1) + '</td>' +
              '<td>' + data[i].video + '</td>' +
              '<td>' +"<button id='playClip' class='btn btn-primary btn-xs' " +
                        "onclick='pickVid(\""+
                          data[i].video+
                          "\")'>Play Clip</button>"+ '</td>' +
              '</tr>';   

              $('#clips tr').first().after(html);
          };
          vid.src = "/videos/" + vidList[0];
          currentVid = 0;
          highlightRow(); 
          play();
        },
          error:function(){ 
             console.log(error);
          }
  });

}


</script>


@endsection

@section('scripts')

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>




@endsection