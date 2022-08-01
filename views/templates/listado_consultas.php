<!-- TABLA DE CONSULTAS -->
<?php
if (!isset($_SESSION)) {
  session_start();
}

if (isset($_SESSION["rol"]) and $_SESSION["rol"] == "Profesor") {
  header("Location: mis_consultas");
}

require_once "./controllers/consultaController.php";
$consultas = listadoConsultas();

if (isset($_SESSION["rol"]) and $_SESSION["rol"] == "Alumno") {
  $legajo = $_SESSION["legajo"];
  $consultas = listadoConsultasNoInscriptas($legajo);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_SESSION["rol"]) and $_SESSION["rol"] == "Alumno") {
    $consultas = buscarConsultasNoInscriptas();
  } else {
    $consultas = buscarConsulta();
  }
}
?>

<section class="border-bottom title-section">
  <div class="container">
    <div class="row">
      <div class="col">
        <h2 class="pt-4 pb-3 m-0">
          CONSULTAS
        </h2>
      </div>
      <div class="col d-flex justify-content-end pt-4">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href=<?= "$URL/"; ?>>Inicio</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">Listado de Consultas</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>

<div class="container my-4">
  <div class="row">
    <div class="card mb-3">
      <div class="card-body">
        <?php require_once "alerts.php"; ?>
        <section class="my-3">
          <form action=<?= "$URL/listado_consultas" ?> method="POST" class="d-flex" id="formBuscarConsulta">
            <div class="input-group">
              <input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar" name="search" id="inputBuscar">
              <button class="btn btn-outline-primary" type="submit">Buscar</button>
            </div>
          </form>
        </section>
        <section class="table-responsive">
          <table class="table table-hover">
            <thead class="text-center">
              <tr>
                <th scope="col"></th>
                <th scope="col">Materia</th>
                <th scope="col">Profesor</th>
                <th scope="col">Modalidad</th>
                <th scope="col">Fecha y hora incio</th>
                <th scope="col">Duracion(hs)</th>
                <th scope="col">Cupo disponible</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($consultas as $item) {
                $motivoBloqueo = $item->getMotivoBloqueo();
              ?>
                <tr>
                  <td><?= $item->getId() ?></td>
                  <td><?= $item->getMateria()->getNombre(); ?></td>
                  <td><?= $item->getProfesor()->getNombre() . " " . $item->getProfesor()->getApellido() ?></td>
                  <td><?= $item->getModalidad() ?></td>
                  <td><?= $item->getFechaHoraInicio() ?></td>
                  <td><?= $item->getDuracion() ?></td>
                  <td class="text-center"><?= $item->getCupoDisponible() ?></td>
                  <td>
                    <?php
                    if (isset($_SESSION["rol"]) and $_SESSION["rol"] == "Admin") {
                    ?>
                      <div class='text-center fs-5 '>
                        <a href=<?= "$URL/editar_consulta/" . $item->getId() ?> class='text-warning me-2' id='editar'><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href=<?= "$URL/borrar_consulta/" . $item->getId() ?> class='text-danger' id='eliminar'><i class="fa-solid fa-trash-can"></i></a>
                      </div>
                      <?php
                    } elseif (isset($_SESSION["rol"]) and $_SESSION["rol"] == "Alumno" and !isset($motivoBloqueo)) {
                      if ($item->getCupoDisponible() === 0) {
                      ?>
                        <a class="btn btn-primary disabled" type="button" disabled>Asistir</a>
                      <?php
                      } else {
                      ?>
                        <a href=<?= "$URL/asistir/" . $item->getId() ?> class='btn btn-primary' id='asistir'>Asistir</a>
                      <?php
                      }
                      ?>
                    <?php
                    } elseif (isset($motivoBloqueo)) {
                    ?>
                      <a class="btn btn-primary disabled" type="button" disabled>Bloqueada</a>
                    <?php
                    }
                    ?>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </section>
      </div>
    </div>

    <?php
    if (isset($_SESSION["rol"]) and $_SESSION["rol"] == "Admin") {
    ?>
      <div class="row justify-content-center">
        <div class="col-2">
          <a href=<?= "$URL/nueva_consulta/" ?> class='btn btn-primary'>Agregar nueva consulta</a>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
</div>
<script>
  const formBuscarConsulta = document.getElementById("formBuscarConsulta");
  const inputBuscar = document.getElementById("inputBuscar");

  formBuscarConsulta.addEventListener("submit", function(e) {
    e.preventDefault();

    let inputFields = [{
      field: inputBuscar,
      message: "El campo de busqueda es requerido"
    }];

    removeError(inputFields);

    let valid = validateRequiredFields(inputFields);

    if (valid) {
      formBuscarConsulta.submit();
    }
  })
</script>