<?php
namespace Tudublin;

function showHeader(){?> <!-- Close PHP to create a header in html -->
    <h1>Smartphones shop</h1>
<?php
}

function showNav(){?>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php?action=store">Store</a></li>
        <li><a href="index.php?action=login">Login</a></li>
        <li><a href="index.php?action=register">Register</a></li>
    </ul>
<?php
}

