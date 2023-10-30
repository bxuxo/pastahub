<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="globalStyle.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Pasta Hub Login</title>
</head>
<body>
    <script>
    function getFileData(myFile){
        var file = myFile.files[0];  
        var filename = file.name;
        $('.custom-file-upload').html(filename);
    }
    </script>
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
            <label for="file-upload" class="custom-file-upload">
                Izvēlieties bildi
            </label>
            <input id="file-upload" type="file" onchange="getFileData(this);"/>
            <button>Atjaunot</button>
        </div>
    </main>
</body>
</html>