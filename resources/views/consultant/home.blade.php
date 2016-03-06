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
	<a class="modal-submit" id="submit-avatar">好的</a>
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
  	<a class="button tick" onclick="weihu()"><i class="fa fa-comments fa-3x"></i></a>
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
  	<a class="button tick" onclick="weihu()"><i class="fa fa-comments fa-3x"></i></a>
</div>

<div id="reel">
	
	<!-- Thumb Items -->
	<article class="item thumb" data-width="350">
		<h2>{{ $user['username'] }} <br/><br/>
		{{ $user['university'] }} {{ $user['major'] }}</h2>
		<a href="#" class="image open_button open_button1">
			@if($user['avatar']=='')
			<img src="/img/no_avatar.jpg">
			@else 
			<img src="{{$user['avatar']}}">
			@endif
		</a>
	</article>

	<div id="header" class="item" data-width="400">
		<div class="inner">
			<h1>Hi,{{ $user['username'] }}!</h1>
			<p>右边这些小鲜肉可能会成为你的校友：<br />
			有空的话，帮帮他们吧！</p>
		</div>
	</div>

	@foreach($students as $student)
	<article class="item thumb" data-width="350">
		<h2>{{$student->username}} <br/><br/>
		{{ $student['universities'] }} {{ $student['majors'] }}</h2>
		<a href="#" class="image open_button" onclick="open_modal({{$student->id}})"><img src="{{$student->avatar}}"></a>
	</article>
	@endforeach
	
<!-- Filler Thumb Items (just for demonstration purposes) -->
	<article class="item thumb" data-width="350"><h2>Fake User!!</h2><a class="image"><img src="/img/no_avatar_square.jpg"></a></article>
	<article class="item thumb" data-width="350"><h2>Fake User!!</h2><a class="image"><img src="/img/no_avatar_square.jpg"></a></article>
	<article class="item thumb" data-width="350"><h2>Fake User!!</h2><a class="image"><img src="/img/no_avatar_square.jpg"></a></article>
	<article class="item thumb" data-width="350"><h2>Fake User!!</h2><a class="image"><img src="/img/no_avatar_square.jpg"></a></article>
	<article class="item thumb" data-width="350"><h2>Fake User!!</h2><a class="image"><img src="/img/no_avatar_square.jpg"></a></article>
	<article class="item thumb" data-width="350"><h2>Fake User!!</h2><a class="image"><img src="/img/no_avatar_square.jpg"></a></article>
	<article class="item thumb" data-width="350"><h2>Fake User!!</h2><a class="image"><img src="/img/no_avatar_square.jpg"></a></article>
	<article class="item thumb" data-width="350"><h2>Fake User!!</h2><a class="image"><img src="/img/no_avatar_square.jpg"></a></article>

</div>
		
	<script type="text/javascript" src="/js/home/modal-consultant.js"></script>

@endsection