<!-- FORMULARIO DE LOGUEO -->
<?php
require_once "./controllers/consultaController.php";

$consultaId = $vista[1];

if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_SESSION["rol"]) and $_SESSION["rol"] == "Profesor") {
    bloquearConsulta($consultaId);
}
?>
<div class="container p-4">
    <h3 class="text-center">Bloqueo consulta</h3>
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action=<?= "$URL/motivo_bloqueo/" . $consultaId ?> method="POST" class="col-12">
                        <div class="form-group mb-3">
                            <label for="inputMotivo" class="form-label">Motivo</label>
                            <input type="text" class="form-control" id="inputMotivo" aria-describedby="" name="motivo">
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-primary" id="registrarBloqueo">Registrar bloqueo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  motivo = document.getElementById("inputMotivo")
  bloqueo = document.getElementById("registrarBloqueo")

  bloqueo.addEventListener("click", ($event) => {
    if(motivo.value.length == 0){
      $event.preventDefault()
      alert("Faltan rellenar campos")
    }
  })
</script>