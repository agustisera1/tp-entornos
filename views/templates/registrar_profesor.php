<!-- FORMULARIO DE REGISTRO -->
<?php
require_once "./controllers/auth.php";

if (!isset($_SESSION["rol"]) or $_SESSION["rol"] !== "Admin") {
    return header("Location: listado_consultas");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alert = registroProfesor();
}
?>

<section class="border-bottom title-section">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="pt-4 pb-3 m-0">
                    REGISTRO PROFESOR
                </h2>
            </div>
            <div class="col d-flex justify-content-end pt-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href=<?= "$URL/"; ?>>Inicio</a></li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Registrar Profesor</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>


<div class="container p-4">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <?php require_once "alerts.php"; ?>
                    <form action=<?= "$URL/registrar_profesor" ?> method="POST" class="col-12" id="formRegistro">
                        <div class="form-group mb-3">
                            <label for="inputNombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="inputNombre" aria-describedby="" name="nombre" placeholder="Ingresar nombre">
                            <small class="text-danger"></small>
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputApellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="inputApellido" aria-describedby="" name="apellido" placeholder="Ingresar apellido">
                            <small class="text-danger"></small>
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail" aria-describedby="" name="email" placeholder="Ingresar email">
                            <small class="text-danger"></small>
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputLegajo" class="form-label">Legajo</label>
                            <input type="text" class="form-control" id="inputLegajo" aria-describedby="" name="legajo" placeholder="Ingresar legajo">
                            <small class="text-danger"></small>
                        </div>

                        <div class="form-group mb-3">
                            <label for="inputPassword" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="inputPassword" aria-describedby="passwordHelp" name="password" placeholder="Ingresar contraseña">
                            <small class="text-danger"></small>
                            <p class="text-muted" id="passwordHelp"><small>Solo caracteres alfanumericos. Mínimo 6 caracteres</small></p>
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputConfirmPassword" class="form-label">Confirmar contraseña</label>
                            <input type="password" class="form-control" id="inputConfirmPassword" aria-describedby="confirmPasswordHelp" name="confirmPassword" placeholder="Ingresar contraseña de confirmación">
                            <small class="text-danger"></small>
                        </div>

                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-primary" id="register">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const formRegistro = document.getElementById("formRegistro");
    const inputNombre = document.getElementById("inputNombre");
    const inputApellido = document.getElementById("inputApellido");
    const inputEmail = document.getElementById("inputEmail");
    const inputLegajo = document.getElementById("inputLegajo");
    const inputPassword = document.getElementById("inputPassword");
    const inputConfirmPassword = document.getElementById("inputConfirmPassword");

    formRegistro.addEventListener("submit", function(e) {
        e.preventDefault();

        let inputFields = [{
            field: inputLegajo,
            message: "El legajo es requerido"
        }, {
            field: inputPassword,
            message: "La contraseña es requerida"
        }, {
            field: inputConfirmPassword,
            message: "La confirmación de la contraseña es requerida"
        }, {
            field: inputApellido,
            message: "El apellido es requerido"
        }, {
            field: inputNombre,
            message: "El nombre es requerido"
        }, {
            field: inputEmail,
            message: "El email es requerido"
        }];

        removeError(inputFields);

        let valid = validateRequiredFields(inputFields);

        if (inputLegajo.value !== '' && !validateLegajo(inputLegajo.value)) {
            showError(inputLegajo, "El legajo es invalido");
            valid = false;
        }

        if (inputPassword.value !== '' && !validatePassword(inputPassword.value)) {
            showError(inputPassword, "Contraseña invalida");
            valid = false;
        }

        if (inputConfirmPassword.value !== '' && !validateConfirmPassword(inputPassword.value, inputConfirmPassword.value)) {
            showError(inputConfirmPassword, "Las contraseñas no coinciden");
            valid = false;
        }

        if (valid) {
            formRegistro.submit();
        }

    })
</script>