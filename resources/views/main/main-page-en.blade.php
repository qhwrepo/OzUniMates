@extends('sidebar-template')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1>Your future unimates:</h1>
            
            @foreach($counselors as $counselor)
            <h4><a href="counselors/{{$counselor->id}}" class="counselorList">{{$counselor->firstName}} {{$counselor->lastName}}</a></h4>
            <p>{{$counselor->intro}}</p>
            <br>
            @endforeach

            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
        </div>
    </div>
</div>

@endsection
