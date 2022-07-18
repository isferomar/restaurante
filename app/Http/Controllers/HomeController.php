<?php

namespace   App\Http\Controllers;

class HomeController
{
    private $datoDePrueba=[
        "nombre" => "maria",
        "apellido" => "perez",
        "edad" => "20",
    ];    

    public function index()
    {
        $response = new \App\Http\Response($this->datoDePrueba, 200);
        return $response;
    }
}
