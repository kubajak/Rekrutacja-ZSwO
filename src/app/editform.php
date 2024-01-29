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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
        <div class="footer" style="float: left"><span id="span_footer"></span></div>
    </div>
    <!-- HEADER ( GÓRNA (CZARNY PASEK) ) -->
    <div class="main">
        <div class="header">
            <div class="header-col"><span>Edycja ucznia</span></div>
        </div>
        <div class="add-container">
            <div class="container">
                <?php
                require "classes/bdconfig/Dbh.php";

                class EditGetValues extends Dbh{
                    public $id;
                    public $pesel;
                    public $imie;
                    public $drugie_imie;
                    public $nazwisko;
                    public $miejscowosc;
                    public $kod_pocztowy;
                    public $ulica_numer;
                    public $szkola_podstawowa;
                    public $jezyk_wiodacy;
                    public $wybor1;
                    public $wybor2;
                    public $wybor3;
                    public $egczhuman;
                    public $egczmatma;
                    public $egczobcy;
                    public $polski;
                    public $obcy;
                    public $historia;
                    public $wos;
                    public $geografia;
                    public $chemia;
                    public $biologia;
                    public $matematyka;
                    public $informatyka;
                    public $osiagniecia;
                    public $pasek;
                    public $wolontariat;

                    public function EditGetValuesFromDatabase(){
                        
                        $this->id = $_GET['id'];

                        $pdo = $this->connect();
                        $sql = "SELECT * FROM rekrutacja_uczen_tbl WHERE id = ?";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([$this->id]);
                        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
                        foreach($result as $result){
                            $this->pesel = $result['pesel'];
                            $this->imie = $result['imie'];
                            $this->drugie_imie = $result['drugie_imie'];
                            $this->nazwisko = $result['nazwisko'];
                            $this->miejscowosc = $result['miejscowosc'];
                            $this->kod_pocztowy = $result['kod_pocztowy'];
                            $this->ulica_numer = $result['ulica_numer'];
                            $this->szkola_podstawowa = $result['szkola_podstawowa'];
                            $this->jezyk_wiodacy = $result['jezyk_wiodacy'];
                            $this->wybor1 = $result['wybor1'];
                            $this->wybor2 = $result['wybor2'];
                            $this->wybor3 = $result['wybor3'];
                            $this->egczhuman = $result['egz_cz_humanistyczna'];
                            $this->egczmatma = $result['egz_cz_matematyczna'];
                            $this->egczobcy = $result['egz_cz_jezyk_obcy'];
                            $this->polski = $result['jezyk_polski'];
                            $this->obcy = $result['jezyk_obcy'];
                            $this->historia = $result['historia'];
                            $this->wos = $result['wos'];
                            $this->geografia = $result['geografia'];
                            $this->chemia = $result['chemia'];
                            $this->biologia = $result['biologia'];
                            $this->matematyka = $result['matematyka'];
                            $this->informatyka = $result['informatyka'];
                            $this->osiagniecia = $result['osiagniecia'];
                            $this->pasek = $result['swiadectwo_z_wyrozn'];
                            $this->wolontariat = $result['wolontariat'];
                        }
                    }
                }
                $EditGetValues = new EditGetValues();
                $EditGetValues->EditGetValuesFromDatabase();
                ?>
                <form action="classes/Edit.php" method="POST" autocomplete="off">
                    <div class="row">
                        <div class="col-50" id="col-50-id"><br/>
                            <h3>Dane Ucznia</h3><br/>
                            <label for="id">ID:</label>
                            <input type="text" name="id" id="id" placeholder="ID" value="<?php echo $EditGetValues->id;?>" readonly required disabled>
                            <label for="pesel">PESEL:</label>
                            <input type="text" name="pesel" id="pesel" placeholder="12345678910" value="<?php echo $EditGetValues->pesel;?>" required>
                            <label for="imie">Imię:</label>
                            <input type="text" name="imie" id="imie" value="<?php echo $EditGetValues->imie;?>" required>
                            <label for="drugie_imie">Drugie Imię:</label>
                            <input type="text" name="drugie_imie" id="drugie_imie" value="<?php echo $EditGetValues->drugie_imie;?>">
                            <label for="nazwisko">Nazwisko:</label>
                            <input type="text" name="nazwisko" id="nazwisko" value="<?php echo $EditGetValues->nazwisko;?>" required>
                            <label for="miejscowosc">Miejscowość:</label>
                            <input type="text" name="miejscowosc" id="miejscowosc" value="<?php echo $EditGetValues->miejscowosc;?>" required>
                            <label for="kod_pocztowy">Kod Pocztowy:</label>
                            <input type="text" name="kod_pocztowy" id="kod_pocztowy" placeholder="12-345" value="<?php echo $EditGetValues->kod_pocztowy;?>" required>
                            <label for="ulica_numer">Ulica i numer domu:</label>
                            <input type="text" name="ulica_numer" id="ulica_numer" value="<?php echo $EditGetValues->ulica_numer;?>" required>
                            <label for="szkola_podstawowa">Szkoła podstawowa:</label>
                            <input type="text" name="szkola_podstawowa" id="szkola_podstawowa" value="<?php echo $EditGetValues->szkola_podstawowa;?>" required>
                            <label for="state">Język wiodący:</label>
                            <div class="row">
                                <div class="col-50">
                                    <label for="jezyk_ang"></label>
                                    <input type="radio" name="jezyk_obcy" id="jezyk_ang" value="Angielski" <?php if ($EditGetValues->jezyk_wiodacy == "Angielski") echo "checked";?>>Język Angielski
                                </div>
                                <div class="col-50">
                                    <label for="jezyk_niem"></label>
                                    <input type="radio" name="jezyk_obcy" id="jezyk_niem" value="Niemiecki" <?php if ($EditGetValues->jezyk_wiodacy == "Niemiecki") echo "checked";?>>Język Niemiecki
                                </div>
                            </div><br/>
                            <input type="text" name="" id="" value="<?php echo $EditGetValues->jezyk_wiodacy;?>" disabled>
                            <div class="row">
                                <div class="wybor col-12">
                                    <label for="wybor1">Wybór 1:</label>
                                    <select name="wybor1" id="wybor1">
                                        <option value="default" <?php if ($EditGetValues->wybor1 == "default") echo "selected";?>>Proszę wybrać Profil/Klasę</option>
                                        <option value="Profil Akademicki" <?php if ($EditGetValues->wybor1 == "Profil Akademicki") echo "selected";?>>Profil Akademicki</option>
                                        <option value="Profil Prozdrowotny" <?php if ($EditGetValues->wybor1 == "Profil Prozdrowotny") echo "selected";?>>Profil Prozdrowotny</option>
                                        <option value="Profil Mundurowy" <?php if ($EditGetValues->wybor1 == "Profil Mundurowy") echo "selected";?>>Profil Mundurowy</option>
                                        <option value="Profil Sportowy-Turystyczny,Sportowy" <?php if ($EditGetValues->wybor1 == "Profil Sportowy-Turystyczny,Sportowy") echo "selected";?>>Profil Sportowy-Turystyczny,Sportowy</option>
                                        <option value="Profil Matematyczno-Inżynieryjny" <?php if ($EditGetValues->wybor1 == "Profil Matematyczno-Inżynieryjny") echo "selected";?>>Profil Matematyczno-InŻynieryjny</option>?>>Profil Matematyczno-Inżynieryjny</option>
                                        <option value="Profil Logistyczny" <?php if ($EditGetValues->wybor1 == "Profil Logistyczny") echo "selected";?>>Profil Logistyczny</option>
                                        <option value="Profil Informatyczny" <?php if ($EditGetValues->wybor1 == "Profil Informatyczny") echo "selected";?>>Profil Informatyczny</option>
                                        <option value="Klasa Wielozawodowa" <?php if ($EditGetValues->wybor1 == "Klasa Wielozawodowa") echo "selected";?>>Klasa Wielozawodowa</option>
                                        <option value="Inna" <?php if ($EditGetValues->wybor1 == "Inna") echo "selected";?>>Inna</option>
                                    </select>
                                </div>
                                <div class="wybor col-12">
                                    <label for="wybor2">Wybór 2:</label>
                                    <select name="wybor2" id="wybor2">
                                        <option value="default" <?php if ($EditGetValues->wybor2 == "default") echo "selected";?>>Proszę wybrać Profil/Klasę</option>
                                        <option value="Profil Akademicki" <?php if ($EditGetValues->wybor2 == "Profil Akademicki") echo "selected";?>>Profil Akademicki</option>
                                        <option value="Profil Prozdrowotny" <?php if ($EditGetValues->wybor2 == "Profil Prozdrowotny") echo "selected";?>>Profil Prozdrowotny</option>
                                        <option value="Profil Mundurowy" <?php if ($EditGetValues->wybor2 == "Profil Mundurowy") echo "selected";?>>Profil Mundurowy</option>
                                        <option value="Profil Sportowy-Turystyczny,Sportowy" <?php if ($EditGetValues->wybor2 == "Profil Sportowy-Turystyczny,Sportowy") echo "selected";?>>Profil Sportowy-Turystyczny,Sportowy</option>
                                        <option value="Profil Matematyczno-Inżynieryjny" <?php if ($EditGetValues->wybor2 == "Profil Matematyczno-Inżynieryjny") echo "selected";?>>Profil Matematyczno-Inżynieryjny</option>
                                        <option value="Profil Logistyczny" <?php if ($EditGetValues->wybor2 == "Profil Logistyczny") echo "selected";?>>Profil Logistyczny</option>
                                        <option value="Profil Informatyczny" <?php if ($EditGetValues->wybor2 == "Profil Informatyczny") echo "selected";?>>Profil Informatyczny</option>
                                        <option value="Klasa Wielozawodowa" <?php if ($EditGetValues->wybor2 == "Klasa Wielozawodowa") echo "selected";?>>Klasa Wielozawodowa</option>
                                        <option value="Inna" <?php if ($EditGetValues->wybor2 == "Inna") echo "selected";?>>Inna</option>
                                    </select>
                                </div>
                                <div class="wybor col-12">
                                    <label for="wybor3">Wybór 3:</label>
                                    <select name="wybor3" id="wybor3">
                                        <option value="default" <?php if ($EditGetValues->wybor3 == "default") echo "selected";?>>Proszę wybrać Profil/Klasę</option>
                                        <option value="Profil Akademicki" <?php if ($EditGetValues->wybor3 == "Profil Akademicki") echo "selected";?>>Profil Akademicki</option>
                                        <option value="Profil Prozdrowotny" <?php if ($EditGetValues->wybor3 == "Profil Prozdrowotny") echo "selected";?>>Profil Prozdrowotny</option>
                                        <option value="Profil Mundurowy" <?php if ($EditGetValues->wybor3 == "Profil Mundurowy") echo "selected";?>>Profil Mundurowy</option>
                                        <option value="Profil Sportowy-Turystyczny,Sportowy" <?php if ($EditGetValues->wybor3 == "Profil Sportowy-Turystyczny,Sportowy") echo "selected";?>>Profil Sportowy-Turystyczny,Sportowy</option>
                                        <option value="Profil Matematyczno-Inżynieryjny" <?php if ($EditGetValues->wybor3 == "Profil Matematyczno-Inżynieryjny") echo "selected";?>>Profil Matematyczno-Inżynieryjny</option>
                                        <option value="Profil Logistyczny" <?php if ($EditGetValues->wybor3 == "Profil Logistyczny") echo "selected";?>>Profil Logistyczny</option>
                                        <option value="Profil Informatyczny" <?php if ($EditGetValues->wybor3 == "Profil Informatyczny") echo "selected";?>>Profil Informatyczny</option>
                                        <option value="Klasa Wielozawodowa" <?php if ($EditGetValues->wybor3 == "Klasa Wielozawodowa") echo "selected";?>>Klasa Wielozawodowa</option>
                                        <option value="Inna" <?php if ($EditGetValues->wybor3 == "Inna") echo "selected";?>>Inna</option>
                                    </select>
                                </div>
                            </div>
                            <input type="text" value="Wybór 1: <?php echo $EditGetValues->wybor1;?>" disabled>
                            <input type="text" value="Wybór 2: <?php echo $EditGetValues->wybor2;?>" disabled>
                            <input type="text" value="Wybór 3: <?php echo $EditGetValues->wybor3;?>" disabled>
                            <input type="text" value="Świadectwo z wyróżnieniem: <?php if($EditGetValues->pasek == true) echo "Tak"; else echo "Nie";?>" disabled>
                            <input type="text" value="Wolontariat: <?php if($EditGetValues->wolontariat == true) echo "Tak"; else echo "Nie";?>" disabled>
                        </div>
                        <div class="col-50"><br/>
                            <h3>Punktacja</h3><br/>
                            <label for="egczhuman">Egzamin część Humanistyczna:</label>
                            <input type="text" name="egczhuman" id="egczhuman" placeholder="0-100" value="<?php echo $EditGetValues->egczhuman;?>">
                            <label for="egczmatma">Egzamin część Matemtyczna:</label>
                            <input type="text" name="egczmatma" id="egczmatma" placeholder="0-100" value="<?php echo $EditGetValues->egczmatma;?>">
                            <label for="egczobcy">Egzamin Język Obcy:</label>
                            <input type="text" name="egczobcy" id="egczobcy" placeholder="0-100" value="<?php echo $EditGetValues->egczobcy;?>">
                            <label for="polski">Język Polski:</label>
                            <input type="text" name="polski" id="polski" placeholder="2-6" value="<?php echo $EditGetValues->polski;?>">
                            <label for="obcy">Język Obcy:</label>
                            <input type="text" name="obcy" id="obcy" placeholder="2-6" value="<?php echo $EditGetValues->obcy;?>">
                            <label for="historia">Historia:</label>
                            <input type="text" name="historia" id="historia" placeholder="2-6" value="<?php echo $EditGetValues->historia;?>">
                            <label for="wos">Wiedza o społeczeństwie:</label>
                            <input type="text" name="wos" id="wos" placeholder="2-6" value="<?php echo $EditGetValues->wos;?>">
                            <label for="geografia">Geografia:</label>
                            <input type="text" name="geografia" id="geografia" placeholder="2-6" value="<?php echo $EditGetValues->geografia;?>">
                            <label for="chemia">Chemia:</label>
                            <input type="text" name="chemia" id="chemia" placeholder="2-6" value="<?php echo $EditGetValues->chemia;?>">
                            <label for="biologia">Biologia:</label>
                            <input type="text" name="biologia" id="biologia" placeholder="2-6" value="<?php echo $EditGetValues->biologia;?>">
                            <label for="matematyka">Matematyka:</label>
                            <input type="text" name="matematyka" id="matematyka" placeholder="2-6" value="<?php echo $EditGetValues->matematyka;?>">
                            <label for="informatyka">Informatyka:</label>
                            <input type="text" name="informatyka" id="informatyka" placeholder="2-6" value="<?php echo $EditGetValues->informatyka;?>">
                            <label for="osiagniecia">Szczegółowe osiągnięcia:</label>
                            <input type="text" name="osiagniecia" id="osiagniecia" placeholder="0-18" value="<?php echo $EditGetValues->osiagniecia;?>">
                            <label for="state1">Świadectwo z wyróżnieniem:</label>
                            <div class="row">
                                <div class="col-50">
                                    <label><input type="radio" name="state1" value="true" <?php if($EditGetValues->pasek == true) echo "checked";?>>TAK</label>
                                </div>
                                <div class="col-50">
                                    <label><input type="radio" name="state1" value="false" <?php if($EditGetValues->pasek == false) echo "checked";?>>NIE</label>
                                </div>
                            </div><br/>
                            <label for="state2">Wolontariat:</label>
                            <div class="row">
                                <div class="col-50">
                                    <label><input type="radio" name="state2" value="true" <?php if($EditGetValues->wolontariat == true) echo "checked";?>>TAK</label>
                                </div>
                                <div class="col-50">
                                    <label><input type="radio" name="state2" value="false" <?php if($EditGetValues->wolontariat == false) echo "checked";?>>NIE</label>
                                </div>
                            </div><br/>
                        </div>
                    </div><br/>
                    <input type="submit" class="btn btn-inventory btn-lg text-white btn-block" value="DODAJ UCZNIA"><br/>
                </form>
            </div>
        </div>
    </div>
</body>
</html>