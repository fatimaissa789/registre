<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Gestion des utilisateurs</title>
    <link href="<?=$serverProjectName?>/dist/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=$serverProjectName?>/dist/CSS/styleAuth.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#" id="login-form-link">Login</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="#" class="active"  id="register-form-link">Register</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form id="login-form" action="<?=$serverProjectName?>/authentification/index"  method="post" role="form" style="display: block;">
                                <div class="row">
                                    <img class=" img-circle col-xs-4 col-xs-offset-4" src="<?=$serverProjectName?>/dist/image/auth.png">
                                </div>
                                <br>
                                <div class="form-group">
                                    <input type="text" name="username"  id="username" tabindex="1" class="form-control"
                                           placeholder="Nom d'utilisateur" value="" >
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" tabindex="2"
                                           class="form-control" placeholder="Mot de passe">
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="login-submit" id="login-submit" tabindex="4"
                                                   class="form-control btn btn-login" value="Connection">
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </form>
                            <form id="register-form" method="post"
                                  role="form" style="display: none;">
                                <div class="form-group">

                                    <?php
                                    if (isset($values['err2'])) {

                                        ?>
                                        <div id="alert2" class="alert alert-warning">
                                            <?= $values['mesg'] ?>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <input type="text" name="username" id="username" tabindex="1" class="form-control"
                                           placeholder="Nom d'utilisateur" value="<?=$values[0]['username'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" id="email" tabindex="1" class="form-control"
                                           placeholder="Email" value="<?=$values[0]['email'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" tabindex="2"
                                           class="form-control" placeholder="Mot de passe" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="cpassword" id="confirm-password" tabindex="2"
                                           class="form-control" placeholder="Confirmation de mot de passe" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="num_tele" id="num-tele" tabindex="2" class="form-control"
                                           placeholder="Numéro de téléphone"  value="<?=$values[0]['num_tele'] ?>" required>
                                </div>


                                <div class="form-group">
                                    <input type="text" name="nationalite" id="nation" tabindex="2" class="form-control"
                                           placeholder="Nationalité" value="<?=$values[0]['nationalite'] ?>" required>
                                </div>

                                <div class="form-group form-group-lg">
                                    <select class="form-control " name="sexe" id="selectbasic" tabindex="2"
                                            placeholder="Sexe">
                                        <option value="homme"> Homme</option>
                                        <option value="femme"> Femme</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="register-submit" id="register-submit"
                                                   tabindex="4" class="form-control btn btn-register" value="Inscrire">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?=$serverProjectName?>/dist/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=$serverProjectName?>/dist/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="<?=$serverProjectName?>/dist/javascript/scriptInscrire.js"></script>
</body>

</html>

