<?php
spl_autoload_register(function ($className) {
    // Zamień namespace separator na separator ścieżki
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);

    // Ścieżka do klasy w stosunku do katalogu z klasami
    $classFile = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . $className . '.php';

    // Sprawdź, czy plik istnieje i załaduj go
    if (file_exists($classFile)) {
        require $classFile;
    }
});
?>