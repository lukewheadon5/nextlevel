var wrapper = document.getElementById("wrapper");
var wrapperWidth = wrapper.offsetWidth;
var wrapperHeight = wrapper.offsetHeight;
var canvas = new fabric.Canvas('formationCanvas',{width: wrapperWidth,height: wrapperHeight});
var canvasHeight = canvas.height;
 var canvasWidth = canvas.width;

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




function addPlay(){
    var player = document.getElementById("player").value;
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

var t = new fabric.Text(player, {
        fontFamily: 'Calibri',
        fontSize: 15,
        textAlign: 'center',
        originX: 'center',
        originY: 'center',
        left: c.left + 15,
        top: c.top - 10,
    });

var g = new fabric.Group([c, t],{
        selectable: true,
    });

canvas.add(g);


}






canvas.renderAll();
