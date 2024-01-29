<?php
include "bdconfig/Dbh.php";

class CountStudents{
    private $conn;
    private $table_name ="rekrutacja_uczen_tbl";

    public function __construct(){
        $dbh = new Dbh();
        $this->conn = $dbh->connect();
    }

    public function countAllStudents($data){
        try{
            $sql = "SELECT count($data) AS total from $this->table_name WHERE $data > 0";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            $count = $stmt->fetchColumn();
            
            return $count;

        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function countStudentsForEachClass($data){
        try{
            $sql = "SELECT count($data) AS total from $this->table_name WHERE $data > 0";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            $count = $stmt->fetchColumn();
            
            return $count;

        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}
?>