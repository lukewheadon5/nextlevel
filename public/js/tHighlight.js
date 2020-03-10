var vids = document.getElementsByClassName("vid");
var plays = document.getElementsByClassName("fa fa-play");
var fulls = document.getElementsByClassName("fa fa-expand");
var sliders = document.getElementsByClassName("bar");
var players = document.getElementsByClassName("containerP");
var isFullScreen = false;



function play(id){
    for(var z = 0; z<plays.length; z++){
        if(plays[z].id == id){

        }else{
            if(!vids[z].paused){
                
                vids[z].pause();
            }
            
        }
    }

    for(var i = 0; i<plays.length; i++){
        var a = i;
           
        if(plays[i].id == id){
            
            for(var x = 0; x<high.length; x++){
            if(high[x].id == vids[i].id){
                    var start = high[x].startTime;
                    var end = high[x].endTime;
                }
            }

            if(vids[a].currentTime < start){
                vids[a].currentTime = start;
               
            }
            
            if(vids[a].currentTime >= end){
                vids[a].currentTime = start;
               
            }
            
            check_time(i, start, end);

            if(vids[i].paused){
                vids[i].play();
                plays[i].classList.toggle("fa-pause");
            }else{
                vids[i].pause();
                plays[i].classList.toggle("fa-pause");
            }
        }
    }
}

function check_time(i, start, end){
    vids[i].addEventListener('timeupdate', (event) => {
         var time = vids[i].currentTime;
         if(time < start){
             vids[i].currentTime = start;
       }
            
         if(time >= end){
                vids[i].currentTime = start;
        }
     
        var nt = (vids[i].currentTime - start) * (100 / (end-start));
        sliders[i].value = nt;
        if(vids[i].ended){
        plays[i].classList = ("fa fa-play");
        }

        sliders[i].addEventListener("change",function(){
            var dur = (end - start);
            var seekto = (dur * (sliders[i].value  / 100))+start;
            vids[i].currentTime = seekto;
});

    fulls[i].addEventListener("click",function(){
        if(isFullScreen == false){
            fulls[i].classList.toggle("fa-compress");
            players[i].requestFullscreen();
            isFullScreen = true;
        }else{
            fulls[i].classList.toggle("fa-compress");
            document.exitFullscreen();
            isFullScreen = false;
            
        }
    });


    });
}


