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

<div class="container-fluid">
	<div class="row pt-3">
		<div class="col-md-2">
		</div>
		<div class="col-md-4">
        <label for="name"><b>Quiz Name:</b></label>
        <input type="text" name="name" id="name" class="form-control" value="{{$quiz->name}}"placeholder="{{$quiz->name}}">
		</div>
		<div class="col-md-4">
        <br>
        <a href="{{ route('quizAddQ', $quiz->id) }}" class="btn btn-secondary " tabindex="-1" role="button" >Add Question</a>
        <a href="{{ route('quizAddMQ', $quiz->id) }}" class="btn btn-secondary" tabindex="-1" role="button" >Add MultipleChoice</a>
		</div>
		<div class="col-md-2">
		</div>
	</div>
	<div class="row pt-3">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
        <table class="table table-sm table-striped text-center" id="myTable">
        <thead class="thead-dark">
          <tr>
          <th scope="col">Questions </th>
          <th scope="col">Type </th>
        </tr>
        </thead>
        <tbody>
          @foreach ($quiz->questions as $question)
            <tr>
            <td>{{$question->question}}</td>
            <td>{{$question->type}}</td>
            </tr>
          @endforeach
      </table>   
		</div>
		<div class="col-md-2">
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
            <button  class="btn btn-success" onClick="updateQuiz()">Submit</button>
            <a href="{{ route('quizIndex', $team->id) }}" class="btn btn-danger">Cancel</a>
		</div>
		<div class="col-md-2">
		</div>
	</div>
</div>

<script>
var quiz = <?php echo json_encode($quiz->id); ?>;
var team = <?php echo json_encode($team->id); ?>;


function updateQuiz(){
    var name = document.getElementById("name").value;
    
    
    $.ajax({
      type: 'POST',
      url: '/quiz/store',
      data: {"_token": "{{ csrf_token() }}", 
            'quiz_id': quiz,
            'team_id':team,
            'name': name,
            
          },
          success: function(data){
            window.location = "{{route('quizIndex' , $team->id)}}";
          },error:function(data){ 
             console.log(data);
             alert("Something went wrong. Check you have entered a name");
          }
    });
}
</script>


@endsection