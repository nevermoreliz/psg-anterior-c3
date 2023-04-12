<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title">Animated Line Inputs Form With Floating Labels</h4>
                <h6 class="card-subtitle">Just add <code>floating-labels</code> class to the form and
                    <code>has-warning, has-success, has-danger & has-error</code> for various inputs.
                    For input with icon add <code>has-feedback</code> class.</h6> -->

                <!-- <form class="floating-labels m-t-10"> -->
                <?= form_open('', ['class' => 'floating-labels m-t-0', 'id' => 'form_promocion_red_social', 'enctype' => 'multipart/form-data']); ?>

                <!-- campos ocultos -->
                <input type="hidden" name="id_planificacion_programa" id="id_planificacion_programa" value="<?= $programa[0]['id_planificacion_programa'] ?>">
                <input type="hidden" name="id_usuario" id="id_usuario" value="<?= $usuario['id_persona'] ?>">
                <?php if (isset($promocion_programa[0]['id_promocion_red_social'])) : ?>
                    <input type="hidden" name="id_promocion_red_social" id="id_promocion_red_social" value="<?= $promocion_programa[0]['id_promocion_red_social'] ?>">
                <?php endif ?>
                <!-- <pre>
                    <?= var_dump($promocion_programa); ?>
                </pre> -->

                <div class="alert alert-info"> <i class="fa fa-info-circle"></i> <U>NOMBRE PROGRAMA:</U>
                    <?= isset($programa[0]['nombre_programa']) ? $programa[0]['nombre_programa'] : '' ?> <br> <?= isset($programa[0]['nombre_programa']) ? ' VERSION - ' . $programa[0]['numero_version'] . ' (' . $programa[0]['descripcion_grado_academico'] . ', ' . $programa[0]['nombre_tipo_programa'] . ') - ' . $programa[0]['nombre_unidad'] . ', ' . $programa[0]['tipo_unidad'] . ', ' . $programa[0]['denominacion_sede'] : '' ?>


                </div>

                <div class="row">
                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <div class="form-group has-success m-b-40 m-t-20">
                            <select class="form-control input-sm p-0" id="red_social" name="red_social">
                                <option value="SIN SELECCIONAR">-- SELECCIONAR --</option>
                                <option value="FACEBOOK" <?php if (isset($promocion_programa[0]['red_social'])) echo ($promocion_programa[0]['red_social'] == 'FACEBOOK' ? 'selected="selected"' : '') ?>>FACEBOOK</option>

                                <option value="YOUTUBE" <?php if (isset($promocion_programa[0]['red_social'])) echo ($promocion_programa[0]['red_social'] == 'YOUTUBE' ? 'selected="selected"' : '') ?>>YOUTUBE</option>
                            </select><span class="bar"></span>

                            <label for="red_social">Red Social</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-12 col-xl-6">
                        <div class="form-group m-b-40 m-t-20">
                            <input type="text" required class="form-control input-sm text-uppercase" id="monto_destinado" name="monto_destinado" value="<?= isset($promocion_programa[0]['monto_destinado']) ? $promocion_programa[0]['monto_destinado'] : '' ?>">
                            <span class="bar"></span>
                            <label for="monto_destinado">Monto Destinado</label>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <div class="form-group has-success m-b-40">
                            <input type="text" class="form-control" name="fecha_inicio" id="fecha_inicio" value="<?= isset($promocion_programa[0]['fecha_inicio']) ? $promocion_programa[0]['fecha_inicio'] : date('Y-m-d') ?>">
                            <span class="bar"></span>
                            <label for="fecha_inicio">Fecha Inicio</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-12 col-xl-6">

                        <div class="form-group has-success m-b-40">
                            <input type="text" class="form-control" name="fecha_fin" id="fecha_fin" value="<?= isset($promocion_programa[0]['fecha_fin']) ? $promocion_programa[0]['fecha_fin'] : date('Y-m-d') ?>">
                            <span class="bar"></span>
                            <label for="fecha_fin">Fecha Finalizaci&oacute;n</label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <div class="form-group m-b-40">
                            <input type="text" required class="form-control input-sm text-uppercase" id="id_usuario_x" name="id_usuario_x" value="<?= isset($usuario['nombre_completo']) ? $usuario['nombre_completo'] : '' ?>">
                            <span class="bar"></span>
                            <label for="id_usuario">Nombre del Publicador</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-12 col-xl-6">

                        <div class="form-group m-b-40">
                            <input type="text" required class="form-control input-sm text-uppercase" id="id_persona_responsable" name="id_persona_responsable" value="<?= isset($promocion_programa[0]['id_persona_responsable']) ? $promocion_programa[0]['id_persona_responsable'] : '' ?>">
                            <span class="bar"></span>
                            <label for="id_persona_responsable">Nombre Coordinador</label>
                            </>
                        </div>
                    </div>
                </div>

                <div class="form-group m-b-40">
                    <input type="text" required class="form-control input-sm text-uppercase" id="codigo_publicacion" name="codigo_publicacion" value="<?= isset($promocion_programa[0]['codigo_publicacion']) ? $promocion_programa[0]['codigo_publicacion'] : '' ?>">
                    <span class="bar"></span>
                    <label for="codigo_publicacion">Codigo Publicaci&oacute;n Red Social</label>
                </div>

                <div class="row">
                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <div class="form-group m-b-40">
                            <input type="text" required class="form-control input-sm text-uppercase" id="alcance" name="alcance" value="<?= isset($promocion_programa[0]['alcance']) ? $promocion_programa[0]['alcance'] : '' ?>">
                            <span class="bar"></span>
                            <label for="alcance">Alcance</label>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-12 col-xl-6">

                        <div class="form-group m-b-40">
                            <input type="text" required class="form-control input-sm text-uppercase" id="interaccion" name="interaccion" value="<?= isset($promocion_programa[0]['interaccion']) ? $promocion_programa[0]['interaccion'] : '' ?>">
                            <span class="bar"></span>
                            <label for="interaccion">Interacci&oacute;n</label>
                            </>
                        </div>
                    </div>
                </div>

                <div class="form-group has-success m-b-40">
                    <select class="form-control input-sm p-0" id="estado" name="estado">
                        <option value="REGISTRADO" <?php if (isset($promocion_programa[0]['estado'])) echo ($promocion_programa[0]['estado'] == 'REGISTRADO' ? 'selected="selected"' : '') ?> title="solo registrara la capacitacion">REGISTRADO</option>
                        <option value="REVISADO" <?php if (isset($promocion_programa[0]['estado'])) echo ($promocion_programa[0]['estado'] == 'REVISADO' ? 'selected="selected"' : '') ?> title="la documentacion es correcta">REVISADO</option>
                        <option value="OBSERVADO" <?php if (isset($promocion_programa[0]['estado'])) echo ($promocion_programa[0]['estado'] == 'OBSERVADO' ? 'selected="selected"' : '') ?> title="si el documetno es invalido">OBSERVADO</option>
                    </select><span class="bar"></span>
                    <label for="estado">Estad Publicaci&oacute;n Red Social</label>
                </div>

                <div class="d-flex flex-row-reverse form-actions">
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <button type="button" class="btn btn-rounded btn-block btn-warning btn-sm" data-dismiss="modal">Cancelar</button>
                    </div>

                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <button class="btn btn-rounded btn-block btn-info btn-sm" id="<?= isset($promocion_programa) ? 'actualizar_promocion_red_social' : 'insertar_promocion_red_social' ?>" type="submit"><i class="mdi mdi-plus-circle"> </i> <?= isset($promocion_programa) ? 'Actualizar Promoci&oacute;n' : 'Insertar Promoci&oacute;n' ?> </button>
                    </div>
                </div>

                </form>
            </div>
        </div>
    </div>
</div>