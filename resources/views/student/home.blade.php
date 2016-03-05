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
	<img src="/img/no_avatar.jpg">
	@else 
	<img src="{{$user['avatar']}}">
	@endif
	<div class="modal_desc">
  		<h1>{{ $user['username'] }}</h1>
  		<div class="or-spacer">
          <div class="mask"></div>
        </div>
  		<div class="modal_record">
  			<span class="record_title">目标院校</span>
  			<span class="record_content">{{$user['universities']}}</span>
  		</div>
  		<div class="modal_record">
  			<span class="record_title">专业/学位</span>
  			<span class="record_content">{{$user['majors']}} 
  			@if($user['degree']=='bachelor') 本科
  			@elseif($user['degree']=='master') 硕士
  			@elseif($user['degree']=='phd') 博士
  			@endif
  			</span>
  		</div>
  		<div class="modal_record">
  			<span class="record_title">邮箱</span>
  			<span class="record_content">{{$user['email']}}</span>
  		</div>
  		<div class="modal_record">
  			<span class="record_title">简介</span>
  			<span class="record_content">@if($user['description']) {{$user['description']}} 
  			@else ta决定先保持神秘 @endif</span>
  		</div>	
  	</div>
</div>

<div class="modal_info modal_info2">
	<img id="modal_avatar_square">
	<div class="modal_desc">
  		<h1 id="modal_username"></h1>
  		<div class="or-spacer">
              <div class="mask"></div>
            </div>
  		<div class="modal_record">
  			<span class="record_title">大学</span>
  			<span class="record_content" id="modal_university"></span>
  		</div>
  		<div class="modal_record">
  			<span class="record_title">专业</span>
  			<span class="record_content" id="modal_major"></span>
  		</div>
  		<div class="modal_record">
  			<span class="record_title">邮箱</span>
  			<span class="record_content" id="modal_email"></span>
  		</div>
  		<div class="modal_record">
  			<span class="record_title">简介</span>
  			<span class="record_content" id="modal_description"></span>
  		</div>	
  	</div>
</div>


<div id="reel">

	<!-- Thumb Items -->

	<article class="item thumb" data-width="350">
		<h2>{{ $user['username'] }} <br/><br/>
		{{ $user['universities'] }} {{ $user['majors'] }}</h2>
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
			<p>他们可能是你未来的师兄师姐喔,<br />
			打个招呼，开始咨询吧！</p>
		</div>
	</div>	

	@foreach($consultants as $consultant)
	<article class="item thumb" data-width="350">
		<h2>{{$consultant->username}} <br/><br/>
		{{ $consultant['university'] }} {{ $consultant['major'] }} {{ $consultant['specilization'] }}</h2>
		<a href="images/fulls/01.jpg" class="image"><img src="/img/no_avatar.jpg" alt=""></a>
	</article>
	@endforeach
	
<!-- Filler Thumb Items (just for demonstration purposes) -->
	<article class="item thumb" data-width="476"><h2>Kingdom of the Wind</h2><a href="/img/no_avatar.jpg" class="image"><img src="/img/no_avatar.jpg" alt=""></a></article>
	<article class="item thumb" data-width="232"><h2>The Pursuit</h2><a href="/img/no_avatar.jpg" class="image"><img src="/img/no_avatar.jpg" alt=""></a></article>
	<article class="item thumb" data-width="352"><h2>Boundless</h2><a href="/img/no_avatar.jpg" class="image"><img src="/img/no_avatar.jpg" alt=""></a></article>
	<article class="item thumb" data-width="348"><h2>The Spectators</h2><a href="/img/no_avatar.jpg" class="image"><img src="/img/no_avatar.jpg" alt=""></a></article>
	<article class="item thumb" data-width="282"><h2>You really got me</h2><a href="/img/no_avatar.jpg" class="image"><img src="/img/no_avatar.jpg" alt=""></a></article>
	<article class="item thumb" data-width="384"><h2>Ad Infinitum</h2><a href="/img/no_avatar.jpg" class="image"><img src="/img/no_avatar.jpg" alt=""></a></article>
	<article class="item thumb" data-width="274"><h2>Different.</h2><a href="/img/no_avatar.jpg" class="image"><img src="/img/no_avatar.jpg" alt=""></a></article>
	<article class="item thumb" data-width="282"><h2>Elysium</h2><a href="/img/no_avatar.jpg" class="image"><img src="/img/no_avatar.jpg" alt=""></a></article>
	<article class="item thumb" data-width="476"><h2>Kingdom of the Wind</h2><a href="/img/no_avatar.jpg" class="image"><img src="/img/no_avatar.jpg" alt=""></a></article>
	<article class="item thumb" data-width="232"><h2>The Pursuit</h2><a href="/img/no_avatar.jpg" class="image"><img src="/img/no_avatar.jpg" alt=""></a></article>
	<article class="item thumb" data-width="352"><h2>Boundless</h2><a href="/img/no_avatar.jpg" class="image"><img src="/img/no_avatar.jpg" alt=""></a></article>
	<article class="item thumb" data-width="348"><h2>The Spectators</h2><a href="/img/no_avatar.jpg" class="image"><img src="/img/no_avatar.jpg" alt=""></a></article>
	<article class="item thumb" data-width="282"><h2>You really got me</h2><a href="/img/no_avatar.jpg" class="image"><img src="/img/no_avatar.jpg" alt=""></a></article>
	<article class="item thumb" data-width="384"><h2>Ad Infinitum</h2><a href="/img/no_avatar.jpg" class="image"><img src="/img/no_avatar.jpg" alt=""></a></article>
	<article class="item thumb" data-width="274"><h2>Different.</h2><a href="/img/no_avatar.jpg" class="image"><img src="/img/no_avatar.jpg" alt=""></a></article>
	<article class="item thumb" data-width="282"><h2>Elysium</h2><a href="/img/no_avatar.jpg" class="image"><img src="/img/no_avatar.jpg" alt=""></a></article>
</div>

@endsection