<?php
include "bdconfig/Dbh.php";

class DatabaseHandler{
    private $conn;
    private $table_name = "rekrutacja_uczen_tbl";
    
    public function __construct(){
        $db = new Dbh();
        $this->conn = $db->connect();
    }

    public function addToDatabase(array $data){
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
                'profil_wielozawodowy'
            ];

            $placeholders = array_fill(0, count($columns),'?');
            $sql = "INSERT INTO " .$this->table_name. " (`" . implode('`, `', $columns) . "`) VALUES (" . implode(', ', $placeholders) . ")";

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
                $data['wielobranzowy']
            ]);

            header("Location: addform.php?success=1");

        }catch(PDOException $e){
            echo $e->getMessage();
            header("Location: addform.php?success=0");
        }
    }

    public function removeRowFromDatabase(int $id){
        try{
            $pdo = $this->conn;
            $sql = "DELETE FROM " .$this->table_name. " WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            header("Location: ../list.php?success=1");
        }catch(PDOException $e){
            echo $e->getMessage();
            header("Location: ../list.php?succness=0");
        }
    }

    public function editRowInDatabase(){
        try{

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function retriveRowFromDatabase(int $id){
        try{
            $pdo = $this->conn;
            $sql = "SELECT * FROM .$this->table_name. WHERE $id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($result as $result){
                $edit_data = Array(
                    'id' => $result['id'],
                    'pesel' => $result['pesel'],
                    'imie' => $result['imie'],
                    'drugie_imie' => $result['drugie_imie'],
                    'nazwisko' => $result['nazwisko'],
                    'kod_pocztowy' => $result['kod_pocztowy'],
                    'miejscowosc' => $result['miejscowosc'],
                    'ulica_numer' => $result['ulica_numer'],
                    'szkola_podstawowa' => $result['szkola_podstawowa'],
                    'jezyk_obcy' => $result['jezyk_wiodacy'],
                    'wybor1' => $result['wybor1'],
                    'wybor2' => $result['wybor2'],
                    'wybor3' => $result['wybor3'],
                    'egczhuman' => $result['egz_cz_humanistyczna'],
                    'egczmatma' => $result['egz_cz_matematyczna'],
                    'egczobcy' => $result['egz_cz_jezyk_obcy'],
                    'polski' => $result['jezyk_polski'],
                    'obcy' => $result['jezyk_obcy'],
                    'historia' => $result['historia'],
                    'wos' => $result['wos'],
                    'geografia' => $result['geografia'],
                    'chemia' => $result['chemia'],
                    'biologia' => $result['biologia'],
                    'matematyka' => $result['matematyka'],
                    'informatyka' => $result['informatyka'],
                    'pasek' => $result['swiadectwo_z_wyrozn'],
                    'osiagniecia' => $result['osiagniecia'],
                    'wolontariat' => $result['wolontariat']
                );
            }

            return $edit_data;

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
?>