<?php

if (!isset($_SESSION)) {
  session_start();
}


require_once "./models/Consulta.php";
require_once "./models/Usuario.php";
require_once "./models/Materia.php";
require_once "./database/inscripcionDb.php";
require_once "./database/consultaDb.php";

function asistir($consultaId)
{
  $legajo = $_SESSION['legajo'];

  $consulta = findConsultaById($consultaId);
  
  if ($consulta->getCupoDisponible() > 0) {
    crearInscripcionConsulta($consultaId, $legajo);
  }
}

function confirmarInscripcion($consultaId)
{
  $legajo = $_SESSION['legajo'];

  confirmar($consultaId, $legajo);

  $consulta = findConsultaById($consultaId);
  $emailProfesor = $consulta->getProfesor()->getEMail();

  $alumno = findUsuarioByLegajo($legajo);
  $nombre = $alumno->getNombre();
  $apellido = $alumno->getApellido();

  mail($emailProfesor, "Inscripción clase de consulta", "El alumno $apellido, $nombre se ha inscripto a su clase de consulta correctamente");
}

function cancelarInscripcion($consultaId)
{
  $legajo = $_SESSION['legajo'];

  cancelar($consultaId, $legajo);
}
