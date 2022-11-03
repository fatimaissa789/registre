<?php
namespace GLSIDFramwork;
use \PDO;
class connection
{

    private $cnx ;

    public function __construct()
    {
        $file = file_get_contents("filejson/database.json");
        $json = json_decode($file,true);
        $this->cnx = new PDO('mysql:host='.$json['host'].';dbname='.$json['name'].';charset=utf8',$json['username'],$json['password']);
    }

    public function getConnection(){

        return $this->cnx ;

    }

}