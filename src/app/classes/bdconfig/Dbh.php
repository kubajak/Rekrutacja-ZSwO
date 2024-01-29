<?php
class Dbh{
    private $servername; // Nazwa serwera MySQL
    private $username;   // Nazwa użytkownika do logowania do bazy danych
    private $password;   // Hasło użytkownika do logowania do bazy danych
    private $dbname;     // Nazwa bazy danych, z którą ma być nawiązane połączenie
    private $charset;    // Kodowanie znaków używane w bazie danych

    public function connect(){
        // Metoda do nawiązywania połączenia z bazą danych

        $this->servername = "localhost"; // Przypisanie wartości "localhost" do zmiennej $servername (nazwa serwera MySQL)
        $this->username = "root";        // Przypisanie wartości "root" do zmiennej $username (nazwa użytkownika do logowania do bazy danych)
        $this->password = "";            // Przypisanie pustej wartości do zmiennej $password (hasło użytkownika do logowania do bazy danych)
        $this->dbname = "rekrutacja";    // Przypisanie wartości "rekrutacja" do zmiennej $dbname (nazwa bazy danych, z którą ma być nawiązane połączenie)
        $this->charset = "utf8mb4";      // Przypisanie wartości "utf8mb4" do zmiennej $charset (kodowanie znaków używane w bazie danych)

        try{
            $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset; 
            // Tworzenie ciągu DSN (Data Source Name) zawierającego informacje o serwerze, bazie danych i kodowaniu znaków

            $pdo = new PDO($dsn,$this->username,$this->password); 
            // Tworzenie obiektu PDO (PHP Data Object) dla nawiązania połączenia z bazą danych, przekazując do konstruktora wartości zmiennych $dsn, $username i $password

            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
            // Ustawienie atrybutu PDO na tryb zgłaszania błędów w przypadku wystąpienia wyjątków

            return $pdo; // Zwrócenie obiektu PDO reprezentującego połączenie z bazą danych
        } catch(PDOException $e) {
            echo "Nie udane połączenie: ".$e->getMessage(); 
            // Wyświetlenie komunikatu o nieudanym połączeniu w przypadku wystąpienia błędu i wypisanie treści błędu z obiektu $e (PDOException)
        }
    }
}
?>


