<?php

$page = $_GET["page_name"];
if ($page == "index.php") {
    $page = "index";
}

$pageFolderPath = "./pages/" . $page . "Page";

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pasta HUB</title>

        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="<?= $pageFolderPath . "/style.css" ?>">
    </head>
    <body>
        <?php 
            include "$pageFolderPath/content.php"; 
        ?>
    </body>

    <script src="<?= $pageFolderPath . "/script.js" ?>"></script>
</html>