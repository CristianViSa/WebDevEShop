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

<h2>Lists of Personnel</h2>
<table>
    <tr>
        <th> Id </th>
        <th> Username </th>
        <th> Email </th>
        <th> User Type </th>
        <th> Delete </th>

    </tr>

    <?php
    foreach($personell as $user):
        ?>

        <tr>
            <td><?= $user->getId() ?></td>
            <td><?= $user->getUsername() ?></td>
            <td> <?= $user->getEmail() ?></td>
            <td> <?= $user->getUsertype() ?></td>
            <td>
                <form method = "post" action = "index.php?action=deleteUser&id=<?=$user->getId();?>">
                    <input type = "submit" value = "Delete" name = "submit" >
                </form>
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