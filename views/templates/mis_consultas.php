<?php
if(!isset($_SESSION)){ 
  session_start(); 
} 

require_once "./controllers/consultaController.php";

if($_SESSION["rol"] != "Profesor" and $_SESSION["rol"] != "Alumno"){
  return header("Location: listado_consultas");
}

if($_SESSION["rol"] == "Profesor"){
  $consultas = listadoConsultasProfesor();
} else {
  $consultas = listadoConsultasAlumno();
}
?>
<div class="container mt-4 mb-4">
  <div class="row">
    <h3 class="text-center">Mis consultas</h3>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Materia</th>
          <th scope="col">Modalidad</th>
          <th scope="col">Fecha y hora incio</th>
          <th scope="col">Fecha y hora fin</th>
          <th scope="col">Link</th>
          <?php
          if($_SESSION["rol"] == "Profesor"){
            ?>
          <th scope="col">Bloqueada</th>
          <?php
          } else {
          ?>
          <th scope="col">Estado</th>
          <?php
          }
          ?>
          <th scope="col">Operaciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($consultas as $item) {
          ?>
          <?php
          if($_SESSION["rol"] == "Profesor"){
          ?>
          <tr>
            <td><?= $item->getId() ?></td>
            <td><?= $item->getMateria()->getNombre(); ?></td>
            <td><?= $item->getModalidad() ?></td>
            <td><?= $item->getFechaHoraInicio() ?></td>
            <td><?= $item->getFechaHoraFin() ?></td>
            <td><?= $item->getLink() ?></td>
            <td><?php if($item->getEstado() == 1){
              echo "No";
            } else {
              echo "Si";
            } ?></td>
            <td>
              <?php
              if(isset($_SESSION["rol"]) and $_SESSION["rol"] == "Profesor"){
                ?>
              <div class='btn-group'>
                <?php if($item->getEstado() == 1){
                  ?>
                  <a href=<?= "$URL/motivo_bloqueo/" . $item->getId() ?> type='button' class='btn btn-info' id='bloquear'>Bloquear</a>
                <?php
                }
                ?>
                <a href=<?= "$URL/ver_inscriptos/" . $item->getId() ?> type='button' class='btn btn-danger' id='ver_inscriptos'>Ver inscriptos</a>
              </div>
              <?php
              }
              ?>
            </td>
          </tr>
          <?php
          } else {
            ?>
            <tr>
              <td><?= $item->getConsulta()->getId() ?></td>
              <td><?= $item->getConsulta()->getMateria()->getNombre(); ?></td>
              <td><?= $item->getConsulta()->getModalidad() ?></td>
              <td><?= $item->getConsulta()->getFechaHoraInicio() ?></td>
              <td><?= $item->getConsulta()->getFechaHoraFin() ?></td>
              <td><?= $item->getConsulta()->getLink() ?></td>
              <td><?php if($item->getEstado() == 1){
                echo "Confirmado";
              } else {
                echo "Pendiente";
              } ?></td>
              <td>
              <?php
              if($item->getEstado() != 1){
              ?>
              <div class="btn-group ml-0">
                <a href=<?= "$URL/confirmar_inscripcion/" . $item->getConsulta()->getId() ?> class='btn btn-primary' id='confirmar'>Confirmar</a>
                <a href=<?= "$URL/cancelar_inscripcion/" . $item->getConsulta()->getId() ?> class='btn btn-danger' id='cancelar'>Cancelar</a>
              </div>
              </td>
              <?php
              }
              ?>
            </tr>
          
          <?php
            }
          }
          ?>
      </tbody>
    </table>
  </div>
</div>