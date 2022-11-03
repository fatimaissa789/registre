<?php

namespace GLSIDFramwork;

class ControllerHome extends Controller
{

    public function ActionIndex()
    {

        $useraccess = new UserAcess();
        $messageaccess = new MessageAcess();
        $users ="";
        $mesg = "";
        if ($_SESSION){
            $users = $useraccess->getAllSaufMe($_SESSION['id']);
            $mesg = $messageaccess->SearchMyReciveMesg($_SESSION['id']);
        }
        return new View('viewhome', array('users' => $users, 'mesg' => $mesg));
    }

    public function ActionIndexAdmin()
    {
        $useraccess = new UserAcess();
        $messageaccess = new MessageAcess();
        $users ="";
        $mesg = "";
        if ($_SESSION){
            $users = $useraccess->getAllSaufMe($_SESSION['id']);
            $mesg = $messageaccess->SearchMyReciveMesg($_SESSION['id']);
        }
        return new View('viewhomeadmin', array('users' => $users, 'mesg' => $mesg));

    }

    public function ActionSuspendue($id)
    {
        $useraccess = new UserAcess();

        if (strcmp($_POST['suppSus'], 'supprimer') == 0) {
            $useraccess->Delete($id);
        }
        else if (strcmp($_POST['suppSus'], 'suspendue') == 0) {
            $useraccess->ActiveSuspendue($id);
        }

        header('location:'.$this->getServerAndProjectName().'/home/indexadmin');
    }

    public
    function ActionDebloquer($id)
    {
        $useraccess = new UserAcess();
        $useraccess->Debloquer($id);

        header('location:' . $this->getServerAndProjectName() . '/home/indexadmin');
    }

    public
    function ActionRendreadmin($id)
    {
        $useraccess = new UserAcess();
        $useraccess->RendreAdmin($id);
        header('location:' . $this->getServerAndProjectName() . '/home/indexadmin');
    }

    public
    function ActionSendMessage()
    {
        $idSrc = $_SESSION['id'];
        $idDes = $_POST['id'];
        $message = $_POST['message'];
        $date = date('Y-m-d H:i:s');
        $messageaccess = new MessageAcess();
        $messageaccess->Insert(new \Message($idSrc, $idDes, $message, $date));
        if (strcmp($_SESSION['type'], 'admin') == 0)
            header('location:' . $this->getServerAndProjectName() . '/home/indexadmin');
        else
            header('location:' . $this->getServerAndProjectName() . '/home/index');
    }

}