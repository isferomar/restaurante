<?php

namespace App\Models;

class Comida
{
    public $id;
    public $nombre;
    public $precio;
    public $descripcion;

    public function setComida($row)
    {
        $this->id = $row["id"];
        $this->nombre = $row["nombre"];
        $this->precio = $row["precio"];
        $this->descripcion = $row["descripcion"];
    }
}