<?php

if(!isset($_SESSION)){ 
    session_start(); 
} 

require_once "./models/Consulta.php";
require_once "./models/Usuario.php";
require_once "./models/Materia.php";
require_once "./database/consultaDb.php";
require_once "./database/materiaDb.php";
require_once "./database/usuarioDb.php";

function listadoConsultas()
{
    return findAllConsultas();
}

function listadoConsultasNoInscriptas($legajo)
{
    return ConsultasNoInscriptas($legajo);
}

function listadoConsultasProfesor()
{
    $profesor_legajo = $_SESSION["legajo"];
    return findConsultasProfesor($profesor_legajo);
}

function listadoConsultasAlumno()
{
    $legajo_alumno = $_SESSION["legajo"];
    return findConsultasAlumno($legajo_alumno);
}

function nuevaConsulta()
{
    $fechaHoraInicio = $_POST['fechaHoraInicio'];
    $fechaHoraFin = $_POST['fechaHoraFin'];
    $modalidad = $_POST['modalidad'];
    $link = $_POST['link'];
    $materia_id = $_POST['materia'];
    $profesor_legajo = $_POST['profesor'];
    $cupo = 0; // cambiar esto

    // mysqli_stmt_bind_param toma valores por referencia, por lo que hay que pasarle las variables y no el objeto
    saveConsulta($fechaHoraInicio, $fechaHoraFin, $modalidad, $link, $materia_id, $profesor_legajo, $cupo);

    return array('tipo' => 'success', 'mensaje' => 'Consulta agregada con éxito.');
}

function editarConsulta()
{
    $id = $_POST['id'];
    $fechaHoraInicio = $_POST['fechaHoraInicio'];
    $fechaHoraFin = $_POST['fechaHoraFin'];
    $modalidad = $_POST['modalidad'];
    $link = $_POST['link'];
    $materia_id = $_POST['materia'];
    $profesor_legajo = $_POST['profesor'];
    $cupo = 0; // cambiar esto

    // mysqli_stmt_bind_param toma valores por referencia, por lo que hay que pasarle las variables y no el objeto
    updateConsulta($id, $fechaHoraInicio, $fechaHoraFin, $modalidad, $link, $materia_id, $profesor_legajo, $cupo);

    return array('tipo' => 'success', 'mensaje' => 'Consulta actualizada.');
}

function obtenerConsultaPorId($id)
{
    return findConsultaById($id);
}

function eliminarConsultaPorId($id)
{
    deleteConsultaById($id);
}

function listadoMateriasParaConsulta()
{
    return findAllMaterias();
}

function listadoProfesoresParaConsulta()
{
    return findAllProfesores();
}

function bloquearConsulta($id)
{
    bloquearConsultaId($id);

    header("Location: mis_consultas");
}

function inscriptosConsulta($id)
{
    return verInscriptos($id);
}
