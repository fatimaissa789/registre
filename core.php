<?php
use \GLSIDFramwork\Request;
use \GLSIDFramwork\Json;
use \GLSIDFramwork\View;
use \GLSIDFramwork\Dispatcher;

include 'Request.php';
include 'Json.php';
include 'View.php';
include 'Dispatcher.php';
include 'modele/entityaccess/UserAcess.php';
include 'modele/entityaccess/MessageAcess.php';
include 'modele/entity/User.php';
include 'modele/entity/Message.php';

foreach (glob("controller/*") as $filename)
{
    if (strcmp($filename,'controller/Controller.php') != 0) {
        include $filename;
    }
}
$uri = $_SERVER['REQUEST_URI'];
$uri =  explode('/',$uri);

$projectName = $uri['1'];
if (strlen($projectName) !=  0 ) {
    $projectName = '/'.$projectName;
}
$serverProjectName = 'http://'.$_SERVER['HTTP_HOST'].$projectName;

if (!isset($uri['2']) || strlen($uri['2']) ==  0 ) {
    $uri['2'] = "authentification";
}
if (!isset($uri['3']) || strlen($uri['3']) ==  0 ) {
    $uri['3'] = "index";
}
$controllerName = $uri['2'];
$actionName = $uri['3'];

$paramURI = array();
for ($i=4;$i<sizeof($uri);$i++){
    $paramURI[$i-4] = $uri[$i];
}

    $request = new Request($serverProjectName,$controllerName,$actionName,$paramURI);
    $dispatcher = new Dispatcher($request);
    $response = $dispatcher->loadControllerAndAction();
    $response->generateRespone();


// vérification et mise à jour des fichier JSON

$str = file_get_contents("filejson/router.json");
$json = json_decode($str, true);

if (sizeof($json) < Json::countController() ){
    Json::UpdateJSONController();
}
