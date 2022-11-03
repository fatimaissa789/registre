<?php
/**
 * Created by PhpStorm.
 * User: Visiteur
 * Date: 21/12/2017
 * Time: 14:51
 */

class User
{
    private $id ;
    private $email ;
    private $username ;
    private $password ;
    private $type ;
    private $numerotele ;
    private $nationalite ;
    private $sexe ;
    private $etat ;

    public function __construct($email,$username,$password,$type , $numerotele , $nationalite , $sexe , $etat=1 , $id=0)
    {
        $this->id = $id;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password ;
        $this->type = $type ;
        $this->numerotele = $numerotele;
        $this->nationalite = $nationalite ;
        $this->sexe = $sexe ;
        $this->etat = $etat ;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getNumerotele()
    {
        return $this->numerotele;
    }

    /**
     * @param mixed $numerotele
     */
    public function setNumerotele($numerotele)
    {
        $this->numerotele = $numerotele;
    }

    /**
     * @return mixed
     */
    public function getNationalite()
    {
        return $this->nationalite;
    }

    /**
     * @param mixed $nationalite
     */
    public function setNationalite($nationalite)
    {
        $this->nationalite = $nationalite;
    }

    /**
     * @return mixed
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @param mixed $sexe
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
    }

    /**
     * @return int
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param int $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }








}