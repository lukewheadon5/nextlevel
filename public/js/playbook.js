var wrapper = document.getElementById("wrapper");
var wrapperWidth = wrapper.offsetWidth;
var wrapperHeight = wrapper.offsetHeight;
var canvas = new fabric.Canvas('formationCanvas',{width: wrapperWidth,height: wrapperHeight});
var canvasHeight = canvas.height;
var canvasWidth = canvas.width;

var lineD = document.getElementById("lineDraw");
var arrowD = document.getElementById("arrowDraw");
var select = document.getElementById("selector");
var isDrawing = false;
var allowDraw = false;
var isDrawArrow = false;


var fotImg = new fabric.Image();
fotImg.setSrc('/images/football_pitch.jpg', function () {
});

var afImg = new fabric.Image();
afImg.setSrc('/images/af_pitch.jpg', function () {
});

function setf(){
    canvas.setBackgroundImage(fotImg, canvas.renderAll.bind(canvas), {
        scaleX: canvas.width / fotImg.width,
        scaleY: canvas.height / fotImg.height
     });
}

function setaf(){
    canvas.setBackgroundImage(afImg, canvas.renderAll.bind(canvas), {
        scaleX: canvas.width / afImg.width,
        scaleY: canvas.height / afImg.height
     });
}

 function undo(){
    var end = canvas._objects[canvas._objects.length-1];
    canvas.remove(end);

}

function clearC(){
    console.log("called");
    canvas.clear();
    canvas.renderAll();
}


select.addEventListener('click', function(){

      selectOn = true;
      isDrawLine = false;
      isDrawCircle = false;
      isDrawSquare = false;
      isDrawText = false;
      isDrawArrow = false;
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
    
    });
  
   lineD.addEventListener('click', function(){

      canvas.discardActiveObject();
      canvas.renderAll();
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
    
    });
  
    arrowD.addEventListener('click' , function(){
     
        canvas.discardActiveObject();
        canvas.renderAll();
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
      
    })


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
        canvas.add(line);
        line.name = "arrow";
        }
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
        if(isDrawArrow){
          line.setCoords();
          points = [line.x1 , line.y1, line.x2, line.y2]
          var colour = "yellow";
          createArrowHead(points, colour);
          canvas.renderAll();
        }
    
        if (isDrawLine){
          line.setCoords();
          canvas.renderAll();
        }
      });


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
        
        canvas.remove(line);
       
        var g = new fabric.Group([line, triangle],{
            selectable: true,
        });

        canvas.add(g);
        canvas.renderAll();
      }
    
  




function addPlay(){
    var color = document.getElementById("color").value;
    var c = new fabric.Circle({
        left: canvasWidth/2,
        top: canvasHeight/2,
        radius: 15,
        fill: color,
        stroke: '#666',
        selectable: true,
        centeredScaling:true,
        hasRotatingPoint: false,
        borderColor: 'black',
        cornerColor: 'black'
    });

canvas.add(c);

}






canvas.renderAll();