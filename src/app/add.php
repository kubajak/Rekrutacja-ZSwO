<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZS - System rekrutacyjny</title>
    <link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" media="screen" href="../css/style.css">
    <link rel="stylesheet" media="screen" href="../css/add_page.css">
    <link rel="stylesheet" media="screen" href="../css/root.css">
    <link href="https://fonts.googleapis.com/css?family=Inter:200,300,400,600,700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../../img/icon/website_icon/logo.png" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="../js/skrypt.js"></script>
    <script type="text/javascript" src="../js/pesel.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body onload="stopka()">

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
            <div class="header-col"><span>Kreator dodawania Ucznia</span></div>
        </div>

        <div class="add-container">
            <div class="container">
                <form action="dodaj_ucznia.php" method="post" autocomplete="off">
                    <div class="row">
                        <div class="col-50" id="col-50-id"><br />
							<?php
								// generate a random token value
								$token = bin2hex(random_bytes(32));
							?>
							
							<!-- include the token value as a hidden input field -->
							<input type="hidden" name="token" value="<?php echo $token; ?>">
							<!-- your form fields here -->
							
                            <h3>Dane Ucznia</h3><br />
                            <label for="fname">PESEL:</label>
                            <input type="text" name="pesel_text" id="pesel_spr" placeholder="12345678910" required>
                            <label for="email">Imię:</label>
                            <input type="text" name="imie_text" id="imie_spr" required>
                            <label for="adr">Drugie Imię:</label>
                            <input type="text" name="drugie_imie_text" id="drugie_imie_spr">
                            <label for="city">Nazwisko:</label>
                            <input type="text" name="nazwisko_text" id="nazwisko_spr" required>
                            <label for="state">Miejscowość:</label>
                            <input type="text" name="miejscowosc_text" id="miejscowosc_spr" required>
                            <label for="zip">Kod Pocztowy:</label>
                            <input type="text" name="kod_pocztowy_text" id="kod_pocztowy_spr" placeholder="12-345" required>
                            <label for="state">Ulica i numer domu:</label>
                            <input type="text" name="ulica_numer_text" id="ulica_spr">
                            <label for=" state">Szkoła podstawowa:</label>
                            <input type="text" name="szkola_podstawowa_text" id="szkola_spr" required>
                            <label for=" state">Język wiodący:</label>
                            <div class="row">
                                <div class="col-50">
                                    <label><input type="radio" id="state" name="jezyk_obcy_text" value="eng" checked>Język Angielski</label>
                                </div>
                                <div class="col-50">
                                    <label><input type="radio" id="state" name="jezyk_obcy_text" value="de">Język Niemiecki</label>
                                </div>
                            </div><br />
                            <div class="row">
                                <div class="wybor col-12">
                                    <label for="state">Wybór 1:</label>
                                    <select name="wybor1">
                                        <option value="default">Proszę wybrać Profil/Klasę</option>
                                        <option value="Profil Akademicki">Profil Akademicki</option>
                                        <option value="Profil Prozdrowotny">Profil Prozdrowotny</option>
                                        <option value="Profil Mundurowy">Profil Mundurowy</option>
                                        <option value="Profil Sportowy-Turystyczny,Sportowy">Profil Sportowy-Turystyczny,Sportowy</option>
                                        <option value="Profil Matematyczno-Inżynieryjny">Profil Matematyczno-Inżynieryjny</option>
                                        <option value="Profil Logistyczny">Profil Logistyczny</option>
                                        <option value="Profil Informatyczny">Profil Informatyczny</option>
                                        <option value="Klasa Wielozawodowa">Klasa Wielozawodowa</option>
                                        <option value="Inna">Inna</option>
                                    </select>
                                </div>
                                <div class="wybor col-12">
                                    <label for="state">Wybór 2:</label>
                                    <select name="wybor2">
                                        <option value="default">Proszę wybrać Profil/Klasę</option>
                                        <option value="Profil Akademicki">Profil Akademicki</option>
                                        <option value="Profil Prozdrowotny">Profil Prozdrowotny</option>
                                        <option value="Profil Mundurowy">Profil Mundurowy</option>
                                        <option value="Profil Sportowy-Turystyczny,Sportowy">Profil Sportowy-Turystyczny,Sportowy</option>
                                        <option value="Profil Matematyczno-Inżynieryjny">Profil Matematyczno-Inżynieryjny</option>
                                        <option value="Profil Logistyczny">Profil Logistyczny</option>
                                        <option value="Profil Informatyczny">Profil Informatyczny</option>
                                        <option value="Klasa Wielozawodowa">Klasa Wielozawodowa</option>
                                        <option value="Inna">Inna</option>
                                    </select>
                                </div>
                                <div class="wybor col-12">
                                    <label for="state">Wybór 3:</label>
                                    <select name="wybor3">
                                        <option value="default">Proszę wybrać Profil/Klasę</option>
                                        <option value="Profil Akademicki">Profil Akademicki</option>
                                        <option value="Profil Prozdrowotny">Profil Prozdrowotny</option>
                                        <option value="Profil Mundurowy">Profil Mundurowy</option>
                                        <option value="Profil Sportowy-Turystyczny,Sportowy">Profil Sportowy-Turystyczny,Sportowy</option>
                                        <option value="Profil Matematyczno-Inżynieryjny">Profil Matematyczno-Inżynieryjny</option>
                                        <option value="Profil Logistyczny">Profil Logistyczny</option>
                                        <option value="Profil Informatyczny">Profil Informatyczny</option>
                                        <option value="Klasa Wielozawodowa">Klasa Wielozawodowa</option>
                                        <option value="Inna">Inna</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-50"><br />
                            <h3>Punktacja</h3><br />
                            <label for="cname">Egzamin część Humanistyczna:</label>
                            <input type="text" name="egczhuman" placeholder="0-100" id="eg_cz_H_spr" required>
                            <label for="ccnum">Egzamin część Matemtyczna:</label>
                            <input type="text" name="egczmatma" placeholder="0-100" id="eg_cz_M_spr" required>
                            <label for="expmonth">Egzamin Język Obcy:</label>
                            <input type="text" name="egczobcy" placeholder="0-100" id="eg_cz_O_spr" required>
                            <label for="expmonth">Język Polski:</label>
                            <input type="text" name="polski" placeholder="2-6" id="p_spr" required max="6">
                            <label for="expmonth">Język Obcy:</label>
                            <input type="text" name="obcy" placeholder="2-6" id="o_spr" required>
                            <label for="expmonth">Historia:</label>
                            <input type="text" name="historia" placeholder="2-6" id="h_spr" required>
                            <label for="expmonth">Wiedza o społeczeństwie:</label>
                            <input type="text" name="wos" placeholder="2-6" id="w_spr" required>
                            <label for="expmonth">Geografia:</label>
                            <input type="text" name="geografia" placeholder="2-6" id="g_spr" required>
                            <label for="expmonth">Chemia:</label>
                            <input type="text" name="chemia" placeholder="2-6" id="ch_spr" required>
                            <label for="expmonth">Biologia:</label>
                            <input type="text" name="biologia" placeholder="2-6" id="b_spr" required>
                            <label for="expmonth">Matematyka:</label>
                            <input type="text" name="matematyka" placeholder="2-6" id="m_spr" required>
                            <label for="expmonth">Informatyka:</label>
                            <input type="text" name="informatyka" placeholder="2-6" id="i_spr" required>
                            <label for="expmonth">Szczegółowe osiągnięcia:</label>
                            <input type="text" name="state1" placeholder="0-18" id="osiagniecia" required>
                            <label for="expmonth">Świadectwo z wyróżnieniem:</label>
                            <div class="row">
                                <div class="col-50">
                                    <label><input type="radio" id="state" name="state0" value="true">TAK</label>
                                </div>
                                <div class="col-50">
                                    <label><input type="radio" id="state" name="state0" value="false" checked>NIE</label>
                                </div>
                            </div><br />
                            <label for="expmonth">Wolontariat:</label>
                            <div class="row">
                                <div class="col-50">
                                    <label><input type="radio" id="state" name="state2" value="true">TAK</label>
                                </div>
                                <div class="col-50">
                                    <label><input type="radio" id="state" name="state2" value="false" checked>NIE</label>
                                </div>
                            </div><br />
                        </div>
                    </div><br />
                    <input type="submit" class="btn btn-inventory btn-lg text-white btn-block" id="button_checked" value="DODAJ UCZNIA"><br />
                </form>
            </div>
        </div>
    </div>
</body>
</html>
