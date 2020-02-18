@extends('layouts.app')

@section('content')
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
        
    <form method="POST" action="{{ route('team.update' , $team->id) }}" enctype="multipart/form-data">
    @csrf 
    @method('PUT')

    <label for="name"><b>Team Name:</b></label>
    <textarea name="name" class="form-control">{{$team->name}}</textarea>
    <div class="pb-2">
    </div>

    <label for="image"><b>Upload Team Logo:</b></label>
    <input type="file" class="form-control-file" name="image">
    <div class="pb-2">
    </div>

    <label for="sport"><b>Associated Sport:</b></label>
    <select class="form-control" name="sport">
    @foreach($sports as $sport)
    @if($team->sport_id == $sport->id)
    <option value='{{ $sport->id }}' selected>{{$sport->name}}</option>
   
    @else 
    <option value='{{ $sport->id }}'>{{$sport->name}}</option>
    @endif
    @endforeach
    </select>

    
    <label for="email"><b>Team Email:</b></label>
    <textarea name="email" class="form-control" >{{$team->email}}</textarea>
    <div class="pb-2">
    </div>
    
    <label for="country"><b>County:</b></label>
    <textarea name="country" class="form-control" >{{$team->country}}</textarea>
    <div class="pb-2">
    </div>

    <label for="city"><b>City:</b></label>
    <textarea name="city" class="form-control" >{{$team->city}}</textarea>
    <div class="pb-2">
    </div>

    
    <div class="pb-2">
    </div>
  <button type="submit" class="btn btn-outline-success">Submit</button>
  <a href="{{ route('team.show' , $team->id) }}" class="btn btn-outline-danger">Cancel</a>
</form>

</div>
</div>
@endsection