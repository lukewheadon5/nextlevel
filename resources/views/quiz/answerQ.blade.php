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
	<div class="row pt-2">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
            <label for="question"><b>Question:</b></label>
            <textarea name="question" id="question" class="form-control"  rows="1" readonly>{{$question->question}}</textarea>
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
            <button  class="btn btn-success" onClick="saveAnswer()">Submit</button>
            <a href="{{ route('quizShow', $question->id) }}" class="btn btn-danger">Cancel</a>
            </div>
		</div>
		<div class="col-md-2">
		</div>
	</div>
</div>

<script>


var answer = <?php echo json_encode($question->answer); ?>;
var question = <?php echo json_encode($question->id); ?>;
var user = <?php echo json_encode(auth()->id()); ?>;
function saveAnswer(){
    var ans = document.getElementById("answer").value;

    if(ans == answer){
        var score = "1";
    }else{
        var score = "0";
    }

    $.ajax({
      type: 'POST',
      url: '/quiz/store/result',
      data: {"_token": "{{ csrf_token() }}", 
            'question_id': question,
            'user_id':user,
            'score': score,
          },
          success: function(data){
            window.location = "{{route('quizShow' , $question->quiz->id)}}";
          },error:function(data){ 
             console.log(data);
             alert("Something went wrong.");
          }
    });
}

</script>


@endsection