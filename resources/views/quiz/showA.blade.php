@extends('layouts.app')


@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{ asset('css/table.css') }}" rel="stylesheet">

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
            <h3>
            <a href="{{ route('quizIndex', $team->id) }}" tabindex="-1" role="button" ><i class="fa fa-arrow-circle-o-left" style="color:#000000" aria-hidden="true"></i></a>
            </h3>
		</div>
		<div class="col-md-4">
        <h3>
            {{$quiz->name}}
        </h3>
		</div>
		<div class="col-md-4">
        <h4>
       
            <?php echo 'Total score:'.$quiz->userscores->where('user_id' , auth()->id())->first()->score .''?>/{{$quiz->total}}
       </h4>
		</div>
		<div class="col-md-2">
        <a href="{{ route('quizDestroy', $quiz->id) }}" class="btn btn-danger">Delete</a>
		</div>
	</div>
	<div class="row pt-2">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
                Unanswered Questions
                <table class="table table-sm table-striped text-center" id="myTable">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Question</th>
                <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($quiz->questions as $question)

                    @foreach($question->useranswers as $useranswer)
                        @if($useranswer->user_id == auth()->id())
                            @if($useranswer->completed == "false")
                                <tr>
                                <td>{{$question->question}}</td>
                                <td><a href="{{ route('quizAnswerQ', $question->id) }}" class="btn btn-secondary" tabindex="-1" role="button" >Answer</a></td>
                                </tr>
                            @endif
                        @endif
                    @endforeach
                @endforeach
            </table> 

		</div>
		<div class="col-md-2">
		</div>
	</div>
	<div class="row pt-2">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
            Answered Questions
                    <table class="table table-sm table-striped text-center" id="myTable">
                    <thead class="thead-dark">
                    <tr>
                    <th scope="col">Question</th>
                    <th scope="col">Result</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($quiz->questions as $question)
                        @foreach($question->useranswers as $useranswer)
                            @if($useranswer->user_id == auth()->id())
                                @if($useranswer->completed == "true")
                                    <tr>
                                    <td>{{$question->question}}</td>
                                    <td>{{$useranswer->result}}</td>
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                </table> 
		</div>
		<div class="col-md-2">
		</div>
	</div>


    
    <div class="row pt-2">
		<div class="col-md-2">
		</div>
		<div class="col-md-8">
                    Team Member Scores
                    <table class="table table-sm table-striped text-center" id="myTable">
                    <thead class="thead-dark">
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Score</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($quiz->userscores as $userscore)
                            <tr>
                            <td>{{$userscore->user->name}}</td>
                            <td>{{$userscore->score}} / {{$quiz->total}}</td>
                            </tr>      
                        @endforeach
                    </tbody>
                </table> 
		</div>
		<div class="col-md-2">
		</div>
	</div>
</div>



@endsection