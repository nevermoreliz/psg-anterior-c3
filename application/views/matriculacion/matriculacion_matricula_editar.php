<!-- <h4 class="card-title">Animated Line Inputs Form With Floating Labels</h4>
            <h6 class="card-subtitle">Just add <code>floating-labels</code> class to the form.</h6> -->
<?= form_open('', ['class' => 'floating-labels m-t-20', 'id' => 'form_matricula_editar', 'enctype' => 'multipart/form-data']); ?>

<?php if (isset($matricula->id_planificacion_programa) && isset($matricula->id_persona)) : ?>
    <input name="id_planificacion_programa" type="hidden" value="<?= $matricula->id_planificacion_programa ?>">
    <input name="id_persona" type="hidden" value="<?= $matricula->id_persona ?>">
    <input name="id_pago_programa" type="hidden" value="<?= $matricula->id_pago_programa ?>">
    <input name="id_matricula_gestion" type="hidden" value="<?= $matricula->id_matricula_gestion ?>">
<?php endif ?>
<div class="row">
    <div class="col-lg-4">
        <div class="form-group m-b-40">
            <input type="number" class="form-control" name="numero_serie" id="numero_serie" value="<?= isset($matricula->numero_serie) ? $matricula->numero_serie : '' ?>" data-toggle="tooltip" data-placement="bottom" title="Digite el numero de serie">
            <span class="bar"></span>
            <label class="font-weight-bold" for="numero_serie">Nro. Serie:</label>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group m-b-40">
            <input type="number" class="form-control" name="monto_deposito" id="monto_deposito" value="<?= isset($matricula->monto_deposito) ? round($matricula->monto_deposito) : '' ?>" data-toggle="tooltip" data-placement="bottom" title="Digite el monto depositado">
            <span class="bar"></span>
            <label class="font-weight-bold" for=" monto_deposito">Monto Depositado:</label>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group m-b-40 focused">
            <select class="form-control p-0" name="categoria" id="categoria">
                <?php if ($matricula->categoria) : ?>
                    <?php foreach (['ANTIGUO' => 'ANTIGUO', 'NUEVO' => 'NUEVO'] as $key => $value) : ?>
                        <option value="<?= $value ?>" <?= $value == $matricula->categoria ? 'selected' : '' ?>><?= $value ?></option>
                    <?php endforeach ?>
                <?php else : ?>
                    <option></option>
                    <option value="ANTIGUO">ANTIGUO</option>
                    <option value="NUEVO">NUEVO</option>
                <?php endif; ?>
            </select>
            <span class="bar"></span>
            <label class="font-weight-bold" for="categoria">Categoría:</label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="form-group m-b-40">
            <input type="text" class="form-control" name="numero_deposito" id="numero_deposito" value="<?= isset($matricula->numero_deposito) ? $matricula->numero_deposito : '' ?>" data-toggle="tooltip" data-placement="bottom" title="Digite Nº de Comprobante Bancario">
            <span class="bar"></span>
            <label class="font-weight-bold" for="numero_deposito">Nro. Comprobante Bancario:</label>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group m-b-40">
            <input type="text" class="form-control" name="fecha_deposito" id="fecha_deposito" value="<?= isset($matricula->fecha_deposito) ? $matricula->fecha_deposito : '' ?>" data-toggle="tooltip" data-placement="bottom" title="Seleccione Fecha de Deposito">
            <span class="bar"></span>
            <label class="font-weight-bold" for="fecha_deposito">Fecha Depósito:</label>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group m-b-40">
            <input type="text" class="form-control" name="fecha_matriculacion" id="fecha_matriculacion" value="<?= isset($matricula->fecha_matriculacion) ? $matricula->fecha_matriculacion : '' ?>" data-toggle="tooltip" data-placement="bottom" title="Seleccione Fecha de Matriculacion">
            <span class="bar"></span>
            <label class="font-weight-bold" for="fecha_matriculacion">Fecha Matriculacion:</label>
        </div>
    </div>
</div>
<div class="d-flex flex-row-reverse form-actions">
    <div class="col-md-2">
        <button type="button" class="btn btn-rounded btn-block btn-warning btn-sm" data-dismiss="modal">Cancelar</button>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-rounded btn-block btn-info btn-sm" id="actualizar-matricula" data-id-persona="<?= $id_persona ?>" data-id-planificacion-programa="<?= $id_planificacion_programa ?>"><i class="mdi mdi-plus-circle"></i> Actualizar</button>
    </div>
</div>
<?= form_close() ?>