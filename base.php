<?php

$servidor="localhost";
$basededatos="db_proyecto";
$usuario="root";
$contraseña="";

try{
    $conexion= new PDO("mysql:host=$servidor;dbname=$basededatos",$usuario,$contraseña);
}catch(Exception $ex){
    echo $ex->getMessage();
}
?>