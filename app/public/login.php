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

    if (password_verify($password, $user['password'])) {

        // Om lösenorden matchar - Användaren loggas in
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_id'] = $user['id'];

        // Dirigeras my-poems.php sidan

        header('Location: /my-poems.php');
        exit;

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

    <div class="login-page">
        <img src="./img/Divider-Blue.png" alt="divider">
        <h1><?= $title ?></h1>

    <form method="POST" action="">
        <label for="username">Username:</label><br>    
        <input type="text" name="username" id="username" required><br>

        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password" required><br>

        <button type="submit">Log in</button>
    </form>
    
    </div>

    <?php
    include "includes/footer.php";
    ?>
</body>
</html>