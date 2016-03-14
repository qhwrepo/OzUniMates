@extends('home-template')
@section('content')

<!-- have you uploaded an avatar? -->
@if(! $user['avatar'])
<div id="modal_mask">
</div>
<div id="modal_avatar">
	{!! Form::open( [ 'url' => ['/consultant/avatar/upload'], 'method' => 'POST', 'id' => 'avatar-form', 'files' => true ] ) !!}
	<h3 id="greet">第一次来吗？</h3>
	<div class="actions"> 
	    <button class="file-btn"> 
	        <div id="greet_upload">上传个头像吧</div>
	        <input name="image" type="file" id="upload" value="选择图片文件" /> 
	    </button> 
	    <div class="crop"> 
	        <div id="upload-demo"></div> 
	    </div> 
	    <div id="result"></div> 
	</div>
	<input id="cropped_avatar" type="hidden" name="cropped_avatar"> 
	<a class="modal-submit not-active" id="submit-avatar">好的</a>
	<a class="modal-submit" id="dismiss-avatar">暂不上传</a>
	{!! Form::close() !!}
</div>
@endif

<!-- popup modal: modal_info1 for the user itself, modal_info2 for other users -->

<div class="modal_overlay">
</div>

<div class="modal_info modal_info1">
	@if($user['avatar']=='')
	<img src="/img/no_avatar_square.jpg">
	@else 
	<img src="{{$user['avatar']}}">
	@endif
	<div class="modal_desc">
  		<h1>{{ $user['username'] }}</h1>
  		<ul class="rolldown-list" id="myList">
		  <li>{{$user['university']}}</li>
		  <li>{{$user['major']}} - {{$user['specilization']}}
		  @if($user['degree']=='bachelor') 本科
  			@elseif($user['degree']=='master') 硕士
  			@elseif($user['degree']=='phd') 博士
  			@endif</li>
		  <li>邮箱： {{$user['email']}}</li>
		  <li>@if($user['description']) {{$user['description']}} 
  			@else ta决定先保持神秘 @endif</li>
		</ul> 
  	</div>
</div>

<div class="modal_info modal_info2">
	<img id="modal_avatar_square">
	<div class="modal_desc">
  		<h1 id="modal_username"></h1>
  		<ul class="rolldown-list" id="myList">
		  <li id="modal_university"></li>
		  <li id="modal_major"></li>
		  <li id="modal_email"></li>
		  <li id="modal_description"></li>
		</ul>
  	</div>
</div>

<a class="btn-2 btn-left" onclick="weihu()">留言</a> 
<a class="btn-2 btn-right" onclick="weihu()">全权委托</a>

<div id="reel">
	
	<!-- Thumb Items -->
	<ul>

	<li class="item thumb">
		<div class='info'>
			<br/>
	    	<h1>{{ $user['username'] }}</h1>
        	<h3>在{{ $user['university'] }}</h3>
        	<h3>就读{{ $user['major'] }} - {{ $user['specilization'] }}
		@if($user['degree']=='bachelor') 本科
		@elseif($user['degree']=='master') 硕士
		@elseif($user['degree']=='phd') 博士 @endif</h3>
      	</div>
		<a href="#" class="image open_button open_button1">
		@if($user->avatar) <img src="{{$user->avatar}}">
		@else <img src="/img/no_avatar_square.jpg">
		@endif</a>
	</li>

	<li id="header" class="item" data-width="400">
		<div class="inner">
			<h1>Hi,{{ $user['username'] }}!</h1>
			<p>右边这些小鲜肉可能会成为你的校友：<br />
			有空的话，帮帮他们吧！</p>
			<div class="board">
				<a href="#" class="board-link" onclick="weihu()">个人信息</a>
				<!-- <a href="http://bbs.ozunimates.com" class="board-link">论坛</a> -->
				<a href="/logout" class="board-link">登出</a>
			</div>
		</div>
	</li>

	@foreach($students as $student)
	<li class="item thumb">		
	    <div class='info'>
	    	<h1>{{$student->username}}</h1>
        	<h3>目标院校：</h3>
        	<p>@foreach($student->universities as $university)
			{{$university->name}}
			@endforeach</p>
			<h3>目标专业：</h3>
        	<p>@foreach($student->majors as $major)
			{{$major->name}}
			@endforeach
			@if($student['degree']=='bachelor') 本科
			@elseif($student['degree']=='master') 硕士
			@elseif($student['degree']=='phd') 博士 @endif</p>
      	</div>
		<a href="#" class="image open_button" onclick="open_modal({{$student->id}})">
			@if($student['avatar']=='')
			<img src="/img/no_avatar.jpg">
			@else 
			<img src="{{$student['avatar']}}">
			@endif
		</a>
	</li>
	@endforeach

<!-- 		<li class="item thumb">
	<div class='info'>
        <h3>Single-origin coffee whatever</h3>
        <p>Williamsburg tofu polaroid, 90's Bushwick irony locavore ethnic meh messenger bag Truffaut jean shorts.</p>
      </div>
    <a href="#" class="image open_button open_button1"><img src="/img/no_avatar.jpg"></a>
    </li>
    <li class="item thumb">
	<div class='info'>
        <h3>Single-origin coffee whatever</h3>
        <p>Williamsburg tofu polaroid, 90's Bushwick irony locavore ethnic meh messenger bag Truffaut jean shorts.</p>
      </div>
    <a href="#" class="image open_button open_button1"><img src="/img/no_avatar.jpg"></a>
    </li>
    <li class="item thumb">
	<div class='info'>
        <h3>Single-origin coffee whatever</h3>
        <p>Williamsburg tofu polaroid, 90's Bushwick irony locavore ethnic meh messenger bag Truffaut jean shorts.</p>
      </div>
    <a href="#" class="image open_button open_button1"><img src="/img/no_avatar.jpg"></a>
    </li>
    <li class="item thumb">
	<div class='info'>
        <h3>Single-origin coffee whatever</h3>
        <p>Williamsburg tofu polaroid, 90's Bushwick irony locavore ethnic meh messenger bag Truffaut jean shorts.</p>
      </div>
    <a href="#" class="image open_button open_button1"><img src="/img/no_avatar.jpg"></a>
    </li>
    <li class="item thumb">
	<div class='info'>
        <h3>Single-origin coffee whatever</h3>
        <p>Williamsburg tofu polaroid, 90's Bushwick irony locavore ethnic meh messenger bag Truffaut jean shorts.</p>
      </div>
    <a href="#" class="image open_button open_button1"><img src="/img/no_avatar.jpg"></a>
    </li>
    <li class="item thumb">
	<div class='info'>
        <h3>Single-origin coffee whatever</h3>
        <p>Williamsburg tofu polaroid, 90's Bushwick irony locavore ethnic meh messenger bag Truffaut jean shorts.</p>
      </div>
    <a href="#" class="image open_button open_button1"><img src="/img/no_avatar.jpg"></a>
    </li> -->

</div>
		
	<script type="text/javascript" src="/js/home/modal-consultant.js"></script>

@endsection