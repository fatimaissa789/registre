<?php
namespace GLSIDFramwork;


abstract class  Controller
{

    public abstract function ActionIndex();

    public static function ActionHeader(){

        return new View('viewheader',array());
    }

    public static function ActionFooter(){

        return new View('viewfooter',array());
    }

    public function getServerAndProjectName(){
        $uri = $_SERVER['REQUEST_URI'];
        $uri =  explode('/',$uri);
        $projectName = $uri['1'];
        if (strlen($projectName) !=  0 ) {
            $projectName = '/'.$projectName;
        }
        return 'http://'.$_SERVER['HTTP_HOST'].$projectName ;
    }

}
