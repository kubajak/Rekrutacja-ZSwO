<?php
require_once "bdconfig/Dbh.php";

class DatabaseHandler{
    private $conn;
    private $table_name = "rekrutacja_uczen_tbl";
    private $columns = [
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
    
    public function __construct(){
        $db = new Dbh();
        $this->conn = $db->connect();
    }

    public function addToDatabase(array $data){
        try{
            $pdo = $this->conn;

            $placeholders = array_fill(0, count($this->columns),'?');
            $sql = "INSERT INTO " .$this->table_name. " (`" . implode('`, `', $this->columns) . "`) VALUES (" . implode(', ', $placeholders) . ")";

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

            header("Location: addform.php?success=1");

        }catch(PDOException $e){
            header("Location: addform.php?success=0");
            echo $e->getMessage();
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
            header("Location: ../list.php?succness=0");
            echo $e->getMessage();
        }
    }

    public function editRowInDatabase($form_data){
        try{

            $pdo = $this->conn;
            
            $query = "UPDATE $this->table_name
              SET 
                pesel = :pesel,
                imie = :imie,
                drugie_imie = :drugie_imie,
                nazwisko = :nazwisko,
                kod_pocztowy = :kod_pocztowy,
                miejscowosc = :miejscowosc,
                ulica_numer = :ulica_numer,
                szkola_podstawowa = :szkola_podstawowa,
                jezyk_wiodacy = :jezyk_wiodacy,
                wybor1 = :wybor1,
                wybor2 = :wybor2,
                wybor3 = :wybor3,
                egz_cz_humanistyczna = :egz_cz_humanistyczna,
                egz_cz_matematyczna = :egz_cz_matematyczna,
                egz_cz_jezyk_obcy = :egz_cz_jezyk_obcy,
                jezyk_polski = :jezyk_polski,
                jezyk_obcy = :jezyk_obcy,
                historia = :historia,
                wos = :wos,
                geografia = :geografia,
                chemia = :chemia,
                biologia = :biologia,
                matematyka = :matematyka,
                informatyka = :informatyka,
                swiadectwo_z_wyrozn = :swiadectwo_z_wyrozn,
                osiagniecia = :osiagniecia,
                wolontariat = :wolontariat,
                profil_akademicki = :profil_akademicki,
                profil_prozdrowotny = :profil_prozdrowotny,
                profil_mundurowy = :profil_mundurowy,
                profil_sportowo_turystyczny_sportowy = :profil_sportowo_turystyczny_sportowy,
                profil_matematyczno_inzynieryjny = :profil_matematyczno_inzynieryjny,
                profil_logistyczny = :profil_logistyczny,
                profil_informatyczny = :profil_informatyczny,
                profil_wielozawodowy = :profil_wielozawodowy
              WHERE id = :id";

            $statement = $pdo->prepare($query);

            $statement->bindParam(':id', $form_data['id'], PDO::PARAM_STR);
            $statement->bindParam(':pesel', $form_data['pesel'], PDO::PARAM_STR);
            $statement->bindParam(':imie', $form_data['imie'], PDO::PARAM_STR);
            $statement->bindParam(':drugie_imie', $form_data['drugie_imie'], PDO::PARAM_STR);
            $statement->bindParam(':nazwisko', $form_data['nazwisko'], PDO::PARAM_STR);
            $statement->bindParam(':kod_pocztowy', $form_data['kod_pocztowy'], PDO::PARAM_STR);
            $statement->bindParam(':miejscowosc', $form_data['miejscowosc'], PDO::PARAM_STR);
            $statement->bindParam(':ulica_numer', $form_data['ulica_numer'], PDO::PARAM_STR);
            $statement->bindParam(':szkola_podstawowa', $form_data['szkola_podstawowa'], PDO::PARAM_STR);
            $statement->bindParam(':jezyk_wiodacy', $form_data['jezyk_wiodacy'], PDO::PARAM_STR);
            $statement->bindParam(':wybor1', $form_data['wybor1'], PDO::PARAM_STR);
            $statement->bindParam(':wybor2', $form_data['wybor2'], PDO::PARAM_STR);
            $statement->bindParam(':wybor3', $form_data['wybor3'], PDO::PARAM_STR);
            $statement->bindParam(':egz_cz_humanistyczna', $form_data['egz_cz_humanistyczna'], PDO::PARAM_STR);
            $statement->bindParam(':egz_cz_matematyczna', $form_data['egz_cz_matematyczna'], PDO::PARAM_STR);
            $statement->bindParam(':egz_cz_jezyk_obcy', $form_data['egz_cz_jezyk_obcy'], PDO::PARAM_STR);
            $statement->bindParam(':jezyk_polski', $form_data['jezyk_polski'], PDO::PARAM_STR);
            $statement->bindParam(':jezyk_obcy', $form_data['jezyk_obcy'], PDO::PARAM_STR);
            $statement->bindParam(':historia', $form_data['historia'], PDO::PARAM_STR);
            $statement->bindParam(':wos', $form_data['wos'], PDO::PARAM_STR);
            $statement->bindParam(':geografia', $form_data['geografia'], PDO::PARAM_STR);
            $statement->bindParam(':chemia', $form_data['chemia'], PDO::PARAM_STR);
            $statement->bindParam(':biologia', $form_data['biologia'], PDO::PARAM_STR);
            $statement->bindParam(':matematyka', $form_data['matematyka'], PDO::PARAM_STR);
            $statement->bindParam(':informatyka', $form_data['informatyka'], PDO::PARAM_STR);
            $statement->bindParam(':swiadectwo_z_wyrozn', $form_data['pasek'], PDO::PARAM_STR);
            $statement->bindParam(':osiagniecia', $form_data['osiagniecia'], PDO::PARAM_STR);
            $statement->bindParam(':wolontariat', $form_data['wolontariat'], PDO::PARAM_STR);
            $statement->bindParam(':profil_akademicki', $form_data['profil_akademicki'], PDO::PARAM_STR);
            $statement->bindParam(':profil_prozdrowotny', $form_data['profil_prozdrowotny'], PDO::PARAM_STR);
            $statement->bindParam(':profil_mundurowy', $form_data['profil_mundurowy'], PDO::PARAM_STR);
            $statement->bindParam(':profil_sportowo_turystyczny_sportowy', $form_data['profil_sportowo_turystyczny_sportowy'], PDO::PARAM_STR);
            $statement->bindParam(':profil_matematyczno_inzynieryjny', $form_data['profil_matematyczno_inzynieryjny'], PDO::PARAM_STR);
            $statement->bindParam(':profil_logistyczny', $form_data['profil_logistyczny'], PDO::PARAM_STR);
            $statement->bindParam(':profil_informatyczny', $form_data['profil_informatyczny'], PDO::PARAM_STR);
            $statement->bindParam(':profil_wielozawodowy', $form_data['profil_wielozawodowy'], PDO::PARAM_STR);

            $statement->execute();

            header("Location: list.php?success=1");
        }catch(PDOException $e){
            header("Location: list.php?success=0");
            echo $e->getMessage();
        }
    }

    public function retriveRowFromDatabase(string $id){
        try{
            $pdo = $this->conn;
            
            $sql = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
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

    public function __destruct(){
        $this->conn = null;
    }
}
?>