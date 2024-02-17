<?php
require_once "bdconfig/Dbh.php";

class DrawClassTableWithUtilities{
    
    private $conn;
    private string $table_name = "rekrutacja_uczen_tbl";

    public function __construct(){
        $db = new Dbh();
        $this->conn = $db->connect();
    }

    public function drawClassTableWithUtilities(){
        try{
            $pdo = $this->conn;

            $sql = "SELECT id,pesel,imie,nazwisko,wybor1,wybor2,wybor3 FROM $this->table_name";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $count = $stmt->rowCount();

            if($count > 0){
                echo '<div class="div_tabela">';
                echo "<table class='table_uczen'>";
                echo "<tr class='tr_uczen'>";
                echo "<th class='th_uczen'>ID</th>";
                echo "<th class='th_uczen'>Pesel</th>";
                echo "<th class='th_uczen'>Imię</th>";
                echo "<th class='th_uczen'>Nazwisko</th>";
                echo "<th class='th_uczen'>Wybór 1</th>";
                echo "<th class='th_uczen'>Wybór 2</th>";
                echo "<th class='th_uczen'>Wybór 3</th>";
                echo "<th class='th_uczen'>USUŃ</th>";
                echo "<th class='th_uczen'>EDYTUJ</th>";
                echo "</tr>";
                foreach($row as $row){
                    echo "<tr class='tr_uczen'>";
                    echo "<td class='td_uczen'>{$row['id']}</td>";
                    echo "<td class='td_uczen'>{$row['pesel']}</td>";
                    echo "<td class='td_uczen'>{$row['imie']}</td>";
                    echo "<td class='td_uczen'>{$row['nazwisko']}</td>";
                    echo "<td class='td_uczen w-33 r-text-td'>{$row['wybor1']}</td>";
                    echo "<td class='td_uczen w-33 r-text-td'>{$row['wybor2']}</td>";
                    echo "<td class='td_uczen w-33 r-text-td'>{$row['wybor3']}</td>";
                    echo "<td class='td_uczen'><a href=\"#\" onclick=\"confirmDelete('classes/RemoveRow.class.php?id={$row['id']}', '{$row['id']}')\"><img src='../../img/icon/user-minus-solid.svg' style='width:16px;'></td>";
                    echo "<td class='td_uczen'><a href=\"#\" onclick=\"confirmEdit('editform.php?id={$row['id']}', '{$row['id']}')\"><img src='../../img/icon/user-edit-solid.svg' style='width:16px;'></td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo '</div>';
            }else{
                echo "<span id='NoElements'>Brak wyników</span>";
            }
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function __destruct(){
        $this->conn = null;
    }
}
?>