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
 var isDrawArrow = false;
 var vid = document.getElementById("video");
 var btn = document.getElementById("play-pause");
 var lineD = document.getElementById("lineDraw");
 var arrowD = document.getElementById("arrowDraw");
 var select = document.getElementById("selector");
 var bin = document.getElementById("deletor");
 var circleD = document.getElementById("circleDraw");
 var squareD = document.getElementById("squareDraw");
 var undo = document.getElementById("undo");
 var ob;
 var selectOn = false;
 var ot;
 var ol;

 //play button listener

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
  arrowD.style.borderStyle = "none";
  arrowD.style.padding ="0px"
  arrowD.style.borderTopColor ="";

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
    oldWidth = o.width;
    oldHeight = o.height;
    widthPer = (100 / (oldCWidth/oldWidth));
    heightPer = (100 / (oldCHeight/oldHeight));
    topPer = (100 / (oldCHeight/oldTop));
    leftPer = (100 / (oldCWidth/oldLeft));
    o.left = (wrapperWidth*leftPer) / 100;
    o.top = (wrapperHeight*topPer) / 100; 
    o.width = (wrapperWidth*widthPer) / 100;
    o.height = (wrapperHeight*heightPer) / 100;
    
    o.setCoords();
    
  });
  canvas.setWidth(wrapperWidth);
  canvas.setHeight(wrapperHeight);

  
  canvas.renderAll();
  
  }

  function resizeSaved(){
    var wrapperWidth = player.offsetWidth;
    var wrapperHeight = player.offsetHeight;
    for(var i = 0; i < anns.length; i++ ){
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
    isDrawSquare = false;
    isDrawText = false;
    isDrawArrow = false;
    if(!vid.paused){
    vid.pause();
    btn.classList.toggle("fa-pause");
    }
    canvas.forEachObject(function(o) {
      if(o.name == "arrow"){

      }else if(o.name == "triangle"){

      }else{
        o.selectable = true;
      }
      });
    
    canvas.hoverCursor = 'move';
    allowDraw = false;
    select.style.borderStyle = "solid";
    select.style.padding ="2px"
    select.style.borderTopColor ="red";
    lineD.style.borderStyle = "none";
    lineD.style.padding ="0px"
    lineD.style.borderTopColor ="";
    arrowD.style.borderStyle = "none";
    arrowD.style.padding ="0px"
    arrowD.style.borderTopColor ="";
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
    isDrawLine = true;
    isDrawArrow = false;
    selectOn = false;
    select.style.borderStyle = "none";
    select.style.padding ="0px"
    select.style.borderTopColor ="";
    lineD.style.borderStyle = "solid";
    lineD.style.padding ="2px"
    lineD.style.borderTopColor ="red";
    arrowD.style.borderStyle = "none";
    arrowD.style.padding ="0px"
    arrowD.style.borderTopColor ="";
  }
  });

  arrowD.addEventListener('click' , function(){
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
      isDrawLine = false;
      selectOn = false;
      isDrawArrow = true;
      lineD.style.borderStyle = "none";
      lineD.style.padding ="0px"
      lineD.style.borderTopColor ="";
      select.style.borderStyle = "none";
      select.style.padding ="0px"
      select.style.borderTopColor ="";
      arrowD.style.borderStyle = "solid";
      arrowD.style.padding ="2px"
      arrowD.style.borderTopColor ="red";
    }
  })

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
          translateX: 200,
          translateY: 200,
          stroke:'yellow', 
          strokeWidth:5
        });
    canvas.add(circle);
    
    canvas.selection = false;
    canvas.forEachObject(function(o) {
        o.selectable = false;
      });
    canvas.hoverCursor = 'default'
    allowDraw = true;
    makeCirAn(circle);
    }
  }
  });

  squareD.addEventListener('click', function(){
    if(vid.src == ""){
  
    }else{
      if(allowDraw){
      isDrawSquare = true;
      vid.pause();
      checkBtn();
      rect =new fabric.Rect(
        { fill: 'rgba(0,0,0,0)', 
          top: 300, 
          left: 200, 
          width: 100,
          height: 50,
          stroke:'yellow', 
          strokeWidth:5
        });
      rect.toObject = (function(toObject){
      return function(){
            return fabric.util.object.extend(toObject.call(this),{
            name: this.name
            })
      }
      })(rect.toObject);
      canvas.add(rect);
      rect.name = "rectangle";
      console.log(rect);
      canvas.selection = false;
      canvas.forEachObject(function(o) {
          o.selectable = false;
        });
      canvas.hoverCursor = 'default'
      allowDraw = true;
      makeRecAn(rect);
      }
    }
    });


  bin.addEventListener('click', function(){
    vid.pause();
    btn.classList = ("fa fa-play");
    deleteObjects();
  });

  undo.addEventListener('click',function(){
    console.log("clicked");
    undoArrow();
  })

  function undoArrow(){
    console.log("undo");
    var end = canvas._objects[canvas._objects.length-1];
    if(end.name == "triangle"){
      var endline = canvas._objects[canvas._objects.length-2];
     
      arrowDelete(endline, end);
      
    }else{
      for(var i = canvas._objects.length-1; i >= 0; i--){
        if(canvas._objects[i].name == "triangle"){
          end = canvas._objects[i]
          var endline = canvas._objects[i-1];
          arrowDelete(endline, end);
          break;
        }
      }
    }
    canvas.renderAll();
    console.log(end);
  };


  function arrowDelete(endline, end){
    var isMatch1 = false;
    var isMatch2 = false;
    var isMatch3 = false;
    var isMatch4 = false;
  for(var i = 0; i < anns.length; i++){
    if(endline.x1.toFixed(2) == anns[i].x1){
      isMatch1 = true;
      console.log("check 1");
    }else{
      console.log("check failed");
      isMatch1 = false;
    }
    if(endline.x2.toFixed(2) == anns[i].x2){
      isMatch2 = true;
      console.log("check 2");
    }else{
      console.log("check failed");
      isMatch2 = false;
    }
    if(endline.y1.toFixed(2) == anns[i].y1){
      isMatch3 = true;
      console.log("check 3");
    }else{
      console.log("check failed");
      isMatch3 = false;
    }
    if(endline.y2.toFixed(2) == anns[i].y2){
      isMatch4 = true;
      console.log("check 4");
    }else{
      console.log("check failed");
      isMatch4 = false;
    }
  
  if(isMatch1 && isMatch2 && isMatch3 && isMatch4){
    if(anns[i].user_id == user.id){
      canvas.remove(end);
      canvas.remove(endline);
      console.log("check complete");
      deletor(anns[i].id);
    }
  }
}

}

//mouse listeners 

  canvas.on('mouse:down', function(o){
    if(allowDraw && isDrawLine){
      isDrawing = true;
      var pointer = canvas.getPointer(o.e);
      var points = [ pointer.x, pointer.y, pointer.x, pointer.y ];
      line = new fabric.Line(points, {
      strokeWidth: 5,
      fill: 'yellow',
      stroke: 'yellow',
      originX: 'center',
      originY: 'center',
  
    });
    line.toObject = (function(toObject){
      return function(){
            return fabric.util.object.extend(toObject.call(this),{
            name: this.name
            })
      }
      })(line.toObject);
    canvas.add(line);
    line.name = "line";
  }

    if(allowDraw && isDrawArrow){
      isDrawing = true;
      var pointer = canvas.getPointer(o.e);
      var points = [ pointer.x, pointer.y, pointer.x, pointer.y ];
      line = new fabric.Line(points, {
      strokeWidth: 5,
      fill: 'yellow',
      stroke: 'yellow',
      originX: 'center',
      originY: 'center',
  
    });
    line.toObject = (function(toObject){
      return function(){
            return fabric.util.object.extend(toObject.call(this),{
            name: this.name
            })
      }
      })(line.toObject);
    canvas.add(line);
    line.name = "arrow";
    }
  });


  canvas.on('mouse:down',function(e){
    if(selectOn){
      ob = e.target;
      ol = ob.left;
      ot = ob.top;
      console.log(ob);
    }
  })

  

  canvas.on('mouse:up', function(e){
    if(selectOn){
     if(ob.radius){
        for(var i = 0; i<anns2.length; i++){
            if((vid.currentTime >= (anns[i].vidTime - 0.15)) && (vid.currentTime <= (anns[i].vidTime + 0.15)) && (anns[i].top.toFixed(2) == ot.toFixed(2)) && (anns[i].left.toFixed(2) == ol.toFixed(2))){
              if(anns2[i].user_id == user.id){
                updateCirAn(anns[i].id , ob.left, ob.top ,ob.scaleX ,ob.scaleY ,ob.angle);
              }
              ot = ob.top;
              ol = ob.left;
              break;
            }
        }
     }else if(ob.name == "rectangle"){
      for(var i = 0; i<anns2.length; i++){
        if((vid.currentTime >= (anns[i].vidTime - 0.15)) && (vid.currentTime <= (anns[i].vidTime + 0.15)) && (anns[i].top.toFixed(2) == ot.toFixed(2)) && (anns[i].left.toFixed(2) == ol.toFixed(2))){
          if(anns2[i].user_id == user.id){
            updateAn(anns[i].id , ob.left, ob.top ,ob.scaleX ,ob.scaleY ,ob.angle);
          }
          ot = ob.top;
          ol = ob.left;
          break;
        }
    }
     }else if(ob.name == "line"){
        for(var i = 0; i<anns2.length; i++){
          if((anns2[i].x1 == ob.x1.toFixed(2)) && (anns2[i].x2 == ob.x2.toFixed(2)) && (anns2[i].y1 == ob.y1.toFixed(2)) && (anns2[i].y2 == ob.y2.toFixed(2))){
            if(anns2[i].user_id == user.id){
              updateAn(anns2[i].id , ob.left, ob.top ,ob.scaleX ,ob.scaleY ,ob.angle);
            }
            break;
          }
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
    if(isDrawArrow){
      line.setCoords();
      points = [line.x1 , line.y1, line.x2, line.y2]
      line.type = "arrow";
      makeArrowAn(line);
      var colour = "yellow";
      createArrowHead(points, colour);
      canvas.renderAll();
      line.selectable = false;
    }

    if (isDrawLine){
      line.setCoords();
      canvas.renderAll();
      makeAn(line);
    }
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


   
//functions 
  //deletes objects
  function deleteObjects(){
    let activeObjects = canvas.getActiveObjects();
    if (activeObjects.length) {
         activeObjects.forEach(function (object) {
                canvas.remove(object);
                console.log(ot);
                console.log(ol);
                for(var i = 0; i < anns.length; i++){
                  console.log("inLoop");
                  var isMatch1 = false;
                  var isMatch2 = false;
                  var isMatch3 = false;
                  var isMatch4 = false;
                  if(object.radius){
                    if(ot.toFixed(2) == anns[i].top){
                      isMatch1 = true;
                      console.log("check 1");
                    }else{
                      console.log(object.top.toFixed(2));
                      console.log(anns[i].top);
                      console.log("check failed");
                      isMatch1 = false;
                    }
                    if(ol.toFixed(2) == anns[i].left){
                      isMatch2 = true;
                      console.log("check 2");
                    }else{
                      console.log("check failed");
                      isMatch2 = false;
                    }
                    if(isMatch1 == true && isMatch2 == true){
                      isMatch3 = true;
                      isMatch4 = true;
                    }else{
                      isMatch3 = false;
                      isMatch4 = false;
                    }
                  }else if(object.name == "rectangle"){
                    if(object.top.toFixed(2) == anns[i].top){
                      isMatch1 = true;
                      console.log("check 1");
                    }else{
                      console.log("check failed");
                      isMatch1 = false;
                    }
                    if(object.left.toFixed(2) == anns[i].left){
                      isMatch2 = true;
                      console.log("check 2");
                    }else{
                      console.log("check failed");
                      isMatch2 = false;
                    }
                    if(object.width.toFixed(2) == anns[i].width){
                      isMatch3 = true;
                      console.log("check 3");
                    }else{
                      console.log("check failed");
                      isMatch3 = false;
                    }
                    if(object.height.toFixed(2) == anns[i].height){
                      isMatch4 = true;
                      console.log("check 4");
                    }else{
                      console.log("check failed");
                      isMatch4 = false;
                    }
                  }else{
                      if(object.x1.toFixed(2) == anns[i].x1){
                        isMatch1 = true;
                        console.log("check 1");
                      }else{
                        console.log("check failed");
                        isMatch1 = false;
                      }
                      if(object.x2.toFixed(2) == anns[i].x2){
                        isMatch2 = true;
                        console.log("check 2");
                      }else{
                        console.log("check failed");
                        isMatch2 = false;
                      }
                      if(object.y1.toFixed(2) == anns[i].y1){
                        isMatch3 = true;
                        console.log("check 3");
                      }else{
                        console.log("check failed");
                        isMatch3 = false;
                      }
                      if(object.y2.toFixed(2) == anns[i].y2){
                        isMatch4 = true;
                        console.log("check 4");
                      }else{
                        console.log("check failed");
                        isMatch4 = false;
                      }
                  }
                  if(isMatch1 && isMatch2 && isMatch3 && isMatch4){
                    console.log("check complete");
                    if((anns[i].user_id == user.id)){
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

//clearing canvas of objects
function clearCanvas(){
  canvas.forEachObject(function(o) {
    canvas.remove(o);
  });

}
 
//redrawing annotations
function circleAn(i){
  console.log("circ called");
  if(anns[i].user_id == user.id){
    var colour = "yellow";
  }
  if((anns[i].user_id != user.id) && anns[i].share == "true"){
    colour = "red"; 
  }
  circle = new fabric.Circle(
    { radius: 40, 
      fill: 'rgba(0,0,0,0)', 
      top: anns[i].top, 
      left: anns[i].left, 
      stroke: colour, 
      strokeWidth:5,
      translateX: anns[i].translateX,
      translateY: anns[i].translateY,
      scaleX: anns[i].scaleX,
      scaleY: anns[i].scaleY,
      height: anns[i].height,
      width: anns[i].width,
    });
    console.log(circle);
canvas.add(circle);
canvas.renderAll();
}
  
function lineAn(i){
  if(anns[i].user_id == user.id){
    var colour = "yellow";
  }
  if((anns[i].user_id != user.id) && anns[i].share == "true"){
    colour = "red"; 
  }
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
    fill: colour,
    stroke: colour,
    originX: 'center',
    originY: 'center',

  });
  line.toObject = (function(toObject){
    return function(){
          return fabric.util.object.extend(toObject.call(this),{
          name: this.name
          })
    }
    })(line.toObject);
  canvas.add(line);
  line.name = "line";
  canvas.renderAll();
}

function rectAn(i){
  if(anns[i].user_id == user.id){
    var colour = "yellow";
  }
  if((anns[i].user_id != user.id) && anns[i].share == "true"){
    colour = "red"; 
  }
  rect = new fabric.Rect(
    { 
      fill: 'rgba(0,0,0,0)',
      top: anns[i].top, 
      left: anns[i].left, 
      stroke: colour, 
      strokeWidth:5,
      scaleX: anns[i].scaleX,
      scaleY: anns[i].scaleY,
      height: anns[i].height,
      width: anns[i].width,
    });
  rect.toObject = (function(toObject){
    return function(){
      return fabric.util.object.extend(toObject.call(this),{
        name: this.name
      })
    }
  })(rect.toObject);

    console.log(rect);
canvas.add(rect);
rect.name = "rectangle";
canvas.renderAll();
}

function arrowAn(i){
  if(anns[i].user_id == user.id){
    var colour = "yellow";
  }
  if((anns[i].user_id != user.id) && anns[i].share == "true"){
    colour = "red"; 
  }
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
    fill: colour,
    stroke: colour,
    originX: 'center',
    originY: 'center',

  });
  line.toObject = (function(toObject){
    return function(){
      return fabric.util.object.extend(toObject.call(this),{
        name: this.name
      })
    }
  })(line.toObject);

  line.selectable = false;
  
  canvas.add(line);
  line.name = "arrow";
  
  createArrowHead(points, colour);
 

}


function createArrowHead(points, colour) {
  var headLength = 15,

      x1 = points[0],
      y1 = points[1],
      x2 = points[2],
      y2 = points[3],

      dx = x2 - x1,
      dy = y2 - y1,

      angle = Math.atan2(dy, dx);

  angle *= 180 / Math.PI;
  angle += 90;

  var triangle = new fabric.Triangle({
    angle: angle,
    fill: colour,
    top: y2,
    left: x2,
    height: headLength,
    width: headLength,
    originX: 'center',
    originY: 'center',
    selectable: false
  });

 triangle.toObject = (function(toObject){
    return function(){
      return fabric.util.object.extend(toObject.call(this),{
        name: this.name
      })
    }
  })(triangle.toObject);

  triangle.selectable= false;
  canvas.add(triangle);
  triangle.name = "triangle";
  console.log(canvas);
}



  

 
  
