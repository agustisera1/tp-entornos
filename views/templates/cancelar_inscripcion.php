<?php
require_once "./controllers/inscripcion.php";

$consultaId = $vista[1];

if(isset($_SESSION["rol"]) and $_SESSION["rol"] == "Alumno"){
  cancelarInscripcion($consultaId);
}

header("Location: $URL/mis_consultas");