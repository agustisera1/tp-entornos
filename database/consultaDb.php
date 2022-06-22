<?php
include_once "./database/connection.php";
require_once "./models/Consulta.php";
require_once "./database/materiaDb.php";
require_once "./database/usuarioDb.php";


function findAllConsultas()
{
    $listadoConsultas = array();

    try {
        if (!isset($conn)) $conn = databaseConnection();

        $query = "SELECT * FROM consulta";

        $rs = mysqli_query($conn, $query);

        if (mysqli_num_rows($rs) > 0) {
            foreach ($rs as $item) {
                $consulta = new Consulta();
                $consulta->setId($item['id']);
                $consulta->setFechaHoraInicio($item['fecha_hora_inicio']);
                $consulta->setFechaHoraFin($item['fecha_hora_fin']);
                $consulta->setModalidad($item['modalidad']);
                $consulta->setLink($item['link']);
                $consulta->setCupo($item['cupo']);

                $consulta->setProfesor(findUsuarioByLegajo($item['profesor_legajo']));
                $consulta->setMateria(findMateriaById($item['materia_id']));

                array_push($listadoConsultas, $consulta);
            }
        }
        return $listadoConsultas;
    } catch (Exception $e) {
        echo $e->getMessage();
    } finally {
        if (isset($rs)) mysqli_free_result($rs);
        if (isset($stmt)) mysqli_stmt_close($stmt);
        if (isset($conn)) mysqli_close($conn);
    }
}

function saveConsulta($fechaHoraInicio, $fechaHoraFin, $modalidad, $link, $materia_id, $profesor_legajo, $cupo)
{
    try {
        if (!isset($conn)) $conn = databaseConnection();

        $query = "INSERT INTO consulta (fecha_hora_inicio, fecha_hora_fin, modalidad, link, cupo, profesor_legajo, materia_id) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssssiii", $fechaHoraInicio, $fechaHoraFin, $modalidad, $link, $cupo, $profesor_legajo, $materia_id);
        mysqli_stmt_execute($stmt);
    } catch (Exception $e) {
        echo $e->getMessage();
    } finally {
        if (isset($rs)) mysqli_free_result($rs);
        if (isset($stmt)) mysqli_stmt_close($stmt);
        if (isset($conn)) mysqli_close($conn);
    }
}

function updateConsulta($id, $fechaHoraInicio, $fechaHoraFin, $modalidad, $link, $materia_id, $profesor_legajo, $cupo)
{
    try {
        if (!isset($conn)) $conn = databaseConnection();

        $query = "UPDATE consulta SET fecha_hora_inicio = ?, fecha_hora_fin = ?, modalidad = ?, link = ?, cupo = ?, profesor_legajo = ?, materia_id = ? WHERE id = ?";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssssiiii", $fechaHoraInicio, $fechaHoraFin, $modalidad, $link, $cupo, $profesor_legajo, $materia_id, $id);
        mysqli_stmt_execute($stmt);
    } catch (Exception $e) {
        echo $e->getMessage();
    } finally {
        if (isset($rs)) mysqli_free_result($rs);
        if (isset($stmt)) mysqli_stmt_close($stmt);
        if (isset($conn)) mysqli_close($conn);
    }
}


function findConsultaById($id)
{
    $consulta = null;
    try {
        if (!isset($conn)) $conn = databaseConnection();

        $query = "SELECT * FROM consulta WHERE id = ?";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);

        $rs = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($rs) > 0) {
            $c = mysqli_fetch_assoc($rs);
            $consulta = new Consulta();
            $consulta->setId($c['id']);
            $consulta->setFechaHoraInicio($c['fecha_hora_inicio']);
            $consulta->setFechaHoraFin($c['fecha_hora_fin']);
            $consulta->setModalidad($c['modalidad']);
            $consulta->setLink($c['link']);
            $consulta->setCupo($c['cupo']);

            $consulta->setProfesor(findUsuarioByLegajo($c['profesor_legajo']));
            $consulta->setMateria(findMateriaById($c['materia_id']));
        }

        return $consulta;
    } catch (Exception $e) {
        echo $e->getMessage();
    } finally {
        if (isset($rs)) mysqli_free_result($rs);
        if (isset($stmt)) mysqli_stmt_close($stmt);
        if (isset($conn)) mysqli_close($conn);
    }
}

function deleteConsultaById($id)
{
    try {
        if (!isset($conn)) $conn = databaseConnection();

        $query = "DELETE FROM consulta WHERE id = ?";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
    } catch (Exception $e) {
        echo $e->getMessage();
    } finally {
        if (isset($rs)) mysqli_free_result($rs);
        if (isset($stmt)) mysqli_stmt_close($stmt);
        if (isset($conn)) mysqli_close($conn);
    }
}
