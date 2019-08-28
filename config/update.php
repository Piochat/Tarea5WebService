<?php
require_once('..\vendor\autoload.php');
require_once('conexion.php');

function queryUpdate($info, $id)
{
    $pdo = new Conexion();
    $actualizar = $pdo->openConn();

    $updateStatement = $actualizar->update()
                           ->set(array(
                                "name_anime" => $info["name"],
                                "caps_anime" => $info["caps"],
                                "origen_anime" => $info["source"],
                                "tipo_anime" => $info["type"],
                                "autor_anime" => $info["author"],
                                "estudio_anime" => $info["studio"]
                            ))
                           ->table("anime")
                           ->where("id_anime", "=", $id);
                           
    return $updateStatement->execute();
}

// $info = ["name" => "Amaama to Inazuma", "caps" => "12", "source" => "MANGA", 
// "type" => "SERIE", "author" => "Gido Amagakure", "studio" => "TMS Entertainment"];
// $db = queryUpdate($info, "9");
// var_dump($db);