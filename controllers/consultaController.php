<?php

require_once "./database/consultaDb.php";

function listadoConsultas()
{
    return findAllConsultas();
}
