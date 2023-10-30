<?php

include 'core/database.php';
$_U = new user( );

$result = "";
if (array_key_exists("register_btn", $_POST)) {
    $username = $_POST["username_in"];
    $password = $_POST["password_in"];
    $c_password = $_POST["c_password_in"];

    $t = function ( ) use ($username, $password, $c_password, &$result) {
        if (strlen($username) < 3) {
            $result = "Lietotājvārdam jābūt vismaz 3 rakstzīmju garumā!";
            return false;
        }

        if (strlen($password) < 6) {
            $result = "Parolei jābūt vismaz 6 rakstzīmju garumā!";
            return false;
        }

        if ($password != $c_password) {
            $result = "Parole nesakrīt!";
            return false;
        }

        return true;
    };
    
    if ($t( )) {
        $result = $_U->register($username, $password);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="globalStyle.css">
    <title>Pasta Hub Register</title>
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
        <!-- <section class="page-content-wrapper">
        </section> -->
        <form class="flex cen col regDisplay" method="post">
            <p><?= $result ?></p>
            <label>Lietotājvārds:</label>
            <input type="text" name="username_in" id="">
            <label>Parole:</label>
            <input type="password" name="password_in" id="">
            <label>Atkārto Paroli:</label>
            <input type="password" name="c_password_in" id="">
            <button name="register_btn">Reģistrēties</button>
        </form>
    </main>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>
</html>