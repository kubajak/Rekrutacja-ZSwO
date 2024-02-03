<?php require "../../vendor/autoloader/autoloader.php"; ?>
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="../js/pesel.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body onload="stopka()">
    <!-- SIDENAV( BOCZNE MENU ) -->
    <div class="sidenav">
        <div id="sidenav-wrapp">
            <div class="sidenav-title">
                <h3>System rekrutacyjny</h3>
                <hr/>
            </div>
        </div><br><br><br>
        <nav>
            <li class="btn-background"><a href="public/index.php"><img src="../../img/icon/nav_icon/home-solid.svg">Home</a></li>
            <li class="btn-background"><a href="addform.php"><img src="../../img/icon/nav_icon/user-plus-solid.svg">Dodaj Ucznia</a></li>
            <li class="btn-background"><a href="list.php"><img src="../../img/icon/nav_icon/list-alt-solid.svg">Lista Uczniów</a></li>
            <li class="btn-background"><a href="listclasses.php"><img src="../../img/icon/nav_icon/book-solid.svg">Wyświetl klasy</a></li>
            <li class="btn-background"><a href="../../index.html"><img src="../../img/icon/nav_icon/sign-out-alt-solid.svg">WYJDŹ</a></li>
        </nav>
        <hr class="footer-line" />
        <div class="footer" style="float: left"><span id="span_footer">© J.K.K.J - <?php echo Time::currentYear() ?></span></div>
    </div>
    <!-- HEADER ( GÓRNA (CZARNY PASEK) ) -->
    <div class="main">
        <?php
        $formHandler = new FormHandler();
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $form_data = array(
                    'pesel'             => htmlspecialchars($_POST['pesel']),
                    'imie'              => htmlspecialchars($_POST['imie']),
                    'drugie_imie'       => htmlspecialchars($_POST['drugie_imie']),
                    'nazwisko'          => htmlspecialchars($_POST['nazwisko']),
                    'miejscowosc'       => htmlspecialchars($_POST['miejscowosc']),
                    'kod_pocztowy'      => htmlspecialchars($_POST['kod_pocztowy']),
                    'ulica_numer'       => htmlspecialchars($_POST['ulica_numer']),
                    'szkola_podstawowa' => htmlspecialchars($_POST['szkola_podstawowa']),
                    'jezyk_obcy'        => htmlspecialchars($_POST['jezyk_obcy']),
                    'wybor1'            => htmlspecialchars($_POST['wybor1']),
                    'wybor2'            => htmlspecialchars($_POST['wybor2']),
                    'wybor3'            => htmlspecialchars($_POST['wybor3']),
                    'egczhuman'         => htmlspecialchars($_POST['egczhuman']),
                    'egczmatma'         => htmlspecialchars($_POST['egczmatma']),
                    'egczobcy'          => htmlspecialchars($_POST['egczobcy']),
                    'polski'            => htmlspecialchars($_POST['polski']),
                    'obcy'              => htmlspecialchars($_POST['obcy']),
                    'historia'          => htmlspecialchars($_POST['historia']),
                    'wos'               => htmlspecialchars($_POST['wos']),
                    'geografia'         => htmlspecialchars($_POST['geografia']),
                    'chemia'            => htmlspecialchars($_POST['chemia']),
                    'biologia'          => htmlspecialchars($_POST['biologia']),
                    'matematyka'        => htmlspecialchars($_POST['matematyka']),
                    'informatyka'       => htmlspecialchars($_POST['informatyka']),
                    'osiagniecia'       => htmlspecialchars($_POST['osiagniecia']),
                    'state1'            => htmlspecialchars($_POST['state1']),
                    'state2'            => htmlspecialchars($_POST['state2'])
                );
                try{
                    $formHandler->add($form_data);
                }catch(Throwable $e){
                    echo $e->getMessage();
                }
            }
        ?>
        <div class="header">
            <div class="header-col"><span>Kreator dodawania Ucznia</span></div>
        </div>
        <div class="add-container">
            <div class="container">
                <form action="#" method="post" autocomplete="off">
                    <div class="row">
                        <div class="col-50" id="col-50-id"><br />
                            <h3>Dane Ucznia</h3><br />
                            <label for="pesel">PESEL:</label>
                            <input type="text" name="pesel" id="pesel" placeholder="12345678910" required>
                            <label for="imie">Imię:</label>
                            <input type="text" name="imie" id="imie" required>
                            <label for="drugie_imie">Drugie Imię:</label>
                            <input type="text" name="drugie_imie" id="drugie_imie">
                            <label for="nazwisko">Nazwisko:</label>
                            <input type="text" name="nazwisko" id="nazwisko" required>
                            <label for="miejscowosc">Miejscowość:</label>
                            <input type="text" name="miejscowosc" id="miejscowosc" required>
                            <label for="kod_pocztowy">Kod Pocztowy:</label>
                            <input type="text" name="kod_pocztowy" id="kod_pocztowy" placeholder="12-345" required>
                            <label for="ulica_numer">Ulica i numer domu:</label>
                            <input type="text" name="ulica_numer" id="ulica_numer">
                            <label for="szkola_podstawowa">Szkoła podstawowa:</label>
                            <input type="text" name="szkola_podstawowa" id="szkola_podstawowa" required>
                            <label for="state">Język wiodący:</label>
                            <div class="row">
                                <div class="col-50">
                                    <label for="jezyk_ang"></label>
                                    <input type="radio" name="jezyk_obcy" id="jezyk_ang" value="Angielski" checked>Język Angielski
                                </div>
                                <div class="col-50">
                                    <label for="jezyk_niem"></label>
                                    <input type="radio" name="jezyk_obcy" id="jezyk_niem" value="Niemiecki">Język Niemiecki
                                </div>
                            </div><br/>
                            <div class="row">
                                <div class="wybor col-12">
                                    <label for="wybor1">Wybór 1:</label>
                                    <select name="wybor1" id="wybor1">
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
                                    <label for="wybor2">Wybór 2:</label>
                                    <select name="wybor2" id="wybor2">
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
                                    <label for="wybor3">Wybór 3:</label>
                                    <select name="wybor3" id="wybor3">
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
                        <div class="col-50"><br/>
                            <h3>Punktacja</h3><br/>
                            <label for="egczhuman">Egzamin część Humanistyczna:</label>
                            <input type="text" name="egczhuman" id="egczhuman" placeholder="0-100" required>
                            <label for="egczmatma">Egzamin część Matemtyczna:</label>
                            <input type="text" name="egczmatma" id="egczmatma" placeholder="0-100" required>
                            <label for="egczobcy">Egzamin Język Obcy:</label>
                            <input type="text" name="egczobcy" id="egczobcy" placeholder="0-100" required>
                            <label for="polski">Język Polski:</label>
                            <input type="text" name="polski" id="polski" placeholder="2-6" required>
                            <label for="obcy">Język Obcy:</label>
                            <input type="text" name="obcy" id="obcy" placeholder="2-6" required>
                            <label for="historia">Historia:</label>
                            <input type="text" name="historia" id="historia" placeholder="2-6" required>
                            <label for="wos">Wiedza o społeczeństwie:</label>
                            <input type="text" name="wos" id="wos" placeholder="2-6" required>
                            <label for="geografia">Geografia:</label>
                            <input type="text" name="geografia" id="geografia" placeholder="2-6" required>
                            <label for="chemia">Chemia:</label>
                            <input type="text" name="chemia" id="chemia" placeholder="2-6" required>
                            <label for="biologia">Biologia:</label>
                            <input type="text" name="biologia" id="biologia" placeholder="2-6" required>
                            <label for="matematyka">Matematyka:</label>
                            <input type="text" name="matematyka" id="matematyka" placeholder="2-6" required>
                            <label for="informatyka">Informatyka:</label>
                            <input type="text" name="informatyka" id="informatyka" placeholder="2-6" required>
                            <label for="osiagniecia">Szczegółowe osiągnięcia:</label>
                            <input type="text" name="osiagniecia" id="osiagniecia" placeholder="0-18" required>
                            <label for="state1">Świadectwo z wyróżnieniem:</label>
                            <div class="row">
                                <div class="col-50">
                                    <label><input type="radio" name="state1" value="true">TAK</label>
                                </div>
                                <div class="col-50">
                                    <label><input type="radio" name="state1" value="false" checked>NIE</label>
                                </div>
                            </div><br/>
                            <label for="state2">Wolontariat:</label>
                            <div class="row">
                                <div class="col-50">
                                    <label><input type="radio" name="state2" value="true">TAK</label>
                                </div>
                                <div class="col-50">
                                    <label><input type="radio" name="state2" value="false" checked>NIE</label>
                                </div>
                            </div><br/>
                        </div>
                    </div><br/>
                    <input type="submit" class="btn btn-inventory btn-lg text-white btn-block" id="button_checked" value="DODAJ UCZNIA"><br />
                </form>
            </div>
        </div>
    </div>
</body>
</html>