<?php
require_once 'config.php';
$conexion = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbName);
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>