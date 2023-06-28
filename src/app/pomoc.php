<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - System rekrutacji</title>
    <link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" media="screen" href="../css/style.css">
    <link rel="stylesheet" media="screen" href="../css/news.css">
    <link href="https://fonts.googleapis.com/css?family=Inter:200,300,400,600,700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../../img/icon/website_icon/logo.png" />
    <script type="text/javascript" src="../js/skrypt.js"></script>
</head>
<body>
    <!-- SIDENAV( BOCZNE MENU ) -->
    <div class="sidenav">
        <div id="sidenav-wrapp">
            <div class="sidenav-title">
                <h3>System rekrutacyjny</h3>
                <hr />
            </div>
        </div><br><br><br>
        <nav>
            <li class="btn-background"><a href="index.php"><img src="../../img/icon/nav_icon/home-solid.svg">Home</a></li>
            <li class="btn-background"><a href="add.php"><img src="../../img/icon/nav_icon/user-plus-solid.svg">Dodaj Ucznia</a></li>
            <li class="btn-background"><a href="lista.php"><img src="../../img/icon/nav_icon/list-alt-solid.svg">Lista Uczniów</a></li>
            <li class="btn-background"><a href="klasa.php"><img src="../../img/icon/nav_icon/book-solid.svg">Wyświetl klasy</a></li>
            <li class="btn-background"><a href="#"><img src="../../img/icon/nav_icon/question-circle-solid.svg">Pomoc techniczna</a></li>
            <li class="btn-background"><a href="../../index.html"><img src="../../img/icon/nav_icon/sign-out-alt-solid.svg">WYLOGUJ</a></li>
        </nav>
        <hr class="footer-line" />
        <div class="footer" style="float: left"><span id="span_footer"></span></div>
    </div>
    <!-- HEADER ( GÓRNA (CZARNY PASEK) ) -->
    <div class="main">
        <div class="header">
            <div class="header-col"><span>Home</span></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="box red"><img src="../../img/icon/nav_icon/home-solid.svg">
                        <h1 id="h1-id-zegar"></h1><span>Godzina</span>
                    </div>
                </div>

                <div class="col">
                    <div class="box blue"><img src="../../img/icon/nav_icon/user-plus-solid.svg">
                        <h1> </h1><span>Uczniów</span>
                    </div>
                </div>

                <div class="col">
                    <div class="box orange"><img src="../../img/icon/nav_icon/book-solid.svg">
                        <h1>8</h1><span>Profili</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="left-area">
                        <div class="area-top">Dział techniczny</div>
                        <div class="area-text">
                            <div class="row no-gutters">
                                <div class="col-sm-6 col-md-8">
                                    <div class="area-text-title"><span>Jakub Drobnik</span></div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="area-text-description">
                                        <p>email: <b>test@sqz.pl</b></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row no-gutters">
                                <div class="col-sm-6 col-md-8">
                                    <div class="area-text-title"><span>Karol Kornosz</span></div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="area-text-description">
                                        <p>email: <b>test@sqz.pl</b></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row no-gutters">
                                <div class="col-sm-6 col-md-8">
                                    <div class="area-text-title"><span>Kamil Paluszak</span></div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="area-text-description">
                                        <p>email: <b>test@sqz.pl</b></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="right-area">
                        <div class="area-top">Liczba Uczniów na profilach</div>
                        <div class="area-text">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">Profil Akademicki: <span class="span_function_ilosc"></span></div>
                                    <div class="col-12">Profil Prozdrowotny: <span class="span_function_ilosc"></span></div>
                                    <div class="col-12">Profil Mundurowy: <span class="span_function_ilosc"></span></div>
                                    <div class="col-12">Profil Sportowo Turystyczny: <span class="span_function_ilosc"></span></div>
                                    <div class="col-12">Profil Matematyczno Inżynieryjny: <span class="span_function_ilosc"></span></div>
                                    <div class="col-12">Profil Logistyczny: <span class="span_function_ilosc"></span></div>
                                    <div class="col-12">Profil Informatyczny: <span class="span_function_ilosc"></span></div>
                                    <div class="col-12">Profil Wielozawodowy: <span class="span_function_ilosc"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>