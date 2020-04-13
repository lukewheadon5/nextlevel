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

    <label for="season"><b>Season:</b></label>
    <select class="form-control" name="season" id="season">
    @foreach($team->seasons as $season)
    <option value='{{ $season->id }}'>{{$season->year}}</option>
    @endforeach
    </select>
    <div class="pb-2">
    </div>
    <script src="{{ asset('js/menu.js') }}" defer></script>

    <label for="game"><b>Game:</b></label>
    <select class="form-control" name="game" id="game">
    <option value=''></option>
    </select>
    <div class="pb-2">
    </div>


    <label for="training"><b>Training Footage:</b></label>
    <select class="form-control" name="training" id="training">
    <option value='true'>Yes</option>
    <option value='false'>No</option>
    </select>
    <div class="pb-2">
    </div>

    <label for="file"><b>Upload Video Files:</b></label>
    <input type="file" name="file[]"  multiple="true">
    <div class="pb-2">
    </div>

    <div class="pb-2">
    </div>
  <button type="submit" class="btn btn-outline-success">Submit</button>
  <a href="{{ route('player', $team->id) }}" class="btn btn-outline-danger">Cancel</a>
</form>

</div>
</div>

<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>

function updateGame(season_id){

    $.ajax({
        url: '/statistic/games/get/'+season_id,
        method: 'GET',
        success: function(data) {
            $('#game').html(data.html);
        }
    });
}



</script>
@endsection