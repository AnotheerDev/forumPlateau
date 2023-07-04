<?php
$user = $result['data']['user'];
?>

<div>
    <?php
    if (isset($user)) {
    ?>
        <h1><?= $user->getNickname() ?></h1>

        <table>
            <tr>
                <th></th>
                <th>Informations</th>
            </tr>
            <tr>
                <th>Pseudo:</th>
                <td><?= $user->getNickname() ?></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><?= $user->getEmail() ?></td>
            </tr>
            <tr>
                <th>Role:</th>
                <td><?= $user->getRole() ?></td>
            </tr>
        </table>

    <?php
    } else {
        echo "<h1>Pas d'utilisateur connecté </h1>";
    }
    ?>

</div>