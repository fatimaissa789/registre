<?php
/**
 * Created by PhpStorm.
 * User: Visiteur
 * Date: 31/12/2017
 * Time: 17:55
 */

namespace GLSIDFramwork;


class Dispatcher
{

    private $req ;
    public function __construct(Request $req)
    {
     $this->req = $req;
    }

    public function loadControllerAndAction(){
        session_start();
        $user = 'visiteur';
        if ($_SESSION) {
            $user = $_SESSION['type'];
        }
        $view="";
        $status="";
        $values="";
        $headerfooter="";
        $str = file_get_contents("filejson/router.json");
        $json = json_decode($str, true);

        $count = 0;
        foreach ($json as $elementJSON) {
            $controller = str_replace('Controller', '', $elementJSON['Controllername']);
            $controller = strtolower($controller);
            if (strcmp($controller, $this->req->getController()) == 0) {
                foreach ($elementJSON['action'] as $action) {
                    $a = str_replace('Action', '', $action['name']);
                    $a = strtolower($a);
                    if (strcmp($a, $this->req->getAction()) == 0) {
                        $class = 'GLSIDFramwork\\' . 'Controller' . $controller;
                        $instance = new $class();
                        $function = $action['name'];
                        $headerfooter = $action['headerfooter'];
                        $vue = call_user_func_array(array($instance, $function), $this->req->getParam());
                        $page = View::SearchVue($vue);
                        if ($page) {
                            $view = $page;
                            $values = $vue->getValues();
                            $status = 200;
                        } else {
                            $view = null;
                            $values = null;
                            $status = 412;
                        }
                        $count++;
                    }
                }
            }
        }
        if ($count == 0) {
            $view = 'dist/pageexception/erreur404.html';
            $values = null;
            $status = 404;
        }

        if ($status == 200) {
            $in = file_get_contents("filejson/filter.json");
            $fileFiltre = json_decode($in, true);
            $fileFiltre = array_change_key_case($fileFiltre);
            $controller = 'controller' . $this->req->getController();
            $countFiltre = 0;
            foreach ($fileFiltre[$controller] as $actionsJSON) {
                if (strcmp(gettype($actionsJSON), 'string') != 0) {
                    foreach ($actionsJSON as $actionJSON) {
                        $actionjson = strtolower($actionJSON['name']);
                        $actionrequest = 'action' . $this->req->getAction();
                        if (strcmp($actionjson, $actionrequest) == 0) {
                            foreach ($actionJSON['access'] as $access) {
                                if (isset($_SESSION['type'])) {
                                    $userconnecter = $_SESSION['type'];
                                } else {
                                    $userconnecter = "visiteur";
                                }
                                if (strcmp($access, $userconnecter) == 0 || strcmp($access, "all") == 0) {
                                    $countFiltre++;
                                    goto filter;
                                }
                            }
                        }
                    }
                }
            }
            filter:
            if ($countFiltre == 0) {
                $view = 'dist/pageexception/erreur403.html';
                $values = null;
                $status = 403;
            }
        }
        return new Response($this->req->getServerProjectName(), $view, $status, $values, $headerfooter);
    }

}