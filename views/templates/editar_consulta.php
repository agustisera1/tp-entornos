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

<section class="border-bottom title-section">
    <div class="container">
        <div class="row row-cols-md-2 row-cols-1">
            <div class="col">
                <h2 class="pt-4 pb-3 m-0">
                    EDITAR CONSULTA
                </h2>
            </div>
            <div class="col d-flex justify-content-end pt-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href=<?= "$URL/"; ?>>Inicio</a></li>
                        <li class="breadcrumb-item "><a href=<?= "$URL/listado_consultas"; ?>>Listado de Consultas</a></li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Editar Consulta</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<div class="container p-4">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-body">
                    <?php require_once "alerts.php"; ?>
                    <form action=<?= "$URL/editar_consulta/" . $consulta->getId() ?> method="POST" class="col-12" id="formEditarConsulta">
                        <input type="hidden" name="id" value="<?= $consulta->getId(); ?>">
                        <div class="form-group mb-3">
                            <label for="inputFechaHora" class="form-label">Fecha y hora</label>
                            <input type="datetime-local" class="form-control" id="inputFechaHoraInicio" name="fechaHoraInicio" aria-describedby="fechaHoraHelp" value="<?= $consulta->getFechaHoraInicio() ?>">
                            <small class="text-danger"></small>
                        </div>
                        <div class="row row-cols-2">
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="inputDuracion" class="form-label">Duracion</label>
                                    <input type="number" min="45" step="45" class="form-control" id="inputDuracion" name="duracion" value=<?= $consulta->getDuracion(); ?> aria-describedby="duracionHelp">
                                    <small class="text-danger"></small>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group mb-3">
                                    <label for="inputCupo" class="form-label">Cupo</label>
                                    <input type="number" min="1" step="1" class="form-control" id="inputCupo" name="cupo" value=<?= $consulta->getCupo(); ?> aria-describedby="cupoHelp">
                                    <small class="text-danger"></small>
                                </div>
                            </div>
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
                                    <label for="inputLink" class="form-label">Link (Sólo modalidad virtual)</label>
                                    <input type="text" class="form-control" id="inputLink" name="link" aria-describedby="linkHelp" value="<?= $consulta->getLink() ?>">
                                    <small class="text-danger"></small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputMateria" class="form-label">Materia</label>
                            <select class="form-select" aria-label="Selecciona una materia" id="inputMateria" name="materia">
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
                            <small class="text-danger"></small>
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputProfesor" class="form-label">Profesor</label>
                            <select class="form-select" aria-label="Seleccione un profesor" id="inputProfesor" name="profesor">
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
                            <small class="text-danger"></small>
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
    const formEditarConsulta = document.getElementById("formEditarConsulta");
    const inputLink = document.getElementById("inputLink");
    const inputFechaHoraInicio = document.getElementById("inputFechaHoraInicio");
    const inputDuracion = document.getElementById("inputDuracion");
    const inputCupo = document.getElementById("inputCupo");
    const inputMateria = document.getElementById("inputMateria");
    const inputProfesor = document.getElementById("inputProfesor");
    const inputModalidad = document.getElementsByName("modalidad");

    formEditarConsulta.addEventListener("submit", function(e) {
        e.preventDefault();

        let inputFields = [{
            field: inputFechaHoraInicio,
            message: "La fecha de inicio es requerida"
        }, {
            field: inputDuracion,
            message: "La duracion es requerida"
        }, {
            field: inputCupo,
            message: "El cupo es requerido"
        }, {
            field: inputMateria,
            message: "La materia es requerida"
        }, {
            field: inputProfesor,
            message: "El profesor es requerido"
        }];

        let selected = Array.from(inputModalidad).find(radio => radio.checked);
        if (selected.value === "Virtual") {
            inputFields.push({
                field: inputLink,
                message: "El link de la reunión es requerido para clases virtuales"
            });
        }

        removeError(inputFields);

        let valid = validateRequiredFields(inputFields);

        if (valid) {
            formEditarConsulta.submit();
        }
    })
</script>