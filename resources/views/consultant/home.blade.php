@extends('home-template')
@section('content')

<!-- have you uploaded an avatar -->
@if(! $user['avatar'])
<div id="modal-mask">
	{!! Form::open( [ 'url' => ['/consultant/avatar/upload'], 'method' => 'POST', 'id' => 'avatar-form', 'files' => true ] ) !!}
	<h3>第一次来吗？</h3>
	<div class="container">
		<div class="input">
			<input name="image" id="file" type="file">
		</div>
	</div>
	<a class="modal-submit" id="submit-avatar" onclick="avatarSubmit()">OK</a>
	<a class="modal-submit" id="dismiss-avatar" onclick="dismissAvatar()">NO</a>
	{!! Form::close() !!}
</div>
@endif

<!-- popup modal -->

<div class="modal_info">
  <h1>Simple jQuery Modal</h1>
  <p>It may not look like much, but it still does exactly what it says straight out of the box.</p>
</div>
<div class="modal_overlay">
</div>

<div id="reel">
	<div id="header" class="item" data-width="400">
		<div class="inner">
			<h1>Hi,{{ $user['username'] }}!</h1>
			<p>这些小鲜肉可能会成为你的校友：<br />
			有空的话，帮帮他们吧！</p>
		</div>
	</div>
	<!-- Thumb Items -->

	<article class="item thumb">
		<h2>{{ $user['username'] }} <br/><br/>
		{{ $user['university'] }} {{ $user['major'] }}</h2>
		<a href="#" class="image open_button"><img src="{{$user['avatar']}}" alt=""></a>
	</article>

	@foreach($students as $student)
	<article class="item thumb">
		<h2>{{$student->username}} <br/><br/>
		{{ $student['universities'] }} {{ $student['majors'] }}</h2>
		<a href="#" class="image open_button"><img src="/img/no_avatar.jpg" alt=""></a>
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