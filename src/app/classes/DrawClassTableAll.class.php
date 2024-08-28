<?php
require_once "bdconfig/Dbh.php";

class DrawClassTableAll{

    private $conn;
    private string $table_name = "rekrutacja_uczen_tbl";

    public function __construct(){
        $db = new Dbh();
        $this->conn = $db->connect();
    }

    public function drawClassTableAll(string $data): void{
        try{
            $pdo = $this->conn;
            
            $sql = "SELECT pesel, imie, nazwisko, wybor1, wybor2, wybor3 FROM $this->table_name WHERE $data > 0";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $count = $stmt->rowCount();
            $licznik = 0;

            if($count > 0){
                echo "<div class='div_tabela'>";
                echo "<table class='table_uczen'>";
                echo "<tr class='tr_uczen'>";
                echo "<th class='th_uczen'>Lp.</th>";
                echo "<th class='th_uczen'>Pesel</th>";
                echo "<th class='th_uczen'>Imię</th>";
                echo "<th class='th_uczen'>Nazwisko</th>";
                echo "<th class='th_uczen'>Wybor1</th>";
                echo "<th class='th_uczen'>Wybor2</th>";
                echo "<th class='th_uczen'>Wybor3</th>";
                echo "</tr>";
                foreach($row as $row){
                    $licznik++;
                    echo "<tr class='tr_uczen'>";
                    echo "<td class='td_uczen td_5'>{$licznik}</td>";
                    echo "<td class='td_uczen'>{$row['pesel']}</td>";
                    echo "<td class='td_uczen'>{$row['imie']}</td>";
                    echo "<td class='td_uczen'>{$row['nazwisko']}</td>";
                    echo "<td class='td_uczen'>{$row['wybor1']}</td>";
                    echo "<td class='td_uczen'>{$row['wybor2']}</td>";
                    echo "<td class='td_uczen'>{$row['wybor3']}</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
            } else {
                echo "Brak wpisów";
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function __destruct(){
        $this->conn = null;
    }
}
?>