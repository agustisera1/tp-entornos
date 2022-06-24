<?php
require_once "./controllers/consultaController.php";

$id = $vista[1];

if(isset($_SESSION["rol"]) and $_SESSION["rol"] == "Profesor"){
  bloquearConsulta($id);
}

header("Location: $URL/mis_consultas");