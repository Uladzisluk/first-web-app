<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>Moje hobby - Alpinizm</title>
	
	<link rel="stylesheet" href="static/css/styles.css">
	
	<link href="https://fonts.googleapis.com/css2?family=PT+Serif+Caption&display=swap" rel="stylesheet">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
	
	<!-- [if lt IE 9]>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" integrity="sha512-UDJtJXfzfsiPPgnI5S1000FPLBHMhvzAMX15I+qG2E2OAzC9P1JzUwJOfnypXiOH7MRPaqzhPbBGDNNj7zBfoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<![endif]-->
</head>
<body>
	<header>
		<div id="logo"><a href="/"><img src="static/img/logo.png" alt="logo"></a></div>
		<div id="zegar">13:59:59</div>
		<span class="expand">&equiv;</span>
		<nav class="navfirstpage">
			<ol>
				<li><a href="/wstep">Wstęp</a></li>
				<li><a href="/ekwipunek">Wyposażenie</a></li>
				<li><a href="/ostrzezenia">Ostrzeżenia</a></li>
				<li><a href="#">Inne</a>
					<ul>
						<li><a href="/galeria_login">Galeria</a></li>
					</ul>
				</li>
			</ol>
		</nav>
		<div style="clear:both"></div>
	</header>
	<main>
		<article>
			<div class="pierw_str">
				<div class="zaw_perw_str">
					<h1>Chciałbyś się zaznajomić z alpinizmem?</h1>
					<p>jeśli tak, to zaczynamy!</p>
				<div id="first_button"><a href="/wstep"><p>Wstęp</p></a></div>
			</div>
			</div>
		</article>
	</main>
	<footer>
		Stworzono Uladzislawem Lukashevichem &copy; Zabronione do kopiowania
	</footer>
	<script>	
		var zegar = document.getElementById('zegar');
		
		function changeTime(){
	
			var czas = new Date();
			
			var hour = czas.getHours();
			var minute = czas.getMinutes();
			var second = czas.getSeconds();
			
			if (hour<10) hour = '0'+hour;
			if(minute<10) minute = '0'+minute;
			if(second<10) second = '0'+second;
			zegar.innerHTML = hour+":"+minute+":"+second;
			setTimeout('changeTime()', 1000);
		}
		
		changeTime();
		
		$('.expand').click(function () {
            $('header nav').slideToggle(300);
		})


		
		</script>
</body>

</html>