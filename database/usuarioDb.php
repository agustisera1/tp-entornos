<?php


function findUsuarioByLegajo($legajo)
{
    $usuario = null;
    try {
        require_once "./models/Usuario.php";
        require "./database/connection.php";

        $query = "SELECT * FROM usuario WHERE legajo = ?";

        $stmt = mysqli_prepare($link, $query);
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
        if (isset($link)) mysqli_close($link);
    }
}
