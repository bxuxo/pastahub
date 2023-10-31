<?php
// if(isset($_FILES["pictures"])){
//     foreach ($_FILES["pictures"]["error"] as $key => $error) {
//         if ($error == UPLOAD_ERR_OK) {
//             $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
//             // basename() may prevent filesystem traversal attacks;
//             // further validation/sanitation of the filename may be appropriate
//             $name = basename($_FILES["pictures"]["name"][$key]);
//             echo $name;
//         }
//     }
// }

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
                <?php if ($user->user_id() == -1): ?>
                    <a href="./login.php">Ieiet</a>
                    <a href="./register.php">Reģistrēties</a>
                <?php endif; ?>
                

                <?php if ($user->user_id() != -1): ?>
                    <a href="./add.php">Pievienot</a>
                    <a href="./login.php">Izrakstīties</a>
                <?php endif; ?>
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