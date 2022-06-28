<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once "./models/Consulta.php";
require_once "./models/Usuario.php";
require_once "./models/Materia.php";
require_once "./database/consultaDb.php";
require_once "./database/materiaDb.php";
require_once "./database/usuarioDb.php";

require_once('./vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Shared\Date;


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
    $motivo = $_POST["motivo"];
    $fechaHoraInicio = $_POST["fechaHoraInicio"];
    $fechaHoraFin = $_POST["fechaHoraFin"];
    
    bloquearConsultaId($motivo, $fechaHoraInicio, $fechaHoraFin, $id);

    header("Location: ../mis_consultas");
}

function inscriptosConsulta($id)
{
    return verInscriptos($id);
}

function leerExcel()
{
    $targetPath = './docs/' . $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

    //$spreadSheet = IOFactory::load($targetPath);
    $spreadSheet = $reader->load($targetPath);

    $sheet = $spreadSheet->getSheet(0);
    $rowsNumber = $sheet->getHighestDataRow();

    for ($i = 2; $i <= $rowsNumber; $i++) {

        $id = $sheet->getCellByColumnAndRow(1, $i)->getValue();
        $fechaHoraInicio = $sheet->getCellByColumnAndRow(2, $i)->getValue();
        $fechaHoraFin = $sheet->getCellByColumnAndRow(3, $i)->getValue();
        $modalidad = $sheet->getCellByColumnAndRow(4, $i)->getValue();
        $link = $sheet->getCellByColumnAndRow(5, $i)->getValue();
        $profesor_legajo = $sheet->getCellByColumnAndRow(6, $i)->getValue();
        $cupo = $sheet->getCellByColumnAndRow(7, $i)->getValue();
        $materia_id = $sheet->getCellByColumnAndRow(8, $i)->getValue();
        $estado = $sheet->getCellByColumnAndRow(9, $i)->getValue();
        $motivoBloqueo = $sheet->getCellByColumnAndRow(10, $i)->getValue();
        $fechaHoraReprogramada = $sheet->getCellByColumnAndRow(11, $i)->getValue();

        $fechaHoraInicioDateObject = Date::excelToDateTimeObject($fechaHoraInicio);
        $fechaHoraFinDateObject = Date::excelToDateTimeObject($fechaHoraFin);

        $fechaHoraInicioFormateada = $fechaHoraInicioDateObject->format("Y-m-d H:i");
        $fechaHoraFinFormateada = $fechaHoraFinDateObject->format("Y-m-d H:i");

        // mysqli_stmt_bind_param toma valores por referencia, por lo que hay que pasarle las variables y no el objeto
        saveConsulta($fechaHoraInicioFormateada, $fechaHoraFinFormateada, $modalidad, $link, $materia_id, $profesor_legajo, $cupo);
    }

    return array('tipo' => 'success', 'mensaje' => 'Consultas importadas con éxito.');
}

function buscarConsulta()
{

    $busqueda = $_POST['search'];

    return searchConsulta($busqueda);
}

function buscarConsultasNoInscriptas()
{
    $busqueda = $_POST['search'];
    $legajo_alumno = $_SESSION["legajo"];
    return searchConsultaNoInscriptas($busqueda, $legajo_alumno);
}
