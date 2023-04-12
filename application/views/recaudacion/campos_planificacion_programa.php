<?= form_open('', ['class' => 'floating-labels m-t-20', 'id' => 'form_planificacion_programa', 'enctype' => 'multipart/form-data']); ?>
<?php if (isset($programa[0]['id_planificacion_programa'])) : ?>
    <input name="id_planificacion_programa" type="hidden" value="<?= $programa[0]['id_planificacion_programa'] ?>">
<?php endif ?>

<div class="row small">
    <div class="col-md-1">
        <div class="form-group has-error m-b-40">
            <select class="form-control p-0" name="id_gestion" id="id_gestion">
                <?php if (isset($programa[0]['id_gestion'])) : ?>
                    <?php foreach ($gestiones as $key => $value) : ?>
                        <option value="<?= $value['id_gestion'] ?>" <?= $programa[0]['id_gestion'] == $value['id_gestion'] ? 'selected' : '' ?>><?= $value['gestion'] ?></option>
                    <?php endforeach; ?>
                <?php else : ?>
                    <?php foreach ($gestiones as $key => $value) : ?>
                        <option value="<?= $value['id_gestion'] ?>"><?= $value['gestion'] ?></option>
                    <?php endforeach; ?>
                <?php endif ?>
            </select><span class="bar"></span>
            <label for="id_gestion">Gestión</label>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group has-error m-b-40">
            <select class="form-control p-0" name="id_unidad" id="id_unidad">
                <?php if (isset($programa[0]['id_unidad'])) : ?>
                    <?php foreach ($unidades as $key => $value) : ?>
                        <option value="<?= $value['id_unidad'] ?>" <?= $programa[0]['id_unidad'] == $value['id_unidad'] ? 'selected' : '' ?>><?= $value['nombre_unidad'] ?></option>
                    <?php endforeach; ?>
                <?php else : ?>
                    <?php foreach ($unidades as $key => $value) : ?>
                        <option value="<?= $value['id_unidad'] ?>"><?= $value['nombre_unidad'] ?></option>
                    <?php endforeach; ?>
                <?php endif ?>
            </select><span class="bar"></span>
            <label for="id_unidad">Unidad</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group has-error  m-b-40">
            <select class="form-control p-0" name="id_tipo_programa" id="id_tipo_programa">
                <?php if (isset($programa[0]['id_tipo_programa'])) : ?>
                    <?php foreach ($tipos_programas as $key => $value) : ?>
                        <option value="<?= $value['id_tipo_programa'] ?>" <?= $programa[0]['id_tipo_programa'] == $value['id_tipo_programa'] ? 'selected' : '' ?>><?= $value['nombre_tipo_programa'] ?></option>
                    <?php endforeach; ?>
                <?php else : ?>
                    <?php foreach ($tipos_programas as $key => $value) : ?>
                        <option value="<?= $value['id_tipo_programa'] ?>"><?= $value['nombre_tipo_programa'] ?></option>
                    <?php endforeach; ?>
                <?php endif ?>
            </select><span class="bar"></span>
            <label for="id_tipo_programa">Tipo Programa</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group has-error  m-b-40">
            <select class="form-control p-0" name="id_grado_academico" id="id_grado_academico">
                <?php if (isset($programa[0]['id_grado_academico'])) : ?>
                    <?php foreach ($grados_academicos as $key => $value) : ?>
                        <option value="<?= $value['id_grado_academico'] ?>" <?= $programa[0]['id_grado_academico'] == $value['id_grado_academico'] ? 'selected' : '' ?>><?= $value['descripcion_grado_academico'] ?></option>
                    <?php endforeach; ?>
                <?php else : ?>
                    <?php foreach ($grados_academicos as $key => $value) : ?>
                        <option value="<?= $value['id_grado_academico'] ?>"><?= $value['descripcion_grado_academico'] ?></option>
                    <?php endforeach; ?>
                <?php endif ?>
            </select><span class="bar"></span>
            <label for="id_grado_academico">Grado Academico</label>
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group has-error m-b-40">
            <select class="form-control p-0" name="numero_version" id="numero_version">
                <?php if (isset($programa[0]['numero_version'])) : ?>
                    <?php for ($i = 1; $i <= 30; $i++) : ?>
                        <option value="<?= $romano = numero_romano($i) ?>" <?= $programa[0]['numero_version'] == $romano ? 'selected' : '' ?>><?= $romano  ?></option>
                    <?php endfor; ?>
                <?php else : ?>
                    <?php for ($i = 1; $i <= 30; $i++) : ?>
                        <option value="<?= $romano = numero_romano($i) ?>"><?= $romano  ?></option>
                    <?php endfor; ?>
                <?php endif ?>
            </select><span class="bar"></span>
            <label for="numero_version">Version</label>
        </div>
    </div>
</div>
<div class="row small">
    <div class="col-md-6">
        <div class="form-group m-b-40">
            <input type="text" class="form-control" name="nombre_programa" id="nombre_programa" value="<?= isset($programa[0]['nombre_programa']) ? $programa[0]['nombre_programa'] : '' ?>">
            <span class="bar"></span>
            <label for="nombre_programa">Nombre Programa</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group m-b-40">
            <input type="text" class="form-control" name="mencion_programa" id="mencion_programa" value="<?= isset($programa[0]['mencion_programa']) ? $programa[0]['mencion_programa'] : '' ?>">
            <span class="bar"></span>
            <label for="mencion_programa">Mención</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group m-b-40">
            <input type="text" class="form-control" name="nominacion_titulo" id="nominacion_titulo" value="<?= isset($programa[0]['nominacion_titulo']) ? $programa[0]['nominacion_titulo'] : '' ?>">
            <span class="bar"></span>
            <label for="nominacion_titulo">Nominacion Titulo</label>
        </div>
    </div>
</div>
<div class="row small">
    <div class="col-md-3">
        <div class="form-group has-success m-b-40">
            <input type="text" class="form-control" name="fecha_inicio" id="fecha_inicio" value="<?= isset($programa[0]['fecha_inicio']) ? $programa[0]['fecha_inicio'] : date('Y-m-d') ?>">
            <span class="bar"></span>
            <label for="fecha_inicio">Fecha Inicio</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group has-warning m-b-40">
            <input type="text" class="form-control" name="fecha_fin" id="fecha_fin" value="<?= isset($programa[0]['fecha_fin']) ? $programa[0]['fecha_fin'] : date('Y-m-d') ?>">
            <span class="bar"></span>
            <label for="fecha_fin">Fecha Fin</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group m-b-40">
            <input type="text" class="form-control" name="costo_colegiatura" id="costo_colegiatura" value="<?= isset($programa[0]['costo_colegiatura']) ? $programa[0]['costo_colegiatura'] : '' ?>">
            <span class="bar"></span>
            <label for="costo_colegiatura">Costo Colegiatura</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group m-b-40">
            <input type="text" class="form-control" name="costo_matricula" id="costo_matricula" value="<?= isset($programa[0]['costo_matricula']) ? $programa[0]['costo_matricula'] : '' ?>">
            <span class="bar"></span>
            <label for="costo_matricula">Costo Matricula</label>
        </div>
    </div>
</div>
<div class="row small">
    <div class="col-md-6">
        <div class="form-group has-success m-b-40">
            <input type="text" class="form-control" name="descripcion_programa" id="descripcion_programa" value="<?= isset($programa[0]['descripcion_programa']) ? $programa[0]['descripcion_programa'] : '' ?>">
            <span class="bar"></span>
            <label for="descripcion_programa">Nro. Partida CEUB</label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group has-success m-b-40">
            <input type="text" class="form-control" id="partida_ceub">
            <span class="bar"></span>
            <label for="partida_ceub">Nro. Folio CEUB</label>
        </div>
    </div>
</div>
<div class="row small">
    <div class="col-md-3">
        <div class="form-group has-error m-b-40">
            <input type="text" class="form-control" name="haber_basico_docente" id="haber_basico_docente" value="<?= isset($programa[0]['haber_basico_docente']) ? round($programa[0]['haber_basico_docente']) : '' ?>">
            <span class="bar"></span>
            <label for="haber_basico_docente">Haber Basico Docente</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group has-success m-b-40">
            <input type="text" class="form-control" name="haber_basico_coordinador" id="haber_basico_coordinador" value="<?= isset($programa[0]['haber_basico_coordinador']) ? round($programa[0]['haber_basico_coordinador']) : '' ?>">
            <span class="bar"></span>
            <label for="haber_basico_coordinador">Haber Basico Coordinador</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group has-warning m-b-40">
            <input type="text" class="form-control" name="haber_basico_coloquio" id="haber_basico_coloquio" value="<?= isset($programa[0]['haber_basico_coloquio']) ? round($programa[0]['haber_basico_coloquio']) : '' ?>">
            <span class="bar"></span>
            <label for="haber_basico_coloquio">Haber Basico Coloquio</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group m-b-40">
            <select class="form-control p-0" name="estado_programa" id="estado_programa">
                <?php if (isset($programa[0]['estado_programa'])) : ?>
                    <?php foreach (['ACTIVO', 'APROBADO', 'PROPUESTO', 'OBSERVADO', 'INACTIVO'] as $key => $value) : ?>
                        <option value="<?= $value ?>" <?= $programa[0]['estado_programa'] == $value ? 'selected' : '' ?>><?= $value ?></option>
                    <?php endforeach; ?>
                <?php else : ?>
                    <?php foreach (['ACTIVO', 'APROBADO', 'PROPUESTO', 'OBSERVADO', 'INACTIVO'] as $key => $value) : ?>
                        <option value="<?= $value ?>"><?= $value  ?></option>
                    <?php endforeach; ?>
                <?php endif ?>
            </select><span class="bar"></span>
            <label for="estado_programa">Estado Programa</label>
        </div>
    </div>
</div>
<div class="d-flex flex-row-reverse form-actions">
    <div class="col-md-2">
        <button type="button" class="btn btn-rounded btn-block btn-warning btn-sm" data-dismiss="modal">Cancelar</button>
    </div>
    <div class="col-md-2">
        <button type="button" class="btn btn-rounded btn-block btn-info btn-sm" id="<?= isset($programa) ? 'actualizar_planificacion_programa' : 'insertar_planificacion_programa' ?>" type="submit"><i class="mdi mdi-plus-circle"></i> <?= isset($programa) ? 'Actualizar Programa' : 'Insertar Programa' ?></button>
    </div>
</div>
</form>
