<?php
/**
 * Created by PhpStorm.
 * User: Visiteur
 * Date: 21/12/2017
 * Time: 15:07
 */
namespace GLSIDFramwork;
interface modele
{
    public function getAll();
    public function Search($id);
    public function Insert($object);
    public function Update($object,$id);
    public function Delete($id);

}