//video controls 
var vid = document.getElementById("video");
var juice = document.getElementById("prog-juice");
var btn = document.getElementById("play-pause");
var line = document.getElementById("lineDraw");
var seekslider = document.getElementById("prog-bar");

seekslider.addEventListener("change",function(){
    var seekto = vid.duration * (seekslider.value / 100);
    console.log(seekto);
	vid.currentTime = seekto;
});

document.getElementById("replay").addEventListener("click",function(){
    var newTime = 0;
    vid.currentTime = newTime;
});

document.getElementById("skipBack").addEventListener("click",function(){
    var newTime = vid.currentTime -10;
    vid.currentTime = newTime;
});

document.getElementById("skipFor").addEventListener("click",function(){
    var newTime = vid.currentTime + 10;
    vid.currentTime = newTime;
});


function togglePP(){
  btn.classList.toggle("fa-pause");
  if(vid.paused){
    vid.play();
  }else{
    vid.pause();
  }
}

vid.addEventListener('timeupdate', function(){
    var nt = vid.currentTime * (100 / vid.duration);
	seekslider.value = nt;
if(vid.ended){
  btn.classList = ("fa fa-play");
}


})
        