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
    <?php require_once __DIR__ . "/../templates/header.php"?>
</header>
<nav>
    <?php require_once __DIR__ . "/../templates/nav.php"?>
</nav>
<fieldset>
    <legend>New smartphone Form</legend>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="processAddSmartphone">
        <div>
            <label for="name">Name : </label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label for="store">Stock : </label>
            <input type="number" name="store" required>
        </div>
        <div>
            <label for="price">Price : </label>
            <input type="number" name="price" required>
        </div>
        <div>
            <label for="photo">Photo link : </label>
            <input type="text" name="photo" required>
        </div>
        <div>
            <input type="submit" value="Add">
            <input type="reset" value="Reset">
        </div>
    </form>
</fieldset>
<footer>
    <?php require_once __DIR__ . "/../templates/footer.php"?>
</footer>
</body>
</html>
