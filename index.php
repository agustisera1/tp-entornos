<?php

$host  = $_SERVER['HTTP_HOST'];
$URL = "http://$host/prueba-rutas";

// HEADER Y BARRA DE NAVEGACION
include_once "./views/templates/head.php";
include_once "./views/templates/navigation.php";

require_once "./controllers/vistaController.php";
require_once "./controllers/vistaController.php";
// FIN BARRA DE NAVEGACION
// FIN HEADER

// CONTENIDO DE LA PAGINA
echo "<div class='container'>";
$vista = get_view();
if ($vista != "index.php") {

    require_once $vista;
} else {
    require_once "./views/templates/jumbotron.php";
}
echo "</div>";
// FIN CONTENIDO DE LA PAGINA

// FOOTER
include_once "./views/templates/footer.php";
// FIN FOOTER
