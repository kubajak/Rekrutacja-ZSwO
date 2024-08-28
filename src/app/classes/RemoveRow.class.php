<?php
require_once "DatabaseHandler.class.php";

class RemoveRow
{

    private $dbh;

    public function __construct()
    {
        $this->dbh = new DatabaseHandler();
    }

    public function remove(int $id): void
    {
        try {
            $this->dbh->removeRowFromDatabase($id);

            throw new Exception("Próba usunięcia nie powiodła się");
        } catch (Throwable $e) {
            echo $e->getMessage();
        }
    }
}

if (isset($_GET['id'])) {
    $RemoveRow = new RemoveRow();
    $RemoveRow->remove($_GET['id']);
}
