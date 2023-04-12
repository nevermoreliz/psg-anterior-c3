<?= form_open('', ['class' => 'floating-labels', 'id' => 'form_matricula_agregar', 'enctype' => 'multipart/form-data', 'novalidate' => 'true']); ?>
<div class="body">
    <?php if (isset($programa->id_planificacion_programa) && isset($posgraduante['id_persona'])) : ?>
        <input name="id_planificacion_programa" type="hidden" value="<?= $programa->id_planificacion_programa ?>">
        <input name="id_persona" type="hidden" value="<?= $posgraduante['id_persona'] ?>">
    <?php endif ?>
    <div class="row m-b-40 text-center">
        <ul class="list-icons col">
            <li class="font-weight-bold">Grado: <?= $programa->descripcion_grado_academico ?></a></li>
            <li class="font-weight-bold">Modalidad: <?= $programa->nombre_tipo_programa ?></a></li>
        </ul>
        <ul class="list-icons col">
            <li class="font-weight-bold"><?= $programa->nombre_unidad ?></a></li>
            <li class="font-weight-bold">Matrícula: <?= $programa->costo_matricula ?></a></li>
        </ul>
        <ul class="list-icons col">
            <li class="font-weight-bold">Colegiatura: <?= $programa->costo_colegiatura ?></a></li>
            <li class="font-weight-bold">Gestión Actual: <?= $gestion_vigente['gestion'] ?></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group m-b-40">
                <select class="form-control p-0" name="id_gestion" id="id_gestion">
                    <?php foreach (array_reverse($gestiones) as $key => $value) : ?>
                        <option value="<?= $value ?>"><?= $value + 2000; ?></option>
                    <?php endforeach ?>

                </select>
                <span class="bar"></span>
                <label class="font-weight-bold" for="id_gestion">Gestión a Matricular:</label>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group m-b-40">
                <select class="form-control p-0" name="categoria" id="categoria" required>
                    <option value="NUEVO">NUEVO</option>
                    <option value="ANTIGUO">ANTIGUO</option>
                </select>
                <span class="bar"></span>
                <label class="font-weight-bold" for="categoria">Categoría:</label>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group m-b-40">
                <input type="text" class="form-control" name="fecha_matriculacion" id="fecha_matriculacion" value="<?= strftime('%d %B, %Y', time()); ?>" disabled>
                <span class="bar"></span>
                <label class="font-weight-bold" for="fecha_matriculacion">Fecha Matriculacion:</label>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group m-b-40">
                <input type="hidden" id="numero_matricula" name="numero_matricula" value="<?= $matricula_correlativo; ?>" />
                <input type="text" class="form-control" name="numero_serie" id="numero_serie" maxlength="10" required>
                <span class="bar"></span>
                <label class="font-weight-bold" for="numero_serie">Nro. Serie:</label>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group m-b-40">
                <?php if (is_array($registro_universitario_correlativo)) : ?>
                    <select class="form-control p-0" name="registro_universitario" id="registro_universitario">
                        <?php foreach ($registro_universitario_correlativo as $regunive) : ?>
                            <option value="<?php echo $regunive; ?>"><?php echo $regunive; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="bar"></span>
                    <label class="font-weight-bold" for="registro_universitario">Registro Universitario:</label>
                <?php else : ?>
                    <input type="hidden" class="form-control" name="registro_universitario" id="registro_universitario" value="<?= $registro_universitario_correlativo; ?>">
                    <input type="text" class="form-control" value="<?= $registro_universitario_correlativo; ?>" disabled>
                    <span class="bar"></span>
                    <label class="font-weight-bold" for="registro_universitario">Registro Universitario: <span class="badge badge-danger">Generado Autom&aacute;ticamente</span></label>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group m-b-40">
                <input type="text" class="form-control" name="monto_deposito" id="monto_deposito" value="<?= isset($programa->costo_matricula) ? round($programa->costo_matricula) : '' ?>" data-toggle="tooltip" data-placement="bottom" title="Digite el monto depositado" maxlength="5" required>
                <span class="bar"></span>
                <label class="font-weight-bold" for="monto_deposito">Monto Depositado:</label>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group m-b-40">
                <input type="text" class="form-control" name="numero_deposito" id="numero_deposito" data-toggle="tooltip" data-placement="bottom" title="Digite Nº de Comprobante Bancario" maxlength="30" required>
                <span class="bar"></span>
                <label class="font-weight-bold" for="numero_deposito">Nro. Comprobante Bancario:</label>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group m-b-40">
                <input type="text" class="form-control" name="fecha_deposito" id="fecha_deposito" data-toggle="tooltip" data-placement="bottom" title="Seleccione Fecha de Deposito" required>
                <span class="bar"></span>
                <label class="font-weight-bold" for="fecha_deposito">Fecha Depósito:</label>
            </div>
        </div>
    </div>
    <div class="d-flex flex-row-reverse form-actions">
        <div class="col-md-2">
            <button type="button" class="btn btn-rounded btn-block btn-warning btn-sm" data-dismiss="modal">Cancelar</button>
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-rounded btn-block btn-info btn-sm" id="insertar-matricula" data-id-persona="<?= $posgraduante['id_persona'] ?>" data-id-planificacion-programa="<?= $programa->id_planificacion_programa ?>"><i class="mdi mdi-plus-circle"></i> Registrar Matricula</button>
        </div>
    </div>
</div>
<?= form_close() ?>