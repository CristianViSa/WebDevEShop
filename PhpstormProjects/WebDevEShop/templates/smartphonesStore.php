<?php
namespace Tudublin;
$usertype = '';
if(isset($_SESSION['userType'])) {
    $usertype = $_SESSION['userType'];
}
?>
<head>
    <style>
        <?php include __DIR__ . '/../css/styles.css'; ?>
    </style>
</head>
<header>
    <?php
    require_once __DIR__ . '/../templates/header.php';
    ?>
</header>
<nav>
    <?php
    require_once __DIR__ . '/../templates/nav.php';
    ?>
</nav>
<body>

<h2>Lists of Smartphones</h2>
<table>
    <tr>
        <th> Name </th>
        <th> Store </th>
        <?php
        if($usertype == 'admin' or  $usertype == 'user' or $usertype == 'staff'):
            ?>
            <th> Buy </th>
        <?php endif; ?>
        <?php
        if($usertype == 'admin' or $usertype == 'staff'):
            ?>
            <th> Update </th>
        <?php endif; ?>
        <?php
        if($usertype == 'admin' or $usertype == 'staff'):
            ?>
            <th> Delete </th>
        <?php endif; ?>

    </tr>

    <?php
    foreach($smartphones as $smartphone):
        ?>

        <tr>
            <td><?= $smartphone->getName() ?></td>
            <td> <?= $smartphone->getStore() ?></td>
            <?php
                if($usertype == 'admin' or  $usertype == 'user' or $usertype == 'staff'):
                    ?><td>
                        <form method = "post" action = "index.php?action=details&id=<?=$smartphone->getId();?>">
                            <input type = "submit" value = "Buy" name = "submit" >
                        </form>
                    </td>
            <?php endif; ?>
            <?php
            if($usertype == 'admin' or $usertype == 'staff'):
                ?><td>
                <form method="post" action="index.php?action=updateSmartphone&id=<?=$smartphone->getId();?>">
                    <input type="submit" value="Update" name="submit">
                </form>
                </td>
            <?php endif; ?>
            <?php
            if($usertype == 'admin' or $usertype == 'staff'):
                ?><td>
                <form method="post" action="index.php?action=deleteSmartphone&id=<?=$smartphone->getId();?>">
                    <input type="submit" value="Delete" name="submit">
                </form>
                </td>
            <?php endif; ?>
        </tr>

    <?php
    endforeach;
    ?>
    <?php
    if($usertype == 'admin' or $usertype == 'staff'):
        ?><td>
        <form method = "post" action = "index.php?action=addSmartphone">
            <input type = "submit" value = "Add new Smartphone" name = "submit">
        </form>
        </td>
    <?php endif; ?>
</table>
</body>
<footer>
    <?php
    require_once __DIR__ . '/../templates/footer.php';
    ?>
</footer>