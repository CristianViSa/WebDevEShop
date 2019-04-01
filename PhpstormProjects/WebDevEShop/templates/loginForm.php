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
<fieldset>
    <legend>Login Form</legend>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="processLogin">
        <div>
            <label for="username">Username : </label>
            <input type="text" name="username">
        </div>
        <div>
            <label for="password">Password : </label>
            <input type="password" name="password">
        </div>
        <div>
            <input type="submit" value="Register">
            <input type="reset" value="Reset">
        </div>
    </form>
</fieldset>
</body>
</html>
