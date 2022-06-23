<!-- FORMULARIO DE REGISTRO -->
<?php
require_once "./controllers/auth.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $alert = registro();
}
?>
<div class="container p-4">
    <h3 class="text-center">Registrarse</h3>
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <?php require_once "alerts.php"; ?>
                    <form action=<?= "$URL/register" ?> method="POST" class="col-12">
                        <div class="form-group mb-3">
                            <label for="inputNombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="inputNombre" aria-describedby="" name="nombre">
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputApellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="inputApellido" aria-describedby="" name="apellido">
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail" aria-describedby="" name="email">
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputLegajo" class="form-label">Legajo</label>
                            <input type="text" class="form-control" id="inputLegajo" aria-describedby="" name="legajo">
                        </div>

                        <div class="form-group mb-3">
                            <label for="inputPassword" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="inputPassword" aria-describedby="" name="password">
                        </div>


                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-primary">Registrarse</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>