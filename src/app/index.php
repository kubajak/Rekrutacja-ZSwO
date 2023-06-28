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
    <link rel="icon" type="image/png" href="../../img/icon/website_icon/logo.png"/>
    <script type="text/javascript" src="../js/skrypt.js"></script>
    <style>
        .row-striped:nth-of-type(odd) {
            background-color: #efefef;
            border-left: 4px #000000 solid;
        }

        .row-striped:nth-of-type(even) {
            background-color: #ffffff;
            border-left: 4px #efefef solid;
        }

        .row-striped {
            padding: 15px 0;
        }
    </style>
</head>

<body onload="zegar(), stopka()">
    <?php
    include("bdconfig/baza_connect.php");
    $dane = _connect();
    function uczen_licz_fun($_profil)
    {
        global $dane;
        $connect = mysqli_connect($dane[0], $dane[1], $dane[2]);

        if (!$connect) {
            echo "Problem z połączeniem bazy danych";
            header("Location:error_polonczenie.php");
        }
        if (!mysqli_select_db($connect, $dane[3])) {
            echo "Baza danych nie wybrana";
            header("Location:error_brak_bazy.php");
        }

        $uczen_ilosc = "SELECT count($_profil) AS total FROM $dane[4] WHERE $_profil > 0";
        $uczen_ilosc_dane = mysqli_query($connect, $uczen_ilosc);
        $uczen_ilosc_wartosci = mysqli_fetch_assoc($uczen_ilosc_dane);
        $ilosc_wierszy = $uczen_ilosc_wartosci['total'];
        return $ilosc_wierszy;
    }
    ?>
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
            <li class="btn-background"><a href="../../index.html"><img src="../../img/icon/nav_icon/sign-out-alt-solid.svg">WYJDŹ</a></li>
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
                        <h1><?php echo uczen_licz_fun("id"); ?></h1><span>Uczniów</span>
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
                        <div class="area-top">Terminarz</div>
                        <div class="area-text">
                            <div class="container">
                                <div class="row row-striped">
                                    <div class="col-2 text-right">
                                        <h1 class="display-4"><span class="badge badge-secondary">14</span></h1>
                                        <h2>SIE</h2>
                                    </div>
                                    <div class="col-10">
                                        <h3 class="text-uppercase"><strong>Zakończenie terminu rekrutacji</strong></h3>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> Piątek</li>
                                            <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i>14:25</li>
                                            <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> Ostateczny termin rekrucatji uczniów</li>
                                        </ul>
                                        <p>Ostateczny termin rekrutacyjny przyszłych uczniów do szkoły, po tym dniu nie można rekrutować nowych uczniów.</p>
                                    </div>
                                </div>
                                <div class="row row-striped">
                                    <div class="col-2 text-right">
                                        <h1 class="display-4"><span class="badge badge-secondary">17</span></h1>
                                        <h2>SIE</h2>
                                    </div>
                                    <div class="col-10">
                                        <h3 class="text-uppercase"><strong>Termin generowania list</strong></h3>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i>Poniedziałek</li>
                                            <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i>9:15</li>
                                            <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i>Ostateczny termin generowania list</li>
                                        </ul>
                                        <p>Ostateczny termin generowania list przyjętych uczniów do szkoły, po tym dni nie mozna już edytować list.</p>
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
                                    <div class="col-12">Profil Akademicki: <span class="span_function_ilosc"><?php echo uczen_licz_fun("profil_akademicki"); ?></span></div>
                                    <div class="col-12">Profil Prozdrowotny: <span class="span_function_ilosc"><?php echo uczen_licz_fun("profil_prozdrowotny"); ?></span></div>
                                    <div class="col-12">Profil Mundurowy: <span class="span_function_ilosc"><?php echo uczen_licz_fun("profil_mundurowy"); ?></span></div>
                                    <div class="col-12">Profil Sportowo Turystyczny: <span class="span_function_ilosc"><?php echo uczen_licz_fun("profil_sportowo_turystyczny_sportowy"); ?></span></div>
                                    <div class="col-12">Profil Matematyczno Inżynieryjny: <span class="span_function_ilosc"><?php echo uczen_licz_fun("profil_matematyczno_inzynieryjny"); ?></span></div>
                                    <div class="col-12">Profil Logistyczny: <span class="span_function_ilosc"><?php echo uczen_licz_fun("profil_logistyczny"); ?></span></div>
                                    <div class="col-12">Profil Informatyczny: <span class="span_function_ilosc"><?php echo uczen_licz_fun("profil_informatyczny"); ?></span></div>
                                    <div class="col-12">Profil Wielozawodowy: <span class="span_function_ilosc"><?php echo uczen_licz_fun("profil_wielozawodowy"); ?></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>