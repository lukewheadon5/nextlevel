@extends('layouts.app')



@section('content')

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
<div class="container" style="position: relative; height:400px; ">
<video id="video" width="700" height="400" style="position: absolute;
  top: 0;
  left: 0;
  z-index: 1;
  border:5px solid #000000;">
<source src="/videos/test.mp4" type="video/mp4">
</video>
<div class="controls">
  <div class="bar">
    <div class="juice"></div>
  </div>
  <div class="buttons">
    <button id="play-pause"></button>
  </div>
</div>


<canvas id="videoCanvas" width="700" height="350" style="position: absolute;
  top: 0;
  left: 0;
  z-index: 2; ">
</canvas>


</div>
</div>
</div>

<div class="row">
<div class="col-md-5 pt-3">
</div>
</div>



<script>
    //variables
      var canvasWidth = 700;
			var canvasHeight = 400;
			var canvas = null;
			var bounds = null;
      var ctx = null;
      var startX = 0;
      var startY = 0;
    
      var hasLoaded = false;
      var isDrawing = false;
		
      //load in function
      window.onload = function() {
				canvas = document.getElementById("videoCanvas");
				canvas.width = canvasWidth;
				canvas.height = canvasHeight;
				canvas.onmousedown = onmousedown;
        canvas.onmouseup = onmouseup;
        canvas.onmousemove = onmousemove;
			
				
				bounds = canvas.getBoundingClientRect();
				ctx = canvas.getContext("2d");
				hasLoaded = true;
      }

      function takeSnap(){
        snapshot = ctx.getImageData(0,0,canvas.width,canvas.height);
      }

      function restoreSnap(){
        ctx.putImageData(snapshot,0,0);
      }

      function draw(x , y){
        ctx.strokeStyle = 'yellow';
        ctx.lineWidth = 6;
        ctx.lineCap = 'round';
        ctx.beginPath();
        ctx.moveTo(startX,startY);
        ctx.lineTo(x,y);
        ctx.stroke();
        ctx.beginPath();

      }
      
      function onmousedown(e) {
						startX = e.clientX - bounds.left;
            startY = e.clientY - bounds.top;
            isDrawing = true;
            takeSnap();
				
			}
			
			function onmouseup(e) {
        isDrawing = false;
        restoreSnap();
        var endX = e.clientX - bounds.left;
        var endY = e.clientY - bounds.top;
        draw(endX, endY);
      
        
        
	
      }
      
      function onmousemove(e) {

      if(isDrawing){
      restoreSnap();
      e.preventDefault();
      mouseX=parseInt(e.clientX-bounds.left);
      mouseY=parseInt(e.clientY-bounds.top);
      draw(mouseX, mouseY);
      }

      }
			
			
      
      
    function myCanvas() {
    var c = document.getElementById("videoCanvas");
    var ctx = c.getContext("2d");
    var vid = document.getElementById("video");
    ctx.drawImage(vid,0,0,700,400);
  
    vid.addEventListener('play', function () {
      (function loop() {
          if (!vid.paused && !vid.ended) {
              ctx.drawImage(vid, 0, 0,700,400);
              setTimeout(loop, 1000 / 30); // drawing at 30fps
          }
      })();
  }, 0);
  }

  function playVid() {
    var vid = document.getElementById("video");
    vid.play();
}
			
</script>


</div>

            
@endsection

@section('scripts')

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


@endsection