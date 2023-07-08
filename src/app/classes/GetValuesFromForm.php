<?php
class GetValuesFromForm{
    protected function GetValues(){
        $pesel = $_POST['pesel'];
        $imie = $_POST['imie'];
        $drugie_imie = $_POST['drugie_imie'];
        $nazwisko = $_POST['nazwisko'];
        $miejscowosc = $_POST['miejscowosc'];
        $kod_pocztowy = $_POST['kod_pocztowy'];
        $ulica_numer = $_POST['ulica_numer'];
        $szkola_podstawowa = $_POST['szkola_podstawowa'];
        $jezyk_obcy = $_POST['jezyk_obcy'];
        $wybor1 = $_POST['wybor1'];
        $wybor2 = $_POST['wybor2'];
        $wybor3 = $_POST['wybor3'];
        $egczhuman = $_POST['egczhuman'];
        $egczmatma = $_POST['egczmatma'];
        $egczobcy = $_POST['egczobcy'];
        $polski = $_POST['polski'];
        $obcy = $_POST['obcy'];
        $historia = $_POST['historia'];
        $wos = $_POST['wos'];
        $geografia = $_POST['geografia'];
        $chemia = $_POST['chemia'];
        $biologia = $_POST['biologia'];
        $matematyka = $_POST['matematyka'];
        $informatyka = $_POST['informatyka'];
        $osiagniecia = $_POST['osiagniecia'];
        $pasek = $_POST['state1'];
        $wolontariat = $_POST['state2'];

        return [
            "pesel"=>$pesel, 
            "imie"=>$imie, 
            "drugie_imie"=>$drugie_imie, 
            "nazwisko"=>$nazwisko, 
            "miejscowosc"=>$miejscowosc, 
            "kod_pocztowy"=>$kod_pocztowy, 
            "ulica_numer"=>$ulica_numer,
            "szkola_podstawowa"=>$szkola_podstawowa, 
            "jezyk_obcy"=>$jezyk_obcy, 
            "wybor1"=>$wybor1,
            "wybor2"=>$wybor2, 
            "wybor3"=>$wybor3, 
            "egczhuman"=>$egczhuman, 
            "egczmatma"=>$egczmatma, 
            "egczobcy"=>$egczobcy, 
            "polski"=>$polski, 
            "obcy"=>$obcy, 
            "historia"=>$historia, 
            "wos"=>$wos, 
            "geografia"=>$geografia, 
            "chemia"=>$chemia, 
            "biologia"=>$biologia,
            "matematyka"=>$matematyka, 
            "informatyka"=>$informatyka, 
            "osiagniecia"=>$osiagniecia, 
            "pasek"=>$pasek, 
            "wolontariat"=>$wolontariat
        ];
    }
}
?>