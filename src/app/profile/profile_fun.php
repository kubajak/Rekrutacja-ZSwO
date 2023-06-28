<?php
include("../bdconfig/baza_connect.php");
$dane = _connect();
function profile_fun_wypis($profil,$profil_nazwa)
{
    global $dane;
    $connect = mysqli_connect($dane[0],$dane[1],$dane[2]);
    if(!$connect)
    {
        echo "Problem z połączeniem bazy danych";
        header("Location:../error_polonczenie.php");
    }

    if (!mysqli_select_db($connect, $dane[3]))
    {
        echo "Baza danych nie wybrana";
        header("Location:../error_brak_bazy.php");
    }

    $wypis_profile = "SELECT pesel,imie,nazwisko,$profil FROM $dane[4] WHERE $profil > 0
    ORDER BY $profil DESC";

    $wypis = mysqli_query($connect,$wypis_profile);
    $licznik = 0;
    $connect -> close();

    if(mysqli_num_rows($wypis) > 0)
    {
        echo "<div class='div_tabela'>";
        echo "<table class='table_uczen'>";
        echo "<tr class='tr_uczen'>";
        echo "<th class='th_uczen'>Lp.</th>";
        echo "<th class='th_uczen'>Pesel</th>";
        echo "<th class='th_uczen'>Imię</th>";
        echo "<th class='th_uczen'>Nazwisko</th>";
        echo "<th class='th_uczen'>Profil</th>";
        echo "<th class='th_uczen'>Punkty</th>";
        echo "</tr>";

        while($r = mysqli_fetch_assoc($wypis))
        {
            $licznik++;
            echo "<tr class='tr_uczen'>";
            echo "<td class='td_uczen td_5'>" . $licznik . "</td>";
            echo "<td class='td_uczen'>" . $r['pesel'] . "</td>";
            echo "<td class='td_uczen'>" . $r['imie'] . "</td>";
            echo "<td class='td_uczen'>" . $r['nazwisko'] . "</td>";
            echo "<td class='td_uczen col-200'>" . $profil_nazwa . "</td>";
            echo "<td class='td_uczen col-200 td_10'>" . $r[$profil] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    }
}
?>
