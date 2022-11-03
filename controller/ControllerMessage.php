<?php
namespace GLSIDFramwork;

class ControllerMessage extends Controller
{

    public function ActionIndex(){
        $messageaccess = new MessageAcess();
        $useraccess = new UserAcess();

        $users = $useraccess->getAllSaufMe($_SESSION['id']);
        $mesg = $messageaccess->SearchMyMesgSend($_SESSION['id']);
        return new View('viewmessageenv',array('users' => $users,'mesg' => $mesg));
    }

    public function ActionSendMessage(){
        $idSrc = $_SESSION['id'];
        $idDes = $_POST['id'];
        $message = $_POST['message'];
        $date = date('Y-m-d H:i:s');
        $messageaccess = new MessageAcess();
        $messageaccess->Insert(new \Message($idSrc,$idDes,$message ,$date));
        if (strcmp($_SESSION['type'],'admin')==0)
            header('location:'.$this->getServerAndProjectName().'/home/indexadmin');
        else
            header('location:'.$this->getServerAndProjectName().'/home/index');
    }



}