<?php

declare(strict_types=1);

session_start();

include_once "includes/inc.db.php";

$title = "Poemify";

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $title = $_POST['title'] ?? null;
    $poem = $_POST['poem'] ?? null;
    $user_id = $_POST['user_id'] ?? NULL;

    if ($title && $poem) {

        // sql syntax med namngivna platshållare
        $sql = "INSERT INTO `poems` (`title`, `poem`, `user_id`) VALUES (:title, :poem, :user_id)";

        // Instruktion för att exekvera kommando baserat på sql

        $stmt = $pdo->prepare($sql);

        // Koppla namngivna platshållare till variabler occh datatyp
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':poem', $poem, PDO::PARAM_STR);
        $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);

        // Sparar dikten i databasen
        $result = $stmt->execute();

        if ($result) {
            // Till my-poems sidan efter dikten har sparats
            header("Location: my-poems.php?saved=1");
            exit;
        } else {
            echo "The poem was not saved";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === "GET") {

   
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


        <img src="./img/Divider-Blue.png" alt="divider">

        <h1><?= $title ?></h1>

        <?php if (isset($_SESSION['username'])) { ?>


            <form action="" method="post">
                <input type="text" name="title" id="title" placeholder="Title..." required><br>
                <textarea name="poem" id="poem" placeholder="Write poem here..." required></textarea><br>
                <input type="submit" value="Save" id="submit">
            </form>


        <?php } ?>
    <?php
    include "includes/footer.php";
    ?>
</body>

</html>