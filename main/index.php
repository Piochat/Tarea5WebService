<?php
require_once('..\vendor\autoload.php');
require_once('..\config\select.php');
require_once('..\config\insert.php');
require_once('..\config\update.php');
require_once('..\config\delete.php');

// Instancia de Soapserver
$server=new soap_server();
$server->configureWSDL("Anime","urn:AnimeXMLwsdl");
$server->wsdl->schemaTargetNamespace="urn:AnimeXMLwsdl";

// Función, hace un select por id a la db
function despliegue($id)
{
    $data = querySelect($id);
    return json_encode($data);
}

// Funcion, hace select de todos los elementos de la tabla
function despliegueTotal()
{
    $data = querySelectAll();
    return json_encode($data);
}

// Funcion, realiza un insert en la tabla
function insetarDatos($anime)
{
    $data = queryInsert($anime);
    if ($data) {
        return  "Insert exitoso";
    } else {
        return "No se inserto";
    }
}

// Funcion, realiza un update en la tabla
function actualizar($anime, $id)
{
    try {
        $data = queryUpdate($anime, $id);
        return $data;
    } catch (\Throwable $th) {
        return "$th";
    }
}

// Funcion, realiza un delete en la tabla
function borrar($id)
{
    try {
        $data = queryDelete($id);
        return $data;
    } catch (\Throwable $th) {
        return "$th";
    }
}

// addComplexType para poder usar un array en la funcion
$server->wsdl->addComplexType('serie_anime', 
                                'complexType', 
                                'struct', 
                                'all', 
                                '',
array(
    'name' => array('name'=>'name', 'type'=>'xsd:string'),
    'caps' => array('caps'=>'caps', 'type'=>'xsd:string'),
    'source' => array('source'=>'source', 'type'=>'xsd:string'),
    'type' => array('type'=>'type', 'type'=>'xsd:string'),
    'author' => array('author'=>'author', 'type'=>'xsd:string'),
    'studio' => array('studio'=>'studio', 'type'=>'xsd:string')
)
);

// Registranco funcion despliegue
$server->register(
    'despliegue',
    array('id'=>'xsd:int'),
    array('return'=>'xsd:string'),
    'urn:AnimeXMLwsdl',
    'urn:AnimeXMLwsdl#despliegue',
    'rpc',
    'encoded',
    'Muestra un anime'
);

// Registranco funcion despliegueTotal
$server->register(
    'despliegueTotal',
    array(),
    array('return'=>'xsd:string'),
    'urn:AnimeXMLwsdl',
    'urn:AnimeXMLwsdl#despliegueTotal',
    'rpc',
    'encoded',
    'Muestra animes'
);

// Registrandoo funcion insetarDatos
$server->register(
    'insetarDatos',
    array('serie_anime'=>'tns:serie_anime'),
    array('return'=>'xsd:string'),
    'urn:AnimeXMLwsdl',
    'urn:AnimeXMLwsdl#insetarDatos',
    'rpc',
    'encoded',
    'Inserta la información'
);

// Registrandoo funcion actualizar
$server->register(
    'actualizar',
    array('serie_anime'=>'tns:serie_anime', 'id'=>'xsd:int'),
    array('return'=>'xsd:string'),
    'urn:AnimeXMLwsdl',
    'urn:AnimeXMLwsdl#actualizar',
    'rpc',
    'encoded',
    'Actualiza la información'
);

// Registrandoo funcion delete
$server->register(
    'borrar',
    array('id'=>'xsd:int'),
    array('return'=>'xsd:string'),
    'urn:AnimeXMLwsdl',
    'urn:AnimeXMLwsdl#borrar',
    'rpc',
    'encoded',
    'Actualiza la información'
);

if(!isset($HTTP_RAW_POST_DATA)){
    $HTTP_RAW_POST_DATA=file_get_contents('php://input');
}
$server->service($HTTP_RAW_POST_DATA);