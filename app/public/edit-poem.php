<?php

declare(strict_types=1);

session_start();

include_once "includes/inc.db.php";

// Skapar variablerna
$title = "";
$poem = "";
$poem_id = 0;

// Kollar att användaren är inloggad annars skickas den till login sidan
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Efter användaren tryckt på update knappen
if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $title = $_POST['title'] ?? null;
    $poem = $_POST['poem'] ?? null;
    $poem_id = $_POST['poem_id'] ?? null;


    // Kör uppdatering om update knappen tryckts på
    if (isset($_POST['update'])) {

        // Uppdaterar raden i tabellen poems
        $sql = "UPDATE poems 
                SET title = :title, poem = :poem 
                WHERE id = :poem_id 
                AND user_id = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':poem', $poem, PDO::PARAM_STR);
        $stmt->bindValue(':poem_id', $poem_id, PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
        $result = $stmt->execute();

        // Om det uppdateras så skickas användaren till my-poems sidan och får ?updated= i URLen
        if ($result) {
            header("Location: my-poems.php?updated=1");
            exit;
        } else {
            echo "The poem could not be updated";
        }
    }
}

// Hämtar dikten från databasen
if ($_SERVER['REQUEST_METHOD'] === "GET") {

    // Dikten som ska hämtas
    $id = $_GET['id'] ?? null;

    // Kör sql om det är ett giltigt id
    if ($id) {
        $sql = "SELECT poems.*, users.username 
            FROM poems 
            JOIN users ON poems.user_id = users.id 
            WHERE poems.id = :id AND poems.user_id = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch();

        // Gör så att formuläret är förifyllt när man kommer till sidan
        if ($row) {
            $title = $row['title'];
            $poem = $row['poem'];
            $poem_id = $row['id'];
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Poem</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

    <?php
    include "includes/header.php";
    ?>
    <?php
    include "includes/nav.php";
    ?>

    <div class="edit-poem-page">


        <img src="./img/Divider-Blue.png" alt="divider">

        <h1>Edit Poem</h1>

        <?php if (isset($_SESSION['username'])) { ?>


            <form action="" method="post">
                <input type="text" name="title" id="title" value="<?= $title ?>" placeholder="Title..." required><br>
                <textarea name="poem" id="poem" placeholder="Write poem here... (1-500 characters)" required><?= $poem ?></textarea>

                <input type="hidden" name="poem_id" value="<?= $poem_id ?>">
                <input type="submit" value="Update" name="update">

                <?php
                ?>
            </form>
        <?php } ?>
    </div>
        <?php
        include "includes/footer.php";
        ?>
</body>

</html>