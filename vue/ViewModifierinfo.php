<div id="divmodifier1" class="container col-xs-6 col-xs-offset-3">
    <div class="panel-heading"><h4>Modification d'information</h4></div>

    <div id="divmodifier2" >
    <form method="post">


        <?php
        if (isset($values['mesg'])) {
            ?>
            <div id="alert1" class="alert alert-info">
               <?= $values['mesg']; ?>
            </div>
            <?php
        }
        ?>

        <div class="form-group">
            <input type="text" name="username" id="username" tabindex="1" class="form-control"
                   placeholder="Nom d'utilisateur" value="<?= $_SESSION['username'] ?>">
        </div>

        <div class="form-group">
            <input type="email" name="email" id="email" tabindex="1" class="form-control"
                   placeholder="Email" value="<?= $_SESSION['email'] ?>">
        </div>

        <div class="form-group">
            <input type="text" name="num_tele" id="num-tele" tabindex="2" class="form-control"
                   placeholder="Numéro de téléphone" value="<?= $_SESSION['numerotele'] ?>">
        </div>

        <div class="form-group">
            <input type="text" name="nationalite" id="nation" tabindex="2" class="form-control"
                   placeholder="Nationalité" value="<?= $_SESSION['nationalite'] ?>">
        </div>

        <div class="form-group">
            <select class="form-control" name="sexe" id="selectbasic" tabindex="2"
                    placeholder="Sexe">
                <option hidden>Sexe</option>
                <?php
                if (strcmp($_SESSION['sexe'], 'femme') == 0) {
                    ?>
                    <option selected value="femme"> Femme</option>
                    <option value="homme"> Homme</option>
                    <?php
                } else {
                    ?>
                    <option value="femme"> Femme</option>
                    <option selected value="homme"> Homme</option>
                    <?php
                }
                ?>

            </select>
        </div>
        <br>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <input type="submit" name="modifier" id="register-submit"
                           tabindex="4" class="form-control btn btn-primary" value="Modifier">
                </div>
            </div>
        </div>
    </form>
    </div>
</div>
</div>