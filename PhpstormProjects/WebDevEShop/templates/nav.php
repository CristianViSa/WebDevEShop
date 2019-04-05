<?php
    $usertype = '';
    if(isset($_SESSION['userType'])) {
        $usertype = $_SESSION['userType'];
    }
?>
<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="index.php?action=about">About Us</a></li>
    <li><a href="index.php?action=store">Store</a></li>
    <li><a href="index.php?action=login">Login</a></li>
    <li><a href="index.php?action=register">Register</a></li>
    <?php
    if($usertype == 'admin'):
        ?>
        <li><a href="index.php?action=manageUsers">Manage Users</a></li>
    <?php endif; ?>
</ul>