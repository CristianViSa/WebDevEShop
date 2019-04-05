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

<h2>Your smartphone Details</h2>
<table>
    <tr>
        <th> Name </th>
        <th> Price </th>
        <th> Store </th>
        <th> Photo </th>
    </tr>
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
            <td>
                <form method = "post" action = "index.php?action=buy&id=<?=$smartphone->getId();?>">
                    <input type = "submit" value = "Buy" name = "submit" >
                </form>
            </td>
        </tr>

</table>
</body>
<footer>
    <?php
    require_once __DIR__ . '/../templates/footer.php';
    ?>
</footer>