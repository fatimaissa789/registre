<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Gestion des utilisateurs</title>
    <link href="<?= $serverProjectName ?>/dist/CSS/style.css" rel="stylesheet">
    <link href="<?= $serverProjectName ?>/dist/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body style="background-color: #f6f5f3">

<nav class="navbar navbar-findcond ">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand" href="<?= $serverProjectName ?>">Gestion des utilisateurs</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="<?= $serverProjectName ?>/message"  role="button"><i
                                class="fa fa-fw fa-bell-o"></i> Messages envoyés</a>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                                class="fa fa-fw fa-bell-o"></i> Modification d'informations </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?= $serverProjectName ?>/modifier"><i class="fa fa-fw fa-thumbs-o-up"></i>
                                Informations </a></li>
                        <li><a href="<?= $serverProjectName ?>/modifier/motdepasse"><i
                                        class="fa fa-fw fa-thumbs-o-up"></i> Mot de passe</a></li>

                    </ul>
                </li>


                <li><a href="<?= $serverProjectName ?>/authentification/deconnexion"><i class="fa fa-plug"
                                                                                        aria-hidden="true"></i>
                        Déconnexion</a></li>


            </ul>

        </div>
    </div>
</nav>