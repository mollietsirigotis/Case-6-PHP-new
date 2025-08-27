<?php 

// koppling till databasen

$server = "mysql";
$db = "db_case";
$user = "db_user";
$password = "db_password";

// Ange förvalt att resultat ska vara en associativ array

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $pdo = new PDO("mysql:host=$server;dbname=$db", $user, $password, $options);

    // echo "Databasen är kopplad";

} catch (PDOException $e) {
    echo "Connection Failed: " . $e->getMessage();
}



