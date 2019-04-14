<?php
    namespace Tudublin;

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Smartphones web</title>
        <meta charset="UTF-8">
        <style>
            <?php include __DIR__ . '/../css/styles.css'; ?>
        </style>
    </head>
    <body>
        <header>
            <?php
            require_once __DIR__ . '/../templates/header.php';
            ?>
        </header>
        <nav>
            <?php
            require_once __DIR__ . '/../templates/nav.php';
            ?>
        </nav>
        <h2>This is the TU Dublin smartphone shop.</h2>
        <p>To buy a phone you must be logged in, if  you do not have an account, you can register easily.
        <footer>

            <?php
            require_once __DIR__ . '/../templates/footer.php';
            ?>
        </footer>
    </body>
</html>
