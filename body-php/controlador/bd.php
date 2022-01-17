<?php
$server = "localhost";
$base_datos = "whi";
$usuario = "root";
$pwd = "1";
// Create connection
$conexion= mysqli_connect($server, $usuario, $pwd, $base_datos);
// Check connection
if (!$conexion) {
    die("Conexion fallida: " . mysqli_connect_error());
}


?>