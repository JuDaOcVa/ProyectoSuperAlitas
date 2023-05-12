<?php
require_once 'config.php';
$conn = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbName);
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>