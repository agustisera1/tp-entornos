<?php

function get_view()
{
    $respuesta = array();
    if (isset($_GET['params'])) {
        $ruta = explode("/", $_GET['params']);
        // array_push($respuesta, validaRuta($ruta[0]));
        // if (isset($ruta[1])) array_push($respuesta, $ruta[1]);
        for ($i = 0; $i < count($ruta); $i++) {
            if ($i == 0) {
                $respuesta[$i] = validaRuta($ruta[0]);
            } else {
                // if ($respuesta[0] == validaRuta($ruta[$i])) {
                //     $respuesta[0] = validaRuta("error");
                //     break;
                // }
                $respuesta[$i] = $ruta[$i];
            }
        }
    } else {
        array_push($respuesta, "index.php");
    }
    return $respuesta;
}

function validaRuta($path)
{
    $listaBlanca = ["login", "logout", "register", "contact", "sitemap", "nueva_consulta", "listado_consultas", "editar_consulta", "borrar_consulta", "mis_consultas", "bloquear_consulta", "ver_inscriptos", "asistir", "cancelar_inscripcion", "confirmar_inscripcion", "motivo_bloqueo"];
    if (in_array($path, $listaBlanca)) {
        if (is_file("./views/templates/" . $path . ".php")) {
            $respuesta = "./views/templates/" . $path . ".php";
        } else {
            $respuesta = "index.php";
        }
    } else {
        $respuesta = "./views/templates/error.php";
    }
    return $respuesta;
}
