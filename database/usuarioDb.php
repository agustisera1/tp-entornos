<?php
require_once "./models/Usuario.php";
include_once "./database/connection.php";

function findUsuarioByLegajo($legajo)
{
    $usuario = null;
    try {
        if (!isset($conn)) $conn = databaseConnection();

        $query = "SELECT * FROM usuario WHERE legajo = ?";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $legajo);
        mysqli_stmt_execute($stmt);

        $rs = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($rs) > 0) {
            $user = mysqli_fetch_assoc($rs);
            $usuario = new Usuario();
            $usuario->setLegajo($user['legajo']);
            $usuario->setNombre($user['nombre']);
            $usuario->setApellido($user['apellido']);
            $usuario->setEmail($user['email']);
            $usuario->setPassword($user['password']);
        }

        return $usuario;
    } catch (Exception $e) {
        echo $e->getMessage();
    } finally {
        if (isset($rs)) mysqli_free_result($rs);
        if (isset($stmt)) mysqli_stmt_close($stmt);
        if (isset($conn)) mysqli_close($conn);
    }
}

function findAllProfesores()
{
    $listadoProfesores = array();
    try {
        if (!isset($conn)) $conn = databaseConnection();

        $query = "SELECT * FROM usuario AS u INNER JOIN usuario_rol AS ur ON u.legajo=ur.usuario_legajo INNER JOIN rol ON ur.rol_id=rol.id WHERE rol.descripcion = 'Profesor';";

        $rs = mysqli_query($conn, $query);

        if (mysqli_num_rows($rs) > 0) {
            foreach ($rs as $item) {
                $profesor = new Usuario();
                $profesor->setLegajo($item['legajo']);
                $profesor->setNombre($item['nombre']);
                $profesor->setApellido($item['apellido']);
                $profesor->setEmail($item['email']);

                array_push($listadoProfesores, $profesor);
            }
        }
        return $listadoProfesores;
    } catch (Exception $e) {
        echo $e->getMessage();
    } finally {
        if (isset($rs)) mysqli_free_result($rs);
        if (isset($stmt)) mysqli_stmt_close($stmt);
        if (isset($conn)) mysqli_close($conn);
    }
}
