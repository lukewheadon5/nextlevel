@extends('layouts.app')

@section('content')
<script src="{{ asset('js/app.js') }}" defer></script>
<div class="row">
<div class="col-md-2">
</div>
    <div class="col-md-6">
        <h1>{{$team->name}}</h1>
    </div>

    <div class="col-md-2 ">
        
 </div>
 <div class="col-md-2">
</div>

</div>



 
@endsection