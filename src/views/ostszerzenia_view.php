<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<title>Moje hobby - Alpinizm</title>
	
	<link rel="stylesheet" href="static/css/styles.css">

	<link href="https://fonts.googleapis.com/css2?family=PT+Serif+Caption&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="static/css/fontello_css/fontello.css">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	

	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

	<script src="static/js/jquery.scrollTo.min.js"></script>
	
	<!-- [if lt IE 9]>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" integrity="sha512-UDJtJXfzfsiPPgnI5S1000FPLBHMhvzAMX15I+qG2E2OAzC9P1JzUwJOfnypXiOH7MRPaqzhPbBGDNNj7zBfoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<![endif]-->
</head>
<body>
	<header>
		<div id="logo"><a href="/"><img src="static/img/logo.png" alt="logo"></a></div>
		<div id="zegar">13:59:59</div>
		<span class="expand">&equiv;</span>
		<nav>
			<ol>
				<li><a href="/wstep">Wstęp</a></li>
				<li><a href="/ekwipunek">Wyposażenie</a></li>
				<li class="active"><a href="/ostrzezenia">Ostrzeżenia</a></li>
				<li>
					<a href="#">Inne</a>
					<ul>
						<li><a href="/galeria_login">Galeria</a></li>
					</ul>
				</li>
			</ol>
		</nav>
		<div style="clear:both"></div>
	</header>
	<main>
	<div class="container">
		<div class="content">
			<div class="pic_glown" id="pic_glown3"></div>
			<div class="forasid" id="forasid"><img src="static/img/forasid.svg" alt="forasid" /></div>
			<div id="scrollUp"><a href="#logo"><i class="icon-up-circle"></i></a></div>
			<article>
				<div class="wstep_str">
					<header>
						<h1>Ostrzeżenia dla alpinistów</h1>
					</header>
					<div class="tresc">
						<h2 id="trudnosc">Ocena trudności</h2>
						<p>
							Aby pomyślnie zakończyć wyprawę górską, powinieneś <b>realistycznie ocenić swoją kondycję</b> i wybrać trasę odpowiadającą twoim umiejętnościom. Poniżej zestawiliśmy <b>wskaźniki</b>, które możesz wykorzystać planując trasę:
						</p>
						<table id="ostszerztable" style=" border-spacing: 10px; border-collapse: separate; margin-left: 110px; margin-right: 10px; ">
							<tr>
								<td style="border-left: 1px solid #e4e0dc; border-bottom: 1px solid #e4e0dc; "><b>Kondycja słaba</b></td>
								<td style="border-left: 1px solid #e4e0dc; border-bottom: 1px solid #e4e0dc; ">Trasy z podejściami o różnicy wysokości do 800 m</td>
								<td style="border-left: 1px solid #e4e0dc; border-bottom: 1px solid #e4e0dc; ">Do 5 godzin marszu</td>
							</tr>
							<tr>
								<td style="border-left: 1px solid #e4e0dc; border-bottom: 1px solid #e4e0dc; "><b>Kondycja średnia</b></td>
								<td style="border-left: 1px solid #e4e0dc; border-bottom: 1px solid #e4e0dc; ">Trasy z podejściami o różnicy wysokości do 1200 m</td>
								<td style="border-left: 1px solid #e4e0dc; border-bottom: 1px solid #e4e0dc; ">Do 7 godzin marszu</td>
							</tr>
							<tr>
								<td style="border-left: 1px solid #e4e0dc; border-bottom: 1px solid #e4e0dc; "><b>Kondycja dobra</b></td>
								<td style="border-left: 1px solid #e4e0dc; border-bottom: 1px solid #e4e0dc; ">Trasy z podejściami o różnicy wysokości do 1600 m</td>
								<td style="border-left: 1px solid #e4e0dc; border-bottom: 1px solid #e4e0dc; ">Do 10 godzin marszu</td>
							</tr>
							<tr>
								<td style="border-left: 1px solid #e4e0dc; border-bottom: 1px solid #e4e0dc; "><b>Kondycja bardzo dobra</b></td>
								<td style="border-left: 1px solid #e4e0dc; border-bottom: 1px solid #e4e0dc; ">Trasy z podejściami o różnicy wysokości ponad 1600 m</td>
								<td style="border-left: 1px solid #e4e0dc; border-bottom: 1px solid #e4e0dc; ">Ponad 10 godzin marszu</td>
							</tr>
						</table>
						<p>
							<b>Stopień trudności odcinków wspinaczkowych</b> w krajach alpejskich jest często podawany w oparciu o międzynarodową <b>kalę UIAA</b> (Międzynarodowa Federacja Związków Alpinistycznych). Skala trudności jest opisana <b>liczbami rzymskimi od I do XII</b>. I oznacza bardzo łatwy odcinek wspinaczkowy. Trudność i wymagane umiejętności wzrastają z każdą następną liczbą. Stopnie od V w górę podzielone są dodatkowo na „+“ i „-“. V- jest nieco łatwiejszy a V+ nieco trudniejszy niż V.
							<br><br>
							Do oceny stopnia trudności <b>żelaznych perci</b> (via ferrata) stosuje się dwie różne skale. <b>Skala Schalla</b> obejmuje stopnie trudności <b>od A do F</b> gdzie A oznacza perć łatwą, natomiast F ekstremalnie trudną. <b>Skala Hüslera</b> określa stopień trudności w zakresie <b>od K1 do K6</b>, gdzie K1 oznacza szlak łatwy a K6 ekstremalnie trudny.
							<br><br>
							Ale pamiętaj, że <b>większość krajów i regionów stosuje własne oznaczenia szlaków</b> oraz stopni trudności dla odcinków wspinaczkowych, perci czy tras wysokogórskich. Dlatego przed wyprawą zasięgnij informacji o regionalnych skalach trudności.
						</p>
					</div>
					<div class="tresc">
						<h2 id="wskazowki">Wskazówki bezpieczeństwa</h2>
						<p>
							Jako alpinista nie powinieneś wyruszać w góry sam. Zalecane są <b>grupy od 2 do 6 osób</b>, żebyście w razie potrzeby mogli sobie pomagać. W grupie lepiej działa wzajemna motywacja, a wspólne przeżywanie piękna natury jest intensywniejsze.
						</p>
						<img id="pic4" src="static/img/pic4.jpg" alt="pic4">
						<p>
							Żeby zachować bezpieczeństwo idąc w góry powinieneś przestrzegać następujących reguł właściwego zachowania:
						</p>
						<ul>
							<li>Zostaw w schronisku informację lub zawiadom rodzinę o swojej <b>trasie, jej zmianach i przewidywanym czasie przybycia</b>. W razie potrzeby będą oni mogli poinformować służby ratunkowe, gdzie mniej więcej jesteś.</li>
							<li>Podczas burzy unikaj grani, szczytów i ich okolic. Najlepiej wtedy poszukać <b>schronienia między zabudowaniach</b>. Jeżeli nie ma żadnych budynków w pobliżu, usiądź w kucki na izolowanej powierzchni (np. na plecaku).</li>
							<li>Uczestnicy wypraw wysokogórskich muszą znać właściwe zasady <b>asekuracji i techniki ratowania</b> ze szczelin lodowcowych.</li>
							<li>Jeżeli planujesz wędrówkę wysokogórską, to dobrze jest, żeby <b>podchodzić powoli</b> i aklimatyzować się stopniowo do rozrzedzonego powietrza. W Alpach na średnich wysokościach powinieneś odbyć jedną do dwóch <b>wypraw aklimatyzacyjnych</b> z noclegiem w niżej położonym schronisku.</li>
						</ul>
						<p>
							Ponadto przyda się zapamiętanie lub zanotowanie <b>lokalnych numerów ratunkowych</b>. W sytuacji zagrożenia możesz wezwać pomoc w górach pod następującymi numerami telefonu:
						</p>
						<ul>
							<li><b>Europejski numer alarmowy</b>: 112</li>
							<li>Górskie pogotowie ratunkowe Niemcy: 112</li>
							<li>Górskie pogotowie ratunkowe Austria: 140</li>
							<li>Górskie pogotowie ratunkowe Szwajcaria: 144</li>
							<li>Górskie pogotowie ratunkowe Włochy/Tyrol Południowy: 118</li>
						</ul>
						<p>
							Jeżeli nie masz zasięgu, zrestartuj telefon. Zamiast numeru PIN wprowadź cyfry 112 i nawiąż połączenie alarmowe. Telefon wyszuka sobie wtedy sieci o najsilniejszym sygnale. Gdyby telefon nie działał, możesz dawać znak dźwiękiem, na podstawie <b>alpejskiego schematu alarmowego</b>. W tym celu nadawaj dźwięk <b>6 razy na minutę</b> (a więc co około 10 sekund). Przed kolejnym ciągiem 6 sygnałów następuje minuta przerwy. Znaki dźwiękowe możesz dawać gwizdkiem lub krzyczeć. Alternatywą do znaków dźwiękowych mogą być błyski świetlne lub machanie kurtką. Jeżeli z kolei ty zauważysz lub usłyszysz alpejski schemat alarmowy, powinieneś poinformować górskie pogotowie ratunkowe i potwierdzić odbiór prośby o pomoc. Przyjęcie sygnału alarmowego potwierdzasz odpowiadając <b>3 razy na minutę</b> (a więc co około 20 sekund) i zwracając na siebie uwagę w podobny sposób jak wzywający pomocy.
						</p>
						<div id="uwaga">
							<p style="padding-bottom: 40px;">
								<img src="static/img/uwaga2.svg" alt="uwaga2">
								<br>
								Będąc członkiem niemieckiego Związku Alpejskiego (Alpenverein) jesteś ubezpieczony podczas aktywności alpinistycznych na całym świecie. Dodatkowo wspierasz w ten sposób budowę i utrzymanie infrastruktury oraz ochronę przyrody w górach.
							</p>
						</div>
					</div>
				</div>
			</article>
		</div>
		<div class="asid" id="asid">
					<div id="calendar">
						<p id="kalendarz">Dzisiejsza data: 10.11.2021</p>
						<div id="datepicker"></div>
						<h3>Przypominacz dla Państwa!</h3>
						<p id="przypominacz">Planujesz podróż w góry:</p>
					</div>
					<nav>
						<div class="nawigacja">
							<h2>Nawigacja</h2>
							<ul>
							<li><a id="nawtrudn" href="#trudnosc">Ocena trudności</a></li>
							<li><a id="nawwskaz" href="#wskazowki">Wskazówki bezpieczeństwa</a></li>
							</ul>
						</div>
					</nav>
					<div id="containerswitchdiv" style="width:100%;">
						<p style="text-align:center;">
							<label class="switch">
								<input type="checkbox" id="checkswitch">
								<span class="slider round"></span>
							</label>
						</p>
					</div>
					<div class="formular">
						<form>
							<p>Twoje imie: </p>
							<input type="text" id="fname" name="fname" value="Jan" /><br />

							<p>Twoje nazwisko:</p>
							<input type="text" id="lname" name="lname" value="Kowalski" /><br /><br />

							Jak długo się zajmujesz wspinaczką?<br />
							<input type="radio" id="radio_0" name="experience" value="0" />
							<label for="radio_0">Dopiero zaczynam</label><br />
							<input type="radio" id="radio_mniej" name="experience" value="mniej 5" />
							<label for="radio_mniej">Mniej niż 5 lat</label><br />
							<input type="radio" id="radio_wiecej" name="experience" value="wiecej 5" />
							<label for="radio_wiecej">Wiecej niż 5 lat</label><br /><br />

							Na jakich górach już byłeś:<br />
							<input type="checkbox" id="mountain1" name="mountain1" value="Ama Dablam" />
							<label for="mountain1">Ama Dablam, Nepal</label>
							<input type="checkbox" id="mountain2" name="mountain2" value="Matterhorn" />
							<label for="mountain2">Matterhorn - Szwajcaria, Włochy</label>
							<input type="checkbox" id="mountain3" name="mountain3" value="Half Dome" />
							<label for="mountain3">Half Dome, Stany Zjednoczone</label>
							<input type="checkbox" id="mountain4" name="mountain4" value="Denali" />
							<label for="mountain4">Denali, Stany Zjednoczone</label>
							<input type="checkbox" id="mountain5" name="mountain5" value="Tre Cime di Lavaredo" />
							<label for="mountain5">Tre Cime di Lavaredo, Włochy</label>
							<input type="checkbox" id="mountain6" name="mountain6" value="Roraima" />
							<label for="mountain6">Roraima - Wenezuela, Gujana i Brazylia</label>
							<input type="checkbox" id="mountain7" name="mountain7" value="Mont Blanc" />
							<label for="mountain7">Mont Blanc, Francja</label><br /><br />

							Napisz, co myślisz o mojej stronie:<br />
							<textarea name="review" rows="10" cols="40">Pozostaw tu swoją opinie:)</textarea><br /><br />

							<label for="homepage">I podaj link do jednego ze swoich portalów społecznościowych:</label>
							<input type="url" id="homepage" name="homepage"><br /><br />

							<label for="email">Podaj swój email, by otrzymywać powiadomienia:</label><br />
							<input type="email" id="email" name="email"><br /><br />

							<input type="submit" value="Potwierdzić" />
							<input type="reset" value="Zresetować" />


						</form>
					</div>
		</div>
		<div style="clear:both"></div>
	</div>
	</main>
	<footer>
		Stworzono Uladzislawem Lukashevichem &copy; Zabronione do kopiowania
	</footer>
	<script src="static/js/script.js"></script>
</body>

</html>