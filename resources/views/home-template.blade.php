<!DOCTYPE HTML>
<!--
	Parallelism by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html ng-app="home">
	<head>
		<title>HOME</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="/css/home/main.css" />
		<noscript><link rel="stylesheet" href="/css/home/noscript.css" /></noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>

		<div id="wrapper" ng-controller="reelController">

			<div id="main">
				<div id="reel">

					@yield('content');

				</div>
			</div>

		</div>

		<!-- Scripts -->
			<script src="/js/jquery.min.js"></script>
			<script src="/js/jquery.poptrox.min.js"></script>
			<script src="/js/angular.min.js"></script>
			<script src="/js/angular-route.min.js"></script>
			<script src="/js/skel.min.js"></script>
			<script src="/js/skel-viewport.min.js"></script>
			<script src="/js/home/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="/js/home/main.js"></script>
			<script src="/js/home/unimate.js"></script>

	</body>
</html>