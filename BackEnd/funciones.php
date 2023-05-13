<?php
require_once 'conexionBd.php';

function login() {
  require_once 'conexionBd.php';
  global $conexion;
    $correo = $_POST['correo'];
    $password = $_POST['password']; 
    $query = "SELECT * FROM `usuarios` WHERE `correo` = '$correo' AND `password` = '$password'";
    $result = mysqli_query($conexion, $query);
    if (mysqli_num_rows($result) == 1) {
      session_start();
      $usuario = mysqli_fetch_assoc($result);
      $_SESSION['id'] = $usuario['id'];
      $_SESSION['nombres'] = $usuario['nombres'];
      $_SESSION['correo'] = $usuario['correo'];
      $_SESSION['password'] = $usuario['password'];
      $_SESSION['estado'] = $usuario['estado'];
      $response = array("resultado" => "SUCCESS");
    } else {
      $response = array("resultado" => "ERROR", "mensaje" => "Nombre de usuario o contraseña incorrectos");
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['correo']) && isset($_POST['password'])) {
  login();
}
?>
