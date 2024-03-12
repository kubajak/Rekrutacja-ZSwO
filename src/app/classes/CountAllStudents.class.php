<?php
require_once "bdconfig/Dbh.php";

class CountAllStudents{
    
    private $conn;
    private string $table_name = "rekrutacja_uczen_tbl";

    public function __construct(){
        $db = new Dbh();
        $this->conn = $db->connect();
    }

    public function countAllStudents(string $data): mixed{
        try{
            $pdo = $this->conn;
            
            $sql = "SELECT count($data) AS total from $this->table_name WHERE $data > 0";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $count = $result['total']; 

            return $count;

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function __destruct(){
        $this->conn = null;
    }
}
?>