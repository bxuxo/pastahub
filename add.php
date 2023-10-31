<?php

include 'core/database.php';
$_L = new listing( );
$_L->new("", 1.1, true, "");

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
        <form class="flex cen col regDisplay" method="post" enctype="multipart/form-data">
            <label>Virsraksts:</label>
            <input type="text" name="title" maxlength="15">

            <label>Cena:</label>
            <input type="number" name="price" step="0.01">

            <select name="type">
                <option value="Tips">Tips</option>
            </select>

            <textarea name="description" cols="30" rows="10" placeholder="Apraksts"></textarea>

            <label>Bilde:</label>
            <label for="file-upload" class="custom-file-upload">
                Izvēlieties bildi
            </label>
            <input id="file-upload" name="image" type="file"/>
            <button name="add_btn">Pievienot</button>
        </form>
    </main>
</body>
</html>