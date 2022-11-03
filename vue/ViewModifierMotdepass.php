<div id="divmodifier1" class="container col-xs-6 col-xs-offset-3">
    <div class="panel-heading"><h4>Modification de mot de passe</h4></div>

    <div id="divmodifier2" >

        <form method="post">

            <?php
            if (isset($values['mesg'])) {
                ?>
                <div class="alert alert-danger">
                    <?= $values['mesg']; ?>
                </div>
                <?php
            }
            else {
                if (isset($values['mesgtrue'])) {
                    ?>
                    <div class="alert alert-success">
                        <?= $values['mesgtrue']; ?>
                    </div>
                    <?php
                }
            }
            ?>


            <div class="form-group">
                <input type="password" name="motdepass" id="password" tabindex="1" class="form-control"
                       placeholder="Votre mot de passe Actuelle ">
            </div>

            <div class="form-group">
                <input type="password" name="nvmotdepass1" id="nvpassword1" tabindex="1" class="form-control"
                       placeholder="Votre nouveau mot de passe">
            </div>

            <div class="form-group">
                <input type="password" name="nvmotdepass2" id="nvpassword2" tabindex="1" class="form-control"
                       placeholder="Confirmer votre nouveau mot de passe">
            </div>

            <br>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <input type="submit" name="modifier" id="register-submit"
                               tabindex="4" class="form-control btn btn-primary" value="Modifier le mot de passe">
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
