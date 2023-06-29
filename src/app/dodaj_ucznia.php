<?php
require "../bdconfig/baza_connect_new.php";
class Uczen extends Dbh{
    public function uczen(){
        //Wartości pozyskiwane z pól znajdujących się pod adresem add.php
        $pesel = $_POST["pesel_text"]; // Pole pesel
        $imie = $_POST["imie_text"]; // Pole Imie
        $drugie_imie = $_POST["drugie_imie_text"]; // Pole Drugie Imie
        $nazwisko = $_POST["nazwisko_text"]; // Pole Nazwisko
        $kod_pocztowy = $_POST["kod_pocztowy_text"]; // Pole Kod Pocztowy
        $miejscowosc = $_POST["miejscowosc_text"]; // Pole Miejscowość
        $ulica_numer = $_POST["ulica_numer_text"]; // Pole Ulicy/Numeru
        $szkola_podstawowa = $_POST["szkola_podstawowa_text"]; //Pole Szkoły Podstawowej
        $jezyk_obcy_wybor = $_POST["jezyk_obcy_text"]; // Pole Wyboru Języka Obcego
        $wybor1 = $_POST['wybor1']; // Pole Datalist Wybór 1
        $wybor2 = $_POST['wybor2']; // Pole Datalist Wybór 2
        $wybor3 = $_POST['wybor3']; // Pole Datalist Wybór 3
        $Egczhuman = $_POST['egczhuman']; // Pole % Części Humanistycznej
        $Egczmatma = $_POST['egczmatma']; // Pole % Części Matematycznej
        $Egczobcy = $_POST['egczobcy']; // Pole % Części z Języka Obcego
        $polski_ = $_POST['polski']; // Pole z oceną z polskiego
        $obcy_ = $_POST['obcy']; // Pole z oceną z j.obcego
        $historia_ = $_POST['historia']; // Pole z oceną z Historii
        $wos_ = $_POST['wos']; // Pole z oceną z Wosu
        $geografia_ = $_POST['geografia']; // Pole z oceną z Geografii
        $chemia_ = $_POST['chemia']; // Pole z oceną z Chemii
        $biologia_ = $_POST['biologia']; // Pole z oceną z Biologii
        $matematyka_ = $_POST['matematyka']; // Pole z oceną z Matematykii
        $informatyka_ = $_POST['informatyka']; // Pole z oceną z Informatykii
        $pasek = $_POST['state0']; // Pole Radio za Pasek
        $osiagniecia = $_POST['state1']; // Pole z punktacją za Osiągnięcia
        $wolontariat = $_POST['state2']; // Pole Radio za Wolontariat

        if($jezyk_obcy_wybor == "eng"){
            $jezyk_obcy_wybor_text = "Język Angielski"; // Pole Radio Angielskiego
        }else{
            $jezyk_obcy_wybor_text = "Język Niemiecki"; // Pole Radio Niemieckiego
        }

            //Pasek (Do Punktacji)
        if($pasek == "true"){
            $pasek = 1;
            $pasekpunkty = 7;
        }else{
            $pasek = 0;
            $pasekpunkty = 0;
        }
    
        // Wolontariat (Do Punktacji)
        if($wolontariat == "true"){
            $wolontariat = 1;
            $wolontariatpunkty = 3;
        }else{
            $wolontariat = 0;
            $wolontariatpunkty = 0;
        }
    
        if (($Egczhuman == '') || ($Egczhuman == null)) $Egczhuman = 0;   // Jeśli pole Egczhuman będzie puste bądź zerem ustaw wartosc zmiennej $Egczhuman na 0
        if (($Egczmatma == '') || ($Egczmatma == null)) $Egczmatma = 0; // Jeśli pole Egczmatma będzie puste bądź zerem ustaw wartosc zmiennej $Egczmatma na 0
        if (($Egczobcy == '')  || ($Egczobcy == null)) $Egczobcy = 0;    // Jeśli pole Egczobcy będzie puste bądź zerem ustaw wartosc zmiennej $Egczobcy na 0
        $Egczhuman_punkty = $Egczhuman * 0.35; // Obliczanie wartości punktowej dla zmiennej $Egczguman_punkty = $Egczhuman * 0.35
        $Egczmatma_punkty = $Egczmatma * 0.35; // Obliczanie wartości punktowej dla zmiennej $Egczmatma_punkty = $Egczmatma * 0.35
        $Egczobcy_punkty = $Egczobcy * 0.30;   // Obliczanie wartości punktowej dla zmiennej $Egczobcy_punkty = $Egczobcy * 0.30
        $polski_punkty = oceny_punkty_zamiana($polski_);
        $obcy_punkty = oceny_punkty_zamiana($obcy_);
        $historia_punkty = oceny_punkty_zamiana($historia_);
        $wos_punkty = oceny_punkty_zamiana($wos_);
        $geografia_punkty = oceny_punkty_zamiana($geografia_);
        $chemia_punkty = oceny_punkty_zamiana($chemia_);
        $biologia_punkty = oceny_punkty_zamiana($biologia_);
        $matematyka_punkty = oceny_punkty_zamiana($matematyka_);
        $informatyka_punkty = oceny_punkty_zamiana($informatyka_);
        $osiagniecia_punkty = $osiagniecia;
    
        $akademicki = 0;
        $prozdrowotny = 0;
        $mundurowy = 0;
        $spor_tury_sport = 0;
        $mat_inzy = 0;
        $logistyczny = 0;
        $informatyczny = 0;
        $wielobranzowy = 0;
    
        if ($wybor1 == "Profil Akademicki")
            $akademicki =
                $polski_punkty + $matematyka_punkty + $historia_punkty +
                $biologia_punkty + $osiagniecia_punkty + $pasekpunkty +
                $wolontariatpunkty + $Egczhuman_punkty + $Egczmatma_punkty +
                $Egczobcy_punkty;
        else if($wybor1 == "Profil Prozdrowotny")
            $prozdrowotny =
                $polski_punkty + $matematyka_punkty + $chemia_punkty +
                $biologia_punkty + $osiagniecia_punkty + $pasekpunkty +
                $wolontariatpunkty + $Egczhuman_punkty + $Egczmatma_punkty +
                $Egczobcy_punkty;
        else if ($wybor1 == "Profil Mundurowy")
            $mundurowy =
                $polski_punkty + $matematyka_punkty + $geografia_punkty +
                $wos_punkty + $osiagniecia_punkty + $pasekpunkty +
                $wolontariatpunkty + $Egczhuman_punkty + $Egczmatma_punkty +
                $Egczobcy_punkty;
        else if ($wybor1 == "Profil Sportowy-Turystyczny,Sportowy")
            $spor_tury_sport =
                $polski_punkty + $matematyka_punkty + $geografia_punkty +
                $biologia_punkty + $osiagniecia_punkty + $pasekpunkty +
                $wolontariatpunkty + $Egczhuman_punkty + $Egczmatma_punkty +
                $Egczobcy_punkty;
        else if ($wybor1 == "Profil Matematyczno-Inżynieryjny")
            $mat_inzy =
                $polski_punkty + $matematyka_punkty + $geografia_punkty +
                $obcy_punkty + $osiagniecia_punkty + $pasekpunkty +
                $wolontariatpunkty + $Egczhuman_punkty + $Egczmatma_punkty +
                $Egczobcy_punkty;
        else if ($wybor1 == "Profil Logistyczny")
            $logistyczny =
                $polski_punkty + $matematyka_punkty + $geografia_punkty +
                $obcy_punkty + $osiagniecia_punkty + $pasekpunkty +
                $wolontariatpunkty + $Egczhuman_punkty + $Egczmatma_punkty +
                $Egczobcy_punkty;
        else if ($wybor1 == "Profil Informatyczny")
            $informatyczny =
                $polski_punkty + $matematyka_punkty + $informatyka_punkty +
                $obcy_punkty + $osiagniecia_punkty + $pasekpunkty +
                $wolontariatpunkty + $Egczhuman_punkty + $Egczmatma_punkty +
                $Egczobcy_punkty;
        else if ($wybor1 == "Klasa Wielozawodowa")
            $wielobranzowy =
                $polski_punkty + $matematyka_punkty + $geografia_punkty +
                $wos_punkty + $osiagniecia_punkty + $pasekpunkty +
                $wolontariatpunkty + $Egczhuman_punkty + $Egczmatma_punkty +
                $Egczobcy_punkty;
    
        if ($wybor2 == "Profil Akademicki")
            $akademicki =
                $polski_punkty + $matematyka_punkty + $historia_punkty +
                $biologia_punkty + $osiagniecia_punkty + $pasekpunkty +
                $wolontariatpunkty + $Egczhuman_punkty + $Egczmatma_punkty +
                $Egczobcy_punkty;
        else if ($wybor2 == "Profil Prozdrowotny")
            $prozdrowotny =
                $polski_punkty + $matematyka_punkty + $chemia_punkty +
                $biologia_punkty + $osiagniecia_punkty + $pasekpunkty +
                $wolontariatpunkty + $Egczhuman_punkty + $Egczmatma_punkty +
                $Egczobcy_punkty;
        else if ($wybor2 == "Profil Mundurowy")
            $mundurowy =
                $polski_punkty + $matematyka_punkty + $geografia_punkty +
                $wos_punkty + $osiagniecia_punkty + $pasekpunkty +
                $wolontariatpunkty + $Egczhuman_punkty + $Egczmatma_punkty +
                $Egczobcy_punkty;
        else if ($wybor2 == "Profil Sportowy-Turystyczny,Sportowy")
            $spor_tury_sport =
                $polski_punkty + $matematyka_punkty + $geografia_punkty +
                $biologia_punkty + $osiagniecia_punkty + $pasekpunkty +
                $wolontariatpunkty + $Egczhuman_punkty + $Egczmatma_punkty +
                $Egczobcy_punkty;
        else if ($wybor2 == "Profil Matematyczno-Inżynieryjny")
            $mat_inzy =
                $polski_punkty + $matematyka_punkty + $geografia_punkty +
                $obcy_punkty + $osiagniecia_punkty + $pasekpunkty +
                $wolontariatpunkty + $Egczhuman_punkty + $Egczmatma_punkty +
                $Egczobcy_punkty;
        else if ($wybor2 == "Profil Logistyczny")
            $logistyczny =
                $polski_punkty + $matematyka_punkty + $geografia_punkty +
                $obcy_punkty + $osiagniecia_punkty + $pasekpunkty +
                $wolontariatpunkty + $Egczhuman_punkty + $Egczmatma_punkty +
                $Egczobcy_punkty;
        else if ($wybor2 == "Profil Informatyczny")
            $informatyczny =
                $polski_punkty + $matematyka_punkty + $informatyka_punkty +
                $obcy_punkty + $osiagniecia_punkty + $pasekpunkty +
                $wolontariatpunkty + $Egczhuman_punkty + $Egczmatma_punkty +
                $Egczobcy_punkty;
        else if ($wybor2 == "Klasa Wielozawodowa")
            $wielobranzowy =
                $polski_punkty + $matematyka_punkty + $geografia_punkty +
                $wos_punkty + $osiagniecia_punkty + $pasekpunkty +
                $wolontariatpunkty + $Egczhuman_punkty + $Egczmatma_punkty +
                $Egczobcy_punkty;
    
        if ($wybor3 == "Profil Akademicki")
            $akademicki =
                $polski_punkty + $matematyka_punkty + $historia_punkty +
                $biologia_punkty + $osiagniecia_punkty + $pasekpunkty +
                $wolontariatpunkty + $Egczhuman_punkty + $Egczmatma_punkty +
                $Egczobcy_punkty;
        else if ($wybor3 == "Profil Prozdrowotny")
            $prozdrowotny =
                $polski_punkty + $matematyka_punkty + $chemia_punkty +
                $biologia_punkty + $osiagniecia_punkty + $pasekpunkty +
                $wolontariatpunkty + $Egczhuman_punkty + $Egczmatma_punkty +
                $Egczobcy_punkty;
        else if ($wybor3 == "Profil Mundurowy")
            $mundurowy =
                $polski_punkty + $matematyka_punkty + $geografia_punkty +
                $wos_punkty + $osiagniecia_punkty + $pasekpunkty +
                $wolontariatpunkty + $Egczhuman_punkty + $Egczmatma_punkty +
                $Egczobcy_punkty;
        else if ($wybor3 == "Profil Sportowy-Turystyczny,Sportowy")
            $spor_tury_sport =
                $polski_punkty + $matematyka_punkty + $geografia_punkty +
                $biologia_punkty + $osiagniecia_punkty + $pasekpunkty +
                $wolontariatpunkty + $Egczhuman_punkty + $Egczmatma_punkty +
                $Egczobcy_punkty;
        else if ($wybor3 == "Profil Matematyczno-Inżynieryjny")
            $mat_inzy =
                $polski_punkty + $matematyka_punkty + $geografia_punkty +
                $obcy_punkty + $osiagniecia_punkty + $pasekpunkty +
                $wolontariatpunkty + $Egczhuman_punkty + $Egczmatma_punkty +
                $Egczobcy_punkty;
        else if ($wybor3 == "Profil Logistyczny")
            $logistyczny =
                $polski_punkty + $matematyka_punkty + $geografia_punkty +
                $obcy_punkty + $osiagniecia_punkty + $pasekpunkty +
                $wolontariatpunkty + $Egczhuman_punkty + $Egczmatma_punkty +
                $Egczobcy_punkty;
        else if ($wybor3 == "Profil Informatyczny")
            $informatyczny =
                $polski_punkty + $matematyka_punkty + $informatyka_punkty +
                $obcy_punkty + $osiagniecia_punkty + $pasekpunkty +
                $wolontariatpunkty + $Egczhuman_punkty + $Egczmatma_punkty +
                $Egczobcy_punkty;
        else if ($wybor3 == "Klasa Wielozawodowa")
        $wielobranzowy =
            $polski_punkty + $matematyka_punkty + $geografia_punkty +
            $wos_punkty + $osiagniecia_punkty + $pasekpunkty +
            $wolontariatpunkty + $Egczhuman_punkty + $Egczmatma_punkty +
            $Egczobcy_punkty;

        if($wybor1=="default")
            $wybor1 = "Inna";
        if($wybor2=="default")
            $wybor2 = "Inna";
        if($wybor3=="default")
            $wybor3 = "Inna";

        header("Location:add.php");
    }
}

function oceny_punkty_zamiana($ocena_){
    switch($ocena_)
    {
        case 2:
            return 2;
        case 3:
            return 8;
        case 4:
            return 14;
        case 5:
            return 17;
        case 6:
            return 18;
        default:
            return 0;
    }
}
?>
