<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title">Animated Line Inputs Form With Floating Labels</h4>
                <h6 class="card-subtitle">Just add <code>floating-labels</code> class to the form and
                    <code>has-warning, has-success, has-danger & has-error</code> for various inputs.
                    For input with icon add <code>has-feedback</code> class.</h6> -->

                <!-- <form class="floating-labels m-t-10"> -->
                <?= form_open('', ['class' => 'floating-labels m-t-20', 'id' => 'form_capacitacion_persona', 'enctype' => 'multipart/form-data']); ?>

                <!-- campos ocultos -->
                <input type="hidden" name="id_persona" id="id_persona" value="<?= $persona[0]['id_persona'] ?>">
                <?php if (isset($capacitacion_persona[0]['id_capacitacion_persona'])) : ?>
                    <input type="hidden" name="id_capacitacion_persona" id="id_capacitacion_persona" value="<?= $capacitacion_persona[0]['id_capacitacion_persona'] ?>">
                <?php endif ?>


                <div class="row">


                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <div class="form-group has-success m-b-40">
                            <select class="form-control input-sm p-0" id="id_tipo_capacitacion" name="id_tipo_capacitacion">
                                <option value="SIN SELECCIONAR">-- SELECCIONAR --</option>
                                <?php if (isset($capacitacion_persona[0]['id_tipo_capacitacion'])) : ?>
                                    <?php foreach ($tipos_capacitacion as $key => $tipo_capacitacion) : ?>
                                        <option value="<?= $tipo_capacitacion['id_tipo_capacitacion'] ?>" <?= $capacitacion_persona[0]['id_tipo_capacitacion'] == $tipo_capacitacion['id_tipo_capacitacion'] ? 'selected' : '' ?>><?= $tipo_capacitacion['tipo_capacitacion'] ?></option>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <?php foreach ($tipos_capacitacion as $key => $tipo_capacitacion) : ?>
                                        <option value="<?= $tipo_capacitacion['id_tipo_capacitacion'] ?>"><?= $tipo_capacitacion['tipo_capacitacion'] ?></option>
                                    <?php endforeach; ?>
                                <?php endif ?>
                            </select><span class="bar"></span>
                            <label for="id_tipo_capacitacion">Tipo Capacitaci&oacute;n</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-12 col-xl-6">
                        <div class="form-group has-success m-b-40">
                            <input type="text" class="form-control" name="fecha_capacitacion" id="fecha_capacitacion" value="<?= isset($capacitacion_persona[0]['fecha_capacitacion']) ? $capacitacion_persona[0]['fecha_capacitacion'] : date('Y-m-d') ?>">
                            <span class="bar"></span>
                            <label for="fecha_capacitacion">Fecha Capacitaci&oacute;n</label>
                        </div>
                    </div>
                </div>

                <div class="form-group m-b-40">
                    <input type="text" required class="form-control input-sm text-uppercase" id="nombre_capacitacion" name="nombre_capacitacion" value="<?= isset($capacitacion_persona[0]['nombre_capacitacion']) ? $capacitacion_persona[0]['nombre_capacitacion'] : '' ?>">
                    <span class="bar"></span>
                    <label for="nombre_capacitacion">Nombre Capacitaci&oacute;n</label>
                </div>
                <div class="form-group  m-b-40">
                    <input type="text" class="form-control input-sm text-uppercase" id="institucion_capacitacion" name="institucion_capacitacion" value="<?= isset($capacitacion_persona[0]['institucion_capacitacion']) ? $capacitacion_persona[0]['institucion_capacitacion'] : '' ?>">
                    <span class="bar"></span>
                    <label for="institucion_capacitacion">Instituci&oacute;n Capacitaci&oacute;n</label>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <div class="form-group  m-b-40">
                            <input type="text" class="form-control input-sm" id="horas_capacitacion" name="horas_capacitacion" value="<?= isset($capacitacion_persona[0]['horas_capacitacion']) ? $capacitacion_persona[0]['horas_capacitacion'] : '' ?>">
                            <span class="bar"></span>
                            <label for="horas_capacitacion">Horas Capacitaci&oacute;n</label>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <!-- <div class="form-group  has-feedback m-b-40">
                            <input type="text" class="form-control input-sm text-uppercase" id="modalidad_capacitacion" name="modalidad_capacitacion"><span class="bar"></span>
                            <label for="modalidad_capacitacion">Modalidad Capacitaci&oacute;n</label>
                        </div> -->
                        <div class="form-group has-success m-b-40">
                            <select class="form-control input-sm p-0" id="modalidad_capacitacion" name="modalidad_capacitacion">

                                <option value="PRESENCIAL" <?php if (isset($capacitacion_persona[0]['modalidad_capacitacion'])) echo ($capacitacion_persona[0]['modalidad_capacitacion'] == 'PRESENCIAL' ? 'selected="selected"' : '') ?>>PRESENCIAL</option>
                                <option value="SEMI-PRESENCIAL" <?php if (isset($capacitacion_persona[0]['modalidad_capacitacion'])) echo ($capacitacion_persona[0]['modalidad_capacitacion'] == 'SEMI-PRESENCIAL' ? 'selected="selected"' : '') ?>>SEMI-PRESENCIAL</option>
                                <option value="VIRTUAL" <?php if (isset($capacitacion_persona[0]['modalidad_capacitacion'])) echo ($capacitacion_persona[0]['modalidad_capacitacion'] == 'VIRTUAL' ? 'selected="selected"' : '') ?>>VIRTUAL</option>
                            </select><span class="bar"></span>
                            <label for="modalidad_capacitacion">Estado Capacitaci&oacute;n</label>
                        </div>

                    </div>
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <div class="form-group  has-feedback m-b-40">
                            <input type="text" class="form-control input-sm text-uppercase" id="calidad_participacion" name="calidad_participacion" value="<?= isset($capacitacion_persona[0]['calidad_participacion']) ? $capacitacion_persona[0]['calidad_participacion'] : '' ?>">
                            <span class="bar"></span>
                            <label for="calidad_participacion">Calidad Participaci&oacute;n</label>
                        </div>
                    </div>
                </div>


                <div class="form-group  has-feedback m-b-40">
                    <input type="text" class="form-control input-sm text-uppercase" id="descripcion_capacitacion" name="descripcion_capacitacion" value="<?= isset($capacitacion_persona[0]['descripcion_capacitacion']) ? $capacitacion_persona[0]['descripcion_capacitacion'] : '' ?>">
                    <span class="bar"></span>
                    <label for="descripcion_capacitacion">Descripci&oacute;n Capacitaci&oacute;n</label>
                </div>
                <div class="form-group  has-feedback m-b-40">
                    <input type="text" class="form-control input-sm text-uppercase" id="observacion_capacitacion" name="observacion_capacitacion" value="<?= isset($capacitacion_persona[0]['observacion_capacitacion']) ? $capacitacion_persona[0]['observacion_capacitacion'] : '' ?>">
                    <span class="bar"></span>
                    <label for="observacion_capacitacion">Observaci&oacute;n Capacitaci&oacute;n</label>
                </div>

                <div class="form-group has-success m-b-40">
                    <select class="form-control input-sm p-0" id="estado_capacitacion_persona" name="estado_capacitacion_persona">
                        <option value="REGISTRADO" <?php if (isset($capacitacion_persona[0]['estado_capacitacion_persona'])) echo ($capacitacion_persona[0]['estado_capacitacion_persona'] == 'REGISTRADO' ? 'selected="selected"' : '') ?> title="solo registrara la capacitacion">REGISTRADO</option>
                        <option value="REVISADO" <?php if (isset($capacitacion_persona[0]['estado_capacitacion_persona'])) echo ($capacitacion_persona[0]['estado_capacitacion_persona'] == 'REVISADO' ? 'selected="selected"' : '') ?> title="la documentacion es correcta">REVISADO</option>
                        <option value="OBSERVADO" <?php if (isset($capacitacion_persona[0]['estado_capacitacion_persona'])) echo ($capacitacion_persona[0]['estado_capacitacion_persona'] == 'OBSERVADO' ? 'selected="selected"' : '') ?> title="si el documetno es invalido">OBSERVADO</option>
                    </select><span class="bar"></span>
                    <label for="estado_capacitacion_persona">Estado Capacitaci&oacute;n</label>
                </div>

                <div class="d-flex flex-row-reverse form-actions">
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <button type="button" class="btn btn-rounded btn-block btn-warning btn-sm" data-dismiss="modal">Cancelar</button>
                    </div>

                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <button class="btn btn-rounded btn-block btn-info btn-sm" id="<?= isset($capacitacion_persona) ? 'actualizar_capacitacion_persona' : 'insertar_capacitacion_persona' ?>" type="submit"><i class="mdi mdi-plus-circle"></i><?= isset($capacitacion_persona) ? 'Actualizar Capacitacion' : 'Insertar Capasitacion' ?> </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>