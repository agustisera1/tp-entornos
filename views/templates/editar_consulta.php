<!-- FORMULARIO DE EDIT DE CONSULTA -->
<?php
if (!isset($_SESSION)) {
    session_start();
}

require_once "./controllers/consultaController.php";

if (!isset($_SESSION["rol"]) or $_SESSION["rol"] !== "Admin") {
    header("Location: $URL/401");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_SESSION["rol"]) and $_SESSION["rol"] == "Admin") {
    $alert = editarConsulta();
}
$consulta = obtenerConsultaPorId($vista[1]);
$listadoMaterias = listadoMateriasParaConsulta();
$listadoProfesores = listadoProfesoresParaConsulta();
?>
<div class="container p-4">
    <h3 class="text-center">Editar consulta</h3>
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <?php require_once "alerts.php"; ?>
                    <form action=<?= "$URL/editar_consulta/" . $consulta->getId() ?> method="POST" class="col-12">
                        <input type="hidden" name="id" value="<?= $consulta->getId(); ?>">
                        <div class="form-group mb-3">
                            <label for="inputFechaHora" class="form-label">Fecha y hora</label>
                            <input type="datetime-local" class="form-control" id="inputFechaHoraInicio" name="fechaHoraInicio" aria-describedby="fechaHoraHelp" value="<?= $consulta->getFechaHoraInicio() ?>">
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputFechaHoraFin" class="form-label">Fecha y hora fin</label>
                            <input type="datetime-local" class="form-control" id="inputFechaHoraFin" name="fechaHoraFin" aria-describedby="fechaHoraHelp" value="<?= $consulta->getFechaHoraFin() ?>">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Modalidad</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="modalidad" id="modalidad1" value="Presencial" <?php if ($consulta->getModalidad() == "Presencial") echo 'checked'; ?>>
                                        <label class="form-check-label" for="modalidad1">
                                            Presencial
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="modalidad" id="modalidad2" value="Virtual" <?php if ($consulta->getModalidad() == "Virtual") echo 'checked'; ?>>
                                        <label class="form-check-label" for="modalidad2">
                                            Virtual
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="link" class="form-label">Link (Sólo modalidad virtual)</label>
                                    <input type="text" class="form-control" id="link" name="link" aria-describedby="linkHelp" value="<?= $consulta->getLink() ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="materia" class="form-label">Materia</label>
                            <select class="form-select" aria-label="Selecciona una materia" id="materia" name="materia">
                                <option selected value="<?= $consulta->getMateria()->getId() ?>"><?= $consulta->getMateria()->getNombre() ?></option>
                                <?php
                                foreach ($listadoMaterias as $materia) {
                                    if (strcmp($consulta->getMateria()->getId(), $materia->getId()) !== 0) {
                                ?>
                                        <option value=<?= $materia->getId(); ?>><?= $materia->getNombre(); ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="profesor" class="form-label">Profesor</label>
                            <select class="form-select" aria-label="Seleccione un profesor" id="profesor" name="profesor">
                                <option selected value="<?= $consulta->getProfesor()->getLegajo() ?>"><?= $consulta->getProfesor()->getNombre() . " " . $consulta->getProfesor()->getApellido() ?></option>
                                <?php
                                foreach ($listadoProfesores as $profesor) {
                                    if (strcmp($consulta->getProfesor()->getLegajo(), $profesor->getLegajo()) !== 0) {
                                ?>
                                        <option value=<?= $profesor->getLegajo(); ?>><?= $profesor->getNombre() . " " . $profesor->getApellido(); ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-primary" id="inputGuardarCambios">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let guardarCambios = document.getElementById("inputGuardarCambios")
    let fechaHoraInicio = document.getElementById("inputFechaHoraInicio")
    let fechaHoraFin = document.getElementById("inputFechaHoraFin")

    guardarCambios.addEventListener("click", ($event) => {
        if (fechaHoraInicio.value == "" || fechaHoraFin.value == "") {
            $event.preventDefault()
            alert("Faltan rellenar campos")
        }
    })
</script>