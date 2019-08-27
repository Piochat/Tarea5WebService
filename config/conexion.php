<?php

require_once('..\vendor\autoload.php');

class Conexion  
{
    public function openConn()
    {
        $host='localhost';
        $port='3306';
        $db='animes';
        $username='root';
        $password='';

        $dsn = "mysql:host=$host;dbname=$db;port=$port";

        try {
            $pdo = new \FaaPz\PDO\Database($dsn, $username, $password);
            return $pdo;
        } catch (\Throwable $th) {
            echo "Conexion fallida $th";
            die();
        }
    }
}


?>