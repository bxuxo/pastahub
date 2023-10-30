<?php

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
        <div class="flex cen col regDisplay">
            <label>Nosaukums:</label>
            <input type="text" name="" id="" maxlength="15">
            <label>Cena:</label>
            <input type="number" name="" id="" step="0.01">
            <select name="" id="">
                <option value="Tips">Tips</option>
            </select>
            <textarea name="" id="" cols="30" rows="10" placeholder="Apraksts"></textarea>
            <label>Bilde:</label>
            <input type="file" name="" id="">
            <button>Atjaunot</button>
        </div>
    </main>
</body>
</html>