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
    <legend>Update smartphone</legend>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="processUpdateStock">
        <?php echo "<input type='hidden' name='id' value='$id''>" ?>
        <div>
            <label for="stock">Enter the new stock quantity : </label>
            <input type="number" name="stock">
        </div>
        <div>
            <input type="submit" value="Update Stock">
        </div>
    </form>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="processUpdatePrice">
        <?php echo "<input type='hidden' name='id' value='$id''>" ?>
        <div>
            <label for="price">Enter the new price quantity : </label>
            <input type="number" name="price">
        </div>
        <div>
            <input type="submit" value="Update Price">
        </div>
    </form>
</fieldset>
<footer>
    <?php require_once __DIR__ . "/../templates/footer.php"?>
</footer>
</body>
</html>
