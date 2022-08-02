<?php
require_once "./models/Usuario.php";
include_once "./database/connection.php";

function signup($legajo, $nombre, $apellido, $email, $password)
{
    $usuario = null;
    try {
        if (!isset($conn)) $conn = databaseConnection();

        $query = "INSERT INTO usuario VALUES(?, ?, ?, ?, ?)";
        $query2 = "INSERT INTO usuario_rol VALUES(?, 2)";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sssss", $legajo, $nombre, $apellido, $email, $password);
        $res = mysqli_stmt_execute($stmt);

        $stmt = mysqli_prepare($conn, $query2);
        mysqli_stmt_bind_param($stmt, "s", $legajo);
        $res = mysqli_stmt_execute($stmt);
    } catch (Exception $e) {
        if (mysqli_errno($conn) == 1062) {
            return "Ya existe un usuario con ese legajo!";
        }
        echo $e->getMessage();
    } finally {
        if (isset($stmt)) mysqli_stmt_close($stmt);
        if (isset($conn)) mysqli_close($conn);
    }
}

function signupProfesor($legajo, $nombre, $apellido, $email, $password)
{
    $usuario = null;
    try {
        if (!isset($conn)) $conn = databaseConnection();

        $query = "INSERT INTO usuario VALUES(?, ?, ?, ?, ?)";
        $query2 = "INSERT INTO usuario_rol VALUES(?, 3)";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sssss", $legajo, $nombre, $apellido, $email, $password);
        $res = mysqli_stmt_execute($stmt);

        $stmt = mysqli_prepare($conn, $query2);
        mysqli_stmt_bind_param($stmt, "s", $legajo);
        $res = mysqli_stmt_execute($stmt);
    } catch (Exception $e) {
        if (mysqli_errno($conn) == 1062) {
            return "Ya existe un usuario con ese legajo!";
        }
        echo $e->getMessage();
    } finally {
        if (isset($stmt)) mysqli_stmt_close($stmt);
        if (isset($conn)) mysqli_close($conn);
    }
}

function inicio($legajo, $password)
{
    try {
        if (!isset($conn)) $conn = databaseConnection();

        $query = "SELECT legajo, nombre, apellido, email, password, descripcion AS rol FROM usuario INNER JOIN usuario_rol ON usuario.legajo = usuario_rol.usuario_legajo INNER JOIN rol ON usuario_rol.rol_id = rol.id WHERE legajo = $legajo AND password = '$password'";

        $rs = mysqli_query($conn, $query);

        if (mysqli_num_rows($rs) > 0) {
            foreach ($rs as $item) {
                $usuario = new Usuario();
                $usuario->setLegajo($item['legajo']);
                $usuario->setNombre($item['nombre']);
                $usuario->setApellido($item['apellido']);
                $usuario->setEmail($item['email']);
                $usuario->setRol($item['rol']);
                return $usuario;
            }
        } else {
            return 0;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    } finally {
        if (isset($rs)) mysqli_free_result($rs);
        if (isset($stmt)) mysqli_stmt_close($stmt);
        if (isset($conn)) mysqli_close($conn);
    }
}

function changePassword($legajo, $password, $newPassword)
{
    try {
        if (!isset($conn)) $conn = databaseConnection();
        $query = "UPDATE usuario SET password = ? WHERE legajo = ? AND password = ?";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sis", $newPassword, $legajo, $password);
        echo mysqli_stmt_execute($stmt);
        return mysqli_stmt_execute($stmt);
    } catch (Exception $e) {
        echo $e->getMessage();
    } finally {
        if (isset($stmt)) mysqli_stmt_close($stmt);
        if (isset($conn)) mysqli_close($conn);
    }
}
