@extends('layouts.app')



@section('content')
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{ asset('css/video.css') }}" rel="stylesheet">
<link href="{{ asset('css/toolbar.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}" defer></script>
<link href="{{ asset('css/table.css') }}" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/3.6.2/fabric.min.js"></script>
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
  <li style="float:left"><a href="{{route('roster' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Lineup</a></li>
  <li style="float:left"><a href="{{route('player' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Video</a></li>
  <li style="float:left"><a href="{{route('stats' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Statistics</a></li>
</ul>

<div class="container-fluid">

<div class="row">
<div class="col-md-8 pt-3">

<div class="container" id="player" style="position: relative; width:800px; height:500px; ">

<button><i id="highlight" class="fa fa-star"  onclick="goToH()" data-toggle="modal" data-target="#myModal" title="Highlight Video" aria-hidden="true" style="font-size: 30px;
top:0;
right:0;
padding:5px;
margin:10px;
position:absolute;
background: #000000;
z-index: 10;
color: white;"></i></button>

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
  </div>

  <div class="dropup">
  <button class="dropbtn"><i class="fa fa-pencil" style="font-size: 30px;"></i></button>
  <div class="dropup-content">
  <button><i id ="lineDraw" class="fa fa-minus" title="Line" style="font-size: 30px;"></i></button>
  <button><i id ="arrowDraw" class="fa fa-arrow-up" title="arrow" style="font-size: 30px;"></i></button>
  </div>
  </div>

  <div class="dropup">
  <button class="dropbtn"><i class="fa fa-circle-o" style="font-size: 30px;"></i></button>
  <div class="dropup-content">
  <button><i id ="circleDraw" class="fa fa-circle-o" title="Circle" style="font-size: 30px;"></i></button>
  <button><i id ="squareDraw" class="fa fa-square-o" title="Square" style="font-size: 30px;"></i></button>
  </div>
  </div>

  <div class="drawBtn">
  <button><i id ="deletor" class="fa fa-trash" title="Delete Selected" style="font-size: 30px;"></i></button>
  <button><i id ="undo" title="undo arrow" style="font-size: 22px;">undo</i></button>
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
</div>


<div>
<table class="table table-striped table-sm" cellspacing="0"
  width="100%">
  <thead class="thead-dark" >
    <tr>
      <th scope="col">PlayList:</th>
      <th scope="col">Opponent:</th>
      <th scope="col">Type:</th>
      <th></th>
    </tr>
  </thead>
  <tbody>

@foreach ($team->playlists as $play)
 <tr>
<td>{{$play->name}}</td>
<td>{{$play->game->opponent}}</td>
@if($play->isTraining == "false")
<td>Game</td>
@else
<td>Training</td>
@endif
<td><button class="btn btn-secondary" id="{{$play->id}}" onClick="getPlaylist(this.id)" tabindex="-1" role="button" >Select</button></td>
</tr>
@endforeach
</table>
</div>


</div>

</div>

<div style = "padding:10px;">
<table class="table table-striped table-sm" cellspacing="0" id="clips" width="100%">
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
var vidIds = [];
var anns = [];
var anns2 = [];
var team = <?php echo json_encode($team->id); ?>;
var user = <?php echo json_encode(auth()->user()); ?>;

function makeAn(o){
  $.ajax({
    type: 'POST',
    url: '/annotation/save',
    data: {"_token": "{{ csrf_token() }}", 
            'team_id': team,
            'video_id': vidIds[currentVid],
            'vidTime': vid.currentTime,
            'cWidth': canvas.getWidth(),
            'cHeight': canvas.getHeight(),
            'type': o.type, 
            'left': o.left,
            'top': o.top,
            'width': o.width,
            'height': o.height,
            'scaleX': o.scaleX,
            'scaleY': o.scaleY,
            'angle': o.angle,
            'x1': o.x1,
            'x2': o.x2,
            'y1': o.y1,
            'y2': o.y2},
    success: function (data) {
              console.log("success");
          },complete: function (data) {
              loadAn();
           },error:function(data){ 
             console.log(data);
             alert("Something went wrong.");
          }
  });
}

function makeCirAn(o){
  $.ajax({
    type: 'POST',
    url: '/annotation/save/circle',
    data: {"_token": "{{ csrf_token() }}", 
            'team_id': team,
            'video_id': vidIds[currentVid],
            'vidTime': vid.currentTime,
            'cWidth': canvas.getWidth(),
            'cHeight': canvas.getHeight(),
            'type': o.type,
            'left': o.left,
            'top': o.top,
            'width': o.width,
            'height': o.height,
            'scaleX': o.scaleX,
            'scaleY': o.scaleY,
            'angle': o.angle,
            'x1': o.x1,
            'x2': o.x2,
            'y1': o.y1,
            'y2': o.y2},
    success: function (data) {
              console.log("success");
          },complete: function (data) {
              loadAn();
           },error:function(data){ 
             console.log(data);
             alert("Something went wrong.");
          }
  });
}
  
function makeRecAn(o){
  $.ajax({
    type: 'POST',
    url: '/annotation/save/rect',
    data: {"_token": "{{ csrf_token() }}", 
            'team_id': team,
            'video_id': vidIds[currentVid],
            'vidTime': vid.currentTime,
            'cWidth': canvas.getWidth(),
            'cHeight': canvas.getHeight(),
            'type': o.type,
            'left': o.left,
            'top': o.top,
            'width': o.width,
            'height': o.height,
            'scaleX': o.scaleX,
            'scaleY': o.scaleY,
            'angle': o.angle,
            'x1': o.x1,
            'x2': o.x2,
            'y1': o.y1,
            'y2': o.y2},
    success: function (data) {
              console.log("success");
          },complete: function (data) {
              loadAn();
           },error:function(data){ 
             console.log(data);
             alert("Something went wrong.");
          }
  });
}

function makeArrowAn(o){
  console.log(o.top);
  console.log(o.left);
  $.ajax({
    type: 'POST',
    url: '/annotation/save/arrow',
    data: {"_token": "{{ csrf_token() }}", 
            'team_id': team,
            'video_id': vidIds[currentVid],
            'vidTime': vid.currentTime,
            'cWidth': canvas.getWidth(),
            'cHeight': canvas.getHeight(),
            'type': o.type,
            'left': o.left,
            'top': o.top,
            'width': o.width,
            'height': o.height,
            'scaleX': o.scaleX,
            'scaleY': o.scaleY,
            'angle': o.angle,
            'x1': o.x1,
            'x2': o.x2,
            'y1': o.y1,
            'y2': o.y2,
            'isArrow': "true"},
    success: function (data) {
              console.log("success");
          },complete: function (data) {
              loadAn();
           },error:function(data){ 
             console.log(data);
             alert("Something went wrong.");
          }
  });
}

function makeTextAn(o){
  $.ajax({
    type: 'POST',
    url: '/annotation/save/text',
    data: {"_token": "{{ csrf_token() }}", 
            'team_id': team,
            'video_id': vidIds[currentVid],
            'vidTime': vid.currentTime,
            'cWidth': canvas.getWidth(),
            'cHeight': canvas.getHeight(),
            'type': o.type,
            'left': o.left,
            'top': o.top,
            'width': o.width,
            'height': o.height,
            'scaleX': o.scaleX,
            'scaleY': o.scaleY,
            'angle': o.angle,
            'x1': o.x1,
            'x2': o.x2,
            'y1': o.y1,
            'y2': o.y2,
            'text': o.text},
    success: function (data) {
              console.log("success");
          },complete: function (data) {
              loadAn();
           },error:function(data){ 
             console.log(data);
             alert("Something went wrong.");
          }
  });
}

function makeCirAn(o){
  $.ajax({
    type: 'POST',
    url: '/annotation/save/circle',
    data: {"_token": "{{ csrf_token() }}", 
            'team_id': team,
            'video_id': vidIds[currentVid],
            'vidTime': vid.currentTime,
            'cWidth': canvas.getWidth(),
            'cHeight': canvas.getHeight(),
            'type': o.type,
            'left': o.left,
            'top': o.top,
            'width': o.width,
            'height': o.height,
            'scaleX': o.scaleX,
            'scaleY': o.scaleY,
            'angle': o.angle,
            'x1': o.x1,
            'x2': o.x2,
            'y1': o.y1,
            'y2': o.y2},
    success: function (data) {
              console.log("success");
          },complete: function (data) {
              loadAn();
           },error:function(data){ 
             console.log(data);
             alert("Something went wrong.");
          }
  });
}
  


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
                var cId = data[i].id;
                vidList.push(clip);
                vidIds[i] = cId;
                
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
          loadAn();
          checkBtn();
          
        },complete: function(data){
        },error:function(){ 
             console.log(error);
          }
  });
 
}

function loadAn(){
  console.log("loadAn");  
            $.ajax({
               type: 'GET', 
               url: '/api/video/playlist/'+vidIds[currentVid]+'/videos/annotation',
               dataType: 'json',
               success: function (data) {
                anns = [];
                anns2 = [];
                for(var x=0; x<data.length; x++){
                  anns.push(data[x]);
                  anns2.push(data[x]);
                }
              },complete: function(data){
                resizeSaved();
              },error:function(){ 
                  console.log(data);
                }
            });

}

function updateAn(id, left, top, scaleX, scaleY, angle, ){
  $.ajax({
    type: 'POST', 
        url: '/annotation/update',
        data: {"_token": "{{ csrf_token() }}", "id":id,"left":left, 
        "top":top,"scaleX":scaleX, "scaleY":scaleY, "angle":angle,
        'cWidth': canvas.getWidth(),'cHeight': canvas.getHeight(),},
        success: function (data) {
        },complete: function (data) {
            loadAn();
        },error:function(data){ 
           console.log(data);
           alert("Something went wrong.");
        }
        
});
}

function updateAnArrow(id, left, top, scaleX, scaleY, angle, x1, x2, y1 ,y2){
  $.ajax({
    type: 'POST', 
        url: '/annotation/update/arrow',
        data: {"_token": "{{ csrf_token() }}", "id":id,"left":left, 
        "top":top,"scaleX":scaleX, "scaleY":scaleY, "angle":angle,"x1":x1, "x2":x2,
        "y1":y1, "y2":y2,'cWidth': canvas.getWidth(),'cHeight': canvas.getHeight(),},
        success: function (data) {
        },complete: function (data) {
            loadAn();
        },error:function(data){ 
           console.log(data);
           alert("Something went wrong.");
        }
        
});
}

function updateCirAn(id, left, top, scaleX, scaleY, angle,){
  $.ajax({
    type: 'POST', 
        url: '/annotation/update',
        data: {"_token": "{{ csrf_token() }}", "id":id,"left":left, 
        "top":top,"scaleX":scaleX, "scaleY":scaleY, "angle":angle,
        'cWidth': canvas.getWidth(),'cHeight': canvas.getHeight()},
        success: function (data) {
        },complete: function (data) {
            loadAn();
        },error:function(data){ 
           console.log(data);
           alert("Something went wrong.");
        }
        
});
}

function deletor(id){
  $.ajax({
    type: 'POST', 
        url: '/annotation/delete',
        data: {"_token": "{{ csrf_token() }}", "id":id},
        success: function (data) {
            alert("Successfully deleted annotation")
        },complete: function (data) {
                loadAn();
        },error:function(data){ 
           console.log(data);
           alert("Something went wrong.");
        }
        
});
}






</script>


@endsection

@section('scripts')

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>




@endsection