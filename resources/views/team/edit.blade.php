@extends('layouts.app')

@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>


<div class="container-fluid">
	<div class="row pt-2">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
        <h1>Edit Team</h1>
		</div>
		<div class="col-md-3">
		</div>
	</div>
	<div class="row pt-2">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
            <form method="POST" action="{{ route('team.update' , $team->id) }}" enctype="multipart/form-data">
                @csrf 
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <label for="name"><b>Team Name:</b></label>
                        <input type="text" name="name" class="form-control" value="{{$team->name}}">
                    </div>
                    <div class="col-md-6">
                        <label for="email"><b>Team Email:</b></label>
                        <input type="email" name="email" class="form-control" value="{{$team->email}}">
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col-md-6">
                        <label for="image"><b>Upload Team Logo:</b></label>
                        <input type="file" class="form-control-file" name="image">
                    </div>
                    <div class="col-md-6">
                        <label for="sport"><b>Associated Sport:</b></label>
                        <select class="form-control" name="sport" value="{{$team->sport}}">
                        @foreach($sports as $sport)
                        @if($sport->id == $team->sport_id)   
                        <option value='{{$sport->id}}' selected>{{$sport->name}}</option>
                        @else
                        <option value='{{ $sport->id }}'>{{$sport->name}}</option>
                        @endif
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col-md-6">
                        <label for="country"><b>Country:</b></label>
                        <select class="form-control" name="country" value="{{$team->country}}">
                        @foreach($countries as $country)
                        @if($country->name == $team->country)   
                        <option value='{{$country->name}}' selected>{{$country->name}}</option>
                        @else
                        <option value='{{$country->name}}'>{{$country->name}}</option>
                        @endif
                        @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="city"><b>City:</b></label>
                        <input type="text" name="city" class="form-control" value="{{$team->city}}">
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="{{ route('home') }}" class="btn btn-danger">Cancel</a>
                    </div>
                </div>
            </form>
		</div>
		<div class="col-md-3">
		</div>
	</div>
</div>



























@endsection