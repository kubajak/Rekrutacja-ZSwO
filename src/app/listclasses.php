<?php require_once "../../vendor/autoloader/autoloader.php"; ?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZS - System rekrutacyjny</title>
    <link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" media="screen" href="../css/root.css">
    <link rel="stylesheet" media="screen" href="../css/style.css">
    <script defer src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Inter:200,300,400,600,700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../../img/icon/website_icon/logo.png" />
    <script defer src="../js/ShowCurrentYear.js"></script>
</head>

<body>
    <!-- SIDENAV( BOCZNE MENU ) -->
    <div class="sidenav">
        <div id="sidenav-wrapp">
            <div class="sidenav-title">
                <h3>System rekrutacyjny</h3>
                <hr />
            </div>
        </div><br><br><br>
        <nav>
            <li class="btn-background"><a href="public/index.php"><img src="../../img/icon/nav_icon/home-solid.svg">Home</a></li>
            <li class="btn-background"><a href="addform.php"><img src="../../img/icon/nav_icon/user-plus-solid.svg">Dodaj Ucznia</a></li>
            <li class="btn-background"><a href="list.php"><img src="../../img/icon/nav_icon/list-alt-solid.svg">Lista Uczniów</a></li>
            <li class="btn-background"><a href="listclasses.php"><img src="../../img/icon/nav_icon/book-solid.svg">Wyświetl klasy</a></li>
            <li class="btn-background"><a href="../../index.html"><img src="../../img/icon/nav_icon/sign-out-alt-solid.svg">WYJDŹ</a></li>
        </nav>
        <hr class="footer-line" />
        <div class="footer" style="float: left"><span id="span_footer"></span></div>
    </div>
    <!-- HEADER ( GÓRNA (CZARNY PASEK) ) -->
    <div class="main">
        <div class="header">
            <div class="header-col"><span>Profile</span></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <a href="profiles/akademicki.php" class="a_klasa">
                        <div class="box-class blue"><img src="../../img/icon/class_icon/graduation-cap-solid.svg">
                            <h1>Profil</h1><span>Akademicki</span>
                        </div>
                    </a>
                    <a href="profiles/prozdrowotny.php" class="a_klasa">
                        <div class="box-class orange"><img src="../../img/icon/class_icon/child-solid.svg">
                            <h1>Profil</h1><span>Prozdrowotny</span>
                        </div>
                    </a>
                    <a href="profiles/mundurowy.php" class="a_klasa">
                        <div class="box-class green"><img src="../../img/icon/class_icon/fighter-jet-solid.svg">
                            <h1>Profil</h1><span>Mundurowy</span>
                        </div>
                    </a>
                    <a href="profiles/sportowy.php" class="a_klasa">
                        <div class="box-class purple"><img src="../../img/icon/class_icon/running-solid.svg">
                            <h1>Profil</h1><span>Sportowo Turystyczny, Sportowy</span>
                        </div>
                    </a>
                    <a href="profiles/matematyczny.php" class="a_klasa">
                        <div class="box-class mint"><img src="../../img/icon/class_icon/square-root-alt-solid.svg">
                            <h1>Profil</h1><span>Matematyczno Inżynieryjny</span>
                        </div>
                    </a>
                    <a href="profiles/logistyczny.php" class="a_klasa">
                        <div class="box-class red"><img src="../../img/icon/class_icon/truck-solid.svg">
                            <h1>Profil</h1><span>Logistyczny</span>
                        </div>
                    </a>
                    <a href="profiles/informatyczny.php" class="a_klasa">
                        <div class="box-class gray"><img src="../../img/icon/class_icon/laptop-code-solid.svg">
                            <h1>Profil</h1><span>Informatyczny</span>
                        </div>
                    </a>
                    <a href="profiles/wielozawodowy.php" class="a_klasa">
                        <div class="box-class dark_blue"><img src="../../img/icon/class_icon/tools-solid.svg">
                            <h1>Profil</h1><span>Wielozawodowy</span>
                        </div>
                    </a>
                    <a href="profiles/wszyscy.php" class="a_klasa">
                        <div class="box-class pink"><img src="../../img/icon/class_icon/user-friends-solid.svg">
                            <h1>Wszyscy</h1><span>Uczniowie</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>