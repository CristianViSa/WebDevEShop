
<?php
if(isset($isLoggedin) && $isLoggedin):
    ?>
    <div id="headerH1">
        <h1>Tudublin smartphone´s shop</h1>
    </div>
    <div id="headerLogin">
        You are logged in as: <strong> <?= $username ?> </strong>
        <br>
        <a href="index.php?action=logout">logout</a>
    </div>
<?php
else:
    ?>
    <div id="headerH1">
        <h1>Tudublin smartphone´s shop</h1>
    </div>
    <div id="headerLogin">
        <a href="index.php?action=login">login</a>
    </div>
<?php
endif;
?>
<hr>
