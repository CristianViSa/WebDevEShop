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
    <!-- start table for displaying DVD details -->
    <h2>Lists of Smartphones</h2>

    <table>
        <tr>
            <th> Name </th>
            <th> Price </th>
            <th> Store </th>
            <th> Photo </th>
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
                    <img src="<?=$source?>" alt="picture of a phone">
                </td>

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