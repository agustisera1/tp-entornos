<?php
if(!isset($_SESSION)){ 
  session_start(); 
} 

require_once "./controllers/consultaController.php";

if(!isset($_SESSION["nombre"]) or $_SESSION["rol"] != "Profesor"){
  return header("Location: listado_consultas");
}

$id = $vista[1];

$inscriptos = inscriptosConsulta($id);
?>
<div class="container mt-4 mb-4">
  <div class="row">
    <a href="../mis_consultas" class="btn btn-primary" style="width: 7%;">Volver</a>
    <h3 class="text-center">Inscripciones</h3>
    <?php
    if(count($inscriptos) == 0){
    ?>
    <h5 class="text-center mt-3">No hay inscriptos para esta consulta</h5>
    <?php
    } else {
    ?>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido</th>
          <th scope="col">Email</th>
          <th scope="col">Fecha y hora inscripcion</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($inscriptos as $item) {
        ?>
          <tr>
            <td><?= $item->getUsuario()->getNombre() ?></td>
            <td><?= $item->getUsuario()->getApellido() ?></td>
            <td><?= $item->getUsuario()->getEmail() ?></td>
            <td><?= $item->getFechaInscripcion() ?></td>
            </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  <?php
  }
  ?>
  </div>
</div>