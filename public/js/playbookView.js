var wrapper = document.getElementById("wrapper");
var wrapperWidth = wrapper.offsetWidth;
var wrapperHeight = wrapper.offsetHeight;
var canvas = new fabric.Canvas('formationCanvas',{width: wrapperWidth,height: wrapperHeight});
var canvasHeight = canvas.height;
var canvasWidth = canvas.width;


canvas.loadFromJSON(json, canvas.renderAll.bind(canvas), function(o, object) {
    object.set('selectable', false);
    canvas.hoverCursor = 'default';
});

canvas.renderAll();