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
		<div class="col-md-8">
            <label for="answer"><b>Answer:</b></label>
            <textarea name="answer" id="answer" class="form-control" placeholder="Enter Answer" rows="5"></textarea>
            <div class="pt-2">
            <button  class="btn btn-success" onClick="saveQuestion()">Submit</button>
            <a href="{{ route('quizEdit', $quiz->id) }}" class="btn btn-danger">Cancel</a>
            </div>
		</div>
		<div class="col-md-2">
		</div>
	</div>
</div>

<script>
var quiz = <?php echo json_encode($quiz->id); ?>;
var type = "Written";

function saveQuestion(){
    var question = document.getElementById("question").value;
    var answer = document.getElementById("answer").value;
    
    
    $.ajax({
      type: 'POST',
      url: '/quiz/storeQ',
      data: {"_token": "{{ csrf_token() }}", 
            'quiz_id': quiz,
            'type':type,
            'question': question,
            'answer': answer,
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