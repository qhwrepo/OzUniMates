@extends('home-template')
@section('content')

<!-- have you uploaded an avatar? -->
@if(! $user['avatar'])
<div id="modal_mask">
</div>
<div id="modal_avatar">
	{!! Form::open( [ 'url' => ['/student/avatar/upload'], 'method' => 'POST', 'id' => 'avatar-form', 'files' => true ] ) !!}
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
	<div class="modal_userinfo">
		@if($user['avatar']=='')
		<img src="/img/no_avatar_square.jpg">
		@else 
		<img src="{{$user['avatar']}}">
		@endif
		<div class="modal-username">{{ $user['username'] }}</div>
	</div>
	<div class="modal_desc">
  		<ul class="rolldown-list" id="myList">
		  <li class="long-list">
		  	<div class="roll-left">想去</div>
		  	<div class="roll-right">@foreach($user->universities as $university)
		 	{{$university->name}}&nbsp;&nbsp;
		  	@endforeach</div>
		  </li>
		  <li>
		  	<div class="roll-left">想读</div>
		  	<div class="roll-right">@foreach($user->majors as $major)
		 	{{$major->name}}
		  	@endforeach
		  	@if($user['degree']=='bachelor') 本科
  			@elseif($user['degree']=='master') 硕士
  			@elseif($user['degree']=='phd') 博士
  			@endif</div>
		  </li>
		  <li>
		  	<div class="roll-left">邮箱</div>
		  	<div class="roll-right">{{$user['email']}}</div>
		  </li>
		  <li>
		  	<div class="roll-left">简介</div>
		  	<div class="roll-right">@if($user['description']) {{$user['description']}} 
  			@else ta决定先保持神秘 @endif
  			<a href="/student/dashboard/overall" class="modify-desc">修改</a></div>
  		  </li>
		</ul> 
  	</div>  	
</div>

<div class="modal_info modal_info2">
	<div class="modal_userinfo">
		<img id="modal_avatar_square">	
		<div class="modal-username" id="modal_username"></div>
	</div>
	<div class="modal_desc">
  		<ul class="rolldown-list" id="myList">
		  <li>
		  	<div class="roll-left">就读院校</div>
		  	<div class="roll-right" id="modal_university"></div>
		  </li>
		  <li>
		  	<div class="roll-left">就读专业</div>
		  	<div class="roll-right" id="modal_major"></div>
		  </li>
		  <li>
		  	<div class="roll-left">邮箱</div>
		  	<div class="roll-right" id="modal_email"></div>
		  </li>
		  <li>
		  	<div class="roll-left">擅长</div>
		  	<div class="roll-right" id="modal_tag"></div>
		  </li>
		  <li>
		  	<div class="roll-left">简介</div>
		  	<div class="roll-right" id="modal_description"></div>
		  </li>
		</ul>
  	</div>
</div>

<div id="modal-button">
	<a class="btn-2 btn-left" href="dashboard/chat">留言</a> 
	<a class="btn-2 btn-right" href="dashboard/case">全权委托</a>
</div>

<div id="reel">

	<!-- Thumb Items -->
	<ul>

	<li class="item thumb">		
	    <div class='info'>
	    	<h1>{{ $user['username'] }}</h1>
        	<h3>目标院校：</h3>
        	<p>@foreach($user->universities as $university)
			{{$university->name}}
			@endforeach</p>
			<h3>目标专业：</h3>
        	<p>@foreach($user->majors as $major)
			{{$major->name}}
			@endforeach
			@if($user['degree']=='bachelor') 本科
			@elseif($user['degree']=='master') 硕士
			@elseif($user['degree']=='phd') 博士 @endif</p>
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
			<p>右边的他们可能是你未来的师兄师姐喔,<br />
			打个招呼，开始咨询吧！</p>
			<div class="board">
				<a href="/student/dashboard/overall" class="board-link">个人信息</a>
				<!-- <a href="http://bbs.ozunimates.com" class="board-link">论坛</a> -->
				<a href="/logout" class="board-link">登出</a>
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
		@if($consultant['degree']=='bachelor') 本科
		@elseif($consultant['degree']=='master') 硕士
		@elseif($consultant['degree']=='phd') 博士 @endif</h3>
      	</div>
		<a href="#" class="image open_button" onclick="open_modal({{$consultant->id}})">
		@if($consultant->avatar) <img src="{{$consultant->avatar}}">
		@else <img src="/img/no_avatar_square.jpg">
		@endif</a>
	</li>
	@endforeach


	<!-- <li class="item thumb">
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
	</li>
	<li class="item thumb">
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
	</li>
	<li class="item thumb">
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
	</li>
	<li class="item thumb">
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
	</li>
	<li class="item thumb">
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
	</li>
	<li class="item thumb">
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


	</ul>

</div>
		
	<script type="text/javascript" src="/js/home/modal-student.js"></script>

@endsection