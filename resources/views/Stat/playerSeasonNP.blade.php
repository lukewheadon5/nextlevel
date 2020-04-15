@extends('layouts.app')



@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<div class="container-fluid">

	<div class="row pt-2">
		<div class="col-md-12">
			<h3 class="text-center">
				<u>{{$userseason->user->name}} {{$userseason->season->year}} Statistics</u>
			</h3>
      <h3  class="text-center">
      @if(empty($userseason->user->profile->image ))
          <img src="/images/blankPhoto.png" alt="Profile Picture" 
        width="200px" height="200px" class="rounded-circle"/> 
     @else
          <img src="{{asset('images/'. $userseason->user->profile->image)}}" alt="Profile Picture" 
        width="200px" height="200px" class="rounded-circle"/> 
     @endif
      <h3>
		</div>
	</div>
	<div class="row pt-1">
		<div class="col-md-12">
    <h4>
				Defensive Statistics 
		</h4>
        <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Tackles</th>
                <th scope="col">Tackles For Loss</th>
                <th scope="col">Sacks</th>
                <th scope="col">Interceptions</th>
                <th scope="col">Pick 6</th>
                <th scope="col">Penalties</th>
                </tr>
                </thead>
        <tbody>
       
            <tr>
            <td>{{$userseason->tackles}}</td>
            <td>{{$userseason->tacklesFL}}</td>
            <td>{{$userseason->sacks}}</td>
            <td>{{$userseason->interceptions}}</td>
            <td>{{$userseason->pick6}}</td>
            <td>{{$userseason->penalties}}</td>
            </tr>
       
    </table> 

		</div>
	</div>

    <div class="row">
		<div class="col-md-12 pt-1">
			<h4>
				Offence Statistics 
			</h4>

            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Passing TD's</th>
                <th scope="col">Passing Yards</th>
                <th scope="col">Rushing TD's</th>
                <th scope="col">Rushing Yards</th>
                <th scope="col">Carries</th>
                <th scope="col">Receptions</th>
                <th scope="col">Receiving Yards</th>
                </tr>
                </thead>
        <tbody>
            <tr>
            <td>{{$userseason->passingTD}}</td>
            <td>{{$userseason->passingYards}}</td>
            <td>{{$userseason->RushingTD}}</td>
            <td>{{$userseason->RushingYards}}</td>
            <td>{{$userseason->Carries}}</td>
            <td>{{$userseason->Receptions}}</td>
            <td>{{$userseason->ReceivingYards}}</td>
            </tr>
    </table> 

		</div>
	</div>
</div>





@endsection