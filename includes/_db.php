<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "tienda_unid";
$port = "3306";

$conexion = mysqli_connect($host, $user, $password, $database, $port);
if (!$conexion) {
    echo "No se realizo la conexion a la base de datos".mysqli_connect_error();
    
}
?>