<?php
require_once 'conexionBd.php';

function login() {
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $query = "SELECT * FROM usuarios WHERE correo = '$correo' AND password =SHA2($password,256)";
    $result = mysqli_query($conexion, $query);
    if (mysqli_num_rows($result) == 1) {
      session_start();
      $usuario = mysqli_fetch_assoc($result);
      $_SESSION['id'] = $usuario['id'];
      $_SESSION['nombres'] = $usuario['nombres'];
      $_SESSION['correo'] = $usuario['correo'];
      $_SESSION['password'] = $usuario['password'];
      $_SESSION['estado'] = $usuario['estado'];
      $response = array('status' => 'success', 'message' => 'Cargando...');
    } else {
      $response = array('status' => 'error', 'message' => 'Credenciales inválidas. Por favor, inténtalo de nuevo.');
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
