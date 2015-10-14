@extends('sidebar-template')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
        
            <h1>{{$user->name}}</h1>
            
            <h4>Email:</h4>
            <p>{{$user->email}}</p>
            <br>

            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
        </div>
    </div>
</div>

@endsection
