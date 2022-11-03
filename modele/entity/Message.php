<?php
/**
 * Created by PhpStorm.
 * User: Visiteur
 * Date: 29/12/2017
 * Time: 17:37
 */

class Message
{
    private $id ;
    private $refusersrc ;
    private $refuserdest ;
    private $message ;
    private $date ;

    /**
     * User constructor.
     * @param $refusersrc
     * @param $refuserdest
     * @param $message
     */
    public function __construct($refusersrc, $refuserdest,$message,$date)
    {
        $this->refusersrc = $refusersrc;
        $this->refuserdest = $refuserdest;
        $this->message = $message;
        $this->date = $date;
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
    public function getRefusersrc()
    {
        return $this->refusersrc;
    }

    /**
     * @param mixed $refusersrc
     */
    public function setRefusersrc($refusersrc)
    {
        $this->refusersrc = $refusersrc;
    }

    /**
     * @return mixed
     */
    public function getRefuserdest()
    {
        return $this->refuserdest;
    }

    /**
     * @param mixed $refuserdest
     */
    public function setRefuserdest($refuserdest)
    {
        $this->refuserdest = $refuserdest;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

}