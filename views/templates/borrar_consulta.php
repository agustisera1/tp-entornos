<?php
require_once "./controllers/consultaController.php";

$id = $vista[1];

if(isset($_SESSION["rol"]) and $_SESSION["rol"] == "Admin"){
  eliminarConsultaPorId($id);
}

header("Location: $URL/listado_consultas");