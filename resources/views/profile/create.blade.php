@extends('layouts.app')

@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<div class="row">
<div class="col-md-2">
</div>
    <div class="col-md-6">
        <h1>Create Profile</h1>
    </div>
</div>

<div class="row">
<div class="col-md-2">
</div>
    <div class="col-md-8">
        
    <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
    @csrf 

    <label for="dob"><b>Date of Birth:</b></label>
    <input type="date" id="dob" name="dob"></input>
    <div class="pb-2">
    </div>

    <label for="gender"><b>Gender:</b></label>
    <select class="form-control" name="gender">
    <option value='Male'>Male</option>
    <option value='Female'>Female</option>
    </select>

    <label for="image"><b>Upload Profile Image:</b></label>
    <input type="file" class="form-control-file" name="image">
    <div class="pb-2">
    </div>

    <label for="phone"><b>Phone Num:</b></label>
    <textarea name="phone" class="form-control" placeholder="Number"></textarea>
    <div class="pb-2">
    </div>

    <label for="weight"><b>Weight(kg):</b></label>
    <textarea name="weight" class="form-control" placeholder="Enter weight"></textarea>
    <div class="pb-2">
    </div>

    <label for="height"><b>Height(cm):</b></label>
    <textarea name="height" class="form-control" placeholder="Enter height"></textarea>
    <div class="pb-2">
    </div>

    <label for="bio"><b>Bio:</b></label>
    <textarea name="bio" class="form-control" placeholder="Enter bio" rows="15"></textarea>
    <div class="pb-2">
    </div>
  <button type="submit" class="btn btn-outline-success">Submit</button>  
  <a href="{{ route('home') }}" class="btn btn-outline-danger">Cancel</a>
</form>

</div>
</div>



@endsection