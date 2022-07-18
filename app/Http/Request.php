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
        if (empty($controller)) {
            $this->controller = "\App\Http\Controlles\HomeController";
        } else {
            $controller = strtolower($controller);
            $controller = ucfirst($controller);
            $this->controller = "\App\Http\Controller\\" . $controller . "Controller";
        }
    }
    public  function getMethod()
    {
        return $this->method;
    }
    public  function setMethod($method)
    {   
        if ($method == "GET") {
            if ($this->getId()==0){
                $this->method = "index";
            }else{
                $this->method = "show";
            }
        } else if ($method == "POST") {
            $this->method = "store";
            $this->id =json_encode(file_get_contents("PHP://input"));
        } else if ($method == "PUT" || $method == "PATCH") {
            $this->method = "update";
            $this->id =json_encode(file_get_contents("PHP://input"));
        } else if ($method == "DELETE") {
            $this->method = "destroy";
        }
    }

    public function getId()
    {
        return $this->id;
    }
    public  function setId($id)
    {
        if (empty($id)) {
            $this->id = 0;
        } else {
            $this->id = $id;
        }
    }

    public function __construct()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $segment = explode("/", $uri);

        $controller = $segment[1];
        $this->setController($controller);

        $id = $segment[2];
        $this->setId($id);

        $method = $_SERVER['REQUEST_METHOD'];
        $this->setMethod($method);
    }

    public function send()
    {
        $controller = $this->getController();
        $method = $this->getMethod();
        $id = $this->getId();

        $response = call_user_func([new $controller, $method], $id);

        $response->send();
    }
}
