<?php

declare(strict_types=1);

session_start();

include_once "includes/inc.db.php";

$title = "Poemify";

if ($_SERVER['REQUEST_METHOD'] === "POST") {

}

if($_SERVER['REQUEST_METHOD'] === "GET") {

}

$title = "Write Poem";


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

    <div class="write-poem-page">

        <form action="">
            <input type="text" name="title" id="title" placeholder="Title..." required><br>
            <textarea name="poem" id="poem" placeholder="Write poem here..." required></textarea><br>
            <input type="submit" value="Save" id="submit">
        </form>

        <!-- Visa tabellens innehåll -->

    <?php
    include "includes/footer.php";
    ?>
</body>

</html>