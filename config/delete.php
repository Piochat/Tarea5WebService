<?php
require_once('conexion.php');

function queryDelete($id)
{
    $pdo = new Conexion();
    $del = $pdo->openConn();

    $deleteStatement = $del->delete()
    ->from("anime")
    ->where("id", "=", $id);

    $affectedRows = $deleteStatement->execute();
}