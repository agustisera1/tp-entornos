<!-- FORMULARIO DE LOGUEO -->
<?php
require_once "./controllers/consultaController.php";

$consultaId = $vista[1];

if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_SESSION["rol"]) and $_SESSION["rol"] == "Profesor") {
    bloquearConsulta($consultaId);
}
?>

<section class="border-bottom title-section">
    <div class="container">
        <div class="row row-cols-md-2 row-cols-1">
            <div class="col">
                <h2 class="pt-4 pb-3 m-0">
                    BLOQUEAR CONSULTA
                </h2>
            </div>
            <div class="col d-flex justify-content-end pt-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href=<?= "$URL/"; ?>>Inicio</a></li>
                        <li class="breadcrumb-item "><a href=<?= "$URL/listado_consultas"; ?>>Listado de Consultas</a></li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Bloquear Consulta</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<div class="container p-4">
    <h3 class="text-center">Bloqueo consulta</h3>
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action=<?= "$URL/motivo_bloqueo/" . $consultaId ?> method="POST" class="col-12" id="formBloqueo">
                        <div class="form-group mb-3">
                            <label for="inputFechaHoraInicio" class="form-label">Nueva fecha y hora inicio</label>
                            <input type="datetime-local" class="form-control" id="inputFechaHoraInicio" name="fechaHoraInicio" min=<?= date("Y-m-d\TH:i:00", time()); ?> aria-describedby="fechaHoraHelp">
                            <small class="text-danger"></small>
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputMotivo" class="form-label">Motivo</label>
                            <textarea class="form-control" name="motivo" id="inputMotivo" cols="30" rows="10" maxlength="250"></textarea>
                            <small class="text-danger"></small>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-primary" id="registrarBloqueo">Registrar bloqueo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const formBloqueo = document.getElementById("formBloqueo");
    const inputFechaHoraInicio = document.getElementById("inputFechaHoraInicio");
    const inputMotivo = document.getElementById("inputMotivo");

    formBloqueo.addEventListener("submit", function(e) {
        e.preventDefault();

        let inputFields = [{
            field: inputFechaHoraInicio,
            message: "La fecha de inicio es requerida"
        }, {
            field: inputMotivo,
            message: "El motivo es requerido"
        }];

        removeError(inputFields);

        let valid = validateRequiredFields(inputFields);

        if (valid) {
            formBloqueo.submit();
        }
    })
</script>