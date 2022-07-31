<!-- FORMULARIO DE ALTA DE CONSULTA -->
<?php
require_once "./controllers/consultaController.php";

if (!isset($_SESSION["rol"]) or $_SESSION["rol"] !== "Admin") {
    header("Location: $URL/401");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_SESSION["rol"]) and $_SESSION["rol"] == "Admin") {
    if (isset($_FILES['file'])) {
        $alert = leerExcel();
    } else {
        $alert = nuevaConsulta();
    }
}
$listadoMaterias = listadoMateriasParaConsulta();
$listadoProfesores = listadoProfesoresParaConsulta();
?>


<section class="border-bottom title-section">
    <div class="container">
        <div class="row row-cols-md-2 row-cols-1">
            <div class="col">
                <h2 class="pt-4 pb-3 m-0">
                    NUEVA CONSULTA
                </h2>
            </div>
            <div class="col d-flex justify-content-end pt-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href=<?= "$URL/"; ?>>Inicio</a></li>
                        <li class="breadcrumb-item "><a href=<?= "$URL/listado_consultas"; ?>>Listado de Consultas</a></li>
                        <li class="breadcrumb-item active text-dark" aria-current="page">Nueva Consulta</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<div class="container p-4">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php require_once "alerts.php"; ?>
                    <div class="row row-cols-2 row-cols-sm-1">
                        <div class="col col-md-6 border-end">
                            <form action=<?= "$URL/nueva_consulta" ?> method="POST" class="col-12" id="formNuevaConsulta">
                                <div class="form-group mb-3">
                                    <label for="inputFechaHoraInicio" class="form-label">Fecha y hora inicio</label>
                                    <input type="datetime-local" class="form-control" id="inputFechaHoraInicio" name="fechaHoraInicio" aria-describedby="fechaHoraHelp">
                                    <small class="text-danger"></small>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="inputFechaHoraFin" class="form-label">Fecha y hora fin</label>
                                    <input type="datetime-local" class="form-control" id="inputFechaHoraFin" name="fechaHoraFin" aria-describedby="fechaHoraHelp">
                                    <small class="text-danger"></small>
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
                                            <label for="inputLink" class="form-label">Link (Sólo modalidad virtual)</label>
                                            <input type="text" class="form-control" id="inputLink" name="link" aria-describedby="linkHelp">
                                            <small class="text-danger"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="materia" class="form-label">Materia</label>
                                    <select class="form-select" aria-label="Selecciona una materia" id="inputMateria" name="materia">
                                        <option selected value="">Seleccione una materia</option>
                                        <?php
                                        foreach ($listadoMaterias as $materia) {
                                        ?>
                                            <option value=<?= $materia->getId(); ?>><?= $materia->getNombre(); ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <small class="text-danger"></small>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="profesor" class="form-label">Profesor</label>
                                    <select class="form-select" aria-label="Seleccione un profesor" id="inputProfesor" name="profesor">
                                        <option selected value="">Seleccione un profesor</option>
                                        <?php
                                        foreach ($listadoProfesores as $profesor) {
                                        ?>
                                            <option value=<?= $profesor->getLegajo(); ?>><?= $profesor->getNombre() . " " . $profesor->getApellido(); ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <small class="text-danger"></small>
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                    <button type="submit" class="btn btn-primary" id="agregar">Agregar</button>
                                </div>
                            </form>
                        </div>

                        <div class="col col-md-6 align-self-center">
                            <h4 class="text-center">Agregar con un excel</h4>
                            <form action="<?= "$URL/nueva_consulta" ?>" method="POST" class="col-12" enctype="multipart/form-data" id="formExcel">
                                <div class="input-group mb-3">
                                    <input type="file" name="file" id="inputExcel" class="form-control" placeholder="Importar excel" aria-label="Importar excel" aria-describedby="button-addon2">
                                    <button class="btn btn-primary" type="submit" id="button-addon2">Importar</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const formNuevaConsulta = document.getElementById("formNuevaConsulta");
    const inputLink = document.getElementById("inputLink");
    const inputFechaHoraInicio = document.getElementById("inputFechaHoraInicio");
    const inputFechaHoraFin = document.getElementById("inputFechaHoraFin");
    const inputMateria = document.getElementById("inputMateria");
    const inputProfesor = document.getElementById("inputProfesor");
    const inputModalidad = document.getElementsByName("modalidad");
    const formExcel = document.getElementById("formExcel");
    const inputExcel = document.getElementById("inputExcel");

    formNuevaConsulta.addEventListener("submit", function(e) {
        e.preventDefault();

        let inputFields = [{
            field: inputFechaHoraInicio,
            message: "La fecha de inicio es requerida"
        }, {
            field: inputFechaHoraFin,
            message: "La fecha de fin es requerida"
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
            formNuevaConsulta.submit();
        }
    })

    formExcel.addEventListener("submit", function(e) {
        e.preventDefault();

        let inputFields = [{
            field: inputExcel,
            message: "Debe ingresar in archivo"
        }]

        console.log(inputExcel.value)

        removeError(inputFields);

        let valid = validateRequiredFields(inputFields);

        if (valid) {
            formExcel.submit();
        }
    })
</script>