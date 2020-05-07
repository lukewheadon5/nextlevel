@extends('layouts.app')

@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>

<div class="container-fluid">
	<div class="row pt-2">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
        <h1>Create Team</h1>
		</div>
		<div class="col-md-3">
		</div>
	</div>
	<div class="row pt-2">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
            <form method="POST" action="{{ route('team.store') }}" enctype="multipart/form-data">
                @csrf 
                <div class="row">
                    <div class="col-md-6">
                        <label for="name"><b>Team Name:</b></label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email"><b>Team Email:</b></label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Email">
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col-md-6">
                        <label for="image"><b>Upload Team Logo:</b></label>
                        <input type="file" class="form-control-file" name="image">
                    </div>
                    <div class="col-md-6">
                        <label for="sport"><b>Associated Sport:</b></label>
                        <select class="form-control" name="sport">
                        @foreach($sports as $sport)
                        <option value='{{ $sport->id }}'>{{$sport->name}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col-md-6">
                        <label for="country"><b>Country:</b></label>
                        <select class="form-control" name="country">
                        @foreach($countries as $country)
                        <option value='{{$country->name}}'>{{$country->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="city"><b>City:</b></label>
                        <input type="text" name="city" class="form-control" placeholder="Enter City" required>
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