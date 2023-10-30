<?php

include 'core/database.php';
$_U = new user( );

$result = "";
if (array_key_exists("login_btn", $_POST)) {
    $t = $_U->login($_POST["username_in"], $_POST["password_in"]);

    if ($t == -1) {
        $result = "Nepareizs lietotājvārds un/vai parole.";
    } else {
        // 7 days
        setcookie("user_id", $t, time( ) + 604800, "/");
        header("Location: ./");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="globalStyle.css">
    <title>Pasta Hub Login</title>
</head>
<body>
    <main>
        <header class="header">
            <span>
                <a href="./index.php">Pasta HUB</a>
            </span>
            <span>
                <a href="./login.php">Ieiet</a>
                <a href="./register.php">Reģistrēties</a>
            </span>
            <span>
                <img src="./media/logo.png">
            </span>
        </header>
        <form class="flex cen col regDisplay" method="post">
            <p><?= $result ?></p>
            <label>Lietotājvārds:</label>
            <input type="text" name="username_in" id="">
            <label>Parole:</label>
            <input type="password" name="password_in" id="">
            <button name="login_btn">Ieiet</button>
        </form>
    </main>
</body>
</html>