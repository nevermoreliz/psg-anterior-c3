<div class="card w-100">
    <h4 class="card-subtitle">Formulario de Registro de Modulo</h4>
    <div class="card-body">
        <?= form_open('', ['class' => 'floating-labels m-t-20', 'id' => 'form_modulo_programa', 'enctype' => 'multipart/form-data']); ?>
        <?php if (isset($modulo[0]['id_modulo_programa'])) : ?>
            <input name="id_modulo_programa" type="hidden" value="<?= $modulo[0]['id_modulo_programa'] ?>">
        <?php endif ?>
        <div class="row small">
            <div class="col-md-4">
                <div class="form-group m-b-40">
                    <select class="form-control p-0" name="id_tipo_modulo" id="id_tipo_modulo">
                        <?php if (isset($modulo[0]['id_tipo_modulo'])) : ?>
                            <?php foreach ($tipos_modulo as $key => $value) : ?>
                                <option value="<?= $value['id_tipo_modulo'] ?>" <?= $modulo[0]['id_tipo_modulo'] == $value['id_tipo_modulo'] ? 'selected' : '' ?>><?= $value['descripcion_tipo_modulo'] ?></option>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <?php foreach ($tipos_modulo as $key => $value) : ?>
                                <option value="<?= $value['id_tipo_modulo'] ?>"><?= $value['descripcion_tipo_modulo'] ?></option>
                            <?php endforeach; ?>
                        <?php endif ?>
                    </select><span class="bar"></span>
                    <label for="id_tipo_modulo">Tipo Modulo</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group m-b-40">
                    <select class="form-control p-0" name="numero_modulo" id="numero_modulo">
                        <?php if (isset($modulo[0]['numero_modulo'])) : ?>
                            <?php for ($i = 1; $i <= 30; $i++) : ?>
                                <option value="<?= $romano = numero_romano($i) ?>" <?= $modulo[0]['numero_modulo'] == $romano ? 'selected' : '' ?>><?= $romano  ?></option>
                            <?php endfor; ?>
                        <?php else : ?>
                            <?php for ($i = 1; $i <= 30; $i++) : ?>
                                <option value="<?= $romano = numero_romano($i) ?>"><?= $romano  ?></option>
                            <?php endfor; ?>
                        <?php endif ?>
                    </select><span class="bar"></span>
                    <label for="id_unidad">Numero de Modulo</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group m-b-40">
                    <input type="number" class="form-control" name="horas_academicas" id="horas_academicas" value="<?= isset($modulo[0]['horas_academicas']) ? $modulo[0]['horas_academicas'] : '' ?>">
                    <span class="bar"></span>
                    <label for="horas_academicas">Horas Academicas</label>
                </div>
            </div>

        </div>
        <div class="row small">
            <div class="col-md-4">
                <div class="form-group m-b-40">
                    <input type="text" class="form-control" name="nombre_modulo_programa" id="nombre_modulo_programa" value="<?= isset($modulo[0]['nombre_modulo_programa']) ? $modulo[0]['nombre_modulo_programa'] : '' ?>">
                    <span class="bar"></span>
                    <label for="nombre_modulo_programa">Nombre Modulo</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group m-b-40">
                    <input type="text" class="form-control" name="descripcion_modulo_programa" id="descripcion_modulo_programa" value="<?= isset($modulo[0]['descripcion_modulo_programa']) ? $modulo[0]['descripcion_modulo_programa'] : '' ?>">
                    <span class="bar"></span>
                    <label for="descripcion_modulo_programa">Descripción Modulo</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group m-b-40">
                    <select class="form-control p-0" name="estado_modulo_programa" id="estado_modulo_programa">
                        <?php if (isset($modulo[0]['estado_modulo_programa'])) : ?>
                            <?php foreach (['PENDIENTE', 'APROBADO', 'INACTIVO'] as $key => $value) : ?>
                                <option value="<?= $value ?>" <?= $modulo[0]['estado_modulo_programa'] == $value ? 'selected' : '' ?>><?= $value ?></option>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <?php foreach (['PENDIENTE', 'APROBADO', 'INACTIVO'] as $key => $value) : ?>
                                <option value="<?= $value ?>"><?= $value  ?></option>
                            <?php endforeach; ?>
                        <?php endif ?>
                    </select><span class="bar"></span>
                    <label for="estado_modulo_programa">Estado Programa</label>
                </div>
            </div>

        </div>
        <div class="d-flex flex-row-reverse">
            <div class="col-md-2">
                <button type="button" class="btn btn-rounded btn-block btn-warning btn-sm" id="cancelar_modulo_programa">Cancelar</button>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-rounded btn-block btn-info btn-sm" id="<?= isset($modulo) ? 'actualizar_modulo_programa' : 'insertar_modulo_programa' ?>" type="submit"><i class="mdi mdi-plus-circle"></i> <?= isset($modulo) ? 'Actualizar Modulo' : 'Insertar Modulo' ?></button>
            </div>
        </div>
        <?= form_close() ?>
    </div>
</div>