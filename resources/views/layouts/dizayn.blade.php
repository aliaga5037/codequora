<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">

	<title>AzerbaijanTour</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Load CSS -->
	@yield('head')
	<link rel="stylesheet" href="/dizayn/css/style.css">

	<link rel="stylesheet" href="/dizayn/fancybox/jquery.fancybox-1.3.4.css">

	<link rel="stylesheet" href="/dizayn/css/smoothness/jquery-ui-1.8.16.custom.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">



	<!-- Page icon -->
	<link rel="shortcut icon" href="favicon.png">

	<!-- Load Modernizr -->
	<script src="/dizayn/js/modernizr-2.0.min.js"></script>

	<!-- Load JavaScript -->
	<script src="/dizayn/js/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>
	<script src="/dizayn/js/jquery-ui-1.8.16.custom.min.js"></script>
	<script src="/dizayn/js/script.js"></script>
	<script src="/dizayn/js/jquery.fancybox-1.3.4.pack.js"></script>
	<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
	<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

</head>
<body>

 <!-- Header -->
<header style="background-image:url(/dizayn/img/12.jpg);">

	<div class="container_12">

		<!-- Title and navigation panel -->
		<div id="panel" class="grid_12">

			<!-- Title -->
			<h1><a href="/">AzerbaijanTour</a></h1>

			<!-- Navigation -->
			<nav>
				<ul>
					<li>
						<a href="/turlar">Turlar</a>
						<ul>
							<li><a href="/turlar">Ümumi Turlar</a></li>
							<li><a href="/otel">Otellər</a></li>

						</ul>
					</li>
					<!-- <li>
						<a href="faq.html">Pages</a>
						<ul>
							<li><a href="faq.html">FAQ</a></li>
							<li><a href="forms.html">Forms</a></li>
						</ul>
					</li> -->
					<li>
						<a href="/elaqe">Əlaqə</a>
					</li>
					<li>
						@if (auth()->guard('company')->guest() && Auth::guest())
						<a href="#">Qeydiyyat</a>
						<ul>
							<li><a href="/userreg">Bizdən Alın</a></li>
							<li><a href="/companyreg">Bizimlə İşlə</a></li>
						</ul>
						@elseif(auth()->guard('company')->user() || auth()->guard('')->user())
						<a href="#">Məlumat</a>
						<ul>
							<li><a href="#">Profil</a></li>
							@if (auth()->guard('company')->user())
							<li><a href="/{{auth()->guard('company')->user()->id}}/tours">Mənim Turlarım</a></li>
							@elseif(Auth::user())
							<li><a href="/tours/tourbuy/{{Auth::user()->id}}">Aldığım Turlar</a></li>
							@endif
							@if (auth()->guard('company')->user())
								<li><a href="/companylogout">Çıxış</a></li>
							@else
							<li><a href="/logout">Çıxış</a></li>
							@endif

						</ul>
						@endif
					</li>
				</ul>

				<!-- Search -->
				<form action="#" class="black">
					<input name="search" type="text" placeholder="Axtarış..." />
					<input type="submit" />
				</form>

			</nav>

		</div>

	</div>


  @yield('basliq')


</header>

<!-- Main content -->
<div class="container_12">

@yield('content')

</div>

 	<!-- Footer -->
	<footer><div class="container_12">

		<nav class="grid_8">
			<a href="/">Ana Səhifə</a>
			<a href="/turlar">Turlar</a>
			<a href="/elaqe">Əlaqə</a>
		</nav>

		<p class="address grid_4">
			<strong>ZENIT TOUR Travel Agency</strong><br />
			<span>Az 1010 Zarifa Aliyeva 35/12 BAKU, AZERBAIJAN</span><br />
			<span><a href="#">info@azerbaijantour.az</a></span>
		</p>

		<p class="copyright grid_8">
			© 2016
		</p>

	</div></footer>


	<!-- Google Analytics -->
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-2529322-12']); // Set your Google Analytics ID here
		_gaq.push(['_trackPageview']);

		(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>

</body>
</html>
