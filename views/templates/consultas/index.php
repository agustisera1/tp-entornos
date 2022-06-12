<div class="container">
  <div class="row">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Materia</th>
      <th scope="col">Profesor</th>
      <th scope="col">Modalidad</th>
      <th scope="col">Fecha y hora</th>
      <th scope="col">Operaciones</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Entornos Gráficos</td>
      <td>-</td>
      <td>Presencial</td>
      <td>13/06/22 14:00</td>
      <td>
        <!-- Si es administrador se muestra esto -->
        <div class="btn-group">
          <button class="btn btn-info" id="editar">Editar</button>
          <button class="btn btn-danger" id="eliminar">Eliminar</button>
        </div>
        <!-- Si es usuario se muestra esto -->
        <button class="btn btn-primary" id="asistir">Asistir</button>
      </td>
    </tr>
  </tbody>
</table>
  </div>
</div>