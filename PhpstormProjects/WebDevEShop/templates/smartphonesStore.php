<?php
namespace Tudublin;
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
        <th> Price </th>
        <th> Store </th>
        <th> Photo </th>
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

    </tr>

    <?php
    foreach($smartphones as $smartphone):
        ?>

        <tr>
            <td><?= $smartphone->getName() ?></td>
            <td><?= $smartphone->getPrice() ?> &euro;</td>
            <td> <?= $smartphone->getStore() ?></td>
            <td>
                <?php
                $source = __DIR__ . '\\img\\' . $smartphone->getPhoto();
                ?>
                <img src="<?php echo$source; ?>" height="100" width="100"/>
            </td>
            <?php
                if($usertype == 'admin' or  $usertype == 'user' or $usertype == 'staff'):
                    ?><td>
                        <form method = "post" action = "index.php?action=buy&id=<?=$smartphone->getId();?>">
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
        </tr>

    <?php
    endforeach;
    ?>

</table>
</body>
<footer>
    <?php
    require_once __DIR__ . '/../templates/footer.php';
    ?>
</footer>