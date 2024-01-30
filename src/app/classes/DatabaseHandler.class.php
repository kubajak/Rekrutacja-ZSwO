<?php
include "bdconfig/Dbh.php";

class DatabaseHandler{
    private $conn;
    
    public function __construct(){
        $db = new Dbh();
        $this->conn = $db->connect();
    }

    public function addToDatabase($data){
        try{
            $pdo = $this->conn;
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
            ];

            $placeholders = array_fill(0, count($columns),'?');
            $sql = "INSERT INTO `rekrutacja_uczen_tbl` (`" . implode('`, `', $columns) . "`) VALUES (" . implode(', ', $placeholders) . ")";

            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                $data['pesel'],
                $data['imie'],
                $data['drugie_imie'],
                $data['nazwisko'],
                $data['kod_pocztowy'],
                $data['miejscowosc'],
                $data['ulica_numer'],
                $data['szkola_podstawowa'],
                $data['jezyk_obcy'],
                $data['wybor1'],
                $data['wybor2'],
                $data['wybor3'],
                $data['egczhuman'],
                $data['egczmatma'],
                $data['egczobcy'],
                $data['polski'],
                $data['obcy'],
                $data['historia'],
                $data['wos'],
                $data['geografia'],
                $data['chemia'],
                $data['biologia'],
                $data['matematyka'],
                $data['informatyka'],
                $data['pasek'],
                $data['osiagniecia'],
                $data['wolontariat'],
                $data['akademicki'],
                $data['prozdrowotny'],
                $data['mundurowy'],
                $data['spor_tury_sport'],
                $data['mat_inzy'],
                $data['logistyczny'],
                $data['informatyczny'],
                $data['wielobranzowy'],
            ]);

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function removeRowFromDatabase(){
        try{
            
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function editRowInDatabase(){
        try{

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
?>