<?php

namespace App\Http;

class Request
{
    private $controller;
    private $method;
    private $id;

    public  function getController()
    {
        
        return $this->controller;
    }
    public  function setController($controller)
    {
        if (empty($controller)){
            $this->controller="\App\Http\Controlles\HomeController";
        }else{
            $controller=strtolower($controller);
            $controller=ucfirst($controller);
            $this->controller="\App\Http\Controlles\\". $controller . "Controller";
        }
    }
    public  function getMethod()
    {
        return $this->method;
    }
    public  function setMethod($method)
    {
        $this->method=$method;
    }
    public  function getId()
    {
        return $this->id;
    }
    public  function setId($id)
    {
        if (empty($id)){
            $this->id=0;
        }else{
            $this->id=$id;
        }
    }

    public function __construct() 
    {
        $uri=$_SERVER['REQUEST_URI'];
        $segment=explode("/",$uri);

        $controller=$segment[1];
        $this->setController($controller);

        // Todo: setMethod()

        $id=$segment[2];
        $this->setId($id);

    }
    public  function send()
    {
        echo "<p>Controlador:</p>";
        var_dump($this->getController());

        echo "<p>Id:</p>";
        var_dump($this->getId());
    }

}