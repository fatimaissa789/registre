<div class="informationuser container-fluid" xmlns="http://www.w3.org/1999/html">
    <div class="row">

        <div id="tablemessageenv" class="table-responsive text-center">
            <table class="table">
                <thead>
                <td><b>Destinataires </b></td>
                <td><b>Messages</b></td>
                <td><b>Heure</b></td>
                <td><b>Date</b></td>
                <td><b>Lire</b></td>
                </thead>
                <tbody>
                <?php
                $userdest="";
                foreach ($values['mesg'] as $message) {
                    if (strlen($message['message']) >= 50) {
                        $mesgAfficher = str_split($message['message'], 30);
                        $mesgAfficher = $mesgAfficher[0] . '...';
                    } else
                        $mesgAfficher = $message['message'];
                    foreach ($values['users'] as $us) {
                        if ($us['id'] == $message['refuserdest']) {
                            $userdest = $us['username'];
                            break;
                        }
                    }

                    $dateandheure = str_split($message['date'], 10);
                    $date = $dateandheure[0];
                    $heure = str_split($dateandheure[1], 6);
                    $heure = $heure[0];
                    ?>
                    <tr>
                        <td><?= $userdest ?></td>
                        <td><?= $mesgAfficher ?></td>
                        <td><?= $heure ?></td>
                        <td><?= $date ?></td>

                        <td>
                            <button class="btn btn-warning btn-xs" data-title="ShowMesg" data-toggle="modal"
                                    title="affiche le message"
                                    data-id="<?= $userdest . ';' . $date . ';' . $heure . ';' . $message['message'] ?>"
                                    data-target="#showMesg">
                                <span class="glyphicon glyphicon-th-list"></span>
                            </button>

                            <button class="btn btn-info btn-xs" data-title="Envoyé autre message"
                                    data-id="<?= $message['refuserdest'] . ';' . $userdest ?>" data-toggle="modal"
                                    title="répondre"
                                    data-target="#repondre">
                                <span class="glyphicon glyphicon-envelope "></span>
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



<div class="modal fade" id="showMesg" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="panel modal-dialog modal-content ">
        <div class="panel-heading"><h4 id="mesgVer"> </h4>
            <span id="datemesg" class="label label-default label-primary"></span>
            <span id="heuremesg" class="label label-default label-info"></span>
        </div>

        <div class="panel-body">

            <div align="center">

                <hr style="margin:5px 0 5px 0;">
                <br>

                <div id="bodymesg" class="alert-info col-xs-10 col-xs-offset-1" ></div>
                <br>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        </div>
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