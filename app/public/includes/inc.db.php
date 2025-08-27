<?php 

// koppling till databasen

$server = "mysql";
$db = "db_case";
$user = "db_user";
$password = "db_password";

try {
    $pdo = new PDO("mysql:host=$server;dbname=$db", $user, $password);

    // echo "Databasen är kopplad";

} catch (PDOException $e) {
    echo "Connection Failed: " . $e->getMessage();
}



