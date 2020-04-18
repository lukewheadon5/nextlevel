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
            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Goals</th>
                <th scope="col">Assists</th>
                <th scope="col">Shots</th>
                <th scope="col">Shots on Target</th>
                <th scope="col">Passes</th>
                <th scope="col">Dribbles</th>
                <th scope="col">Crosses</th>
                </tr>
                </thead>
        <tbody style="height:50px;">
            <tr>
            <td>{{$userseason->goals}}</td>
            <td>{{$userseason->assists}}</td>
            <td>{{$userseason->shots}}</td>
            <td>{{$userseason->shotOT}}</td>
            <td>{{$userseason->passes}}</td>
            <td>{{$userseason->dribbles}}</td>
            <td>{{$userseason->crosses}}</td>
            </tr>
    </table> 
		</div>
	</div>
  <div class="row">
		<div class="col-md-12">
            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                <tr>
                <th scope="col">Tackles</th>
                <th scope="col">Headers Won</th>
                <th scope="col">Clearances</th>
                <th scope="col">Interceptions</th>
                <th scope="col">Saves</th>
                <th scope="col">Fouls</th>
                <th scope="col">Bookings</th>
                </tr>
                </thead>
        <tbody style="height:50px;">
            <tr>
            <td>{{$userseason->tackles}}</td>
            <td>{{$userseason->headers}}</td>
            <td>{{$userseason->clearances}}</td>
            <td>{{$userseason->interceptions}}</td>
            <td>{{$userseason->saves}}</td>
            <td>{{$userseason->penalties}}</td>
            <td>{{$userseason->bookings}}</td>
            </tr>
    </table> 

		</div>
	</div> 
</div>





@endsection