<!-- FORMULARIO DE ALTA DE CONSULTA -->
<?php
require_once "./controllers/consultaController.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_SESSION["rol"]) and $_SESSION["rol"] == "Admin") {
    $alert = nuevaConsulta();
}
$listadoMaterias = listadoMateriasParaConsulta();
$listadoProfesores = listadoProfesoresParaConsulta();
?>
<div class="container p-4">
    <h3 class="text-center">Agregar nueva consulta</h3>
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <?php require_once "alerts.php"; ?>
                    <form action=<?= "$URL/nueva_consulta" ?> method="POST" class="col-12">
                        <div class="form-group mb-3">
                            <label for="inputFechaHoraInicio" class="form-label">Fecha y hora inicio</label>
                            <input type="datetime-local" class="form-control" id="inputFechaHoraInicio" name="fechaHoraInicio" aria-describedby="fechaHoraHelp">
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputFechaHoraFin" class="form-label">Fecha y hora fin</label>
                            <input type="datetime-local" class="form-control" id="inputFechaHoraFin" name="fechaHoraFin" aria-describedby="fechaHoraHelp">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Modalidad</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="modalidad" id="modalidad1" value="Presencial" checked>
                                        <label class="form-check-label" for="modalidad1">
                                            Presencial
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="modalidad" id="modalidad2" value="Virtual">
                                        <label class="form-check-label" for="modalidad2">
                                            Virtual
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="link" class="form-label">Link (Sólo modalidad virtual)</label>
                                    <input type="text" class="form-control" id="link" name="link" aria-describedby="linkHelp">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="materia" class="form-label">Materia</label>
                            <select class="form-select" aria-label="Selecciona una materia" id="materia" name="materia">
                                <option selected>Selecciona una materia</option>
                                <?php
                                foreach ($listadoMaterias as $materia) {
                                ?>
                                    <option value=<?= $materia->getId(); ?>><?= $materia->getNombre(); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="profesor" class="form-label">Profesor</label>
                            <select class="form-select" aria-label="Seleccione un profesor" id="profesor" name="profesor">
                                <option selected>Seleccione un profesor</option>
                                <?php
                                foreach ($listadoProfesores as $profesor) {
                                ?>
                                    <option value=<?= $profesor->getLegajo(); ?>><?= $profesor->getNombre() . " " . $profesor->getApellido(); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>