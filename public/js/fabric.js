//starting height & width
var wrapperWidth = player.offsetWidth;
var wrapperHeight = player.offsetHeight;
//initialise canvas and containers 
var canvas = new fabric.Canvas('videoCanvas',{width: wrapperWidth,height: wrapperHeight});
var wrapper = document.getElementById("canvas-wrapper");
var player = document.getElementById("player");
canvas.perPixelTargetFind = true;
canvas.targetFindTolerance = 4;
canvas.selection = false;

//variables
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
 var lineD = document.getElementById("lineDraw");
 var select = document.getElementById("selector");
 var bin = document.getElementById("deletor");
 var line = document.getElementById("circleDraw");


 btn.addEventListener("click",function(){
  btn.classList.toggle("fa-pause");
  if(vid.paused){
    vid.play();
    if(allowDraw = true){
      lineD.style.borderStyle = "none";
      lineD.style.padding ="0px"
      lineD.style.borderTopColor ="";
    }
    allowDraw = false;
  }else{
    vid.pause();
  }
 })
 
 //resizing listeners 
 window.addEventListener("scroll",function(){
    var wrapperWidth = player.offsetWidth;
    var wrapperHeight = player.offsetHeight;

    canvas.setWidth(wrapperWidth);
    canvas.setHeight(wrapperHeight);

    canvas.forEachObject(function(o) {
       console.log(o);
      });
   })
  

window.addEventListener("resize", reportWindowSize);

function reportWindowSize() {
  var oldX1;
  var oldX2;
  var oldY1;
  var oldY2;
  var oldWidth;
  var oldHeight;
  var oldTop;
  var oldLeft;
  var topPer; 
  var leftPer; 
  var widthPer; 
  var heightPer; 
  var oldCWidth = canvas.getWidth();
  var oldCHeight = canvas.getHeight();
  var wrapperWidth = player.offsetWidth;
  var wrapperHeight = player.offsetHeight;

  canvas.forEachObject(function(o) {
    oldX1 = o.x1;
    oldX2 = o.x2;
    oldY1 = o.y1;
    oldY2 = o.y2;
    oldWidth = o.width;
    oldHeight = o.height;
    oldTop = o.top;
    oldLeft = o.left;

    topPer = (100 / (oldCHeight/oldTop));
    leftPer = (100 / (oldCWidth/oldLeft));
    widthPer = (100 / (oldCWidth/oldWidth));
    heightPer = (100 / (oldCHeight/oldHeight));
    x1Per = (100/(oldCWidth/oldX1));
    x2Per = (100/(oldCWidth/oldX2));
    y1Per = (100/(oldCHeight/oldY1));
    y2Per = (100/(oldCHeight/oldY2));

    o.width = (wrapperWidth*widthPer) / 100;
    o.height = (wrapperHeight*heightPer) / 100;
    o.left = (wrapperWidth*leftPer) / 100;
    o.top = (wrapperHeight*topPer) / 100; 
    o.x1 = (wrapperWidth*x1Per) / 100;
    o.x2 = (wrapperWidth*x2Per) / 100;
    o.y1 = (wrapperHeight*y1Per) / 100;
    o.y2 = (wrapperHeight*y2Per) / 100;
  });
  canvas.setWidth(wrapperWidth);
  canvas.setHeight(wrapperHeight);

  
  canvas.renderAll();
  
  }
  



//toolbar button listeners 

select.addEventListener('click', function(){
    vid.pause();
    btn.classList = ("fa fa-play");
    canvas.forEachObject(function(o) {
        o.selectable = true;
      });
    canvas.selection = true;
    canvas.hoverCursor = 'move';
    allowDraw = false;
    select.style.borderStyle = "solid";
    select.style.padding ="2px"
    select.style.borderTopColor ="red";
    lineD.style.borderStyle = "none";
    lineD.style.padding ="0px"
    lineD.style.borderTopColor ="";

  });

 lineD.addEventListener('click', function(){
    vid.pause();
    btn.classList = ("fa fa-play");
    canvas.selection = false;
    canvas.forEachObject(function(o) {
        o.selectable = false;
      });
    canvas.hoverCursor = 'default'
    allowDraw = true;
    select.style.borderStyle = "none";
    select.style.padding ="0px"
    select.style.borderTopColor ="";
    lineD.style.borderStyle = "solid";
    lineD.style.padding ="2px"
    lineD.style.borderTopColor ="red";

  });

  bin.addEventListener('click', function(){
    vid.pause();
    btn.classList = ("fa fa-play");
    deleteObjects();
  });



//mouse listeners 

  canvas.on('mouse:down', function(o){
    isDrawing = true;
    var pointer = canvas.getPointer(o.e);
    var points = [ pointer.x, pointer.y, pointer.x, pointer.y ];
     
    if(allowDraw){
      line = new fabric.Line(points, {
      strokeWidth: 5,
      fill: 'red',
      stroke: 'red',
      originX: 'center',
      originY: 'center',
  
    });
    canvas.add(line);}
  });
   
  canvas.on('mouse:move', function(o){
    if (!isDrawing) return;
    var pointer = canvas.getPointer(o.e);
    
    if(allowDraw){
    line.set({ x2: pointer.x, y2: pointer.y });
    canvas.renderAll(); }
  });
  
  canvas.on('mouse:up', function(o){
    isDrawing = false;
    line.setCoords();

  });
   

//functions 
  //deletes objects
  function deleteObjects(){
    let activeObjects = canvas.getActiveObjects();
    if (activeObjects.length) {
         activeObjects.forEach(function (object) {
                canvas.remove(object);
            });
        
    }
    else {
        alert('Please select the drawing to delete')
    }
}
    
    




canvas.renderAll();
  

 
  
