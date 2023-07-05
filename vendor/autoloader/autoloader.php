<?php
spl_autoload_register(function ($nazwaKlasy) {
    // Zamień przestrzeń nazw na ścieżkę pliku
    $sciezkaPliku = str_replace('\\', '/', $nazwaKlasy) . '.php';

    // Sprawdź, czy plik istnieje
    if (file_exists($sciezkaPliku)) {
        require $sciezkaPliku;
    }
});   
?>