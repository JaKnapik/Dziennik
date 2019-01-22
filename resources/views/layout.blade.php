<!DOCTYPE HTML>
<!--
	Spectral by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Spectral by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="css/main.css" />
		<noscript><link rel="stylesheet" href="css/noscript.css" /></noscript>
	</head>
	<body class="landing is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header">
						<h1><a href={{route('dziennik.index')}}>Dziennik</a></h1>
						<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>@if(Auth::guest()==false){{ Auth::user()->name." ".Auth::user()->surname }}@endif  Menu</span></a>
									<div id="menu">
										<ul>
											@if(Auth::guest()==false)
												@if(Auth::user()->role == 'admin')
													<li><a href="{{ route('student.create') }}">ZAREJESTRUJ UCZNIA</a></li>
													<li><a href="{{route('students.index')}}">LISTA UCZNIÓW</a></li>
												@endif
											@endif

											@if(Auth::guest()==false)
													<li><a href="{{route("messages.showSent", Auth::user()->id)}}">Wiadomości wysłane</a></li>
													<li><a href="{{route("messages.showReceived", Auth::user()->id)}}">Wiadomości odebrane</a></li>
													<li><a href="{{route("messages.toMany")}}">Wyślij do wielu</a></li>
                                                    <li><a href="{{route("paski.index")}}">Paski do druku</a></li>
												<li><a href="{{ route('login.logout') }}"
												   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
													Wyloguj
												</a>

												<form id="logout-form" action="{{ route('login.logout') }}" method="POST" style="display: none;">
													{{ csrf_field() }}
												</form>
												@endif
												@if(Auth::guest()==true)
													<li><a href="{{ url('/login') }}">Zaloguj</a></li>
												@endif
											</li>
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</header>
<div class="container" style="padding-top: 3em">

	@yield('content')

</div>
				<!-- Footer -->
					<footer id="footer">
						<ul class="icons">
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
							<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
						</ul>
						<ul class="copyright">
							<li>&copy; Untitled</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="js/jquery.min.js"></script>
			<script src="js/jquery.scrollex.min.js"></script>
			<script src="js/jquery.scrolly.min.js"></script>
			<script src="js/browser.min.js"></script>
			<script src="js/breakpoints.min.js"></script>
			<script src="js/util.js"></script>
			<script src="js/main.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js" integrity="sha384-vhJnz1OVIdLktyixHY4Uk3OHEwdQqPppqYR8+5mjsauETgLOcEynD9oPHhhz18Nw" crossorigin="anonymous"></script>
			<script src="js/lista2.js"></script>


	</body>
</html>