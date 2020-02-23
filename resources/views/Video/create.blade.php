@extends('layouts.app')

@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<div class="row">
<div class="col-md-2">
</div>
    <div class="col-md-6">
        <h1>Upload Footage</h1>
    </div>
</div>

<div class="row">
<div class="col-md-2">
</div>
    <div class="col-md-8">
        
    <form method="post" action="{{ route('vidStore' , $team->id) }}" enctype="multipart/form-data">
    @csrf 

    <label for="name"><b>Playlist Name:</b></label>
    <textarea name="name" class="form-control" placeholder="Enter Name"></textarea>
    <div class="pb-2">
    </div>

    <label for="file"><b>Upload Video Files:</b></label>
    <input type="file" name="file[]"  multiple="true">
    <div class="pb-2">
    </div>

    <div class="pb-2">
    </div>
  <button type="submit" class="btn btn-outline-success">Submit</button>
  <a href="{{ route('home') }}" class="btn btn-outline-danger">Cancel</a>
</form>

</div>
</div>
@endsection