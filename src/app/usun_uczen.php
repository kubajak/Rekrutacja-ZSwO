<?php
    $ID = $_GET['id'];
    include("bdconfig/baza_connect.php");
    $dane = _connect();
    $connect = mysqli_connect($dane[0], $dane[1], $dane[2]);

    if (!$connect)
    {
        echo "Problem z połączeniem bazy danych";
        header("Location:error_polonczenie.php");
    }
    if (!mysqli_select_db($connect, $dane[3]))
    {
        echo "Baza danych nie wybrana";
        header("Location:error_brak_bazy.php");
    }
    
    $usun_uczen = "DELETE FROM $dane[4] WHERE id= ".$ID."";

    if (!mysqli_query($connect, $usun_uczen))
    {
        echo "Nie Usunięto";
        $connect->close();
    }
    else
    {
        echo "Usunięto";
        $connect->close();
    }
    header("Location:lista.php");
?>
