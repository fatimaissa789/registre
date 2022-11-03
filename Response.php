<?php
/**
 * Created by PhpStorm.
 * User: Visiteur
 * Date: 21/12/2017
 * Time: 01:34
 */

namespace GLSIDFramwork;


class Response
{
    private $serverProjectName;
    private $view ;
    private $data ;
    private $status;
    private $headerAndFooter;

    /**
     * Response constructor.
     * @param $view
     * @param $data
     * @param $status
     */
    public function __construct($serverProjectName,$view,$status, $data=null,$headerAndFooter = "true")
    {
        $this->serverProjectName = $serverProjectName;
        $this->view = $view;
        $this->data = $data;
        $this->status = $status;
        $this->headerAndFooter = $headerAndFooter;
    }


    /**
     * @return mixed
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @param mixed $view
     */
    public function setView($view)
    {
        $this->view = $view;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }
    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getHeaderAndFooter()
    {
        return $this->headerAndFooter;
    }

    /**
     * @param mixed $headerAndFooter
     */
    public function setHeaderAndFooter($headerAndFooter)
    {
        $this->headerAndFooter = $headerAndFooter;

    }

    /**
     * @return mixed
     */
    public function getServerProjectName()
    {
        return $this->serverProjectName;
    }

    /**
     * @param mixed $serverProjectName
     */
    public function setServerProjectName($serverProjectName)
    {
        $this->serverProjectName = $serverProjectName;
    }




    public function generateRespone(){

        $class   = 'GLSIDFramwork\\' . 'Controller';
        $serverProjectName = $this->serverProjectName;



        if ($this->getStatus() == 200){
            if ($this->headerAndFooter) {
                $headerFunction = 'ActionHeader';
                $headerVue = call_user_func_array(array($class, $headerFunction), array());
                $headerVue = View::SearchVue($headerVue);
                include $headerVue;
            }
            $values = $this->getData();
            include $this->getView();
        }
        else if ($this->getStatus() == 412){
            header('HTTP/1.0 412');
            include 'dist/pageexception/erreur412.html';        }
        else if ($this->getStatus() == 403){
            header('HTTP/1.0 403 Forbiden');
            include 'dist/pageexception/erreur403.html';
        }
        else if ($this->getStatus() == 404){
            header('HTTP/1.0 404 Not Found');
            include 'dist/pageexception/erreur404.html';

        }
        if ($this->headerAndFooter) {
            $footerFunction = 'ActionFooter';
            $footerVue = call_user_func_array(array($class, $footerFunction), array());
            $footerVue = View::SearchVue($footerVue);
            include $footerVue;
        }

    }



}