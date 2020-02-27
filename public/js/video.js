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
    var seekto = vid.duration * (seekslider.value / 100);
	vid.currentTime = seekto;
});

document.getElementById("next").addEventListener("click",function(){
  if(currentVid === vidList.length -1){
    currentVid = 0;
    vid.src = "/videos/"+vidList[currentVid];
  }else{
    currentVid = currentVid + 1;
    vid.src = "/videos/"+vidList[currentVid];
  }
  highlightRow();
  play();
});

document.getElementById("previous").addEventListener("click",function(){
  if(currentVid === 0){
    currentVid = vidList.length -1;
    vid.src = "/videos/"+vidList[currentVid];
  }else{
    currentVid = currentVid - 1;
    vid.src = "/videos/"+vidList[currentVid];
  }
  highlightRow();
  play();
});

document.getElementById("replay").addEventListener("click",function(){
    var newTime = 0;
    vid.currentTime = newTime;
    play();
});

document.getElementById("skipBack").addEventListener("click",function(){
    var newTime = vid.currentTime -10;
    vid.currentTime = newTime;
});

document.getElementById("skipFor").addEventListener("click",function(){
    var newTime = vid.currentTime + 10;
    vid.currentTime = newTime;
    
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
if(vid.ended){
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



function pickVid(id){
  for(var i = 0; i < vidList.length; i++){
    if(vidList[i] === id){
        vid.src = "/videos/"+ vidList[i]
        currentVid = i;
        btn.classList.toggle("fa-pause"); 
        vid.play();
    }
  }
  highlightRow();
}

function play(){
  btn.classList.toggle("fa-pause"); 
  vid.play();
}







        