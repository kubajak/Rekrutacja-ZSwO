<?php
include "bdconfig/Dbh.php";

class FormHandler{
    private $conn;
    private $table_name ="rekrutacja_uczen_tbl";

    public function __construct(){
        $dbh = new Dbh();
        $this->conn = $dbh->connect();
    } 
    
    public function add($form_data){

    }

    public function edit($form_data){

    }

    public function remove($form_data){
        
    }
}
?>