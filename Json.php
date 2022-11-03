<?php
namespace GLSIDFramwork;
class Json
{

    public static function  countController(){
        $directory = 'controller/';
        $filecount = 0;
        $files = glob($directory . "*");
        if ($files){
            $filecount = count($files);
        }
        return $filecount-1;
    }

    public static function UpdateJSONController(){

        $str = file_get_contents("filejson/router.json");
        $json = json_decode($str, true);
        $directory = 'controller/';
        $files = glob($directory . "*");
        if ($files){
            foreach ($files as $file) {
                $count = 0;
                $file = str_replace('controller/', '', $file);
                $file = str_replace('.php', '', $file);
                if (strcmp($file, 'Controller') != 0) {
                    foreach ($json as $j) {
                        if (strcmp($j['Controllername'], $file) == 0) {
                            $count++;
                        }
                    }
                    if ($count == 0) {
                        $insertJSON[$file]  = array(
                            "Controllername" => $file,
                            "action" => array(array("name" => "ActionIndex", "param" => 0,"headerfooter"=> true))
                        );
                        $insertJSON = array_merge($json, $insertJSON);
                        $jsonData = json_encode($insertJSON, JSON_PRETTY_PRINT);
                        file_put_contents('filejson/router.json',$jsonData);

                    }
                }
            }
        }

    }

    public  static function UpdateJSONFonction(){
        $str = file_get_contents("filejson/router.json");
        $json = json_decode($str, true);
        $directory = 'controller/';
        $files = glob($directory . "*");
        if ($files){
            foreach ($files as $file) {
                $file = str_replace('controller/', '', $file);
                $file = str_replace('.php', '', $file);
                if (strcmp($file,'Controller') != 0) {
                    $class = get_class_methods('GLSIDFramwork\\' . $file);
                    foreach ($class as $fonctionFile){
                        $count=0;
                        foreach ($json[$file]['action'] as $fonctionJson){
                            if(strcmp($fonctionJson['name'],$fonctionFile) == 0)
                            {
                                $count++;
                            }
                        }
                        if ($count == 0){
                            $n = sizeof($json[$file]['action']);
                            $json[$file]['action'][$n] =  array("name" => $fonctionFile, "param" => 0 ,"headerfooter"=> true);
                            $jsonData = json_encode($json, JSON_PRETTY_PRINT);
                            file_put_contents('filejson/router.json',$jsonData);

                        }
                    }

                }
            }
            }
    }



}