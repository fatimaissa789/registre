<div class="informationuser container-fluid" xmlns="http://www.w3.org/1999/html">
    <div class="row">
        <div id="informationuser" class="col-xs-5 text-center">
            <div class="panel-heading"><h4>Vos Informations</h4></div>
            <div class="panel-body">
                <div><img width="190" alt="User Pic"
                          src="<?= $serverProjectName ?>/dist/image/nobody_m.original.jpg"
                          id="profile-image1" class="img-circle img-responsive img-thumbnail">
                </div>

                <hr style="margin:5px 0 5px 0;">


                <div class="col-sm-5 col-xs-6 tital ">Nom d'utilisateur:</div>
                <div class="col-sm-7 col-xs-6 "><?= $_SESSION['username'] ?></div>


                <div class="col-sm-5 col-xs-6 tital ">Email:</div>
                <div class="col-sm-7"><?= $_SESSION['email'] ?></div>


                <div class="col-sm-5 col-xs-6 tital ">Role:</div>
                <div class="col-sm-7"><?= $_SESSION['type'] ?></div>


                <div class="col-sm-5 col-xs-6 tital ">Numéro de télé:</div>
                <div class="col-sm-7"><?= $_SESSION['numerotele'] ?></div>


                <div class="col-sm-5 col-xs-6 tital ">Nationalité:</div>
                <div class="col-sm-7"><?= $_SESSION['nationalite'] ?></div>


                <div class="col-sm-5 col-xs-6">Sexe:</div>
                <div class="col-sm-7"><?= $_SESSION['sexe'] ?></div>
            </div>
        </div>


        <div id="tablemessage" class="col-xs-6 table-responsive text-center">
            <table class="table">
                <thead>
                <td><b>Expéditeurs </b></td>
                <td><b>Messages</b></td>
                <td><b>Heure</b></td>
                <td><b>Date</b></td>
                <td><b>Lire</b></td>
                </thead>
                <tbody>
                <?php
                foreach ($values['mesg'] as $message) {
                    if (strlen($message['message']) >= 32) {
                        $mesgAfficher = str_split($message['message'], 30);
                        $mesgAfficher = $mesgAfficher[0] . '...';
                    } else
                        $mesgAfficher = $message['message'];
                    foreach ($values['users'] as $us) {
                        if ($us['id'] == $message['refusersrc']) {
                            $usersrc = $us['username'];
                            break;
                        }
                    }

                    $dateandheure = str_split($message['date'], 10);
                    $date = $dateandheure[0];
                    $heure = str_split($dateandheure[1], 6);
                    $heure = $heure[0];
                    ?>
                    <tr>
                        <td><?= $usersrc ?></td>
                        <td><?= $mesgAfficher ?></td>
                        <td><?= $heure ?></td>
                        <td><?= $date ?></td>

                        <td>
                            <button class="btn btn-warning btn-xs" data-title="ShowMesg" data-toggle="modal"
                                    title="affiche le message"
                                    data-id="<?= $usersrc . ';' . $date . ';' . $heure . ';' . $message['message'] ?>"
                                    data-target="#showMesg">
                                <span class="glyphicon glyphicon-th-list"></span>
                            </button>

                            <button class="btn btn-info btn-xs" data-title="Repondre"
                                    data-id="<?= $message['refusersrc'] . ';' . $usersrc ?>" data-toggle="modal"
                                    title="répondre"
                                    data-target="#repondre">
                                <span class="glyphicon glyphicon-share-alt"></span>
                            </button>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row ">
        <div id="tableauusers" class="table-responsive col-xs-11 text-center">
            <br>
            <div class="row">

                <div class="col-xs-6 col-xs-offset-3 ">
                    <div class="form-group">
                        <input style="margin-left: 20px" id="search" placeholder="Recherche" type="text" class="form-control" >
                        <span  class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                </div>

            </div>
            <hr>
            <table id="tableajax" class="table">

                <thead>
                <td><b>Nom d'utilisateur</b></td>
                <td><b>Email</b></td>
                <td><b>Role</b></td>
                <td><b>Action</b></td>
                </thead>
                <tbody>
                <?php
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
                            ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>


                </tbody>

            </table>

        </div>
    </div>
</div>


<div class="modal fade" id="showMesg" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="panel modal-dialog modal-content ">
        <div class="panel-heading"><h4 id="mesgDe"></h4>
            <span id="datemesg" class="label label-default label-primary"></span>
            <span id="heuremesg" class="label label-default label-info"></span>
        </div>

        <div class="panel-body">

            <div align="center">

                <hr style="margin:5px 0 5px 0;">
                <br>

                <div id="bodymesg" class="alert-info col-xs-10 col-xs-offset-1"></div>
                <br>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        </div>
    </div>
</div>


<div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="show" aria-hidden="true">

    <div class="panel modal-dialog modal-content ">
        <div class="panel-heading"><h4>Information sur l'utilisateur</h4></div>
        <div class="panel-body">
            <div align="center"><img width="190" alt="User Pic"
                                     src="<?= $serverProjectName ?>/dist/image/nobody_m.original.jpg"
                                     id="profile-image1" class="img-circle img-responsive img-thumbnail">
            </div>
            <div align="center">

                <hr style="margin:5px 0 5px 0;">


                <div class="col-sm-5 col-xs-6 tital ">Nom d'utilisateur:</div>
                <div id="username" class="col-sm-7 col-xs-6 "></div>


                <div class="col-sm-5 col-xs-6 tital ">Email:</div>
                <div id="email" class="col-sm-7"></div>


                <div class="col-sm-5 col-xs-6 tital ">Role:</div>
                <div id="role" class="col-sm-7"></div>


                <div class="col-sm-5 col-xs-6 tital ">Numéro de télé:</div>
                <div id="numerotele" class="col-sm-7"></div>


                <div class="col-sm-5 col-xs-6 tital ">Nationalité:</div>
                <div id="nation" class="col-sm-7"></div>


                <div class="col-sm-5 col-xs-6 tital ">Sexe:</div>
                <div id="sexe" class="col-sm-7"></div>


            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        </div>
    </div>
</div>

<div class="modal fade" id="sendmesg" tabindex="-1" role="dialog" aria-labelledby="sendmesg" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formulairesendmesg" method="post" action="<?= $serverProjectName ?>/message/sendmessage">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                                class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Envoyer un message</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input id="usernamemesg" class="form-control " type="text" readonly>
                    </div>
                    <div class="form-group">
                            <textarea name="message" id="message" rows="4" class="form-control"
                                      placeholder="Votre message"></textarea>
                    </div>
                </div>
                <div class="modal-footer ">
                    <input name="id" type="hidden" id="idusersendmessage">
                    <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"> Envoyer le message
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="repondre" tabindex="-1" role="dialog" aria-labelledby="repondre" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formulairesendmesg" method="post" action="<?= $serverProjectName ?>/message/sendmessage">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                                class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Envoyer un message</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input id="usernamerepondre" class="form-control " type="text" readonly>
                    </div>
                    <div class="form-group">
                            <textarea name="message" id="message" rows="4" class="form-control"
                                      placeholder="Votre message"></textarea>
                    </div>
                </div>
                <div class="modal-footer ">
                    <input name="id" type="hidden" id="iduserrepondre">
                    <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"> Envoyer le message
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="debloquer" tabindex="-1" role="dialog" aria-labelledby="debloquer" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                            class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Débloquer un utilisateur</h4>
            </div>
            <div class="modal-body">

                <div id="divalert2" class="alert alert-success">
                </div>
            </div>
            <div class="modal-footer ">
                <form id="formulairedeb" method="post" action="">
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span> Oui
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                class="glyphicon glyphicon-remove"></span> Non
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                            class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Suspendue un utilisateur</h4>
            </div>
            <div class="modal-body">

                <div id="divalert" class="alert alert-danger">
                </div>
            </div>
            <div class="modal-footer ">
                <form id="formulaireSus" method="post" action="">
                    <button name="suppSus" value="supprimer" type="submit" class="btn btn-danger"><span
                                class="glyphicon glyphicon-trash"></span> Supprimer
                    </button>

                    <button name="suppSus" type="submit" value="suspendue" class="btn btn-warning"><span
                                class="glyphicon glyphicon-ban-circle"></span> Suspendue
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                class="glyphicon glyphicon-remove"></span> Non
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="rendreadmin" tabindex="-1" role="dialog" aria-labelledby="rendreadmin"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span
                            class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Rendre l'utilisateur administrateur</h4>
            </div>
            <div class="modal-body">

                <div id="divalert3" class="alert alert-info">

                </div>
            </div>
            <div class="modal-footer ">
                <form id="formulerendreadmin" method="post" action="">
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span> Oui
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span
                                class="glyphicon glyphicon-remove"></span> Non
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
