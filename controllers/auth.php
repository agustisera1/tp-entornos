<?php

if (!isset($_SESSION)) {
  session_start();
}


require_once "./models/Consulta.php";
require_once "./models/Usuario.php";
require_once "./models/Materia.php";
require_once "./database/auth.php";

function registro()
{
  $legajo = $_POST['legajo'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $password = md5($password);
  $msg = signup($legajo, $nombre, $apellido, $email, $password);

  $_SESSION["legajo"] = $legajo;
  $_SESSION["nombre"] = $nombre;
  $_SESSION["apellido"] = $apellido;
  $_SESSION["rol"] = "Alumno";

  if (!is_null($msg)) {
    return $msg;
  }

  return header("Location: listado_consultas");
}

function registroProfesor()
{
  $legajo = $_POST['legajo'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $password = md5($password);
  $msg = signupProfesor($legajo, $nombre, $apellido, $email, $password);

  if (!is_null($msg)) {
    return $msg;
  }

  return header("Location: listado_consultas");
  exit();
}

function login()
{
  $legajo = $_POST['legajo'];
  $password = $_POST['password'];

  $password = md5($password);
  $usuario = inicio($legajo, $password);

  if ($usuario == 0) {
    return array('tipo' => 'danger', 'mensaje' => 'Legajo o contraseña incorrectos.');
  } else {
    $_SESSION["legajo"] = $usuario->getLegajo();
    $_SESSION["nombre"] = $usuario->getNombre();
    $_SESSION["apellido"] = $usuario->getApellido();
    $_SESSION["rol"] = $usuario->getRol();

    header("Location: listado_consultas");
    exit();
  }
}

function cambiarPassword()
{
  $legajo = $_SESSION['legajo'];

  $newPassword = $_POST['newPassword'];
  $password = $_POST['password'];

  $password = md5($password);
  $newPassword = md5($newPassword);

  if ($password === $newPassword) {
    return array('tipo' => 'danger', 'mensaje' => 'La contraseña actual y la nueva son identicas.');
  }

  if (changePassword($legajo, $password, $newPassword) === 1) {
    return array('tipo' => 'danger', 'mensaje' => 'Contraseña actual incorrecta.');
  }

  return array('tipo' => 'success', 'mensaje' => 'Contraseña cambiada satisfactoriamente.');
}
