<?php

$host  = $_SERVER['HTTP_HOST'];
$URL = "http://$host/tp-entornos";

// HEADER Y BARRA DE NAVEGACION
include_once "./views/templates/head.php";
include_once "./views/templates/navigation.php";

require_once "./controllers/vistaController.php";
require_once "./controllers/vistaController.php";
// FIN BARRA DE NAVEGACION
// FIN HEADER

// CONTENIDO DE LA PAGINA
$vista = get_view();
if ($vista[0] != "index.php") {
    require_once $vista[0];
} else {
    require_once "./views/templates/jumbotron.php";
}
// FIN CONTENIDO DE LA PAGINA

// FOOTER
include_once "./views/templates/footer.php";
// FIN FOOTER
