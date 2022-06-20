<?php

function findAllConsultas()
{
    $listadoConsultas = array();

    try {
        require_once "./models/Consulta.php";
        require "./database/connection.php";
        require_once "./database/materiaDb.php";
        require_once "./database/usuarioDb.php";

        // $query = "SELECT c.id , c.fecha_hora_inicio, c.fecha_hora_fin, c.modalidad, c.link, c.cupo, CONCAT(u.nombre, ' ', u.apellido) AS profesor, m.nombre AS materia";
        //$query .= " FROM consulta AS c INNER JOIN materia AS m ON c.materia_id=m.id INNER JOIN usuario AS u ON c.profesor_legajo=u.legajo";
        $query = "SELECT * FROM consulta";

        $rs = mysqli_query($link, $query);

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
        if (isset($link)) mysqli_close($link);
    }
}

function saveConsulta($fechaHoraInicio, $fechaHoraFin, $modalidad, $link, $materia, $profesor)
{
    try {
        require_once "./database/connection.php";

        $query = "INSERT INTO consulta ";

        $listado = mysqli_query($link, $query);

        return $listado;
    } catch (Exception $e) {
        echo $e->getMessage();
    } finally {
        if (isset($listado)) mysqli_free_result($listado);
        if (isset($link)) mysqli_close($link);
    }
}
