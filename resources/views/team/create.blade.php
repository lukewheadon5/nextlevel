@extends('layouts.app')

@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<div class="row">
<div class="col-md-2">
</div>
    <div class="col-md-6">
        <h1>Create Team</h1>
    </div>
</div>

<div class="row">
<div class="col-md-2">
</div>
    <div class="col-md-8">
        
    <form method="POST" action="{{ route('team.store') }}" enctype="multipart/form-data">
    @csrf 

    <label for="name"><b>Team Name:</b></label>
    <textarea name="name" class="form-control" placeholder="Enter Name"></textarea>
    <div class="pb-2">
    </div>

    <label for="sport"><b>Associated Sport:</b></label>
    <select class="form-control" name="sport">
    @foreach($sports as $sport)
    <option value='{{ $sport->id }}'>{{$sport->name}}</option>
    @endforeach
    </select>

    
    <div class="pb-2">
    </div>
  <button type="submit" class="btn btn-outline-success">Submit</button>
  <a href="{{ route('home') }}" class="btn btn-outline-danger">Cancel</a>
</form>

</div>
</div>
@endsection