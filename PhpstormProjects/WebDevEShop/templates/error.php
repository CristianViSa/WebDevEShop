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
            require_once __DIR__ . "/../templates/header.php";
        ?>
    </header>
    <nav>
        <?php
            require_once __DIR__ . "/../templates/nav.php";
        ?>
    </nav>
    <h1>Error page</h1>

    Sorry there were errors:

    <p>
        <?= $message ?>
    </p>
    <footer>
        <?php
        require_once __DIR__ . "/../templates/footer.php";
        ?>
    </footer>



    <?php
        require_once __DIR__ . "/../templates/footer.php";
    ?>
</body>
</html>