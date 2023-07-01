<?php
require 'bdconfig/Dbh.php';
class Remove extends Dbh{
    private $id;
    public function removeStudent(){
        try{
            $this->id = $_GET['id'];
            $pdo = $this->connect();
            $sql = "DELETE FROM rekrutacja_uczen_tbl WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$this->id]);
            header("Location: ../list.php");
        } catch(PDOException $e){
            echo $e->getMessage();
            die();
        }
    }
}

$remove = new Remove();
$remove->removeStudent();
?>