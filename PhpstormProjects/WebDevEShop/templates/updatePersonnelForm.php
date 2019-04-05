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
    <legend>Update user</legend>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="processUpdateUsertype">
        <?php echo "<input type='hidden' name='id' value='$id''>" ?>
        <div>
            <label for="userType">Enter the new type for the user : </label>
            <select name="userType">
                <option value="user">User</option>
                <option value="staff">Staff</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div>
            <input type="submit" value="Update user">
        </div>
</fieldset>
<footer>
    <?php require_once __DIR__ . "/../templates/footer.php"?>
</footer>
</body>
</html>
