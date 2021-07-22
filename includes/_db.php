<?php

$host = "sql5.freemysqlhosting.net";
$user = "sql5425622";
$password = "xxBlTNGtUr";

$database = "sql5425622";

$port = "3306";

$conexion = mysqli_connect($host, $user, $password, $database, $port);
if (!$conexion) {
    echo "No se realizo la conexion a la base de datos".mysqli_connect_error();
    
}
?>