<?php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\SMTP;

// require "./PHPMailer/Exception.php";
// require "./PHPMailer/PHPMailer.php";
// require "./PHPMailer/SMTP.php";

function enviarMailContacto()
{
    $from = $_POST['email'];
    $nombre = $_POST['nombre'];
    $asunto = $_POST['asunto'];
    $consulta = $_POST['consulta'];

    $destinatario = "gon.vedia96@gmail.com";

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "From: " . $from . "\r\n";

    if (!mail($destinatario, $asunto, $consulta, $headers)) {
        return array('tipo' => 'warning', 'mensaje' => 'Hubo un error al enviar el mail.');
    }
    return array('tipo' => 'success', 'mensaje' => 'Mail enviado.');
}
