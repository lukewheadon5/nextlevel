
//video controls 
var vidH = document.getElementById("high");
var pBtn = document.getElementById("playBtn");
var hPlayer = document.getElementById("Hplayer");
var durationTimeH = document.getElementById("durationTimeH");
var currentTimeH = document.getElementById("currentTimeH");
var newStart = document.getElementById("newStart");
var newDuration = document.getElementById("newDuration");

var startTime = 0;
var endTime ;

var thumbA = document.getElementById("a");
var thumbB = document.getElementById("b");
var thumbC = document.getElementById("c");


pBtn.addEventListener("click",function(){
      pBtn.classList.toggle("fa-pause");
      if(vidH.paused){
        vidH.play();
      }else{
        vidH.pause();
      }
      console.log(endTime);
})


thumbB.addEventListener("mousedown",function(){
vidH.pause();
});

thumbB.addEventListener("mouseup",function(){
  if(pBtn.className == "fa fa-play fa-pause"){
    vidH.play()
  }
});

thumbA.addEventListener("change",function(){
  function formatTime(seconds) {
    var minutes = Math.floor(seconds / 60);
    minutes = (minutes >= 10) ? minutes : minutes;
    var hours = Math.floor(minutes / 60);
    hours = (minutes >= 10) ? hours : hours;
    var seconds = Math.floor(seconds % 60);
    seconds = (seconds >= 10) ? seconds : seconds;
    return hours + ":" + minutes + ":" + seconds;
}
  startTime = vidH.duration * (thumbA.value / 100);
  var seconds = startTime;
  newStart.innerHTML = formatTime(seconds);
});

thumbB.addEventListener("change",function(){
  var seekto = vidH.duration * (thumbB.value / 100);
  vidH.currentTime = seekto;
});

thumbC.addEventListener("change",function(){
  function formatTime(seconds) {
    var minutes = Math.floor(seconds / 60);
    minutes = (minutes >= 10) ? minutes : minutes;
    var hours = Math.floor(minutes / 60);
    hours = (minutes >= 10) ? hours : hours;
    var seconds = Math.floor(seconds % 60);
    seconds = (seconds >= 10) ? seconds : seconds;
    return hours + ":" + minutes + ":" + seconds;
}
  endTime = vidH.duration * (thumbC.value / 100);
  var seconds = endTime;
  newDuration.innerHTML = formatTime(seconds);
});

vidH.addEventListener('timeupdate', function(){
  var nt = vidH.currentTime * (100 / vidH.duration);
  thumbB.value = nt;
  let _t = thumbB;
  _t.parentNode.style.setProperty(`--${_t.id}`, +_t.value);
  if(vidH.ended){
  checkBtn();
  }
})

vidH.addEventListener("timeupdate", function(){
  if(vidH.currentTime >= endTime){
    vidH.pause();
    if(newStart == 0){
      vidH.currentTime = 0;
    }else{
      vidH.currentTime = startTime;
    }
    vidH.play();
    checkBtn();
  } 

});


vidH.addEventListener("timeupdate", function() {
    function formatTime(seconds) {
      var minutes = Math.floor(seconds / 60);
      minutes = (minutes >= 10) ? minutes : minutes;
      var hours = Math.floor(minutes / 60);
      hours = (minutes >= 10) ? hours : hours;
      var seconds = Math.floor(seconds % 60);
      seconds = (seconds >= 10) ? seconds : seconds;
      return hours + ":" + minutes + ":" + seconds;
  }

  var seconds = vidH.currentTime;
  currentTimeH.innerHTML = formatTime(seconds);
  });


vidH.addEventListener("timeupdate", function() {
function formatTime(seconds) {
    var minutes = Math.floor(seconds / 60);
    minutes = (minutes >= 10) ? minutes : minutes;
    var seconds = Math.floor(seconds % 60);
    seconds = (seconds >= 10) ? seconds : seconds;
    return minutes + ":" + seconds;
}
var seconds = vidH.duration;
durationTimeH.innerHTML = formatTime(seconds);
});



addEventListener('input', e => {
  let _t = e.target;
  _t.parentNode.style.setProperty(`--${_t.id}`, +_t.value);
}, false);

function checkBtn(){
  if(!vidH.paused){
    if(pBtn.classList == "fa fa-play fa-pause"){

    }else{
      pBtn.classList.toggle("fa-pause");
    }
  }
  
}