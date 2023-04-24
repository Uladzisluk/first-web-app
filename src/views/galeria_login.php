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
        <nav class="navfirstpage">
            <ol>
                <li><a href="/wstep">Wstęp</a></li>
                <li><a href="/ekwipunek">Wyposażenie</a></li>
                <li><a href="/ostrzezenia">Ostrzeżenia</a></li>
                <li class="active">
                    <a href="#">Inne</a>
                    <ul>
                        <li><a href="/galeria_login">Galeria</a></li>
                    </ul>
                </li>
            </ol>
        </nav>
        <div style="clear:both"></div>
    </header>
    <main id="idmain">
        <div class="container">
            <div class="content">
                <?php require_once "../makeGalery_login.php"; ?>
            </div>
            <div class="asid" id="asid">
                <div id="calendar">
                    <p id="kalendarz">Dzisiejsza data: 10.11.2021</p>
                    <div id="datepicker"></div>
                    <h3>Przypominacz dla Państwa!</h3>
                    <p id="przypominacz">Planujesz podróż w góry:</p>
                </div>
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