<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once "./models/Usuario.php";
require_once "./database/userDb.php";
require_once('./vendor/autoload.php');


function obtenerDatosUsuario()
{
    $legajo = $_SESSION['legajo'];

    return findUserByLegajo($legajo);
}
