<?php
require_once('conexion.php');

// Retorna todo el contenido de la tabla
function querySelectAll()
{
    $pdo = new Conexion();
    $select = $pdo->openConn();

    $selectStatement = $select->select(array("*"))
    ->from('anime');

    $stmt = $selectStatement->execute();
    return $stmt->fetchAll();
} // en querySelectAll

// Busca y retorna el valor indicado por su $id
function querySelect($id)   
{
    $pdo = new Conexion();
    $select = $pdo->openConn();

    $selectStatement = $select->select(array("*"))
    ->from('anime')
    ->where("id_anime", "=", $id);

    $stmt = $selectStatement->execute();
    return $stmt->fetch();
} // end querySelect



// $data = querySelect(4);

// foreach ($data as $key1 => $value1) {
//     echo "$key1 => $value1 <br>";
// }