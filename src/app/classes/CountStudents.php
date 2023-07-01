<?php
require "bdconfig/Dbh.php";

class CountStudents extends Dbh{

    public function CountStudentsForEachClass($data){
        try{
            $pdo = $this->connect();
            $sql = "SELECT count($data) AS total FROM rekrutacja_uczen_tbl WHERE $data > 0";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $count = $stmt->fetchColumn();
            
            return $count;
            
        } catch(PDOException $e){
            echo $e->getMessage();
            die();
        }    
    }

    public function CountAllStudents($data){
        try{
            $pdo = $this->connect();
            $sql = "SELECT count($data) AS total FROM rekrutacja_uczen_tbl WHERE $data > 0";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            $count = $stmt->fetchColumn();

            return $count;

        } catch(PDOException $e){
            echo $e->getMessage();
            die();
        }
    }
}
?>