<?php
require '../classes/bdconfig/Dbh.php';
class Add extends Dbh{

    private $pesel;
    private $imie;
    private $drugie_imie;
    private $nazwisko;
    private $miejscowosc;
    private $kod_pocztowy;
    private $ulica_numer;
    private $szkola_podstawowa;
    private $jezyk_obcy;
    private $wybor1;
    private $wybor2;
    private $wybor3;
    private $egczhuman;
    private $egczmatma;
    private $egczobcy;
    private $polski;
    private $obcy;
    private $historia;
    private $wos;
    private $geografia;
    private $chemia;
    private $biologia;
    private $matematyka;
    private $informatyka;
    private $osiagniecia;
    private $pasek;
    private $wolontariat;
    private $id;
    private $state1;
    private $state2;

    public function add(){
        if(isset($_POST['submit'])){
            $this->GetValues();
            $this->SetValues();
        } else {
            exit();
        }
    }

    private function GetValues(){
        $this->pesel = $_POST['pesel'];
        $this->imie = $_POST['imie'];
        $this->drugie_imie = $_POST['drugie_imie'];
        $this->nazwisko = $_POST['nazwisko'];
        $this->miejscowosc = $_POST['miejscowosc'];
        $this->kod_pocztowy = $_POST['kod_pocztowy'];
        $this->ulica_numer = $_POST['ulica_numer'];
        $this->szkola_podstawowa = $_POST['szkola_podstawowa'];
        $this->jezyk_obcy = $_POST['jezyk_obcy'];
        $this->wybor1 = $_POST['wybor1'];
        $this->wybor2 = $_POST['wybor2'];
        $this->wybor3 = $_POST['wybor3'];
        $this->egczhuman = $_POST['egczhuman'];
        $this->egczmatma = $_POST['egczmatma'];
        $this->egczobcy = $_POST['egczobcy'];
        $this->polski = $_POST['polski'];
        $this->obcy = $_POST['obcy'];
        $this->historia = $_POST['historia'];
        $this->wos = $_POST['wos'];
        $this->geografia = $_POST['geografia'];
        $this->chemia = $_POST['chemia'];
        $this->biologia = $_POST['biologia'];
        $this->matematyka = $_POST['matematyka'];
        $this->informatyka = $_POST['informatyka'];
        $this->osiagniecia = $_POST['osiagniecia'];
        $this->pasek = $_POST['state1'];
        $this->wolontariat = $_POST['state2'];
    }

    private function SetValues(){
        if($this->jezyk_obcy === "Angielski"){
            $this->jezyk_obcy == "Angielski";
        } else {
            $this->jezyk_obcy == "Niemiecki";
        }
    }
}
?>