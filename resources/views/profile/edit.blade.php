@extends('layouts.app')

@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
            <h1>Edit Profile</h1>
            <form method="POST" action="{{ route('profile.update', $profile->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row pt-1">
                    <div class="col-md-6">
                        <label for="dob"><b>Date of Birth:</b></label><br>
                        <input type="date" class="form-control" id="dob" name="dob" value="{{$profile->dob}}" required></input>
                    </div>
                    <div class="col-md-6">
                        <label for="gender"><b>Gender:</b></label>
                        <select class="form-control" name="gender">
                        @if($profile->gender == 'Male')
                        <option value='Male'selected>Male</option>
                        <option value='Female'>Female</option>
                        @else
                        <option value='Male'>Male</option>
                        <option value='Female'selected>Female</option>
                        @endif
                        </select>
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col-md-6">
                        <label for="image"><b>Upload Profile Image:</b></label>
                        <input type="file" class="form-control-file" name="image">
                    </div>
                    <div class="col-md-6">
                        <label for="phone"><b>Phone Num:</b></label>
                        <input type="tel" id="phone" class="form-control" name="phone" placeholder="07123456789" pattern="[0-9]{2}[0-9]{3}[0-9]{3}[0-9]{3}" value="{{$profile->phone_num}}"required></input>
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col-md-6">
                        <label for="weight"><b>Weight(kg):</b></label>
                        <input type="number" min="1" max="300" name="weight" class="form-control" placeholder="Enter weight" value="{{$profile->weight}}"required></input>
                    </div>
                    <div class="col-md-6">
                        <label for="height"><b>Height(cm):</b></label>
                        <input type="number"  min="45" max="240"name="height" class="form-control" placeholder="Enter height" value="{{$profile->height}}" required></input>
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col-md-12">
                        <label for="bio"><b>Bio:</b></label>
                        <textarea name="bio" class="form-control" placeholder="Enter bio" rows="15">{{$profile->bio}}</textarea>
                        <div class="pt-2"> 
                        <button type="submit" class="btn btn-success">Submit</button>  
                        <a href="{{route('profile.show' , $profile->id)}}" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
		</div>
		<div class="col-md-3">
		</div>
	</div>
</div>


@endsection