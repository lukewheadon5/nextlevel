@extends('layouts.app')

@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<div class="row">
<div class="col-md-2">
</div>
    <div class="col-md-6">
        <h1>My Teams</h1>
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

 @foreach ($teams as $team)
 @if ($team->users()->where('user_id', auth()->id())->exists() == true)
 <tr>
<td>{{$team->name}}</td>
<td>{{$team->sport->name}}</td>
<td><a href="{{ route('team.show', $team->id) }}" class="btn btn-secondary" tabindex="-1" role="button" >View Team</a></td>
</tr>
@endif
    
@endforeach
    
@endsection