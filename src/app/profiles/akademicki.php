<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Akademicki</title>
    <link rel="stylesheet" href="../../../vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" media="screen" href="../../css/style.css">
    <link rel="stylesheet" media="screen" href="../../css/root.css">
    <link rel="stylesheet" media="screen" href="../../css/profile.css">
    <link rel="stylesheet" media="print" href="../../css/profile_print.css">
    <link href="https://fonts.googleapis.com/css?family=Inter:200,300,400,600,700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../../../img/icon/website_icon/logo.png" />
</head>
<body>
    <div class="btn-box">
        <div class="container">
            <div class="row">
                <div class="col">
                    <a href="../listclasses.php"><input type="button" class="btn btn-success btn-lg text-white btn-block" value="Powrót"></a>
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
    <div class="container" id="pdf_container">
        <div class="row">
            <div class="col text-center">
                <h2>Profil Akademicki</h2>
            </div>
        </div>
    </div>
    <?php
        require "../../../vendor/autoloader/autoloader.php";
        $drawClassTable = new DrawClassTable();
        $drawClassTable->drawClassTable("profil_akademicki","Profil Akademicki");
    ?>
</body>
</html>