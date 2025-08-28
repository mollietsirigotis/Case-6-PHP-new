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
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
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