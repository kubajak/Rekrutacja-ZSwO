<?php
include_once "Validator.class.php";
include_once "DatabaseHandler.class.php";

class EditRow{
    private $dbh;

    public function __construct(){
        $this->dbh = new DatabaseHandler();
    }

    public function editRow(mixed $form_data){
        try{
            if(!in_array(false, Validator::validate($form_data), true)){

                $egczhuman  = $form_data['egczhuman']  * 0.35;
                $egczmatma  = $form_data['egczmatma']  * 0.35;
                $egczobcy   = $form_data['egczobcy']   * 0.30;

                $polski         = $this->getPoints($form_data['polski']);
                $obcy           = $this->getPoints($form_data['obcy']);
                $historia       = $this->getPoints($form_data['historia']);
                $wos            = $this->getPoints($form_data['wos']);
                $geografia      = $this->getPoints($form_data['geografia']);
                $chemia         = $this->getPoints($form_data['chemia']);
                $biologia       = $this->getPoints($form_data['biologia']);
                $matematyka     = $this->getPoints($form_data['matematyka']);
                $informatyka    = $this->getPoints($form_data['informatyka']);

                $osiagniecia    = $form_data['osiagniecia'];

                $pasek = 0;
                $wolontariat = 0;

                if($form_data['state1'] == true)
                    $pasek = 7;
                else
                    $pasek = 0;

                if($form_data['state2'] == true)
                    $wolontariat = 3;
                else
                    $wolontariat = 0;

                $wybor1 = $form_data['wybor1'];
                $wybor2 = $form_data['wybor2'];
                $wybor3 = $form_data['wybor3'];

                $akademicki = 0;
                $prozdrowotny = 0;
                $mundurowy = 0;
                $spor_tury_sport = 0;
                $mat_inzy = 0;
                $logistyczny = 0;
                $informatyczny = 0;
                $wielobranzowy = 0;

                if ($wybor1 === "Profil Akademicki")
                    $akademicki =
                        $polski + $matematyka + $historia +
                        $biologia + $osiagniecia + $pasek +
                        $wolontariat + $egczhuman + $egczmatma +
                        $egczobcy;
                else if($wybor1 === "Profil Prozdrowotny")
                    $prozdrowotny =
                        $polski + $matematyka + $chemia +
                        $biologia + $osiagniecia + $pasek +
                        $wolontariat + $egczhuman + $egczmatma +
                        $egczobcy;
                else if ($wybor1 === "Profil Mundurowy")
                    $mundurowy =
                        $polski + $matematyka + $geografia +
                        $wos + $osiagniecia + $pasek +
                        $wolontariat + $egczhuman + $egczmatma +
                        $egczobcy;
                else if ($wybor1 === "Profil Sportowy-Turystyczny,Sportowy")
                    $spor_tury_sport =
                        $polski + $matematyka + $geografia +
                        $biologia + $osiagniecia + $pasek +
                        $wolontariat + $egczhuman + $egczmatma +
                        $egczobcy;
                else if ($wybor1 === "Profil Matematyczno-Inżynieryjny")
                    $mat_inzy =
                        $polski + $matematyka + $geografia +
                        $obcy + $osiagniecia + $pasek +
                        $wolontariat + $egczhuman + $egczmatma +
                        $egczobcy;
                else if ($wybor1 === "Profil Logistyczny")
                    $logistyczny =
                        $polski + $matematyka + $geografia +
                        $obcy + $osiagniecia + $pasek +
                        $wolontariat + $egczhuman + $egczmatma +
                        $egczobcy;
                else if ($wybor1 === "Profil Informatyczny")
                    $informatyczny =
                        $polski + $matematyka + $informatyka +
                        $obcy + $osiagniecia + $pasek +
                        $wolontariat + $egczhuman + $egczmatma +
                        $egczobcy;
                else if ($wybor1 === "Klasa Wielozawodowa")
                    $wielobranzowy =
                        $polski + $matematyka + $geografia +
                        $wos + $osiagniecia + $pasek +
                        $wolontariat + $egczhuman + $egczmatma +
                        $egczobcy;

                if ($wybor2 === "Profil Akademicki")
                    $akademicki =
                        $polski + $matematyka + $historia +
                        $biologia + $osiagniecia + $pasek +
                        $wolontariat + $egczhuman + $egczmatma +
                        $egczobcy;
                else if ($wybor2 === "Profil Prozdrowotny")
                    $prozdrowotny =
                        $polski + $matematyka + $chemia +
                        $biologia + $osiagniecia + $pasek +
                        $wolontariat + $egczhuman + $egczmatma +
                        $egczobcy;
                else if ($wybor2 === "Profil Mundurowy")
                    $mundurowy =
                        $polski + $matematyka + $geografia +
                        $wos + $osiagniecia + $pasek +
                        $wolontariat + $egczhuman + $egczmatma +
                        $egczobcy;
                else if ($wybor2 === "Profil Sportowy-Turystyczny,Sportowy")
                    $spor_tury_sport =
                        $polski + $matematyka + $geografia +
                        $biologia + $osiagniecia + $pasek +
                        $wolontariat + $egczhuman + $egczmatma +
                        $egczobcy;
                else if ($wybor2 === "Profil Matematyczno-Inżynieryjny")
                    $mat_inzy =
                        $polski + $matematyka + $geografia +
                        $obcy + $osiagniecia + $pasek +
                        $wolontariat + $egczhuman + $egczmatma +
                        $egczobcy;
                else if ($wybor2 === "Profil Logistyczny")
                    $logistyczny =
                        $polski + $matematyka + $geografia +
                        $obcy + $osiagniecia + $pasek +
                        $wolontariat + $egczhuman + $egczmatma +
                        $egczobcy;
                else if ($wybor2 === "Profil Informatyczny")
                            $informatyczny =
                        $polski + $matematyka + $informatyka +
                        $obcy + $osiagniecia + $pasek +
                        $wolontariat + $egczhuman + $egczmatma +
                        $egczobcy;
                else if ($wybor2 === "Klasa Wielozawodowa")
                    $wielobranzowy =
                        $polski + $matematyka + $geografia +
                        $wos + $osiagniecia + $pasek +
                        $wolontariat + $egczhuman + $egczmatma +
                        $egczobcy;

                if ($wybor3 === "Profil Akademicki")
                    $akademicki =
                        $polski + $matematyka + $historia +
                        $biologia + $osiagniecia + $pasek +
                        $wolontariat + $egczhuman + $egczmatma +
                        $egczobcy;
                else if ($wybor3 === "Profil Prozdrowotny")
                    $prozdrowotny =
                        $polski + $matematyka + $chemia +
                        $biologia + $osiagniecia + $pasek +
                        $wolontariat + $egczhuman + $egczmatma +
                        $egczobcy;
                else if ($wybor3 === "Profil Mundurowy")
                    $mundurowy =
                        $polski + $matematyka + $geografia +
                        $wos + $osiagniecia + $pasek +
                        $wolontariat + $egczhuman + $egczmatma +
                        $egczobcy;
                else if ($wybor3 === "Profil Sportowy-Turystyczny,Sportowy")
                    $spor_tury_sport =
                        $polski + $matematyka + $geografia +
                        $biologia + $osiagniecia + $pasek +
                        $wolontariat + $egczhuman + $egczmatma +
                        $egczobcy;
                else if ($wybor3 === "Profil Matematyczno-Inżynieryjny")
                    $mat_inzy =
                        $polski + $matematyka + $geografia +
                        $obcy + $osiagniecia + $pasek +
                        $wolontariat + $egczhuman + $egczmatma +
                        $egczobcy;
                else if ($wybor3 === "Profil Logistyczny")
                    $logistyczny =
                        $polski + $matematyka + $geografia +
                        $obcy + $osiagniecia + $pasek +
                        $wolontariat + $egczhuman + $egczmatma +
                        $egczobcy;
                else if ($wybor3 === "Profil Informatyczny")
                    $informatyczny =
                        $polski + $matematyka + $informatyka +
                        $obcy + $osiagniecia + $pasek +
                        $wolontariat + $egczhuman + $egczmatma +
                        $egczobcy;
                else if ($wybor3 === "Klasa Wielozawodowa")
                    $wielobranzowy =
                        $polski + $matematyka + $geografia +
                        $wos + $osiagniecia + $pasek +
                        $wolontariat + $egczhuman + $egczmatma +
                        $egczobcy;

                if($wybor1 === "default")
                    $wybor1 = "Inna";

                if($wybor2 === "default")
                    $wybor2 = "Inna";

                if($wybor3 === "default")
                    $wybor3 = "Inna";

                $toDatabase = Array(
                    'id' => $form_data['id'],
                    'pesel' => $form_data['pesel'],
                    'imie' => $form_data['imie'],
                    'drugie_imie' => $form_data['drugie_imie'],
                    'nazwisko' => $form_data['nazwisko'],
                    'kod_pocztowy' => $form_data['kod_pocztowy'],
                    'miejscowosc' => $form_data['miejscowosc'],
                    'ulica_numer' => $form_data['ulica_numer'],
                    'szkola_podstawowa' => $form_data['szkola_podstawowa'],
                    'jezyk_obcy' => $form_data['jezyk_obcy'],
                    'wybor1' => $wybor1,
                    'wybor2' => $wybor2,
                    'wybor3' => $wybor3,
                    'egczhuman' => $form_data['egczhuman'],
                    'egczmatma' => $form_data['egczmatma'],
                    'egczobcy' => $form_data['egczobcy'],
                    'polski' => $form_data['polski'],
                    'obcy' => $form_data['obcy'],
                    'historia' => $form_data['historia'],
                    'wos' => $form_data['wos'],
                    'geografia' => $form_data['geografia'],
                    'chemia' => $form_data['chemia'],
                    'biologia' => $form_data['biologia'],
                    'matematyka' => $form_data['matematyka'],
                    'informatyka' => $form_data['informatyka'],
                    'pasek' => $form_data['state1'],
                    'osiagniecia' => $form_data['osiagniecia'],
                    'wolontariat' => $form_data['state2'],
                    'akademicki' => $akademicki,
                    'prozdrowotny' => $prozdrowotny,
                    'mundurowy' => $mundurowy,
                    'spor_tury_sport' => $spor_tury_sport,
                    'mat_inzy' => $mat_inzy,
                    'logistyczny' => $logistyczny,
                    'informatyczny' => $informatyczny,
                    'wielobranzowy' => $wielobranzowy,
                );

                $this->dbh->editRowInDatabase($toDatabase);

            }else{
                throw new Exception("Nieprawidłowe dane");
            }
        }catch(Throwable $e){
            header("Location: editform.php?success=0");
            echo $e->getMessage();
        }
    }

    private function getPoints(int $data){
        switch($data){
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
}
?>