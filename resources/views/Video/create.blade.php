@extends('layouts.app')

@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/menu.js') }}" defer></script>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
        <h1>Upload Footage</h1>
		</div>
		<div class="col-md-3">
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
            <form method="post" action="{{ route('vidStore' , $team->id) }}" enctype="multipart/form-data">
            @csrf 
                <label for="name"><b>Playlist Name:</b></label>
                <textarea name="name" class="form-control" placeholder="Enter Name" required></textarea>
                <div class="pb-2">
                </div>

                <label for="season"><b>Season:</b></label>
                <select class="form-control" name="season" id="season" required>
                    <option value="" selected disabled hidden>Choose here</option>
                    @foreach($team->seasons as $season)
                    <option value='{{ $season->id }}'>{{$season->year}}</option>
                    @endforeach
                </select>
                <div class="pb-2">
                </div>
        

                <label for="game"><b>Game:</b></label>
                <select class="form-control" name="game" id="game" requried>
                    <option value="" selected disabled hidden>Choose here</option>
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
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="{{ route('player', $team->id) }}" class="btn btn-danger">Cancel</a>
            </form>
		</div>
		<div class="col-md-3">
		</div>
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