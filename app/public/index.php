<?php
declare(strict_types=1);

session_start();

include_once "includes/inc.db.php";

$title = "Poemify";

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

    <div class="start-page">
        <img src="./img/Divider-Blue.png" alt="divider">
    <h1>Welcome to Poemify!</h1>
    <p>
        Write poems and save them in a database where<br>
        you can easily access them and edit them.<br>
        Log in if you already have an account<br>
        or register down below!
    </p>

    

    <div id="button-container">
        <a href="/login.php">Log in</a>
        <a href="/register.php">Register</a>
    </div>
    </div>

   

    <?php
    include "includes/footer.php";
    ?>
</body>
</html>