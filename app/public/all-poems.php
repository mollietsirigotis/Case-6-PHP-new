<?php

declare(strict_types=1);

session_start();

include_once "includes/inc.db.php";

$title = "All Poems";

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

// Hämtar alla dikter från poems och användarnamn från users

$sql = "SELECT poems.*, users.username FROM poems JOIN users ON poems.user_id = users.id";
$stmt = $pdo->query($sql);
$rows = $stmt->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
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

    <div class="all-poems-page">
        <h1><?= $title ?></h1>
        <img src="./img/Feather-Pen.png" alt="Feather Pen">

        
            <?php
            foreach ($rows as $row) {
                echo '<div class="poem-card">';

                echo '<div class="all-poems-content">';
                echo '<h3>';
                echo $row['title'];
                echo '</h3>';
                
                
                echo '<p>';
                echo $row['poem'];
                echo '</p>';
                
                
                echo $row['username'];
                
                echo '</div>';
                echo '</div>';
            }
            ?>
        <?php
    include "includes/footer.php";
    ?>
    </div>
    
</body>

</html>