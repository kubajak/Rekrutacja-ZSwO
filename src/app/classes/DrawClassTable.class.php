<?php
include "bdconfig/Dbh.php";

class DrawClassTable{
    private $conn;
    private $table_name ="rekrutacja_uczen_tbl";

    public function __construct(){
        $db = new Dbh();
        $this->conn = $db->connect();
    }

    public function drawClassTable(string $profile, string $name){
        try{
            $pdo = $this->conn;
            $sql = "SELECT pesel,imie,nazwisko,$profile FROM $this->table_name WHERE $profile > 0";
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
                echo "<th class='th_uczen'>Profil</th>";
                echo "<th class='th_uczen'>Punkty</th>";
                echo "</tr>";
                foreach($row as $row){
                    $licznik++;
                    echo "<tr class='tr_uczen'>";
                    echo "<td class='td_uczen td_5'>" . $licznik . "</td>";
                    echo "<td class='td_uczen'>" . $row['pesel'] . "</td>";
                    echo "<td class='td_uczen'>" . $row['imie'] . "</td>";
                    echo "<td class='td_uczen'>" . $row['nazwisko'] . "</td>";
                    echo "<td class='td_uczen col-200'>" . $name . "</td>";
                    echo "<td class='td_uczen col-200 td_10'>" . $row[$profile] . "</td>";
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

    public function drawClassTableAll(string $data){
        try{
            $pdo = $this->conn;
            $sql = "SELECT pesel,imie,nazwisko,wybor1,wybor2,wybor3 FROM $this->table_name WHERE $data > 0";
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
                    echo "<td class='td_uczen td_5'>" . $licznik . "</td>";
                    echo "<td class='td_uczen'>" . $row['pesel'] . "</td>";
                    echo "<td class='td_uczen'>" . $row['imie'] . "</td>";
                    echo "<td class='td_uczen'>" . $row['nazwisko'] . "</td>";
                    echo "<td class='td_uczen'>" . $row['wybor1'] . "</td>";
                    echo "<td class='td_uczen'>" . $row['wybor2'] . "</td>";
                    echo "<td class='td_uczen'>" . $row['wybor3'] . "</td>";
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
                    echo "<td class='td_uczen'>" . $row['id'] . "</td>";
                    echo "<td class='td_uczen'>" . $row['pesel'] . "</td>";
                    echo "<td class='td_uczen'>" . $row['imie'] . "</td>";
                    echo "<td class='td_uczen'>" . $row['nazwisko'] . "</td>";
                    echo "<td class='td_uczen w-33 r-text-td'>" . $row['wybor1'] . "</td>";
                    echo "<td class='td_uczen w-33 r-text-td'>" . $row['wybor2'] . "</td>";
                    echo "<td class='td_uczen w-33 r-text-td'>" . $row['wybor3'] . "</td>";
                    echo "<td class='td_uczen'><a href=\"#\" onclick=\"confirmDelete('classes/FormHandler.class.php?id={$row['id']}')\"><img src='../../img/icon/user-minus-solid.svg' style='width:16px;'></td>";
                    echo "<td class='td_uczen'><a href=\"../editform.php?id={$row['id']}\"><img src='../../img/icon/user-edit-solid.svg' style='width:16px;'></td>";
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
}
?>