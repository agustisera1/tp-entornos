<?php
require_once "./models/Usuario.php";
include_once "./database/connection.php";

function crearInscripcionConsulta($consultaId, $legajo)
{
    try {
        if (!isset($conn)) $conn = databaseConnection();

        $query = "INSERT INTO inscripcion(consulta_id, alumno_id) VALUES(?, ?)";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ss", $consultaId, $legajo);
        $res = mysqli_stmt_execute($stmt);

    } catch (Exception $e) {
        echo $e->getMessage();
    } finally {
        if (isset($stmt)) mysqli_stmt_close($stmt);
        if (isset($conn)) mysqli_close($conn);
    }
}

function confirmar($consultaId, $legajo)
{
    try {
        if (!isset($conn)) $conn = databaseConnection();

        $query = "UPDATE inscripcion SET estado_id = 1 WHERE consulta_id = ? AND alumno_id = ?";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ss", $consultaId, $legajo);
        $res = mysqli_stmt_execute($stmt);

    } catch (Exception $e) {
        echo $e->getMessage();
    } finally {
        if (isset($stmt)) mysqli_stmt_close($stmt);
        if (isset($conn)) mysqli_close($conn);
    }
}

function cancelar($consultaId, $legajo)
{
    try {
        if (!isset($conn)) $conn = databaseConnection();

        $query = "UPDATE inscripcion SET estado_id = 2 WHERE consulta_id = ? AND alumno_id = ?";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ss", $consultaId, $legajo);
        $res = mysqli_stmt_execute($stmt);

    } catch (Exception $e) {
        echo $e->getMessage();
    } finally {
        if (isset($stmt)) mysqli_stmt_close($stmt);
        if (isset($conn)) mysqli_close($conn);
    }
}