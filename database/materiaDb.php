<?php

function findMateriaById($id)
{
    $materia = null;
    try {
        require_once "./models/Materia.php";
        require "./database/connection.php";

        $query = "SELECT * FROM materia WHERE id = ?";

        $stmt = mysqli_prepare($link, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);

        $rs = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($rs) > 0) {
            $mat = mysqli_fetch_assoc($rs);
            $materia = new Materia();
            $materia->setId($mat['id']);
            $materia->setId($mat['nombre']);
        }

        return $materia;
    } catch (Exception $e) {
        echo $e->getMessage();
    } finally {
        if (isset($rs)) mysqli_free_result($rs);
        if (isset($stmt)) mysqli_stmt_close($stmt);
        if (isset($link)) mysqli_close($link);
    }
}
