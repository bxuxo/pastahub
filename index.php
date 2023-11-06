<?php

include './core/database.php';

$user = new user( );

// echo $user->register('rs6', 'rs6rs6rs6');

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

            <section class="page-content-wrapper">
                <div class="landing-page-inner">
                    <div>
                        <select name="" id="" class="type-sel">
                            <option value="Type">Tips</option>
                            <option value="price">Cena</option>
                            <option value="Title">Nosaukums</option>
                        </select>
                        <h1>Pasta HUB</h1>
                        <p>The only pasta market you will ever need. Join us today.</p>
                    </div>
                </div>
            </section>
        </main>
    </body>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</html>