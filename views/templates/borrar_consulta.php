<?php
require_once "./controllers/consultaController.php";

$id = $vista[1];

eliminarConsultaPorId($id);

header("Location: $URL/listado_consultas");