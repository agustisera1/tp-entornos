<!-- TABLA DE CONSULTAS -->
<?php
if(!isset($_SESSION)){
  session_start();
}

if(isset($_SESSION["rol"]) and $_SESSION["rol"] == "Profesor"){
  header("Location: mis_consultas");
}

require_once "./controllers/consultaController.php";
$consultas = listadoConsultas();

if($_SESSION["rol"] == "Alumno"){
  $legajo = $_SESSION["legajo"];
  $consultas = listadoConsultasNoInscriptas($legajo);
}
?>

<div class="container mt-4 mb-4">
  <div class="row">
    <h3 class="text-center">Listado de consultas</h3>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Materia</th>
          <th scope="col">Profesor</th>
          <th scope="col">Modalidad</th>
          <th scope="col">Fecha y hora incio</th>
          <th scope="col">Fecha y hora fin</th>
          <th scope="col">Operaciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($consultas as $item) {
        ?>
          <tr>
            <td><?= $item->getId() ?></td>
            <td><?= $item->getMateria()->getNombre(); ?></td>
            <td><?= $item->getProfesor()->getNombre() . " " . $item->getProfesor()->getApellido() ?></td>
            <td><?= $item->getModalidad() ?></td>
            <td><?= $item->getFechaHoraInicio() ?></td>
            <td><?= $item->getFechaHoraFin() ?></td>
            <td>
              <?php
              if(isset($_SESSION["rol"]) and $_SESSION["rol"] == "Admin"){
              ?>
              <div class='btn-group'>
                <a href=<?= "$URL/editar_consulta/" . $item->getId() ?> type='button' class='btn btn-info' id='editar'>Editar</a>
                <a href=<?= "$URL/borrar_consulta/" . $item->getId() ?> type='button' class='btn btn-danger' id='eliminar'>Eliminar</a>
              </div>
              <?php
              }elseif(isset($_SESSION["rol"]) and $_SESSION["rol"] == "Alumno"){
              ?>
              <a href=<?= "$URL/asistir/" . $item->getId() ?> class='btn btn-primary' id='asistir'>Asistir</a>
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

    <?php
    if(isset($_SESSION["rol"]) and $_SESSION["rol"] == "Admin"){
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