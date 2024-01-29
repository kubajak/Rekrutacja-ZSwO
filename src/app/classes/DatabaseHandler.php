<?php
include "bdconfig/Dbh.php";

class DatabaseHandler{
    private $conn;
    
    public function __construct(){
        $dbh = new Dbh();
        $this->conn = $dbh->connect();
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