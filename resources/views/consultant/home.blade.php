@extends('home-template')
@section('content')

<div id="reel">
	<div id="header" class="item" data-width="400">
		<div class="inner">
			<h1>Hi {{ \Auth::user("consultant")['username'] }}!</h1>
			<p>这些小鲜肉可能会成为你的校友：<br />
			有空的话，帮帮他们吧！</p>
		</div>
	</div>
	<!-- Thumb Items -->

	@foreach($students as $student)
	<article class="item thumb">
		<h2>{{$student->username}}</h2>
		<a href="images/fulls/01.jpg" class="image"><img src="/img/portfolio-1.jpg" alt=""></a>
	</article>
	@endforeach
	
<!-- Filler Thumb Items (just for demonstration purposes) -->
	<article class="item thumb" data-width="476"><h2>Kingdom of the Wind</h2><a href="images/fulls/05.jpg" class="image"><img src="images/thumbs/05.jpg" alt=""></a></article>
	<article class="item thumb" data-width="232"><h2>The Pursuit</h2><a href="images/fulls/06.jpg" class="image"><img src="images/thumbs/06.jpg" alt=""></a></article>
	<article class="item thumb" data-width="352"><h2>Boundless</h2><a href="images/fulls/07.jpg" class="image"><img src="images/thumbs/07.jpg" alt=""></a></article>
	<article class="item thumb" data-width="348"><h2>The Spectators</h2><a href="images/fulls/08.jpg" class="image"><img src="images/thumbs/08.jpg" alt=""></a></article>
	<article class="item thumb" data-width="282"><h2>You really got me</h2><a href="images/fulls/01.jpg" class="image"><img src="images/thumbs/01.jpg" alt=""></a></article>
	<article class="item thumb" data-width="384"><h2>Ad Infinitum</h2><a href="images/fulls/02.jpg" class="image"><img src="images/thumbs/02.jpg" alt=""></a></article>
	<article class="item thumb" data-width="274"><h2>Different.</h2><a href="images/fulls/03.jpg" class="image"><img src="images/thumbs/03.jpg" alt=""></a></article>
	<article class="item thumb" data-width="282"><h2>Elysium</h2><a href="images/fulls/04.jpg" class="image"><img src="images/thumbs/04.jpg" alt=""></a></article>
	<article class="item thumb" data-width="476"><h2>Kingdom of the Wind</h2><a href="images/fulls/05.jpg" class="image"><img src="images/thumbs/05.jpg" alt=""></a></article>
	<article class="item thumb" data-width="232"><h2>The Pursuit</h2><a href="images/fulls/06.jpg" class="image"><img src="images/thumbs/06.jpg" alt=""></a></article>
	<article class="item thumb" data-width="352"><h2>Boundless</h2><a href="images/fulls/07.jpg" class="image"><img src="images/thumbs/07.jpg" alt=""></a></article>
	<article class="item thumb" data-width="348"><h2>The Spectators</h2><a href="images/fulls/08.jpg" class="image"><img src="images/thumbs/08.jpg" alt=""></a></article>
	<article class="item thumb" data-width="282"><h2>You really got me</h2><a href="images/fulls/01.jpg" class="image"><img src="images/thumbs/01.jpg" alt=""></a></article>
	<article class="item thumb" data-width="384"><h2>Ad Infinitum</h2><a href="images/fulls/02.jpg" class="image"><img src="images/thumbs/02.jpg" alt=""></a></article>
	<article class="item thumb" data-width="274"><h2>Different.</h2><a href="images/fulls/03.jpg" class="image"><img src="images/thumbs/03.jpg" alt=""></a></article>
	<article class="item thumb" data-width="282"><h2>Elysium</h2><a href="images/fulls/04.jpg" class="image"><img src="images/thumbs/04.jpg" alt=""></a></article>
</div>

@endsection