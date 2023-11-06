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

$user = new user( );

$pasta_types = $user->get_pasta_types( );

$result = "";
if (array_key_exists("add_btn", $_POST)) {

    $title = $_POST["title"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $type = $_POST["type"];

    if (empty( $title ) || empty( $price ) || empty( $description )) {
        $result = "You must fill out all fields!";
    } else {
        $result = $user->new_listing(
            $_POST["title"],
            $_POST["price"],
            false,
            $_POST["description"],
            $_POST["type"]
        );
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
            <p><?= $result ?></p>
            <label>Virsraksts:</label>
            <input type="text" name="title" maxlength="15">

            <label>Cena:</label>
            <input type="number" name="price" step="0.01">

            <select name="type">
                <?php foreach ($pasta_types as $type) { ?>
                        <option value="<?= $type["pastatype_ID"] ?>"><?= $type["Type"] ?></option>
                <?php } ?>
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
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>
</html>