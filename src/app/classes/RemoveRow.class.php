<?php
require_once "DatabaseHandler.class.php";

class RemoveRow{

    private $dbh;

    public function __construct(){
        $this->dbh = new DatabaseHandler();
    }

    public function remove(int $id){
        try{
            $this->dbh->removeRowFromDatabase($id);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
}

if(isset($_GET['id'])){
    $RemoveRow = new RemoveRow();
    $RemoveRow->remove($_GET['id']);
}
?>