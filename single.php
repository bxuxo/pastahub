<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pasta HUB</title>

        <link rel="stylesheet" href="globalStyle.css">
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

            <section class="page-content-wrapper">
                <div class="landing-page-inner">
                    <div class="box">
                        <img src="" alt="Bilde seit">
                        <p>Nosaukums:</p>
                        <p>Cena seit</p>
                        <p>Apraksts:</p>
                        <p>Īpašnieks:</p>
                    </div>
                </div>
            </section>
        </main>
    </body>
</html>