<?php
require_once('conexion.php');

function queryInsert($model)
{
    $pdo = new Conexion();
    $insetar = $pdo->openConn();
    $m = $model;

    $insertStatement = $insetar->insert()
                           ->into("anime")
                           ->columns(array("name_anime ", "caps_anime ", "origen_anime", "tipo_anime", "autor_anime", "estudio_anime"))
                           ->values(array($info["name"],$info["caps"],$info["source"],$info["type"],$info["author"],$info["studio"]));

    return $insertStatement->execute(false);
}

// $info = ["name" => "yo", "caps" => "0", "source" => "soy", 
// "type" => "La", "author" => "verga", "studio" => "same"];
// $db = queryInsert($info);
// var_dump($db);