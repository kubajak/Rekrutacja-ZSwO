<?php
include("bdconfig/baza_connect.php");
$dane = _connect();
function lista()
{
    global $dane;
    @$connect = mysqli_connect($dane[0],$dane[1],$dane[2]);

    if(!$connect)
    {
        echo "Problem z połączeniem do bazy danych";
        header("Location:error_polonczenie.php");
    }
    if(!mysqli_select_db($connect, $dane[3]))
    {
        echo "Baza danych nie wybrana";
        header("Location:error_brak_bazy.php");
    }

    $edycja = "SELECT id,pesel,imie,nazwisko,wybor1,wybor2,wybor3 FROM $dane[4]";
    $wpis = mysqli_query($connect, $edycja);
    $connect->close();
    if(mysqli_num_rows($wpis) > 0)
    {
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
        while($r = mysqli_fetch_assoc($wpis))
        {
            echo "<tr class='tr_uczen'>";
            echo "<td class='td_uczen'>" . $r['id'] . "</td>";
            echo "<td class='td_uczen'>" . $r['pesel'] . "</td>";
            echo "<td class='td_uczen'>" . $r['imie'] . "</td>";
            echo "<td class='td_uczen'>" . $r['nazwisko'] . "</td>";
            echo "<td class='td_uczen w-33 r-text-td'>" . $r['wybor1'] . "</td>";
            echo "<td class='td_uczen w-33 r-text-td'>" . $r['wybor2'] . "</td>";
            echo "<td class='td_uczen w-33 r-text-td'>" . $r['wybor3'] . "</td>";
            echo "<td class='td_uczen'><a href=\"usun_uczen.php?id={$r['id']}\"><img src='../../img/icon/user-minus-solid.svg' style='width:16px;'></td>";
            echo "<td class='td_uczen'><a href=\"edit.php?id={$r['id']}\"><img src='../../img/icon/user-edit-solid.svg' style='width:16px;'></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    }
    else
    {
        echo "<span id='NoElements'>Brak wyników</span>";
    }
}
?>
