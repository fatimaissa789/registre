<?php

namespace GLSIDFramwork;

include 'Response.php';

class Request
{
    private $serverProjectName;
    private $controller;
    private $action;
    private $param = array();

    /**
     * Request constructor.
     * @param $controller
     * @param $action
     * @param array $param
     */
    public function __construct($serverProjectName, $controller, $action, array $param)
    {
        $this->serverProjectName = $serverProjectName;
        $this->controller = $controller;
        $this->action = $action;
        $this->param = $param;
    }


    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller)
    {
        $this->controller = $controller;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return array
     */
    public function getParam()
    {
        return $this->param;
    }

    /**
     * @param array $param
     */
    public function setParam($param)
    {
        $this->param = $param;
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


}
