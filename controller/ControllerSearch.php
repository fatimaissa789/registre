<?php

namespace GLSIDFramwork;

class ControllerSearch extends Controller
{

    public function ActionIndex()
    {}

    public function ActionSearchUser($param){

        $useraccess = new UserAcess();
        $users = $useraccess->SearchByusername($param , $_SESSION['id']);
        return new View('viewsearch', array('users' => $users));
    }

}