<?php

namespace GLSIDFramwork;

class ControllerModifier extends Controller
{

    public function ActionIndex()
    {

        if (isset($_POST['modifier'])) {
            if (strcmp($_POST['modifier'], 'Modifier') == 0) {
                $useraccess = new UserAcess();
                $id = $_SESSION['id'];
                $email = $_POST['email'];
                $username = $_POST['username'];
                $password = $_SESSION['password'];
                $type = $_SESSION['type'];
                $numtele = $_POST['num_tele'];
                $nationalite = $_POST['nationalite'];
                $sexe = $_POST['sexe'];
                $etat = 1;
                $user = new \User($email, $username, $password, $type, $numtele, $nationalite, $sexe, $etat, $id);

                $update = $useraccess->Update($user, $id);
                if ($update) {
                    $_SESSION['id'] = $id;
                    $_SESSION['email'] = $email;
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    $_SESSION['type'] = $type;
                    $_SESSION['numerotele'] = $numtele;
                    $_SESSION['nationalite'] = $nationalite;
                    $_SESSION['sexe'] = $sexe;
                    return new view ('viewmodifierinfo', array("mesg" => "Les informations sont bien modifier"));
                }
            }
        }
        return new view ('viewmodifierinfo');
    }

    public function ActionMotdepasse()
    {
        if (isset($_POST['modifier'])) {
            if (strcmp($_POST['modifier'], 'Modifier le mot de passe') == 0) {
                if (strcmp($_SESSION['password'], $_POST['motdepass']) == 0) {
                    if (strcmp($_POST['nvmotdepass1'], $_POST['nvmotdepass2']) == 0) {
                        $useraccess = new UserAcess();
                        $adduser = $useraccess->UpdatePassword($_SESSION['id'],$_POST['nvmotdepass1']);
                        if ($adduser){
                            $_SESSION['password'] = $_POST['nvmotdepass1'];
                        }
                        return new View('ViewModifierMotdepass', array("mesgtrue" => "Le mot de passe à été modifier"));
                    }
                    else {
                        return new View('ViewModifierMotdepass', array("mesg" => "Les deux mot de passe sont pas identique"));
                    }
                } else {
                    return new View('ViewModifierMotdepass', array("mesg" => "Votre mot de passe actuel est incorrect"));
                }
            }
        }


        return new View('ViewModifierMotdepass');
    }

}