<?php
require_once 'conexionBd.php';
require_once 'config.php';

$funcion = $_POST['funcion'];

switch ($funcion) {
  case $CONSTANTE_LOGIN:
    login();
    break;
  case $CONSTANTE_CARGAR_MESAS_DISPONIBLES:
    cargarMesasDisponibles();
    break;
  case $CONSTANTE_CERRAR_SESION:
    cerrarSesion();
    break;
  case $CONSTANTE_VALIDAR_SESION:
    validarSesion();
    break;
  case $CONSTANTE_CREAR_RESERVA:
    crearReserva();
    break;
  case $CONSTANTE_CARGAR_RESERVAS_USUARIO:
    cargarReservasUsuario();
    break;
  case $CONSTANTE_OBTENER_RESERVA_POR_ID:
    obtenerReservaPorId();
    break;
  default:
    break;
}

function login()
{
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
    $response = array("resultado" => "SUCCESS", "nombre" => $_SESSION['nombres'], "tipo_usuario" => $_SESSION['id_tipo_usuario']);
  } else {
    $response = array("resultado" => "ERROR", "mensaje" => "Nombre de usuario o contraseña incorrectos");
  }
  header('Content-Type: application/json');
  echo json_encode($response);
}

function obtenerReservaPorId()
{
  global $conexion;
  $reservaId = $_POST['reservaId'];
  $query = "SELECT * FROM reserva WHERE id =$reservaId";
  $result = mysqli_query($conexion, $query);
  $reservas = array();
  if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
      $reserva = array(
        'id' => $row['id'],
        'id_usuario' => $row['id_usuario'],
        'fecha_reserva' => $row['fecha_reserva'],
        'hora_reserva' => $row['hora_reserva'],
        'observaciones_usuario' => $row['observaciones_usuario']
      );
      $reservas[] = $reserva;
    }
  }
  echo json_encode($reservas);
}

function cargarReservasUsuario()
{
  require_once 'conexionBd.php';
  global $conexion, $CONSTANTE_NUMERO_ESTADO_ACTIVO;
  session_start();
  $id_usuario = $_SESSION['id'];
  $query = "SELECT * FROM reserva WHERE id_usuario =$id_usuario AND fecha_reserva >= CURDATE() AND estado=$CONSTANTE_NUMERO_ESTADO_ACTIVO";
  $result = mysqli_query($conexion, $query);
  $reservas = array();
  if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
      $reserva = array(
        'id' => $row['id'],
        'id_usuario' => $row['id_usuario'],
        'fecha_reserva' => $row['fecha_reserva'],
        'hora_reserva' => $row['hora_reserva'],
        'observaciones_usuario' => $row['observaciones_usuario']
      );
      $reservas[] = $reserva;
    }
  }
  echo json_encode($reservas);
}

function cargarMesasDisponibles()
{
  require_once 'conexionBd.php';
  global $conexion, $CONSTANTE_NUMERO_ESTADO_ACTIVO;
  $fecha = $_POST['fecha'];
  $query = "SELECT m.* FROM mesas m LEFT JOIN mesas_reserva mr ON m.id = mr.mesa AND mr.reserva IN (SELECT id FROM reserva WHERE fecha_reserva = '$fecha' AND estado=$CONSTANTE_NUMERO_ESTADO_ACTIVO) WHERE mr.mesa IS NULL GROUP BY m.id";
  $result = mysqli_query($conexion, $query);
  $mesasDisponibles = array();
  if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
      $mesa = array(
        'id' => $row['id'],
        'descripcion' => $row['descripcion'],
        'ubicacion' => $row['ubicacion'],
        'estado' => $row['estado']
      );
      $mesasDisponibles[] = $mesa;
    }
  }
  echo json_encode($mesasDisponibles);
}

function cerrarSesion()
{
  session_start();
  session_destroy();
  exit;
}

function validarSesion()
{
  session_start();
  if (!empty($_SESSION['id'])) {
    $response = array('success' => true);
  } else {
    $response = array('success' => false);
  }
  echo json_encode($response);
}

function crearReserva()
{
  require_once 'conexionBd.php';
  require_once 'config.php';
  global $conexion, $CONSTANTE_NUMERO_ESTADO_ACTIVO;
  session_start();
  $id_usuario = $_SESSION['id'];
  $fecha_solicitud = $_POST['fecha_solicitud'];
  $hora_solicitud = $_POST['hora_solicitud'];
  $fechaReserva = $_POST['fechaReserva'];
  $horarioReserva = $_POST['horarioReserva'];
  $observaciones = $_POST['observaciones'];
  $costo = 0;
  $estado = $CONSTANTE_NUMERO_ESTADO_ACTIVO;
  $mesa = $_POST['mesa'];

  $insert = "INSERT INTO `reserva` VALUES(null,'$id_usuario','$fecha_solicitud','$hora_solicitud','$fechaReserva','$horarioReserva','$observaciones','$costo','$estado')";

  if (mysqli_query($conexion, $insert)) {
    $reservaId = mysqli_insert_id($conexion);
    $insert2 = "INSERT INTO `mesas_reserva` VALUES(null,'$reservaId','$mesa')";

    if (mysqli_query($conexion, $insert2)) {
      $response = array("resultado" => "SUCCESS", "reservaId" => $reservaId);
    } else {
      $response = array("resultado" => "ERROR", "mensaje" => "Error al crear la reserva");
    }
  } else {
    $response = array("resultado" => "ERROR", "mensaje" => "Error al crear la reserva");
  }

  header('Content-Type: application/json');
  echo json_encode($response);
}
