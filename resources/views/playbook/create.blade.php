@extends('layouts.app')



@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/3.6.2/fabric.min.js"></script>
<script src="{{ asset('js/playbook.js') }}" defer></script>

<ul style="list-style-type: none;
  margin: 0;
  padding:0px;
  overflow: hidden;
  background-color: #333;"> 

<li style="float:left; padding-left:5px; padding-top:5px;">
  @if(empty($team->image ))
    <img src="/images/sportsballs.png" alt="Team Logo" 
        width="40px" height="40px" class="rounded-circle"/>
  @else
    <img src="{{asset('images/'. $team->image)}}" alt="Team Logo" 
        width="40px" height="40px" class="rounded-circle"/>                    
    @endif
  </li>
  <li style="float:left"><a class="active" href="{{route('team.show' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Home</a></li>
  <li style="float:left"><a href="{{route('calendar' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Calendar</a></li>
  <li style="float:left"><a href="{{route('roster' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Lineup</a></li>
  <li style="float:left"><a href="{{route('playIndex' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Playbook</a></li>
  <li style="float:left"><a href="{{route('player' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Video</a></li>
  <li style="float:left"><a href="{{route('stats' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Statistics</a></li>
  <li style="float:left"><a href="{{route('quizIndex' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Quizzes</a></li>
  <li style="float:left"><a href="{{route('members' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Membership</a></li>
</ul>


<div class="container-fluid">
	<div class="row pt-2">
		<div class="col-md-12 text-center">
            <h1>
                Create Play
            </h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
            <label for="name"><b>Play Name:</b></label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required>
		</div>
		<div class="col-md-4">
        <br>
        Shirt Colour:
         <input type="color" id="color"  name="color" value="#ff0000">  
        <button class="btn btn-secondary" onClick="addPlay()">Add Player</button>
               
		</div>
		<div class="col-md-4 pl-2">
        <br>
        <button><i id ="selector" class="fa fa-hand-pointer-o" aria-hidden="true" title="Select"style="font-size: 30px;"></i></button>
        <button><i id ="lineDraw" class="fa fa-minus" title="Line" style="font-size: 30px;"></i></button>
        <button><i id ="arrowDraw" class="fa fa-arrow-up" title="arrow" style="font-size: 30px;"></i></button>
              
		</div>
	</div>
	<div class="row pt-3">
		<div class="col-md-2">
        <h3>
            Set Background:
        </h3>
        <div class="pb-2">
        <button class="btn btn-success" onClick="setf()">Football Pitch</button>
        </div>
        <div class="pb-2">
        <button class="btn btn-success" onClick="setaf()">American Football Pitch</button>
        </div>
                
		</div>
		<div class="col-md-8">
            <div class="container" id="wrapper" style="position: relative; width:800px; height:500px; ">
                <canvas id="formationCanvas" style="position: absolute;
                top: 0;
                left: 0;
                z-index: 3;
                width:100%; 
                height:500;
                border:2px solid black; ">
                </canvas>
            </div>
		</div>
		<div class="col-md-2">

            
		</div>
	</div>
	<div class="row pt-2">
		<div class="col-md-2">
		</div>
		<div class="col-md-4">
            <button  class="btn btn-success" onClick="savePlay()">Submit</button>
            <a href="{{ route('playIndex', $team->id) }}" class="btn btn-danger">Cancel</a>
		</div>
		<div class="col-md-4 text-right">
            <button  class="btn btn-secondary" onClick="clearC()">Clear</button>
            <button class="btn btn-secondary" onClick="undo()">Undo</button>
		</div>
		<div class="col-md-2">
		</div>
	</div>
</div>

<script>
var team = <?php echo json_encode($team->id); ?>;

function savePlay(){
    var name = document.getElementById("name").value;
    var json = JSON.stringify( canvas.toJSON() );
    $.ajax({
      type: 'POST',
      url: '/play/store',
      data: {"_token": "{{ csrf_token() }}", 
            'team_id': team,
            'name': name,
            'canvas': json,
          },
          success: function(data){
            window.location = "{{route('playIndex' , $team->id)}}";
          },error:function(data){ 
             console.log(data);
             alert("Something went wrong. Check you have entered a name");
          }
    });
}

</script>



@endsection