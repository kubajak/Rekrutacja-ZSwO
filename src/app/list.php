<?php require_once "../../vendor/autoloader/autoloader.php"; ?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZS - System rekrutacyjny</title>
    <link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" media="screen" href="../css/style.css">
    <link rel="stylesheet" media="screen" href="../css/root.css">
    <link rel="stylesheet" media="screen" href="../css/tables.css">
    <link href="https://fonts.googleapis.com/css?family=Inter:200,300,400,600,700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../../img/icon/website_icon/logo.png" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script defer src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script defer src="../js/confirmDelete.js"></script>
    <script defer src="../js/confirmEdit.js"></script>
    <script defer src="../js/ShowCurrentYear.js"></script>
    <script defer src="../js/liveSearch.js"></script>
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
        <div id="dialog-confirm" title="Czy napewno chcesz to zrobić?"></div>
        <div class="header">
            <div class="header-col">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <span>Lista Uczniów</span>
                            <form style="float: right;" autocomplete="off">
                                <input type="number" id="searchInput" pattern="[0-9]+" placeholder="Wyszukaj ucznia" onkeyup="liveSearch()">
                            </form>
                            <div style="clear: both;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="searchResults"></div>
    </div>
</body>

</html>