@extends('home-template')
@section('content')

<!-- have you uploaded an avatar? -->
@if(! $user['avatar'])
<div id="modal_mask">
</div>
<div id="modal_avatar">
	{!! Form::open( [ 'url' => ['/student/avatar/upload'], 'method' => 'POST', 'id' => 'avatar-form', 'files' => true ] ) !!}
	<h3 id="greet">No avatar yet? </h3>
	<div class="actions"> 
	    <button class="file-btn"> 
	        <div id="greet_upload">Upload one!</div>
	        <input name="image" type="file" id="upload" value="选择图片文件" /> 
	    </button> 
	    <div class="crop"> 
	        <div id="upload-demo"></div> 
	    </div> 
	    <div id="result"></div> 
	</div>
	<input id="cropped_avatar" type="hidden" name="cropped_avatar"> 
	<a class="modal-submit not-active" id="submit-avatar">Done</a>
	<a class="modal-submit" id="dismiss-avatar">Not now</a>
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
		  <li>
		  	@foreach($user->universities as $university)
		 	{{$university->name}}
		  	@endforeach
		  </li>
		  <li>
		  @foreach($user->majors as $major)
			{{$major->name}}
			@endforeach
		  @if($user['degree']=='bachelor') Bachelor
  			@elseif($user['degree']=='master') Master
  			@elseif($user['degree']=='phd') Phd
  			@endif</li>
		  <li>邮箱： {{$user['email']}}</li>
		  <li>@if($user['description']) {{$user['description']}} 
  			@else I haven't decided what to say! @endif</li>
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

<a class="btn-2 btn-left" onclick="weihu()">Message</a> 
<a class="btn-2 btn-right" onclick="weihu()">Attorney</a>


<div id="reel">

	<!-- Thumb Items -->
	<ul>

	<li class="item thumb">		
	    <div class='info'>
	    	<h1>{{ $user['username'] }}</h1>
        	<h3>Target Universities：</h3>
        	<p>@foreach($user->universities as $university)
			{{$university->name}}
			@endforeach</p>
			<h3>Target Majors：</h3>
        	<p>@foreach($user->majors as $major)
			{{$major->name}}
			@endforeach
			@if($user['degree']=='bachelor') Bachelor
			@elseif($user['degree']=='master') Master
			@elseif($user['degree']=='phd') Phd @endif</p>
      	</div>
		<a href="#" class="image open_button open_button1">
			@if($user['avatar']=='')
			<img src="/img/no_avatar_square.jpg">
			@else 
			<img src="{{$user['avatar']}}">
			@endif
		</a>
	</li>

	<li id="header" class="item" data-width="400">
		<div class="inner">
			<h1>Hi,{{ $user['username'] }}!</h1>
			<p>Your future unimates are listed at the right side,<br />
			Say hi and talk to them!</p>
			<div class="board">
				<a href="#" class="board-link" onclick="weihu()">Dashboard</a>
				<!-- <a href="http://bbs.ozunimates.com" class="board-link">论坛</a> -->
				<a href="/logout" class="board-link">Logout</a>
			</div>
		</div>
	</li>	

	@foreach($consultants as $consultant)
	<li class="item thumb">
		<div class='info'>
			<br/>
	    	<h1>{{$consultant->username}}</h1>
        	<h3>在{{ $consultant['university'] }}</h3>
        	<h3>就读{{ $consultant['major'] }} - {{ $consultant['specilization'] }}
		@if($consultant['degree']=='bachelor') Bachelor
		@elseif($consultant['degree']=='master') Master
		@elseif($consultant['degree']=='phd') Phd @endif</h3>
      	</div>
		<a href="#" class="image open_button" onclick="open_modal({{$consultant->id}})">
		@if($consultant->avatar) <img src="{{$consultant->avatar}}">
		@else <img src="/img/no_avatar_square.jpg">
		@endif</a>
	</li>
	@endforeach


<!-- 	<li class="item thumb">
	      <div class='info'>
        <h3>Single-origin coffee whatever</h3>
        <p>Williamsburg tofu polaroid, 90's Bushwick irony locavore ethnic meh messenger bag Truffaut jean shorts.</p>
      </div>
		<a href="#" class="image open_button open_button1">
			@if($user['avatar']=='')
			<img src="/img/no_avatar.jpg">
			@else 
			<img src="{{$user['avatar']}}">
			@endif
		</a>
	</li> -->

<!-- 	<li class="item thumb">
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

	</ul>

</div>
		
	<script type="text/javascript" src="/js/home/modal-student.js"></script>

@endsection