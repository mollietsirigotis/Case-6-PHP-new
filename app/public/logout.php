<?php
declare(strict_types=1);

session_start();

include_once "includes/inc.db.php";

// Logga ut
session_destroy();

// Nollställer datan i arrayen
$_SESSION = [];

$title = "Log out";

if ($_SERVER['REQUEST_METHOD'] === "POST") {

}

if($_SERVER['REQUEST_METHOD'] === "GET") {

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="styles/style.css">  
</head>
<body>

    <?php
    include "includes/header.php";
    ?>
    <?php
    include "includes/nav.php";
    ?>

    <div class="logout-page">
    
    <h3>Successfully Logged out!</h3><br>
    <p>Go back to:</p>
    <a href="/"> Start page</a>


    </div>


    <?php
    include "includes/footer.php";
    ?>
</body>
</html>