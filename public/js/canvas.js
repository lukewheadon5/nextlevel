 //variables
 var canvas = document.getElementById("videoCanvas");
 var canvasWidth = canvas.offsetWidth;
 var canvasHeight = canvas.offsetHeight;
 var bounds = null;
 var ctx = null;
 var startX = 0;
 var startY = 0;
 var snapshot = null;
 var hasLoaded = false;
 var isDrawing = false;
 var allowDraw = false;
 var vid = document.getElementById("video");
 var btn = document.getElementById("play-pause");
 var line = document.getElementById("lineDraw");


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

 btn.addEventListener("click",function(){
  allowDraw = false;
  ctx.clearRect(0,0,canvas.width,canvas.height);
});

 line.addEventListener('click', function(){
  vid.pause();
  btn.classList = ("fa fa-play");
  allowDraw = true;
});

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
 window.addEventListener("scroll",function(){
  takeSnap();
  canvasWidth = canvas.offsetWidth;
  canvasHeight = canvas.offsetHeight;
  canvas.width = canvasWidth;
  canvas.height = canvasHeight;
  bounds = canvas.getBoundingClientRect();
  restoreSnap();
 })

 function reportWindowSize() {
  takeSnap();
  canvasWidth = canvas.offsetWidth;
  canvasHeight = canvas.offsetHeight;
  canvas.width = canvasWidth;
  canvas.height = canvasHeight;
  bounds = canvas.getBoundingClientRect();
  restoreSnap();
}

window.addEventListener('resize', reportWindowSize);
 
 function onmousedown(e) {
   if(allowDraw){
    startX = e.clientX - bounds.left;
    startY =  e.clientY - bounds.top;
    isDrawing = true;
    takeSnap();
   }
 }
 
 function onmouseup(e) {
  if(allowDraw){
   isDrawing = false;
   restoreSnap();
   var endX = e.clientX - bounds.left;
   var endY = e.clientY - bounds.top;
   draw(endX, endY);
   console.log(canvasWidth);
   console.log(canvasHeight);
  }
 
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
 