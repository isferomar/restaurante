<?php

namespace App\Repositories;

use App\Database\ConectionPDO;
use App\Models\Comida;

class ComidaRepository
{
    public static function GetAll()
    {
        $conection = ConectionPDO::CreateConection();
        $statement = $conection->prepare("select * from Comidas");
        $statement->execute();
        $rows = $statement->fetchAll();
        $comidas = array();
        foreach ($rows as $row) {
            $comida = new Comida();
            $comida->setComida($row);
            array_push($comidas, $comida);
        }
        return $comidas;
    }
    public static function Find($id)
    {
        $conection = ConectionPDO::CreateConection();
        $statement = $conection->prepare("select * from Comidas where id= ?");
        $statement->execute([$id]);
        $row = $statement->fetchAll();
        if (empty($row)) {
            return null;
        }
        $comida = new Comida();
        $comida->setComida($row);
        return $comida;
    }
    public static function Delete($id)
    {
        $conection = ConectionPDO::CreateConection();
        $statement = $conection->prepare("delete from Comidas where id= ?");
        $statement->execute([$id]);
    }
    public static function Save($comida)
    {
        $conection = ConectionPDO::CreateConection();
        $statement = $conection->prepare("insert into  Comidas (nombre,precio,descripcion) values (?,?,?)");
        $statement->execute([$comida->nombre, $comida->precio, $comida->descripcion]);
        return $conection->lastInsertId();
    }
    public static function Update($comida)
    {
        $sql = "update comida set ";

        if (!empty($comida->nombre)) {
            $sql .= "nombre='" . $comida->nombre . "',";
        }
        if (!empty($comida->precio)) {
            $sql .= "precio='" . $comida->precio . "',";
        }
        if (!empty($comida->descripcion)) {
            $sql .= "descripcion='" . $comida->descripcion . "',";
        }
        $sql = rtrim($sql, ", ");
        $sql .= "where id = " . $comida->id;

        $conection = ConectionPDO::CreateConection();
        $conection->exec($sql);
    }
}
