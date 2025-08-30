<?php

declare(strict_types=1);

session_start();

include_once "includes/inc.db.php";

// Kollar att användaren är inloggad annars skickas den till login sidan
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Hämtar diktens id från URL
$poem_id = $_GET['id'] ?? null;

    // Om id finns - försök radera dikten
    if ($poem_id) {
        // sql för att radera dikten om den tillhör inloggad användare
        $sql = "DELETE FROM `poems` WHERE `id` = :poem_id AND `user_id` = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':poem_id', $poem_id, PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
        $result = $stmt->execute();

        // Kör sql-frågan
        if ($result) {
            header("Location: my-poems.php?deleted=1");
            exit;
        } else {
            echo "Could not delete poem";
        }
    }
?>