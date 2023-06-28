<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Matematyczno Inżynieryjny</title>
    <link rel="stylesheet" href="../../../vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" media="screen" href="../../css/style.css">
    <link rel="stylesheet" media="screen" href="../../css/root.css">
    <link rel="stylesheet" media="screen" href="../../css/profile.css">
    <link rel="stylesheet" media="print" href="../../css/profile_print.css">
    <link href="https://fonts.googleapis.com/css?family=Inter:200,300,400,600,700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../../../img/icon/website_icon/logo.png" />
    <script type="text/javascript" src="../../js/skrypt.js"></script>
</head>

<body>
    <div class="btn-box">
        <div class="container">
            <div class="row">
                <div class="col">
                    <a href="../klasa.php"><input type="button" class="btn btn-success btn-lg text-white btn-block" value="Powrót"></a>
                </div>
                <div class="col">
                    <input type="button" class="btn btn-danger btn-lg text-white btn-block" value="Drukuj" onclick="window.print()">
                </div>
                <div class="col">
                    <input type="button" class="btn btn-warning btn-lg text-white btn-block" value="Zapisz" onclick="window.print()">
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2>Wszyscy Uczniowie</h2>
            </div>
        </div>
    </div>
    
    <?php
        include("../bdconfig/baza_connect.php");
        $dane = _connect();
        function profile_wszyscy()
        {
            global $dane;
            $connect = mysqli_connect($dane[0], $dane[1], $dane[2]);

            if (!$connect) 
            {
                echo "Problem z połączeniem bazy danych";
                header("Location:../error_polonczenie.php");
            }

            if (!mysqli_select_db($connect, $dane[3]))
            {
                echo "Baza danych nie wybrana";
                header("Location:../error_brak_bazy.php");
            }

            $wypis_profile = "SELECT pesel,imie,nazwisko,wybor1,wybor2,wybor3 FROM $dane[4]";

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
                echo "<th class='th_uczen'>Wybór 1</th>";
                echo "<th class='th_uczen'>Wybór 2</th>";
                echo "<th class='th_uczen'>Wybór 3</th>";
                echo "</tr>";

                while($r = mysqli_fetch_assoc($wypis))
                {
                    $licznik++;
                    echo "<tr class='tr_uczen'>";
                    echo "<td class='td_uczen td_5'>" . $licznik . "</td>";
                    echo "<td class='td_uczen col-200'>" . $r['pesel'] . "</td>";
                    echo "<td class='td_uczen col-200'>" . $r['imie'] . "</td>";
                    echo "<td class='td_uczen col-200'>" . $r['nazwisko'] . "</td>";
                    echo "<td class='td_uczen'>" . $r['wybor1'] . "</td>";
                    echo "<td class='td_uczen'>" . $r['wybor2'] . "</td>";
                    echo "<td class='td_uczen'>" . $r['wybor3'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
            }
        }
        profile_wszyscy();
    ?>
</body>

</html>