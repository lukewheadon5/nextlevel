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
<div class="row pt-2">
<div class="col-md-8">
</div>

<div class="col-md-4 pb-10">
<div class="text-right pr-2">
<button class="btn btn-secondary" onClick="share()" >Share Annotations</button>
<a href="{{ route('vidCreate', $team->id) }}" class="btn btn-secondary" tabindex="-1" role="button" >Upload Film</a>
</div>
</div>
</div>

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

<div>
<table class="table table-striped table-sm" cellspacing="0"
  width="100%" id="myTable">
  <thead class="thead-dark" >
    <tr>
      <th scope="col">Player: <i class="fa fa-sort" onclick="sortTable()" title="sort"></th>
      <th>
      <select class="form-control" name="stat" id="stat">     
      <option value='goals'>Goal</option>
      <option value='assists'>Assist</option>
      <option value='passes'>Pass</option>
      <option value='shots'>Shot</option>
      <option value='shotOT'>Shot OT</option>
      <option value='headers'>Header</option>
      <option value='dribbles'>Dribble</option>
      <option value='tackles'>Tackle</option>
      <option value='crosses'>Crosses</option>
      <option value='saves'>Save</option>
      <option value='interceptions'>Interception</option>
      <option value='clearances'>Clearance</option>
      <option value='penalties'>Foul</option>
      <option value='bookings'>Booking</option>
      </select>
      
      </th>
    </tr>
  </thead>
  <tbody>

@foreach ($team->users as $user)
@if($user->admins()->where('team_id' , $team->id)->exists())
@else
<tr>
<td>{{$user->name}}</td>
<td class="text-center">
<button class="btn btn-secondary" id="{{$user->id}}" onClick="incrementStat(this.id)" tabindex="-1" role="button" >+</button>
</td>
</tr>
@endif
@endforeach
</table>
</div>
</div>

</div>
<div class="row pt-3">
<div class="col-md-8">

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
<div class="col-md-4">
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




<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>

var vidList = [];
var vidIds = [];
var anns = [];
var anns2 = [];
var team = <?php echo json_encode($team->id); ?>;
var user = <?php echo json_encode(auth()->user()); ?>;

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



function incrementStat(id){
  var vgid = vidIds[0];
  var typeS = document.getElementById("stat").value;
  
  if(vid.src == ""){

  }else{
    console.log(typeS);
    $.ajax({
      type: 'POST',
      url: '/increment/stat',
      data: {"_token": "{{ csrf_token() }}", 
            'user_id': id,
            'type': typeS,
            'vid_id': vgid,
          },
          success: function(data){
            console.log("success");
          },error:function(data){ 
             console.log(data);
             alert("Something went wrong. Check player has training or game stat sheet");
          }
    });
    
  }
}

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

function share(){
  for(var i =0; i <anns.length; i++){
    if(anns[i].video_id == vidIds[currentVid]){
      $.ajax({
        type: 'POST', 
            url: '/annotation/share',
            data: {"_token": "{{ csrf_token() }}", "id":anns[i].id},
            success: function (data) {

            },complete: function (data) {
                for(var i = 0; i < anns.length; i++){
                  anns[i].share = "true"
                }
            },error:function(data){ 
              console.log(data);
              alert("Something went wrong.");
            }
            
      });
    }
    
  }
  if(anns[anns.length-1].share = true){
    alert("Successfully shared this videos annotations")
    console.log(anns);
  }

}









</script>


@endsection

@section('scripts')

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>




@endsection