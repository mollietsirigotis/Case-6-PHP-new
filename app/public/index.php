<?php

declare(strict_types=1);

session_start();

include_once "includes/inc.db.php";

$title = "Poemify";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
}

if ($_SERVER['REQUEST_METHOD'] === "GET") {
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

    <div class="start-page">
        <img src="./img/Divider-Blue.png" alt="divider">
        

        <?php
        if (isset($_SESSION['username'])) {

            // Visa vem som är inloggad
            // Länk till att logga ut ...  
            echo "<h1>Welcome " . $_SESSION['username'] . "!</h1>";
            echo '<p> 
                    Write poems and save them in a database where<br>
                    you can easily access them and edit them.<br>
                    Read other users poems, your own poems or<br>
                    start writing a new one!
                </p>';
                echo '<div id="button-container">
                <a href="/all-poems.php">All poems</a>
                <a href="/my-poems.php">My poems</a>
                <a href="/write-poem.php">Write Poem</a>
                </div>
                </div>';
        } else {

            echo '<h1>Welcome to Poemify!</h1>';
            echo '<p>
                    Write poems and save them in a database where<br>
                    you can easily access them and edit them.<br>
                    Log in if you already have an account<br>
                    or register down below!
                </p>';



            echo '<div id="button-container">
                <a href="/login.php">Log in</a>
                <a href="/register.php">Register</a>
                </div>
                </div>';
        }
        ?>
        <?php
        include "includes/footer.php";
        ?>
</body>

</html>