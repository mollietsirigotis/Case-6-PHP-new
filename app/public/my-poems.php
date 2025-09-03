<?php

declare(strict_types=1);

session_start();

include_once "includes/inc.db.php";

$title = "My Poems";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
}

if ($_SERVER['REQUEST_METHOD'] === "GET") {

    $id = $_GET['id'] ?? null;

    if ($id) {

        // Hämtar alla kolumner från poems tabellen och kopplar ihop dikten med författare

        $sql = "SELECT poems.*, users.username FROM poems JOIN users ON poems.user_id = users.id WHERE poems.id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $poem = $stmt->fetch();
    }
}

// Hämtar alla dikter skrivna av inloggade användaren från poems och användarnamn från users

        $sql = "SELECT poems.*, users.username 
        FROM poems 
        JOIN users ON poems.user_id = users.id 
        WHERE poems.user_id = :user_id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
        $stmt->execute();

        $rows = $stmt->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

    <?php
    include "includes/header.php";
    ?>
    <?php
    include "includes/nav.php";
    ?>

    <div class="my-poems-page">
        <h1><?= $title ?></h1>
        <img src="./img/Feather-Pen.png" alt="Feather Pen">

        
            <?php
            foreach ($rows as $row) {
                echo '<div class="poem-card">';

                echo '<div class="my-poems-content">';
                echo '<h3>';
                echo $row['title'];
                echo '</h3>';

                echo '<p>';
                echo nl2br($row['poem']);
                echo '</p>';

                echo $row['username'];
                echo '</div>';
                

                echo '<div class="poem-buttons">';
                echo '<a href="edit-poem.php?id=' . $row['id'] . '" class="edit-button"><img src="./img/edit-pen-icon.png" alt="Pen icon"></a> ';
                echo '<a href="delete-poem.php?id=' . $row['id'] . '" class="delete-button" name="delete" onclick="return confirm(\'Are you sure you want to delete this poem?\');"><img src="./img/delete-bin-icon.png" alt="Delete icon"></a>';
                echo '</div>';
                echo '</div>';
                
            }
                ?>
            
        
    </div>
    <?php
        include "includes/footer.php";
        ?>
</body>

</html>