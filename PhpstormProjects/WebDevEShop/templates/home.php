<?php
    namespace Tudublin;
    require_once __DIR__ . "/../src/functions.php";
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
        <h1>Welcome to the Tudublin smartphone´s shop</h1>
        <p>This web page is only for registered users</p>
        <a href="index.php?action=login">Clic here to login</a>
        <a href="index.php?action=register">Clic here to register</a>
    </body>
</html>
