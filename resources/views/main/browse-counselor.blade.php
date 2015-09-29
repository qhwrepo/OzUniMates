@extends('sidebar-template')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
        
            <h1>{{$counselor->firstName}} {{$counselor->lastName}}</h1>
            
            <h4>Intro:</h4>
            <p>{{$counselor->intro}}</p>
            <br>

            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
        </div>
    </div>
</div>

@endsection
