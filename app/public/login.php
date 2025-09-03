<?php
declare(strict_types=1);

session_start();

include_once "includes/inc.db.php";

$title = "Log in";

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];


    // Kontrollera att båda fälten finns och inte är tomma
    if (empty($username) || empty($password)) {
        echo "<p>Fill in both fields!</p>";
    }

    $stmt = $pdo->prepare("SELECT * FROM `users` WHERE `username` = :username");
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $user = $stmt->fetch();

    if (!$user) {
        echo 'The user does not exist. Navigate to the <a href="/register.php">register page</a> to create an account.';
        exit;
    }

    if (password_verify($password, $user['password'])) {

        // Om lösenorden matchar - Användaren loggas in
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_id'] = $user['id'];

        // Dirigeras startsidan

        header('Location: /index.php');
        die();

    } else {
        echo "Wrong password...";
    }
   
}

if($_SERVER['REQUEST_METHOD'] === "GET") {

}

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

    <div class="login-page">
        <img src="./img/Divider-Blue.png" alt="divider">
        <h1><?= $title ?></h1>

    <form method="POST" action="">
        <label for="username">Username:</label><br>    
        <input type="text" name="username" id="username" required><br>

        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password" required><br>

        <button type="submit" id="log-in-btn">Log in</button>
    </form>
    
    </div>

    <?php
    include "includes/footer.php";
    ?>
</body>
</html>