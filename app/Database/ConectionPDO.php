<?php

namespace App\Database;

use PDO;
use PDOException;

class ConectionPDO
{
    public static function CreateConection()
    {
        try {

            /// localhost
            //$dsn = "pgsql:dbname=restaurant;host=localhost;port=5432";
            //$username = "postgres";
            //$password = "12345678";

            /// heroku
            $dsn = "pgsql:dbname=d6l3tntgfa1o69;host=ec2-44-195-162-77.compute-1.amazonaws.com;port=5432";
            $username = "hdeyocnbfffrss";
            $password = "1829b455dccb3f07fd5bf6bb5f49a8502485a28d2e20157bf8abfdb841c84de4";

            $conection = new PDO($dsn, $username, $password);
            return $conection;
        } catch (PDOException $e) {
            echo "Error al crear la conecion : " . $e->getMessage();
            exit;
        }
    }
}
