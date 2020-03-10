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
 var isDrawLine = false;
 var isDrawCircle = false;
 var vid = document.getElementById("video");
 var btn = document.getElementById("play-pause");
 var lineD = document.getElementById("lineDraw");
 var select = document.getElementById("selector");
 var bin = document.getElementById("deletor");
 var circleD = document.getElementById("circleDraw");
 var ob;
 var selectOn = false;


 btn.addEventListener("click",function(){
  if(vid.src == ""){

  }else{
    btn.classList.toggle("fa-pause");
    if(vid.paused){
      clearCanvas();
      vid.play();
      drawn = false;
      found = false;
      canvas.discardActiveObject();
      canvas.renderAll();
      canvas.selection = false;
      canvas.forEachObject(function(o) {
        o.selectable = false;
      });
    canvas.hoverCursor = 'default'
      if(allowDraw = true){
        clearBtns();
      }
      if(selectOn = true){
        clearBtns();
      }
      selectOn = false;
      allowDraw = false;
    }else{
      vid.pause();
    }
  }
 })

 function clearBtns(){
  lineD.style.borderStyle = "none";
  lineD.style.padding ="0px"
  lineD.style.borderTopColor ="";
  select.style.borderStyle = "none";
  select.style.padding ="0px"
  select.style.borderTopColor ="";
 }
 
 //resizing listeners 
 window.addEventListener("scroll",function(){
    var wrapperWidth = player.offsetWidth;
    var wrapperHeight = player.offsetHeight;

    canvas.setWidth(wrapperWidth);
    canvas.setHeight(wrapperHeight);

   })
  

window.addEventListener("resize", reportWindowSize);
window.addEventListener("resize", resizeSaved);

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
  console.log(wrapperWidth);

  canvas.forEachObject(function(o) {
    oldTop = o.top;
    oldLeft = o.left;
    topPer = (100 / (oldCHeight/oldTop));
    leftPer = (100 / (oldCWidth/oldLeft));
    o.left = (wrapperWidth*leftPer) / 100;
    o.top = (wrapperHeight*topPer) / 100; 
    o.setCoords();
  });
  canvas.setWidth(wrapperWidth);
  canvas.setHeight(wrapperHeight);

  
  canvas.renderAll();
  
  }

  function resizeSaved(){
    console.log("resize called" + anns);
    console.log(anns.length);
    var wrapperWidth = player.offsetWidth;
    var wrapperHeight = player.offsetHeight;
    for(var i = 0; i < anns.length; i++ ){
      console.log("in loop");
      var oldCWidth = anns[i].cWidth;
      var oldCHeight = anns[i].cHeight;
      oldWidth = anns[i].width;
      oldHeight = anns[i].height;
      oldTop = anns[i].top;
      oldLeft = anns[i].left;
      
      topPer = (100 / (oldCHeight/oldTop));
      leftPer = (100 / (oldCWidth/oldLeft));
      widthPer = (100 / (oldCWidth/oldWidth));
      heightPer = (100 / (oldCHeight/oldHeight));
  
      anns[i].cWidth = wrapperWidth;
      console.log("raw" + anns[i].cWidth);
      console.log(wrapperWidth);
      anns[i].cHeight = wrapperHeight;
      anns[i].width = (wrapperWidth*widthPer) / 100;
      anns[i].height = (wrapperHeight*heightPer) / 100;
      anns[i].left = (wrapperWidth*leftPer) / 100;
      anns[i].top = (wrapperHeight*topPer) / 100; 
      
    }
     console.log(anns);  
  }

  





//toolbar button listeners 

select.addEventListener('click', function(){
  if(vid.src == ""){

  }else{
    selectOn = true;
    isDrawLine = false;
    isDrawCircle = false;
    if(!vid.paused){
    vid.pause();
    btn.classList.toggle("fa-pause");
    }
    canvas.forEachObject(function(o) {
        o.selectable = true;
      });
    
    canvas.hoverCursor = 'move';
    allowDraw = false;
    select.style.borderStyle = "solid";
    select.style.padding ="2px"
    select.style.borderTopColor ="red";
    lineD.style.borderStyle = "none";
    lineD.style.padding ="0px"
    lineD.style.borderTopColor ="";

  }
  

  });

 lineD.addEventListener('click', function(){

  if(vid.src == ""){

  }else{
    canvas.discardActiveObject();
    canvas.renderAll();
    if(!vid.paused){
    vid.pause();
    btn.classList.toggle("fa-pause");
    }
    canvas.selection = false;
    canvas.forEachObject(function(o) {
        o.selectable = false;
      });
    canvas.hoverCursor = 'default'
    allowDraw = true;
    selectOn = false;
    select.style.borderStyle = "none";
    select.style.padding ="0px"
    select.style.borderTopColor ="";
    lineD.style.borderStyle = "solid";
    lineD.style.padding ="2px"
    lineD.style.borderTopColor ="red";
  }
  });

circleD.addEventListener('click', function(){
  if(vid.src == ""){

  }else{
    if(allowDraw){
    isDrawCircle = true;
    vid.pause();
    checkBtn();
      circle =new fabric.Circle(
        { radius: 40, 
          fill: 'rgba(0,0,0,0)', 
          top: 200, 
          left: 200, 
          stroke:'red', 
          strokeWidth:5
        });
    canvas.add(circle);
    circle.setCoords();
    makeAn(circle);
    
    canvas.selection = false;
    canvas.forEachObject(function(o) {
        o.selectable = false;
      });
    canvas.hoverCursor = 'default'
    allowDraw = true;
    }
  }
  });

  bin.addEventListener('click', function(){
    vid.pause();
    btn.classList = ("fa fa-play");
    deleteObjects();
  });

  canvas.on("object:moving", function(e) {
    var actObj = e.target;
    var coords = actObj.calcCoords(); 
    // calcCoords returns an object of corner points like this 
    //{bl:{x:val, y:val},tl:{x:val, y:val},br:{x:val, y:val},tr:{x:val, y:val}}
    var left = coords.tl.x;
    var top = coords.tl.y;
    return {left:left,top:top};
})


//mouse listeners 

  canvas.on('mouse:down', function(o){
    if(allowDraw){
      isDrawing = true;
      var pointer = canvas.getPointer(o.e);
      var points = [ pointer.x, pointer.y, pointer.x, pointer.y ];
      isDrawLine = true;
      line = new fabric.Line(points, {
      strokeWidth: 5,
      fill: 'red',
      stroke: 'red',
      originX: 'center',
      originY: 'center',
  
    });
    line.toObject;
    canvas.add(line);}
  });


  canvas.on('mouse:down',function(e){
    if(selectOn){
      ob = e.target;
    }
  })

  canvas.on('mouse:up', function(e){
    if(selectOn){
      console.log(ob);
      for(var i = 0; i<anns2.length; i++){
        console.log(anns2[i]);
        if((anns2[i].x1 == ob.x1.toFixed(2)) && (anns2[i].x2 == ob.x2.toFixed(2)) && (anns2[i].y1 == ob.y1.toFixed(2)) && (anns2[i].y2 == ob.y2.toFixed(2))){
          console.log("matched if update");
          console.log(ob.angle);
        updateAn(anns2[i].id , ob.left, ob.top ,ob.scaleX ,ob.scaleY ,ob.angle);
        break;
        }
      }
    }
  })
   
  canvas.on('mouse:move', function(o){
    if (!isDrawing) return;
    var pointer = canvas.getPointer(o.e);
    
    if(allowDraw){
    line.set({ x2: pointer.x, y2: pointer.y });
    canvas.renderAll(); }
  });
  
  canvas.on('mouse:up', function(o){
    isDrawing = false;
    if (isDrawLine){
      line.setCoords();
      canvas.renderAll();
      makeAn(line);
    }
  });


   

//functions 
  //deletes objects
  function deleteObjects(){
    let activeObjects = canvas.getActiveObjects();
    if (activeObjects.length) {
         activeObjects.forEach(function (object) {
                canvas.remove(object);
                for(var i = 0; i < anns.length; i++){
                  console.log("inLoop");
                  console.log(vidIds[currentVid]);
                  console.log(anns[i].video_id);
                  if(vidIds[currentVid] == anns[i].video_id){
                      var isMatch = false;
                    if(object.x1.toFixed(2) == anns[i].x1){
                      isMatch = true;
                      console.log("check 1");
                    }else{
                      console.log("check failed");
                      isMatch = false;
                    }
                    if(object.x2.toFixed(2) == anns[i].x2){
                      isMatch = true;
                      console.log("check 2");
                    }else{
                      console.log("check failed");
                      isMatch = false;
                    }
                    if(object.y1.toFixed(2) == anns[i].y1){
                      isMatch = true;
                      console.log("check 3");
                    }else{
                      console.log("check failed");
                      isMatch = false;
                    }
                    if(object.y2.toFixed(2) == anns[i].y2){
                      isMatch = true;
                      console.log("check 4");
                    }else{
                      console.log("check failed");
                      isMatch = false;
                    }

                    if(isMatch){
                      console.log("check complete");
                      deletor(anns[i].id);
                    }

                  }
                }



            });
    }
    else {
        alert('Please select the drawing to delete')
    }

    loadAn();
    resizeSaved();
}


function clearCanvas(){
  canvas.forEachObject(function(o) {
    canvas.remove(o);
  });

}
 

function circleAn(i){

}
  
function lineAn(i){
  var points = [anns[i].x1, anns[i].y1, anns[i].x2, anns[i].y2,]
  line = new fabric.Line(points, {
    left: anns[i].left,
    top: anns[i].top,
    scaleX: anns[i].scaleX,
    scaleY: anns[i].scaleY,
    height: anns[i].height,
    width: anns[i].width,
    angle: anns[i].angle,
    strokeWidth: 5,
    fill: 'red',
    stroke: 'red',
    originX: 'center',
    originY: 'center',

  });

  canvas.add(line);
  line.setCoords;
  canvas.renderAll();
}




canvas.renderAll();
  

 
  
