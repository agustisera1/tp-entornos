<!-- FORMULARIO DE LOGUEO -->
<?php
require_once "./controllers/auth.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = login();
}
?>
<div class="container p-4">
    <h3 class="text-center">Iniciar sesion</h3>
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action=<?= "$URL/login" ?> method="POST" class="col-12">
                        <div class="form-group mb-3">
                            <label for="inputLegajo" class="form-label">Legajo</label>
                            <input type="text" class="form-control" id="inputLegajo" aria-describedby="legajoHelp" name="legajo">
                            <!-- <div id="legajoHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputPassword" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="inputPassword" aria-describedby="" name="password">
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