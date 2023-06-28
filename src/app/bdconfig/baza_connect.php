<?php
    function _connect() // Baza connect (informacje)
    {
        $adres = "localhost"; //[0]
        $login = "root"; //[1]
        $haslo = ""; //[2]
        $bdnazwa = "rekrutacja"; //[3]
        $tabela = "rekrutacja_uczen_tbl"; //[4]
        return array($adres, $login, $haslo, $bdnazwa, $tabela);
    }
    //Jacek
?>