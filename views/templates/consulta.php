<!-- TABLA DE CONSULTAS -->
<?php
// function crearConsulta() {
//   $materias = ['Química', 'Álgebra', 'Matemática Superior', 'Sistemas Operativos', 'Entornos gráficos', 'Física II'];
//   $profesores = ['Miguel Apellido', 'Claudia Apellido', 'Mario Apellido', 'Susana Apellido', 'Pablo Apellido', 'Paula Apellido'];
//   $modalidades = ['Presencial', 'Virtual'];
//   $fechas = ['13/06/22 14:00', '14/06/22 09:00', '21/06/22 17:00'];

//   return array(
//     $materias[rand(0, count($materias) - 1)],
//     $profesores[rand(0, count($profesores) - 1)],
//     $modalidades[rand(0, count($modalidades) - 1)],
//     $fechas[rand(0, count($fechas) - 1)]
//   );
// };

// $consultas = array();
// for ($x = 0; $x <= 10; $x++) $consultas[] = crearConsulta();

// function mostrarConsultas($arr) {
//   for($x = 0; $x <= count($arr) - 1; $x++) {
//     $m = $arr[$x][0];
//     $p = $arr[$x][1];
//     $mod = $arr[$x][2];
//     $f = $arr[$x][3];
//     echo "
//     <tr>
//       <th scope='row'>$x</th>
//       <td>$m</td>
//       <td>$p</td>
//       <td>$mod</td>
//       <td>$f</td>
//       <td>
//         <div class='btn-group'>
//             <a href='modificacion' type='button' class='btn btn-info' id='editar'>Editar</a>
//             <a class='btn btn-danger' id='eliminar'>Eliminar</a>
//         </div>
//         <a class='btn btn-primary' id='asistir'>Asistir</a>
//       </td>
//     </tr>";
//   }
// }

require_once "./controllers/consultaController.php";
$consultas = listadoConsultas();
?>

<div class="container mt-4 mb-4">
  <div class="row">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Materia</th>
          <th scope="col">Profesor</th>
          <th scope="col">Modalidad</th>
          <th scope="col">Fecha y hora incio</th>
          <th scope="col">Fecha y hora fin</th>
          <th scope="col">Cupo</th>
          <th scope="col">Operaciones</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // mostrarConsultas($consultas);
        foreach ($consultas as $item) {
        ?>
          <tr>
            <td><?= $item->getId() ?></td>
            <td><?= $item->getMateria()->getNombre(); ?></td>
            <td><?= $item->getProfesor()->getNombre() . " " . $item->getProfesor()->getApellido() ?></td>
            <td><?= $item->getModalidad() ?></td>
            <td><?= $item->getFechaHoraInicio() ?></td>
            <td><?= $item->getFechaHoraFin() ?></td>
            <td><?= $item->getCupo() ?></td>
            <td>
              <div class='btn-group'>
                <a href='modificacion' type='button' class='btn btn-info' id='editar'>Editar</a>
                <a class='btn btn-danger' id='eliminar'>Eliminar</a>
              </div>
              <a class='btn btn-primary' id='asistir'>Asistir</a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>

    <div class="row justify-content-center">
      <div class="col-auto"></div>
      <div class="col-2">
        <a href="alta" class='btn btn-primary'>Agregar nueva consulta</a>
      </div>
      <div class="col-auto"></div>
    </div>
  </div>
</div>