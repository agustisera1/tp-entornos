<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once "./controllers/userController.php";
require_once "./controllers/auth.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alert = cambiarPassword();
}

$user = obtenerDatosUsuario();
echo $alert;
?>
<section class="border-bottom title-section">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="pt-4 pb-3 m-0">
                    PERFIL
                </h2>
            </div>
            <div class="col d-flex justify-content-end pt-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href=<?= "$URL/"; ?>>Inicio</a></li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Perfil</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<div class="container my-4">
    <section class="card shadow-sm mb-4">
        <div class="card-body">
            <h3>Datos de la Cuenta</h3>
            <div class="row row-cols-md-2 row-cols-sm-1">
                <div class="col">
                    <p>Nombre: <span><?= $user->getNombre() . ' ' . $user->getApellido() ?></span></p>
                    <p>Legajo: <span><?= $user->getLegajo() ?></span></p>
                </div>
                <div class="col">
                    <p>Email: <span><?= $user->getEmail() ?></span></p>
                    <p>Rol: <span><?= $user->getRol() ?></span></p>
                </div>
            </div>
    </section>

    <section class="card shadow-sm">
        <div class="card-body">
            <div class="row row-cols-md-2 row-cols-sm-1">
                <div class="col">
                    <h3>
                        Cambiar Contraseña
                    </h3>
                </div>
                <div class="col">
                    <?php require_once "alerts.php"; ?>
                    <form action=<?= "$URL/profile" ?> method="POST" class="col-12" id="formCambiarPassword">
                        <div class="form-group mb-3">
                            <label for="inputPassword" class="form-label">Contraseña actual</label>
                            <input type="password" class="form-control" id="inputPassword" aria-describedby="passwordHelp" name="password" placeholder="Ingresar contraseña actual">
                            <small class="text-danger"></small>
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputNewPassword" class="form-label">Nueva contraseña</label>
                            <input type="password" class="form-control" id="inputNewPassword" aria-describedby="passwordHelp" name="newPassword" placeholder="Ingresar contraseña">
                            <small class="text-danger"></small>
                            <p class="text-muted" id="passwordHelp"><small>Solo caracteres alfanumericos. Mínimo 6 caracteres</small></p>
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputConfirmPassword" class="form-label">Confirmar nueva contraseña</label>
                            <input type="password" class="form-control" id="inputConfirmPassword" aria-describedby="confirmPasswordHelp" name="confirmPassword" placeholder="Ingresar contraseña de confirmación">
                            <small class="text-danger"></small>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
                        </div>
                    </form>
                </div>
            </div>
    </section>
</div>

<script>
    const formCambiarPassword = document.getElementById("formCambiarPassword");
    const inputPassword = document.getElementById("inputPassword");
    const inputNewPassword = document.getElementById("inputNewPassword");
    const inputConfirmPassword = document.getElementById("inputConfirmPassword");

    formCambiarPassword.addEventListener("submit", function(e) {
        e.preventDefault();

        let inputFields = [{
            field: inputPassword,
            message: "La contraseña es requerida"
        }, {
            field: inputNewPassword,
            message: "La nueva contraseña es requerida"
        }, {
            field: inputConfirmPassword,
            message: "La confirmación de la contraseña es requerida"
        }];

        removeError(inputFields);

        let valid = validateRequiredFields(inputFields);

        if (inputNewPassword.value !== '' && !validatePassword(inputNewPassword.value)) {
            showError(inputNewPassword, "Contraseña invalida");
            valid = false;
        }

        if (inputConfirmPassword.value !== '' && !validateConfirmPassword(inputNewPassword.value, inputConfirmPassword.value)) {
            showError(inputConfirmPassword, "Las contraseñas no coinciden");
            valid = false;
        }

        if (valid) {
            formCambiarPassword.submit();
        }

    })
</script>