<?php
namespace Tudublin;
function showHeader(){?> <!-- Close PHP to create a header in html -->
    <header>
        <h1>Smartphones shop</h1>
            <div id="loginButtons">
            <a href="">Register</a>
            <a href="">Login</a>
        </div>
    </header>
<?php
}

function showHome(){
    require_once __DIR__ . "/../templates/home.php";
}