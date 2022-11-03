<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Gestion des utilisateurs</title>
    <link href="<?= $serverProjectName ?>/dist/CSS/style.css" rel="stylesheet">
    <link href="<?= $serverProjectName ?>/dist/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body style="background-color: #f6f5f3">

<table class="table">

    <thead>
    <td><b>Nom d'utilisateur</b></td>
    <td><b>Email</b></td>
    <td><b>Role</b></td>
    <td><b>Action</b></td>
    </thead>
    <tbody>

    <?php
    if (isset($values['users'])) {
        foreach ($values['users'] as $user) {
            ?>
            <tr>
                <td><?= $user['username'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['type'] ?></td>
                <td>
                    <button class="btn btn-primary btn-xs" data-title="Show"
                            data-id="<?= implode($user, ";") ?>" data-toggle="modal"
                            title="afficher plus d'informations"
                            data-target="#show">
                        <span class="glyphicon glyphicon-list-alt"></span>
                    </button>
                    <button class="btn btn-info btn-xs" data-title="Sendmesg" data-toggle="modal"
                            title="envoyé un message"
                            data-target="#sendmesg" data-id="<?= $user['id'] . ';' . $user['username'] ?>">
                        <span class="glyphicon glyphicon-envelope"></span>
                    </button>
                    <?php

                    if (strcmp($_SESSION['type'],"admin")==0) {
                        if ((strcmp($user['type'], 'admin') == 0)) {
                            ?>
                            <button class="btn btn-success btn-xs" data-title="Rendreadmin" data-toggle="modal"
                                    disabled data-target="#rendreadmin"
                                    data-id="<?= $user['id'] . ';' . $user['username'] ?>">
                                <span class="glyphicon glyphicon-user"></span>
                            </button>
                            <?php
                        } else {
                            ?>
                            <button class="btn btn-success btn-xs" data-title="Rendreadmin" data-toggle="modal"
                                    title="rendre administrateur"
                                    data-target="#rendreadmin"
                                    data-id="<?= $user['id'] . ';' . $user['username'] ?>">
                                <span class="glyphicon glyphicon-user"></span>
                            </button>
                            <?php
                        }
                        if ($user['etat']) {
                            ?>
                            <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal"
                                    title="supprimer ou suspendue"
                                    data-id="<?= $user['id'] . ';' . $user['username'] ?>"
                                    data-target="#delete">
                                <span class="glyphicon glyphicon-ban-circle"></span>
                            </button>
                            <?php
                        } else {
                            ?>
                            <button class="btn btn-warning btn-xs" data-title="Debloquer" data-toggle="modal"
                                    title="débloquer l'utilisateur"
                                    data-id="<?= $user['id'] . ';' . $user['username'] ?>"
                                    data-target="#debloquer">
                                <span class="glyphicon glyphicon-ok"></span>
                            </button>
                            <?php
                        }
                    }
                    ?>
                </td>
            </tr>
            <?php
        }
    }
    ?>


    </tbody>

</table>



<script type="text/javascript" src="<?= $serverProjectName ?>/dist/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="<?= $serverProjectName ?>/dist/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= $serverProjectName ?>/dist/javascript/scriptModal.js"></script>
</body>
</html>
