//video controls 
var vid = document.getElementById("video");
var juice = document.getElementById("prog-juice");
var btn = document.getElementById("play-pause");
var line = document.getElementById("lineDraw");
var seekslider = document.getElementById("prog-bar");
var player = document.getElementById("player");
var fullBtn = document.getElementById("fullscreen");
var durationTime = document.getElementById("durationTime");
var currentTime = document.getElementById("currentTime");
var isFullScreen = false;
var currentVid = 0;
var lastDrawn;
var drawn = false;
var found = false;


function highlightRow(){
  var rows = document.querySelectorAll("#clips tr");
  for (var i = 1; i < rows.length; i++){
    if(i == currentVid + 1){
      rows[i].className += 'highlight';
    }else{
      rows[i].classList.remove("highlight");
    }
  }
}


seekslider.addEventListener("change",function(){
  lastDrawn = null;
  drawn = false;
  found = false;
  clearCanvas();
  var seekto = vid.duration * (seekslider.value / 100);
  vid.currentTime = seekto;
  checkBtn();
});

document.getElementById("next").addEventListener("click",function(){
  if(currentVid === vidList.length -1){
    currentVid = 0;
    vid.src = "/videos/"+vidList[currentVid];
  }else{
    currentVid = currentVid + 1;
    vid.src = "/videos/"+vidList[currentVid];
  }
  if(allowDraw = true){
    clearBtns();
    allowDraw = false;
  }
  if(selectOn = true){
    clearBtns();
    selectOn = false;
    canvas.selection = false;
  }
  highlightRow();
  play();
  checkBtn();
  clearCanvas();
  
});

document.getElementById("previous").addEventListener("click",function(){
  if(currentVid === 0){
    currentVid = vidList.length -1;
    vid.src = "/videos/"+vidList[currentVid];
  }else{
    currentVid = currentVid - 1;
    vid.src = "/videos/"+vidList[currentVid];
  }
  if(allowDraw = true){
    clearBtns();
    allowDraw = false;
  }
  if(selectOn = true){
    clearBtns();
    selectOn = false;
    canvas.selection = false;
  }

  highlightRow();
  play();
  checkBtn();
  clearCanvas();
  
  
});

document.getElementById("replay").addEventListener("click",function(){
    var newTime = 0;
    vid.currentTime = newTime;
    if(allowDraw = true){
      clearBtns();
      allowDraw = false;
    }
    if(selectOn = true){
      clearBtns();
      selectOn = false;
      canvas.selection = false;
    }
    play();
    checkBtn();
    clearCanvas();
});

document.getElementById("skipBack").addEventListener("click",function(){
    var newTime = vid.currentTime -10;
    vid.currentTime = newTime;
    if(allowDraw = true){
      clearBtns();
      allowDraw = false;
    }
    if(selectOn = true){
      clearBtns();
      selectOn = false;
      canvas.selection = false;
    }
  
});

document.getElementById("skipFor").addEventListener("click",function(){
    var newTime = vid.currentTime + 10;
    vid.currentTime = newTime;
    if(allowDraw = true){
      clearBtns();
      allowDraw = false;
    }
    if(selectOn = true){
      clearBtns();
      selectOn = false;
      canvas.selection = false;
    }
    
});

fullBtn.addEventListener("click",function(){
  fullBtn.classList.toggle("fa-compress");
  if(isFullScreen == false){
    player.requestFullscreen();
    isFullScreen = true;
  }else{
    document.exitFullscreen();
    isFullScreen = false;
  }

  
});


vid.addEventListener('timeupdate', function(){
    var nt = vid.currentTime * (100 / vid.duration);
	seekslider.value = nt;
if(vid.currentTime == vid.duration){
  btn.classList = ("fa fa-play");
}


})

vid.addEventListener("timeupdate", function() {
  function formatTime(seconds) {
    var minutes = Math.floor(seconds / 60);
    minutes = (minutes >= 10) ? minutes : minutes;
    var hours = Math.floor(minutes / 60);
    hours = (minutes >= 10) ? hours : hours;
    var seconds = Math.floor(seconds % 60);
    seconds = (seconds >= 10) ? seconds : seconds;
    return hours + ":" + minutes + ":" + seconds;
}
var seconds = video.currentTime;
currentTime.innerHTML = formatTime(seconds);
});


vid.addEventListener("timeupdate", function() {
function formatTime(seconds) {
    var minutes = Math.floor(seconds / 60);
    minutes = (minutes >= 10) ? minutes : minutes;
    var seconds = Math.floor(seconds % 60);
    seconds = (seconds >= 10) ? seconds : seconds;
    return minutes + ":" + seconds;
}
var seconds = video.duration;
durationTime.innerHTML = formatTime(seconds);
});

vid.addEventListener("timeupdate", function(){
  if(!drawn){
    for(var i = 0; i < anns.length; i++){
      console.log("looped");
      if((anns[i].video_id == vidIds[currentVid]) && ((vid.currentTime >= (anns[i].vidTime - 0.15)) && (vid.currentTime <= (anns[i].vidTime + 0.15)))){
        found = true;
        vid.pause();
        btn.classList.toggle("fa-pause"); 
        break;
      }
    }
  }
    if(found && !drawn){
        for(var x = 0; x < anns.length; x++){
          if(anns[x].video_id == vidIds[currentVid]){
            if((vid.currentTime >= (anns[x].vidTime - 0.2)) && (vid.currentTime <= (anns[x].vidTime + 0.2))){
              if(lastDrawn == anns[x].id){
                }else{ 
                  if(anns[x].type == "circle"){
                    console.log("draw circ");
                    lastDrawn = anns[x].id;
                  }else if(anns[x].type == "line"){
                    console.log("draw Line" + anns[x].vidTime);
                    lastDrawn = anns[x].id;
                    console.log(lastDrawn);
                    lineAn(x);
                  }
                }  
            }
          }
          
        }
    drawn = true;
    }
    
});



function pickVid(id){
  for(var i = 0; i < vidList.length; i++){
    if(vidList[i] === id){
        vid.src = "/videos/"+ vidList[i]
        currentVid = i;
        btn.classList.toggle("fa-pause"); 
        vid.play();
        lastDrawn = null;
        drawn = false;
        found = false;
        checkBtn();
        clearCanvas();
    }
  }
  highlightRow();
}

function play(){
  vid.play();
  lastDrawn = null;
  drawn = false;
  found = false;
}

function goToH(){
  if(vid.src == ""){

  }else{
    vid.pause();
    checkBtn();
    var id = vidIds[currentVid];
    window.location = '/highlight/'+id;
  }
}

function checkBtn(){
  if(!vid.paused){
    if(btn.classList == "fa fa-play fa-pause"){

    }else{
      btn.classList.toggle("fa-pause");
    }
  }

  
}







        