<h1 class="text-center">Registro de Novedades</h1>
<div class="row justify-content-center mb-3">
    <form id="formNovedad" class="col-lg-5 border bg-light p-3">
        <input type="hidden" name="novedad_id" id="novedad_id">
        <div class="row mb-3">
            <div class="col">
                <label for="novedad_descripcion">Descripcion</label>
                <input type="text" name="novedad_descripcion" id="novedad_descripcion" class="form-control" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" id="btnGuardar" class="btn btn-success w-100"> <i class="bi bi-save"></i>Guardar</button>
            </div>
            <div class="col">
                <button type="button" id="btnModificar" class="btn btn-warning w-100">Modificar</button>
            </div>
            <div class="col">
                <button type="button" id="btnCancelar" class="btn btn-danger w-100">Cancelar</button>
            </div>
        </div>
    </form>
</div>
<h2 class="text-center mb-4">Novedades Registradas</h2>
<div class="row">
    <div class="col table-responsive">
        <table class="table table-bordered table-hover w-100" id="tablaNovedad">
        </table>
    </div>
</div>

<script src="<?= asset('./build/js/novedad/index.js') ?>"></script>