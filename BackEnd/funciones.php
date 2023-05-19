<?php
require_once 'conexionBd.php';
require_once 'config.php';

$funcion=$_POST['funcion'];
switch ($funcion) {
  case $CONSTANTE_LOGIN:
    login();
    break;
  default:
    break;
}

function login() {
  require_once 'conexionBd.php';
  global $conexion;
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena']; 
    $query = "SELECT * FROM `usuarios` WHERE `correo` = '$correo' AND `contrasena` = '$contrasena'";
    $result = mysqli_query($conexion, $query);
    if (mysqli_num_rows($result) == 1) {
      session_start();
      $usuario = mysqli_fetch_assoc($result);
      $_SESSION['id'] = $usuario['id'];
      $_SESSION['nombres'] = $usuario['nombres'];
      $_SESSION['documento'] = $usuario['documento'];
      $_SESSION['correo'] = $usuario['correo'];
      $_SESSION['contrasena'] = $usuario['contrasena'];
      $_SESSION['fecha_nacimiento'] = $usuario['fecha_nacimiento'];
      $_SESSION['telefono'] = $usuario['telefono'];
      $_SESSION['id_tipo_usuario'] = $usuario['id_tipo_usuario'];
      $_SESSION['estado'] = $usuario['estado'];
      $response = array("resultado" => "SUCCESS", "nombre"=>$usuario['nombres'],"tipo_usuario"=>$usuario['id_tipo_usuario']);
    } else {
      $response = array("resultado" => "ERROR", "mensaje" => "Nombre de usuario o contraseña incorrectos");
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}


?>
