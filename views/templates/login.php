<!-- FORMULARIO DE LOGUEO -->
<?php
require_once "./controllers/auth.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alert = login();
}
?>

<section class="border-bottom title-section">
    <div class="container">
        <div class="row row-cols-md-2 row-cols-1">
            <div class="col">
                <h2 class="pt-4 pb-3 m-0">
                    INICIAR SESIÓN
                </h2>
            </div>
            <div class="col d-flex justify-content-end pt-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href=<?= "$URL/"; ?>>Inicio</a></li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Iniciar sesión</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<div class="container p-4">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php require_once "alerts.php"; ?>
                    <form action=<?= "$URL/login" ?> method="POST" class="col-12" id="formInicioSesion">
                        <div class="form-group mb-3">
                            <label for="inputLegajo" class="form-label">Legajo</label>
                            <input type="text" class="form-control" id="inputLegajo" aria-describedby="legajoHelp" name="legajo" placeholder="Ingresar legajo">
                            <small class="text-danger"></small>
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputPassword" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="inputPassword" aria-describedby="" name="password" placeholder="Ingresar contraseña">
                            <small class="text-danger"></small>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-primary" id="iniciarSesion">Iniciar sesión</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const formInicioSesion = document.getElementById("formInicioSesion");
    const inputLegajo = document.getElementById("inputLegajo");
    const inputPassword = document.getElementById("inputPassword");

    formInicioSesion.addEventListener("submit", function(e) {
        e.preventDefault();

        let inputFields = [{
            field: inputLegajo,
            message: "El legajo es requerido"
        }, {
            field: inputPassword,
            message: "La contraseña es requerida"
        }];

        removeError(inputFields);

        let valid = validateRequiredFields(inputFields);

        if (valid) {
            formInicioSesion.submit();
        }
    })
</script>