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
  <li style="float:left"><a href="{{route('members' , $team->id)}}" style = "display:block; color:white; text-align:center; padding:14px 16px; text-decoration:none ">
  Membership</a></li>
</ul>

<div class="container-fluid pt-3">
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-4">
        <h3>
            New Question
        </h3>
		</div>
		<div class="col-md-4">
		</div>
		<div class="col-md-2">
		</div>
	</div>
	<div class="row pt-2">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
            <label for="question"><b>Question:</b></label>
            <textarea name="question" id="question" class="form-control" placeholder="Enter Question" rows="5"></textarea>
		</div>
		<div class="col-md-2">
		</div>
	</div>
	<div class="row pt-2">
		<div class="col-md-2">
		</div>
		<div class="col-md-4">
            <label for="mc1"><b>Option 1:</b></label>
            <textarea name="mc1" id="mc1" class="form-control" placeholder="Enter Answer" rows="3"></textarea>
          
		</div>

        <div class="col-md-4">  
            <label for="mc2"><b>Option 2:</b></label>
            <textarea name="mc2" id="mc2" class="form-control" placeholder="Enter Answer" rows="3"></textarea>
		</div>
		<div class="col-md-2">
		</div>
	</div>
    <div class="row pt-2">
		<div class="col-md-2">
		</div>
		<div class="col-md-4">
            <label for="mc3"><b>Option 3:</b></label>
            <textarea name="mc3" id="mc3" class="form-control" placeholder="Enter Answer" rows="3"></textarea>
            <div class="pt-2">
            <label for="answer"><b>Correct Option:</b></label>
                <select class="form-control" id="answer" name="answer">
                <option value="" selected disabled hidden>Choose option</option>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
                </select>
            </div>
            <div class="pt-2">
            <button  class="btn btn-success" onClick="saveQuestion()">Submit</button>
            <a href="{{ route('quizEdit', $quiz->id) }}" class="btn btn-danger">Cancel</a>
            </div>

		</div>

        <div class="col-md-4">
            <label for="mc4"><b>Option 4:</b></label>
            <textarea name="mc4" id="mc4" class="form-control" placeholder="Enter Answer" rows="3"></textarea>
		</div>
		<div class="col-md-2">
		</div>
	</div>
</div>


<script>

var quiz = <?php echo json_encode($quiz->id); ?>;
var type = "multiChoice";

function saveQuestion(){
    var question = document.getElementById("question").value;
    var answer = document.getElementById("answer").value;
    var mc1 = document.getElementById("mc1").value;
    var mc2 = document.getElementById("mc2").value;
    var mc3 = document.getElementById("mc3").value;
    var mc4 = document.getElementById("mc4").value;
    
    $.ajax({
      type: 'POST',
      url: '/quiz/storeQ',
      data: {"_token": "{{ csrf_token() }}", 
            'quiz_id': quiz,
            'type':type,
            'question': question,
            'answer': answer,
            'mc1':mc1,
            'mc2':mc2,
            'mc3':mc3,
            'mc4':mc4,
          },
          success: function(data){
            window.location = "{{route('quizEdit' , $quiz->id)}}";
          },error:function(data){ 
             console.log(data);
             alert("Something went wrong.");
          }
    });
}


</script>


@endsection