<?php
declare(strict_types=1);

session_start();

include_once "includes/inc.db.php";

$title = "Register";

if ($_SERVER['REQUEST_METHOD'] === "POST") {


    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $is_matching = $password == $password2;

    if (!$is_matching) {
        echo "<p>Password not matching!</p>";
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    // Kollar om användarnamnet redan finns i databasen

    $username = $_POST['username'];
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(":username", $username);
    $result = $stmt->execute();

    $users = $stmt->fetchAll();
    // echo $result;

    $user_already_exists = count($users) > 0;
    if ($user_already_exists) {
        echo "<p>The username is taken</p>";
    }

    // Dubbelkollar att användarnamnet är ledigt och att lösenorden matchar

    if (!$user_already_exists && $is_matching) {
        // Spara användaren i databasen
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $hashed_password);
        $result = $stmt->execute();

        // Skickar ut reseultatet till användaren
        if ($result) {
            echo "<p>Successfully registered, please navigate to: <a href='/login.php'>Log in</a></p>";
        } else {
            echo "<p>Register failed. Try again</p>";
        }
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
    <title><?=$title ?></title>
    <link rel="stylesheet" href="styles/style.css">  
</head>
<body>

    <?php
    include "includes/header.php";
    ?>
    <?php
    include "includes/nav.php";
    ?>

    <div class="register-page">
        <img src="./img/Divider-Blue.png" alt="divider">
        <h1><?= $title ?></h1>

    <form method="POST"action="">
        <label for="username">Username:</label><br>
        <input type="text" name="username" id="username" required><br>

        <label for="password">Password:</label><br>
        <input type="password" name="password" id=""password required><br>

        <label for="password2">Confirm password:</label><br>
        <input type="password" name="password2" id="password2" required><br>

        <button type="submit" id="register-btn">Register</button>
    </form>

    </div>

    <?php
    include "includes/footer.php";
    ?>

</body>
</html>