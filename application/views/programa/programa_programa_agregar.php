<?= form_open('', ['class' => 'floating-labels m-t-20', 'id' => 'form_planificacion_programa', 'enctype' => 'multipart/form-data']); ?>
<?php if (isset($programa['id_planificacion_programa'])) : ?>
    <input name="id_planificacion_programa" type="hidden" value="<?= $programa['id_planificacion_programa'] ?>">
<?php endif ?>

<div class="row small">
    <div class="col-md-1">
        <div class="form-group has-error m-b-20">
            <select class="form-control p-0" name="id_gestion" id="id_gestion">
                <option></option>
                <?php if (isset($programa['id_gestion'])) : ?>
                    <?php foreach ($gestiones as $key => $value) : ?>
                        <option value="<?= $value['id_gestion'] ?>" <?= $programa['id_gestion'] == $value['id_gestion'] ? 'selected' : '' ?>><?= $value['gestion'] ?></option>
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
        <div class="form-group has-error m-b-20">
            <select class="form-control p-0" name="id_unidad" id="id_unidad">
                <option></option>
                <?php foreach ($unidades as $key => $value) : ?>
                    <option value="<?= $value['id_unidad'] ?>" <?= ($value['id_unidad'] == (isset($programa['id_unidad']) ? $programa['id_unidad'] : "")) ? 'selected="selected"' : "" ?>><?= $value['tipo_unidad'] . ".: " . $value['denominacion_sede'] . ".: " . $value['nombre_unidad'] ?></option>
                <?php endforeach; ?>
            </select><span class="bar"></span>
            <label for="id_unidad">Sede - Unidad</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group has-error  m-b-20">
            <select class="form-control p-0" name="id_tipo_programa" id="id_tipo_programa">
                <option></option>
                <?php if (isset($programa['id_tipo_programa'])) : ?>
                    <?php foreach ($tipos_programas as $key => $value) : ?>
                        <option value="<?= $value['id_tipo_programa'] ?>" <?= $programa['id_tipo_programa'] == $value['id_tipo_programa'] ? 'selected' : '' ?>><?= $value['nombre_tipo_programa'] ?></option>
                    <?php endforeach; ?>
                <?php else : ?>
                    <?php foreach ($tipos_programas as $key => $value) : ?>
                        <option value="<?= $value['id_tipo_programa'] ?>"><?= $value['nombre_tipo_programa'] ?></option>
                    <?php endforeach; ?>
                <?php endif ?>
            </select><span class="bar"></span>
            <label for="id_tipo_programa">Modalidad</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group has-error  m-b-20">
            <select class="form-control p-0" name="id_grado_academico" id="id_grado_academico">
                <option></option>
                <?php if (isset($programa['id_grado_academico'])) : ?>
                    <?php foreach ($grados_academicos as $key => $value) : ?>
                        <option value="<?= $value['id_grado_academico'] ?>" <?= $programa['id_grado_academico'] == $value['id_grado_academico'] ? 'selected' : '' ?>><?= $value['descripcion_grado_academico'] ?></option>
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
        <div class="form-group has-error m-b-20">
            <select class="form-control p-0" name="numero_version" id="numero_version">
                <option></option>
                <?php if (isset($programa['numero_version'])) : ?>
                    <?php for ($i = 1; $i <= 30; $i++) : ?>
                        <option value="<?= $romano = numero_romano($i) ?>" <?= $programa['numero_version'] == $romano ? 'selected' : '' ?>><?= $romano  ?></option>
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
    <div class="col-md-5">
        <div class="form-group m-b-20">
            <input type="text" class="form-control text-uppercase" name="nombre_programa" id="nombre_programa" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?= isset($programa['nombre_programa']) ? $programa['nombre_programa'] : '' ?>">
            <span class="bar"></span>
            <label for="nombre_programa">Nombre Programa</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group m-b-20">
            <input type="text" class="form-control text-uppercase" name="sigla_programa" id="sigla_programa" readonly value="<?= isset($programa['sigla_programa']) ? $programa['sigla_programa'] : '' ?>">
            <span class="bar"></span>
            <label for="sigla_programa">Sigla</label>
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group has-success m-b-20">
            <input type="text" class="form-control" name="fecha_inicio" id="fecha_inicio" value="<?= isset($programa['fecha_inicio']) ? $programa['fecha_inicio'] : '' ?>">
            <span class="bar"></span>
            <label for="fecha_inicio">Fecha Inicio</label>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group has-warning m-b-20">
            <input type="text" class="form-control" name="fecha_fin" id="fecha_fin" value="<?= isset($programa['fecha_fin']) ? $programa['fecha_fin'] : '' ?>">
            <span class="bar"></span>
            <label for="fecha_fin">Fecha Fin</label>
        </div>
    </div>
</div>
<div class="row small">
    <div class="col-md-3">
        <div class="form-group m-b-20">
            <input type="text" class="form-control" name="costo_colegiatura" id="costo_colegiatura" value="<?= isset($programa['costo_colegiatura']) ? round($programa['costo_colegiatura']) : '' ?>">
            <span class="bar"></span>
            <label for="costo_colegiatura">Costo Colegiatura</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group m-b-20">
            <input type="text" class="form-control" name="costo_matricula" id="costo_matricula" value="<?= isset($programa['costo_matricula']) ? round($programa['costo_matricula']) : '' ?>">
            <span class="bar"></span>
            <label for="costo_matricula">Costo Matricula</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group m-b-20">
            <input type="text" class="form-control" name="descuento_individual" id="descuento_individual" value="<?= isset($programa['descuento_individual']) ? round($programa['descuento_individual']) : '' ?>">
            <span class="bar"></span>
            <label for="descuento_individual">Descuento al Contado</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group m-b-20">
            <input type="text" class="form-control" name="creditaje" id="creditaje" value="<?= isset($programa['creditaje']) ? $programa['creditaje'] : '' ?>">
            <span class="bar"></span>
            <label for="creditaje">Carga Horaria Total</label>
        </div>
    </div>
</div>
<div class="row small">
    <div class="col-md-8">
        <div class="form-group has-success m-b-20">
            <input type="text" class="form-control text-uppercase" name="descripcion_programa" id="descripcion_programa" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?= isset($programa['descripcion_programa']) ? $programa['descripcion_programa'] : '' ?>">
            <span class="bar"></span>
            <label for="descripcion_programa">Responsable del Programa</label>
        </div>
    </div>
    <div class="col-md-4">
        <?= isset($ss) ? $ss : '' ?>
    </div>
</div>
<div class="row small">
    <div class="col-md-3">
        <div class="form-group m-b-20">
            <input type="text" class="form-control" name="numero_partida_ceub" value="<?= isset($programa['numero_partida_ceub']) ? $programa['numero_partida_ceub'] : '' ?>">
            <span class="bar"></span>
            <label for="numero_partida_ceub">Partida CEUB</label>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group m-b-20">
            <input type="text" class="form-control" name="numero_folio_ceub" value="<?= isset($programa['numero_folio_ceub']) ? $programa['numero_folio_ceub'] : '' ?>">
            <span class="bar"></span>
            <label for="numero_folio_ceub">Numero Folio CEUB</label>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group m-b-20">
            <input type="text" class="form-control" name="fecha_registro_ceub" value="<?= isset($programa['fecha_registro_ceub']) ? $programa['fecha_registro_ceub'] : '' ?>">
            <span class="bar"></span>
            <label for="fecha_registro_ceub">Fecha Registro CEUB</label>
        </div>
    </div>
    <div class="col-md-4">
        <?= isset($ww) ? $ww : '' ?>
    </div>
</div>
<div class="row small">
    <div class="col-md-4">
        <div class="form-group has-error m-b-20">
            <input type="text" class="form-control" name="haber_basico_docente" id="haber_basico_docente" value="<?= isset($programa['haber_basico_docente']) ? round($programa['haber_basico_docente']) : '' ?>">
            <span class="bar"></span>
            <label for="haber_basico_docente">Haber Basico Docente</label>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group has-success m-b-20">
            <input type="text" class="form-control" name="haber_basico_coordinador" id="haber_basico_coordinador" value="<?= isset($programa['haber_basico_coordinador']) ? round($programa['haber_basico_coordinador']) : '' ?>">
            <span class="bar"></span>
            <label for="haber_basico_coordinador">Haber Basico Coordinador</label>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group has-warning m-b-20">
            <input type="text" class="form-control" name="haber_basico_coloquio" id="haber_basico_coloquio" value="<?= isset($programa['haber_basico_coloquio']) ? round($programa['haber_basico_coloquio']) : '' ?>">
            <span class="bar"></span>
            <label for="haber_basico_coloquio">Haber Basico Coloquio</label>
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