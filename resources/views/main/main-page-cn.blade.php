@extends('sidebar-template')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">隐藏侧边</a>
            <h1>未来的校友们：</h1>
            
            @foreach($users as $user)
            <h4><a href="users/{{$user->id}}" class="counselorList">{{$user->name}}</a></h4>
            <p>{{$user->email}}</p>
            <br>
            @endforeach
            
        </div>
    </div>
</div>

@endsection
