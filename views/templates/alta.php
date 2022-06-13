<!-- FORMULARIO DE ALTA DE CONSULTA -->
<div class="container p-4">
    <h3 class="text-center">Agregar nueva consulta</h3>
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="#" method="POST" class="col-12">
                        <div class="form-group mb-3">
                            <label for="inputFechaHora" class="form-label">Fecha y hora</label>
                            <input type="datetime-local" class="form-control" id="inputFechaHora" aria-describedby="fechaHoraHelp">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="inputFechaHora" class="form-label">Modalidad</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="modalidad" id="modalidad1" value="presencial" checked>
                                        <label class="form-check-label" for="modalidad1">
                                            Presencial
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="modalidad" id="modalidad2" value="virtual">
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
                                <option value="1">Entornos Gráficos</option>
                                <option value="2">Matemática Superior</option>
                                <option value="3">Teoría de Control</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="profesor" class="form-label">Profesor</label>
                            <select class="form-select" aria-label="Seleccione un profesor" id="profesor" name="profesor">
                                <option selected>Seleccione un profesor</option>
                                <option value="1"></option>
                                <option value="2"></option>
                                <option value="3"></option>
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