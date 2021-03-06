@extends('layouts.app')



@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
  <li style="float:left"><a href="{{route('members' ,  $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Membership</a></li>
</ul>

<script src="{{ asset('js/app.js') }}" defer></script>
<div class="row">
<div class="col-md-2">
</div>
    <div class="col-md-6">
        <h1>Add Game</h1>
    </div>
</div>

<div class="row">
<div class="col-md-2">
</div>
    <div class="col-md-8">

    <label for="opponent"><b>Opponent Name:</b></label>
    <textarea id="opponent" name="opponent" class="form-control" placeholder="Enter Name"></textarea>
    <div class="pb-2">
    </div>

    <label for="season"><b>Season:</b></label>
    <select class="form-control" id="season" name="season">
    <option value="" selected disabled hidden>Choose here</option>
    @foreach($team->seasons as $season)
    <option value='{{ $season->id }}'>{{$season->year}}</option>
    @endforeach
    </select>
    <div class="pb-2">
    </div>


  <button type="submit" class="btn btn-success" onClick="createGame()">Submit</button>  
  <a href="{{ route('stats' ,  $team->id) }}" class="btn btn-danger">Cancel</a>
</form>

</div>
</div>

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
var id = <?php echo json_encode($team->id); ?>;
var sport = <?php echo json_encode($team->sport->id); ?>;


 
function createGame(){
  var opponent = document.getElementById("opponent").value;
  var sel = document.getElementById('season');
  var opt = sel.options[sel.selectedIndex];

  $.ajax({
      type: 'POST', 
          url: '/game/save',
          data: {"_token": "{{ csrf_token() }}", "opponent":opponent, "id":id, "sport":sport, "season":opt.value},
          success: function (data) {
              alert("Successfully added game to season")
              window.location = '/statistics/team/'+id;
          },
          error:function(data){ 
             console.log(data);
             alert("Something went wrong. Make sure you select a season and enter a name");
          }
          
  });


}


</script>








@endsection