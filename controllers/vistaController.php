<?php

function get_view()
{
    if (isset($_GET['views'])) {
        $ruta = explode("/", $_GET['views']);
        $respuesta = validaRuta($ruta[0]);
    } else {
        $respuesta = "index.php";
    }
    return $respuesta;
}

function validaRuta($path)
{
    $listaBlanca = ["login", "register", "contact", "sitemap", "abmConsulta"];
    if (in_array($path, $listaBlanca)) {
        if (is_file("./views/templates/" . $path . ".php")) {
            $respuesta = "./views/templates/" . $path . ".php";
        } else {
            $respuesta = "index.php";
        }
    }
    return $respuesta;
}
