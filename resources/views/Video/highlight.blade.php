@extends('layouts.app')



@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/highlight.js') }}" defer></script>
<link href="{{ asset('css/highlight.css') }}" rel="stylesheet">

<div class="container-fluid">

<div class="row">

<div class="col-md-2 pt-3">
</div>

<div class="col-md-8 pt-3">
<h4 style="text-align:center; padding:5px;">Highlight Video</h4>
<label for="title"><b>Highlight Title:</b></label>
<textarea id="title"name="title" class="form-control" placeholder="Enter Title"></textarea>
<div style="margin:10px;">
</div>     
<div class="container" id="playerH" style="position: relative; width:700px; height:500px; ">

<video id="high" style="position: absolute;
  top: 0;
  left: 0;
  z-index: 1;
  width:100%; 
  height:90%;
  border:5px solid #000000;
  border-radius: 2px;
  background: #000000;">
<source src="{{asset('videos/'. $video->video)}}" type="video/mp4">
</video>

<div class="controls">

<div class="wrap" role="group" aria-labelledby="multi-lbl" style="--a: 0; --b: 0; --c: 100; --min: 0; --max: 100;">
  <input id="a" type="range" min="0" value="0" max="100" step="1"/>
  
  <input id="b" type="range" min="0" value="0" max="100" step="1"/>
  
  <input id="c" type="range" min="0" value="100" max="100" step="1"/>
  
</div>

<div class="extraBtn">
  <p style="color:white;">Start Time</p> <span id="newStart" style="color:white">  00:00</span>
</div>

<div class="buttons">
  <button><i  id ="playBtn" class="fa fa-play" title="Play/Pause" style="font-size: 30px;"></i></button>
  <span id="currentTimeH" style="color:white">00:00</span><span style="color:white"> / </span><span id="durationTimeH" style="color:white">00:00</span>
</div>
  
<div class="extraBtn">
<p style="color:white;">End Time</p> <span id="newDuration" style="color:white">  00:00</span>
</div>

</div>
</div>
<div class="col-md-2 pt-3">
</div>
</div>
<div class="row">

<div class="col-md-2 pt-3">
</div>
<div class="col-md-8 pt-3">
<button type="submit" id="{{$video->id}}" class="btn btn-success" onClick="submitHighlight(this.id)">Publish</button>
<button type="submit" id="{{$video->team->id}}" class="btn btn-danger" onClick="goBack()">Cancel</button>
</div>
</div>

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
var team = <?php echo json_encode($video->team->id); ?>;

function goBack(){
  window.location = '/video/'+team
}
 
function submitHighlight(id){
  var title = document.getElementById("title").value;
  $.ajax({
      type: 'POST', 
          url: '/highlight/save',
          data: {"_token": "{{ csrf_token() }}", "title":title, "id":id, "start": startTime, "end": endTime},
          success: function (data) {
              alert("Successfully Created Highlight")
              window.location = '/video/'+team;
          },
          error:function(data){ 
             console.log(data);
             alert("Something went wrong. Make sure your highlight has a title and a selected start/end time.");
          }
          
  });


}


</script>

@endsection