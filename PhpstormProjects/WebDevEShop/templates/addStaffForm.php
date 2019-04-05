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
    <legend>New staff Form</legend>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="processAddStaff">
        <div>
            <label for="username">Username : </label>
            <input type="text" name="username" required>
        </div>
        <div>
            <label for="password">Password : </label>
            <input type="password" name="password" required>
        </div>
        <div>
            <label for="email">Email : </label>
            <input type="email" name="email">
        </div>
        <div>
            <label for="telephone">Telephone number : </label>
            <input type="tel" name="telephone" pattern="[0-9]{9}" placeholder="123456789">
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
