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
    <script type="text/javascript" src="../js/komunikat.js"></script>
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
    <?php
    include("bdconfig/baza_connect.php");
    $dane = _connect();

    $connect = mysqli_connect($dane[0], $dane[1], $dane[2]);

    if (!$connect) {
        echo "Problem z połączeniem bazy danych";
        header("Location:error_polonczenie.php");
    }

    if (!mysqli_select_db($connect, $dane[3])) {
        echo "Baza danych nie wybrana";
        header("Location:error_brak_bazy.php");
    }
    $Z1 = $_GET['id'];
    $edytowanie = "SELECT * FROM $dane[4] WHERE id=" . $Z1 . "";
    $wiersz = mysqli_query($connect, $edytowanie);
    $connect->close();
    while ($r = mysqli_fetch_assoc($wiersz)) {
        $pesel = $r['pesel'];
        $imie = $r['imie'];
        $drugie_imie = $r['drugie_imie'];
        $nazwisko = $r['nazwisko'];
        $kod_pocztowy = $r['kod_pocztowy'];
        $miejscowosc = $r['miejscowosc'];
        $ulica_numer = $r['ulica_numer'];
        $szkola_podstawowa = $r['szkola_podstawowa'];
        $jezyk_wiodacy = $r['jezyk_wiodacy'];
        $wybor1 = $r['wybor1'];
        $wybor2 = $r['wybor2'];
        $wybor3 = $r['wybor3'];
        $egz_cz_H_punkty = $r['egz_cz_humanistyczna_procent'];
        $egz_cz_M_punkty = $r['egz_cz_matematyczna_procent'];
        $egz_cz_O_punkty = $r['egz_cz_jezyk_obcy_procent'];
        $jezyk_polski = $r['jezyk_polski'];
        $jezyk_obcy = $r['jezyk_obcy'];
        $historia = $r['historia'];
        $wos = $r['wos'];
        $geografia = $r['geografia'];
        $chemia = $r['chemia'];
        $biologia = $r['biologia'];
        $matematyka = $r['matematyka'];
        $informatyka = $r['informatyka'];
        $swiadectwo_z_wyrozn = $r['swiadectwo_z_wyrozn'];
        $osiagniecia = $r['osiagniecia'];
        $wolontariat = $r['wolontariat'];
    }
    ?>
    <div class="main">
        <div class="header">
            <div class="header-col"><span>Kreator edytacji Ucznia</span></div>
        </div>

        <div class="add-container">
            <div class="container">
                <form action="edytuj_uczen.php" method="POST" autocomplete="off">
                    <div class="row">
                        <div class="col-50" id="col-50-id"><br />
                            <h3>Dane Ucznia</h3><br />
                            <label for="fname">ID:</label>
                            <input type="text" name="id_uczen_edycja" value="ID: <?php echo $Z1 ?>" readonly required disabled>
                            <label for="fname">PESEL:</label>
                            <input type="text" name="pesel_text" id="pesel_spr" value="<?php echo $pesel ?>" readonly required>
                            <label for="email">Imię:</label>
                            <input type="text" name="imie_text" id="imie_spr" value="<?php echo $imie ?>" required>
                            <label for="adr">Drugie Imię:</label>
                            <input type="text" name="drugie_imie_text" id="drugie_imie_spr" value="<?php echo $drugie_imie ?>">
                            <label for="city">Nazwisko:</label>
                            <input type="text" name="nazwisko_text" id="nazwisko_spr" value="<?php echo $nazwisko ?>" required>
                            <label for="state">Miejscowość:</label>
                            <input type="text" name="miejscowosc_text" id="miejscowosc_spr" value="<?php echo $miejscowosc ?>" required>
                            <label for="zip">Kod Pocztowy:</label>
                            <input type="text" name="kod_pocztowy_text" id="kod_pocztowy_spr" value="<?php echo $kod_pocztowy ?>" required>
                            <label for="state">Ulica i numer domu:</label>
                            <input type="text" name="ulica_numer_text" id="ulica_spr" value="<?php echo $ulica_numer ?>">
                            <label for=" state">Szkoła podstawowa:</label>
                            <input type="text" name="szkola_podstawowa_text" id="szkola_spr" value="<?php echo $szkola_podstawowa ?>" required>
                            <label for=" state">Język wiodący:</label>
                            <div class="row">
                                <div class="col-50">
                                    <label><input type="radio" id="state" name="jezyk_obcy_text" value="ang" <?php if ($jezyk_wiodacy == 'j.angielski') echo "checked"; ?>>Język Angielski</label>
                                </div>
                                <div class="col-50">
                                    <label><input type="radio" id="state" name="jezyk_obcy_text" value="de" <?php if ($jezyk_wiodacy == 'j.niemiecki') echo "checked"; ?>>Język Niemiecki</label>
                                </div>
                            </div><br />
                            <input type="text" name="" id="" value="<?php echo $jezyk_wiodacy ?>" disabled="disabled">
                            <div class="row">
                                <div class="wybor col-12">
                                    <label for="state">Wybór 1:</label>
                                    <select name="wybor1" id="wybor_1_id">
                                        <option value="default" <?php if ($wybor1 == 'default') echo "selected"; ?>>Proszę wybrać Profil/Klasę</option>
                                        <option value="Profil Akademicki" <?php if ($wybor1 == "Profil Akademicki") echo "selected"; ?>>Profil Akademicki</option>
                                        <option value="Profil Prozdrowotny" <?php if ($wybor1 == "Profil Prozdrowotny") echo "selected"; ?>>Profil Prozdrowotny</option>
                                        <option value="Profil Mundurowy" <?php if ($wybor1 == "Profil Mundurowy") echo "selected"; ?>>Profil Mundurowy</option>
                                        <option value="Profil Sportowy-Turystyczny,Sportowy" <?php if ($wybor1 == "Profil Sportowy-Turystyczny,Sportowy") echo "selected"; ?>>Profil Sportowy-Turystyczny,Sportowy</option>
                                        <option value="Profil Matematyczno-Inżynieryjny" <?php if ($wybor1 == "Profil Matematyczno-Inżynieryjny") echo "selected"; ?>>Profil Matematyczno-Inżynieryjny</option>
                                        <option value="Profil Logistyczny" <?php if ($wybor1 == "Profil Logistyczny") echo "selected"; ?>>Profil Logistyczny</option>
                                        <option value="Profil Informatyczny" <?php if ($wybor1 == "Profil Informatyczny") echo "selected"; ?>>Profil Informatyczny</option>
                                        <option value="Klasa Wielozawodowa" <?php if ($wybor1 == "Profil Wielozawodowa") echo "selected"; ?>>Klasa Wielozawodowa</option>
                                        <option value="Inna" <?php if ($wybor1 == "Inna") echo "selected" ?>>Inna</option>
                                    </select>
                                </div>
                                <div class="wybor col-12">
                                    <label for="state">Wybór 2:</label>
                                    <select name="wybor2" id="wybor_2_id">
                                        <option value="default" <?php if ($wybor2 == 'default') echo "selected"; ?>>Proszę wybrać Profil/Klasę</option>
                                        <option value="Profil Akademicki" <?php if ($wybor2 == "Profil Akademicki") echo "selected"; ?>>Profil Akademicki</option>
                                        <option value="Profil Prozdrowotny" <?php if ($wybor2 == "Profil Prozdrowotny") echo "selected"; ?>>Profil Prozdrowotny</option>
                                        <option value="Profil Mundurowy" <?php if ($wybor2 == "Profil Mundurowy") echo "selected"; ?>>Profil Mundurowy</option>
                                        <option value="Profil Sportowy-Turystyczny,Sportowy" <?php if ($wybor2 == "Profil Sportowy-Turystyczny,Sportowy") echo "selected"; ?>>Profil Sportowy-Turystyczny,Sportowy</option>
                                        <option value="Profil Matematyczno-Inżynieryjny" <?php if ($wybor2 == "Profil Matematyczno-Inżynieryjny") echo "selected"; ?>>Profil Matematyczno-Inżynieryjny</option>
                                        <option value="Profil Logistyczny" <?php if ($wybor2 == "Profil Logistyczny") echo "selected"; ?>>Profil Logistyczny</option>
                                        <option value="Profil Informatyczny" <?php if ($wybor2 == "Profil Informatyczny") echo "selected"; ?>>Profil Informatyczny</option>
                                        <option value="Klasa Wielozawodowa" <?php if ($wybor2 == "Profil Wielozawodowa") echo "selected"; ?>>Klasa Wielozawodowa</option>
                                        <option value="Inna" <?php if ($wybor2 == "Inna") echo "selected" ?>>Inna</option>
                                    </select>
                                </div>
                                <div class="wybor col-12">
                                    <label for="state">Wybór 3:</label>
                                    <select name="wybor3" id="wybor_3_id">
                                        <option value="default" <?php if ($wybor3 == 'default') echo "selected"; ?>>Proszę wybrać Profil/Klasę</option>
                                        <option value="Profil Akademicki" <?php if ($wybor3 == "Profil Akademicki") echo "selected"; ?>>Profil Akademicki</option>
                                        <option value="Profil Prozdrowotny" <?php if ($wybor3 == "Profil Prozdrowotny") echo "selected"; ?>>Profil Prozdrowotny</option>
                                        <option value="Profil Mundurowy" <?php if ($wybor3 == "Profil Mundurowy") echo "selected"; ?>>Profil Mundurowy</option>
                                        <option value="Profil Sportowy-Turystyczny,Sportowy" <?php if ($wybor3 == "Profil Sportowy-Turystyczny,Sportowy") echo "selected"; ?>>Profil Sportowy-Turystyczny,Sportowy</option>
                                        <option value="Profil Matematyczno-Inżynieryjny" <?php if ($wybor3 == "Profil Matematyczno-Inżynieryjny") echo "selected"; ?>>Profil Matematyczno-Inżynieryjny</option>
                                        <option value="Profil Logistyczny" <?php if ($wybor3 == "Profil Logistyczny") echo "selected"; ?>>Profil Logistyczny</option>
                                        <option value="Profil Informatyczny" <?php if ($wybor3 == "Profil Informatyczny") echo "selected"; ?>>Profil Informatyczny</option>
                                        <option value="Klasa Wielozawodowa" <?php if ($wybor3 == "Profil Wielozawodowa") echo "selected"; ?>>Klasa Wielozawodowa</option>
                                        <option value="Inna" <?php if ($wybor3 == "Inna") echo "selected" ?>>Inna</option>
                                    </select>
                                </div>
                            </div>
                            <input type="text" value="Wybór 1: <?php echo $wybor1 ?>" disabled="disabled">
                            <input type="text" value="Wybór 2: <?php echo $wybor2 ?>" disabled="disabled">
                            <input type="text" value="Wybór 3: <?php echo $wybor3 ?>" disabled="disabled">
                            <input type="text" value="Świadectwo z wyróżnieniem: <?php if ($swiadectwo_z_wyrozn == 1)
                                                                                        $swiadectwo_z_wyrozn = "TAK";
                                                                                    else $swiadectwo_z_wyrozn = "NIE";
                                                                                    echo $swiadectwo_z_wyrozn; ?>" disabled="disabled">
                            <input type="text" value="Wolontariat: <?php if ($wolontariat == 1)
                                                                        $wolontariat = "TAK";
                                                                    else $wolontariat = "NIE";
                                                                    echo $wolontariat; ?>" disabled="disabled">
                        </div>
                        <div class="col-50"><br />
                            <h3>Punktacja</h3><br />
                            <label for="cname">Egzamin część Humanistyczna:</label>
                            <input type="text" name="egczhuman" id="eg_cz_H_spr" value="<?php echo $egz_cz_H_punkty ?>" required>
                            <label for="ccnum">Egzamin część Matemtyczna:</label>
                            <input type="text" name="egczmatma" id="eg_cz_M_spr" value="<?php echo $egz_cz_M_punkty ?>" required>
                            <label for="expmonth">Egzamin Język Obcy:</label>
                            <input type="text" name="egczobcy" id="eg_cz_O_spr" value="<?php echo $egz_cz_O_punkty ?>" required>
                            <label for="expmonth">Język Polski:</label>
                            <input type="text" name="polski" id="p_spr" value="<?php echo $jezyk_polski ?>" required>
                            <label for="expmonth">Język Obcy:</label>
                            <input type="text" name="obcy" id="o_spr" value="<?php echo $jezyk_obcy ?>" required>
                            <label for="expmonth">Historia:</label>
                            <input type="text" name="historia" id="h_spr" value="<?php echo $historia ?>" required>
                            <label for="expmonth">Wiedza o społeczeństwie:</label>
                            <input type="text" name="wos" id="w_spr" value="<?php echo $wos ?>" required>
                            <label for="expmonth">Geografia:</label>
                            <input type="text" name="geografia" id="g_spr" value="<?php echo $geografia ?>" required>
                            <label for="expmonth">Chemia:</label>
                            <input type="text" name="chemia" id="ch_spr" value="<?php echo $chemia ?>" required>
                            <label for="expmonth">Biologia:</label>
                            <input type="text" name="biologia" id="b_spr" value="<?php echo $biologia ?>" required>
                            <label for="expmonth">Matematyka:</label>
                            <input type="text" name="matematyka" id="m_spr" value="<?php echo $matematyka ?>" required>
                            <label for="expmonth">Informatyka:</label>
                            <input type="text" name="informatyka" id="i_spr" value="<?php echo $informatyka ?>" required>
                            <label for="expmonth">Szczegółowe osiągnięcia:</label>
                            <input type="text" name="state1" id="osiagniecia" required value="<?php echo $osiagniecia ?>">
                            <label for="expmonth">Świadectwo z wyróżnieniem:</label>
                            <div class="row">
                                <div class="col-50">
                                    <label><input type="radio" id="state" name="state0" value="true" <?php if ($swiadectwo_z_wyrozn == "TAK") echo "checked"; ?>>TAK</label>
                                </div>
                                <div class="col-50">
                                    <label><input type="radio" id="state" name="state0" value="false" <?php if ($swiadectwo_z_wyrozn == "NIE") echo "checked"; ?>>NIE</label>
                                </div>
                            </div><br />
                            <label for="expmonth">Wolontariat:</label>
                            <div class="row">
                                <div class="col-50">
                                    <label><input type="radio" id="state" name="state2" value="true" <?php if ($wolontariat == "TAK") echo "checked"; ?>>TAK</label>
                                </div>
                                <div class="col-50">
                                    <label><input type="radio" id="state" name="state2" value="false" <?php if ($wolontariat == "NIE") echo "checked"; ?>>NIE</label>
                                </div>
                            </div><br />
                        </div>
                    </div><br />
                    <input type="submit" id="edit_btn" class="btn btn-inventory btn-lg text-white btn-block" id="button_checked" value="Potwierdź zmiany"><br />
                </form>
            </div>
        </div>
    </div>
</body>

</html>