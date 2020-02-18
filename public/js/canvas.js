function init () {
    // set our config variables
    canvas = document.getElementById('videoCanvas')
    ctx = canvas.getContext('2d')
  
    // outlined square X: 50, Y: 35, width/height 50
    ctx.beginPath()
    ctx.strokeRect(50, 35, 50, 50)
  
    // filled square X: 125, Y: 35, width/height 50
    ctx.beginPath()
    ctx.fillRect(125, 35, 50, 50)
  }
  
  function myCanvas() {
    var c = document.getElementById("videoCanvas");
    var ctx = c.getContext("2d");
    var vid = document.getElementById("video");
    ctx.drawImage(vid,0,0,700,400);
  
    vid.addEventListener('play', function () {
      (function loop() {
          if (!vid.paused && !vid.ended) {
              ctx.drawImage(vid, 0, 0,700,400);
              setTimeout(loop, 1000 / 30); // drawing at 30fps
          }
      })();
  }, 0);
  }