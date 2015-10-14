@extends('sidebar-template')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1>Your future unimates:</h1>
            
            @foreach($users as $user)
            <h4><a href="users/{{$user->id}}" class="counselorList">{{$user->name}}</a></h4>
            <p>{{$user->email}}</p>
            <br>
            @endforeach

            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
        </div>
    </div>
</div>

@endsection
