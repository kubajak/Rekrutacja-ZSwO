<?php
require 'classes/bdconfig/Dbh.php';
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
    private $akademicki = 0;
    private $prozdrowotny = 0;
    private $mundurowy = 0;
    private $spor_tury_sport = 0;
    private $mat_inzy = 0;
    private $logistyczny = 0;
    private $informatyczny = 0;
    private $wielobranzowy = 0;

    public function add(){
        try{
            $this->GetValues();
            $this->SetValues();
            $this->AddToDatabase();
            //header("Location: ../add_form.php");
        } catch(Exception $e){
            echo $e->getMessage();
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
            $this->jezyk_obcy = "Angielski";
        } else {
            $this->jezyk_obcy = "Niemiecki";
        }
        
        if(empty($this->egczhuman)) $this->egczhuman = 0;
        if(empty($this->egczmatma)) $this->egczmatma = 0;
        if(empty($this->egczobcy))  $this->egczobcy = 0;

        $egczhuman_punkty = $this->egczhuman * 0.35;
        $egczmatma_punkty = $this->egczmatma * 0.35;
        $egczobcy_punkty = $this->egczobcy   * 0.30;

        $polski_punkty = $this->GetPoints($this->polski);
        $obcy_punkty = $this->GetPoints($this->obcy);
        $historia_punkty = $this->GetPoints($this->historia);
        $wos_punkty = $this->GetPoints($this->wos);
        $geografia_punkty = $this->GetPoints($this->geografia);
        $chemia_punkty = $this->GetPoints($this->chemia);
        $biologia_punkty = $this->GetPoints($this->biologia);
        $matematyka_punkty = $this->GetPoints($this->matematyka);
        $informatyka_punkty = $this->GetPoints($this->informatyka);
        $osiagniecia_punkty = $this->osiagniecia;

        if($this->pasek == true){
            $pasek_punkty = 3;
        } else {
            $pasek_punkty = 0;
        }

        if($this->wolontariat == true){
            $wolontariat_punkty = 3;
        } else {
            $wolontariat_punkty = 0;
        }

        if ($this->wybor1 == "Profil Akademicki")
            $this->akademicki =
                $polski_punkty + $matematyka_punkty + $historia_punkty +
                $biologia_punkty + $osiagniecia_punkty + $pasek_punkty +
                $wolontariat_punkty + $egczhuman_punkty + $egczmatma_punkty +
                $egczobcy_punkty;
        else if($this->wybor1 == "Profil Prozdrowotny")
        $this->prozdrowotny =
                $polski_punkty + $matematyka_punkty + $chemia_punkty +
                $biologia_punkty + $osiagniecia_punkty + $pasek_punkty +
                $wolontariat_punkty + $egczhuman_punkty + $egczmatma_punkty +
                $egczobcy_punkty;
        else if ($this->wybor1 == "Profil Mundurowy")
        $this->mundurowy =
                $polski_punkty + $matematyka_punkty + $geografia_punkty +
                $wos_punkty + $osiagniecia_punkty + $pasek_punkty +
                $wolontariat_punkty + $egczhuman_punkty + $egczmatma_punkty +
                $egczobcy_punkty;
        else if ($this->wybor1 == "Profil Sportowy-Turystyczny,Sportowy")
        $this->spor_tury_sport =
                $polski_punkty + $matematyka_punkty + $geografia_punkty +
                $biologia_punkty + $osiagniecia_punkty + $pasek_punkty +
                $wolontariat_punkty + $egczhuman_punkty + $egczmatma_punkty +
                $egczobcy_punkty;
        else if ($this->wybor1 == "Profil Matematyczno-Inżynieryjny")
        $this->mat_inzy =
                $polski_punkty + $matematyka_punkty + $geografia_punkty +
                $obcy_punkty + $osiagniecia_punkty + $pasek_punkty +
                $wolontariat_punkty + $egczhuman_punkty + $egczmatma_punkty +
                $egczobcy_punkty;
        else if ($this->wybor1 == "Profil Logistyczny")
        $this->logistyczny =
                $polski_punkty + $matematyka_punkty + $geografia_punkty +
                $obcy_punkty + $osiagniecia_punkty + $pasek_punkty +
                $wolontariat_punkty + $egczhuman_punkty + $egczmatma_punkty +
                $egczobcy_punkty;
        else if ($this->wybor1 == "Profil Informatyczny")
        $this->informatyczny =
                $polski_punkty + $matematyka_punkty + $informatyka_punkty +
                $obcy_punkty + $osiagniecia_punkty + $pasek_punkty +
                $wolontariat_punkty + $egczhuman_punkty + $egczmatma_punkty +
                $egczobcy_punkty;
        else if ($this->wybor1 == "Klasa Wielozawodowa")
        $this->wielobranzowy =
                $polski_punkty + $matematyka_punkty + $geografia_punkty +
                $wos_punkty + $osiagniecia_punkty + $pasek_punkty +
                $wolontariat_punkty + $egczhuman_punkty + $egczmatma_punkty +
                $egczobcy_punkty;

        if ($this->wybor2 == "Profil Akademicki")
        $this->akademicki =
                $polski_punkty + $matematyka_punkty + $historia_punkty +
                $biologia_punkty + $osiagniecia_punkty + $pasek_punkty +
                $wolontariat_punkty + $egczhuman_punkty + $egczmatma_punkty +
                $egczobcy_punkty;
        else if ($this->wybor2 == "Profil Prozdrowotny")
        $this->prozdrowotny =
                $polski_punkty + $matematyka_punkty + $chemia_punkty +
                $biologia_punkty + $osiagniecia_punkty + $pasek_punkty +
                $wolontariat_punkty + $egczhuman_punkty + $egczmatma_punkty +
                $egczobcy_punkty;
        else if ($this->wybor2 == "Profil Mundurowy")
        $this->mundurowy =
                $polski_punkty + $matematyka_punkty + $geografia_punkty +
                $wos_punkty + $osiagniecia_punkty + $pasek_punkty +
                $wolontariat_punkty + $egczhuman_punkty + $egczmatma_punkty +
                $egczobcy_punkty;
        else if ($this->wybor2 == "Profil Sportowy-Turystyczny,Sportowy")
        $this->spor_tury_sport =
                $polski_punkty + $matematyka_punkty + $geografia_punkty +
                $biologia_punkty + $osiagniecia_punkty + $pasek_punkty +
                $wolontariat_punkty + $egczhuman_punkty + $egczmatma_punkty +
                $egczobcy_punkty;
        else if ($this->wybor2 == "Profil Matematyczno-Inżynieryjny")
        $this->mat_inzy =
                $polski_punkty + $matematyka_punkty + $geografia_punkty +
                $obcy_punkty + $osiagniecia_punkty + $pasek_punkty +
                $wolontariat_punkty + $egczhuman_punkty + $egczmatma_punkty +
                $egczobcy_punkty;
        else if ($this->wybor2 == "Profil Logistyczny")
        $this->logistyczny =
                $polski_punkty + $matematyka_punkty + $geografia_punkty +
                $obcy_punkty + $osiagniecia_punkty + $pasek_punkty +
                $wolontariat_punkty + $egczhuman_punkty + $egczmatma_punkty +
                $egczobcy_punkty;
        else if ($this->wybor2 == "Profil Informatyczny")
        $this->informatyczny =
                $polski_punkty + $matematyka_punkty + $informatyka_punkty +
                $obcy_punkty + $osiagniecia_punkty + $pasek_punkty +
                $wolontariat_punkty + $egczhuman_punkty + $egczmatma_punkty +
                $egczobcy_punkty;
        else if ($this->wybor2 == "Klasa Wielozawodowa")
        $this->wielobranzowy =
                $polski_punkty + $matematyka_punkty + $geografia_punkty +
                $wos_punkty + $osiagniecia_punkty + $pasek_punkty +
                $wolontariat_punkty + $egczhuman_punkty + $egczmatma_punkty +
                $egczobcy_punkty;

        if ($this->wybor3 == "Profil Akademicki")
        $this->akademicki =
                $polski_punkty + $matematyka_punkty + $historia_punkty +
                $biologia_punkty + $osiagniecia_punkty + $pasek_punkty +
                $wolontariat_punkty + $egczhuman_punkty + $egczmatma_punkty +
                $egczobcy_punkty;
        else if ($this->wybor3 == "Profil Prozdrowotny")
        $this->prozdrowotny =
                $polski_punkty + $matematyka_punkty + $chemia_punkty +
                $biologia_punkty + $osiagniecia_punkty + $pasek_punkty +
                $wolontariat_punkty + $egczhuman_punkty + $egczmatma_punkty +
                $egczobcy_punkty;
        else if ($this->wybor3 == "Profil Mundurowy")
        $this->mundurowy =
                $polski_punkty + $matematyka_punkty + $geografia_punkty +
                $wos_punkty + $osiagniecia_punkty + $pasek_punkty +
                $wolontariat_punkty + $egczhuman_punkty + $egczmatma_punkty +
                $egczobcy_punkty;
        else if ($this->wybor3 == "Profil Sportowy-Turystyczny,Sportowy")
        $this->spor_tury_sport =
                $polski_punkty + $matematyka_punkty + $geografia_punkty +
                $biologia_punkty + $osiagniecia_punkty + $pasek_punkty +
                $wolontariat_punkty + $egczhuman_punkty + $egczmatma_punkty +
                $egczobcy_punkty;
        else if ($this->wybor3 == "Profil Matematyczno-Inżynieryjny")
        $this->mat_inzy =
                $polski_punkty + $matematyka_punkty + $geografia_punkty +
                $obcy_punkty + $osiagniecia_punkty + $pasek_punkty +
                $wolontariat_punkty + $egczhuman_punkty + $egczmatma_punkty +
                $egczobcy_punkty;
        else if ($this->wybor3 == "Profil Logistyczny")
        $this->logistyczny =
                $polski_punkty + $matematyka_punkty + $geografia_punkty +
                $obcy_punkty + $osiagniecia_punkty + $pasek_punkty +
                $wolontariat_punkty + $egczhuman_punkty + $egczmatma_punkty +
                $egczobcy_punkty;
        else if ($this->wybor3 == "Profil Informatyczny")
        $this->informatyczny =
                $polski_punkty + $matematyka_punkty + $informatyka_punkty +
                $obcy_punkty + $osiagniecia_punkty + $pasek_punkty +
                $wolontariat_punkty + $egczhuman_punkty + $egczmatma_punkty +
                $egczobcy_punkty;
        else if ($this->wybor3 == "Klasa Wielozawodowa")
        $this->wielobranzowy =
                $polski_punkty + $matematyka_punkty + $geografia_punkty +
                $wos_punkty + $osiagniecia_punkty + $pasek_punkty +
                $wolontariat_punkty + $egczhuman_punkty + $egczmatma_punkty +
                $egczobcy_punkty;

        if($this->wybor1 == "default")
            $this->wybor1 = "Inna";

        if($this->wybor2 == "default")
            $this->wybor2 = "Inna";

        if($this->wybor3 == "default")
            $this->wybor3 = "Inna";
    }

    private function GetPoints($ocena){
        switch($ocena){
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

    private function AddToDatabase(){
        try{
            $pdo = $this->Connect();

            $columns = [
                'pesel',
                'imie',
                'drugie_imie',
                'nazwisko',
                'kod_pocztowy',
                'miejscowosc',
                'ulica_numer',
                'szkola_podstawowa',
                'jezyk_wiodacy',
                'wybor1',
                'wybor2',
                'wybor3',
                'egz_cz_humanistyczna',
                'egz_cz_matematyczna',
                'egz_cz_jezyk_obcy',
                'jezyk_polski',
                'jezyk_obcy',
                'historia',
                'wos',
                'geografia',
                'chemia',
                'biologia',
                'matematyka',
                'informatyka',
                'swiadectwo_z_wyrozn',
                'osiagniecia',
                'wolontariat',
                'profil_akademicki',
                'profil_prozdrowotny',
                'profil_mundurowy',
                'profil_sportowo_turystyczny_sportowy',
                'profil_matematyczno_inzynieryjny',
                'profil_logistyczny',
                'profil_informatyczny',
                'profil_wielozawodowy',
                'egz_cz_humanistyczna_procent',
                'egz_cz_matematyczna_procent',
                'egz_cz_jezyk_obcy_procent'
            ];
        
            $placeholders = array_fill(0, count($columns), '?');
            $sql = "INSERT INTO `rekrutacja_uczen_tbl` (`" . implode('`, `', $columns) . "`) VALUES (" . implode(', ', $placeholders) . ")";
        
            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                $this->pesel,
                $this->imie,
                $this->drugie_imie,
                $this->nazwisko,
                $this->kod_pocztowy,
                $this->miejscowosc,
                $this->ulica_numer,
                $this->szkola_podstawowa,
                $this->jezyk_obcy,
                $this->wybor1,
                $this->wybor2,
                $this->wybor3,
                $this->egczhuman,
                $this->egczmatma,
                $this->egczobcy,
                $this->polski,
                $this->obcy,
                $this->historia,
                $this->wos,
                $this->geografia,
                $this->chemia,
                $this->biologia,
                $this->matematyka,
                $this->informatyka,
                $this->pasek,
                $this->osiagniecia,
                $this->wolontariat,
                $this->akademicki,
                $this->prozdrowotny,
                $this->mundurowy,
                $this->spor_tury_sport,
                $this->mat_inzy,
                $this->logistyczny,
                $this->informatyczny,
                $this->wielobranzowy,
                $this->egczhuman,
                $this->egczmatma,
                $this->egczobcy]);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>