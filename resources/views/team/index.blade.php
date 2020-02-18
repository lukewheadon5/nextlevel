@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-md-2">
</div>
    <div class="col-md-6">
        <h1>All Teams</h1>
    </div>

    
 <div class="col-md-4">
</div>

</div>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Sport</th>
      <th></th>
    </tr>
  </thead>
  <tbody>

 @foreach ($team as $team)
 <tr>
<td>{{$team->name}}</td>
<td>{{$team->sport->name}}</td>
<td><a href="{{ route('team.show', $team->id) }}" class="btn btn-secondary" tabindex="-1" role="button" >View Team</a></td>
</tr>
    
@endforeach
    
@endsection