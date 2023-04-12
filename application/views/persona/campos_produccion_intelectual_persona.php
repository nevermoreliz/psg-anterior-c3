<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title">Animated Line Inputs Form With Floating Labels</h4>
                <h6 class="card-subtitle">Just add <code>floating-labels</code> class to the form and
                    <code>has-warning, has-success, has-danger & has-error</code> for various inputs.
                    For input with icon add <code>has-feedback</code> class.</h6> -->

                <!-- form para produccion intelectual -->
                <!-- <form class="floating-labels m-t-10"> -->
                <?= form_open('', ['class' => 'floating-labels m-t-20', 'id' => 'form_produccion_intelectual_persona', 'enctype' => 'multipart/form-data']); ?>

                <!-- campos ocultos -->
                <input type="hidden" name="id_persona" name="id_persona" value="<?= $persona[0]['id_persona'] ?>">
                <?php if (isset($produccion_intelectual_persona[0]['id_produccion_intelectual'])) : ?>
                    <input type="hidden" name="id_produccion_intelectual" id="id_produccion_intelectual" value="<?= $produccion_intelectual_persona[0]['id_produccion_intelectual'] ?>">
                <?php endif ?>


                <div class="row">
                    <!-- tipos_produccion_intelectual -->
                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <div class="form-group has-success m-b-40">
                            <select class="form-control input-sm p-0" id="id_tipo_produccion_intelectual" name="id_tipo_produccion_intelectual">
                                <option value="SIN SELECCIONAR">-- SELECCIONAR --</option>
                                <?php if (isset($produccion_intelectual_persona[0]['id_tipo_produccion_intelectual'])) : ?>
                                    <?php foreach ($tipos_produccion_intelectual as $key => $tipo_produccion_intelectual) : ?>
                                        <option value="<?= $tipo_produccion_intelectual['id_tipo_produccion_intelectual'] ?>" <?= $produccion_intelectual_persona[0]['id_tipo_produccion_intelectual'] == $tipo_produccion_intelectual['id_tipo_produccion_intelectual'] ? 'selected' : '' ?>><?= $tipo_produccion_intelectual['tipo'] ?></option>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <?php foreach ($tipos_produccion_intelectual as $key => $tipo_produccion_intelectual) : ?>
                                        <option value="<?= $tipo_produccion_intelectual['id_tipo_produccion_intelectual'] ?>"><?= $tipo_produccion_intelectual['tipo'] ?></option>
                                    <?php endforeach; ?>
                                <?php endif ?>
                            </select><span class="bar"></span>
                            <label for="id_tipo_produccion_intelectual">Tipo Producci&oacute;n Intelectual</label>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <div class="form-group has-success has-feedback m-b-40">
                            <input type="text" class="form-control input-sm " id="anio_edicion" name="anio_edicion" value="<?= isset($produccion_intelectual_persona[0]['anio_edicion']) ? $produccion_intelectual_persona[0]['anio_edicion'] : '' ?>">
                            <span class="bar"></span>
                            <label for="anio_edicion">Año Edici&oacute;n</label>
                        </div>
                    </div>
                </div>

                <div class="form-group  m-b-40">
                    <input type="text" class="form-control input-sm text-uppercase" id="titulo_produccion" name="titulo_produccion" value="<?= isset($produccion_intelectual_persona[0]['titulo_produccion']) ? $produccion_intelectual_persona[0]['titulo_produccion'] : '' ?>">
                    <span class="bar"></span>
                    <label for="titulo_produccion">Titul&oacute; Producci&oacute;n</label>
                </div>



                <div class="row">
                    <div class="col-md-12 col-lg-9 col-xl-9">
                        <div class="form-group m-b-40">
                            <input type="text" class="form-control input-sm text-uppercase" id="editorial_publicacion" name="editorial_publicacion" value="<?= isset($produccion_intelectual_persona[0]['editorial_publicacion']) ? $produccion_intelectual_persona[0]['editorial_publicacion'] : '' ?>">
                            <span class="bar"></span>
                            <label for="editorial_publicacion">Editorial Publicaci&oacute;n</label>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-3 col-xl-3">
                        <div class="form-group has-success m-b-40">
                            <input type="text" class="form-control input-sm" id="numero_paginas" name="numero_paginas" value="<?= isset($produccion_intelectual_persona[0]['numero_paginas']) ? $produccion_intelectual_persona[0]['numero_paginas'] : '' ?>">
                            <span class="bar"></span>
                            <label for="numero_paginas">N&uacute;mero P&aacute;ginas</label>
                        </div>
                    </div>
                </div>


                <div class="form-group  has-feedback m-b-40">
                    <input type="text" class="form-control input-sm text-uppercase" id="descripcion_produccion" name="descripcion_produccion" value="<?= isset($produccion_intelectual_persona[0]['descripcion_produccion']) ? $produccion_intelectual_persona[0]['descripcion_produccion'] : '' ?>">
                    <span class="bar"></span>
                    <label for="descripcion_produccion">Descripci&oacute;n Producci&oacute;n</label>
                </div>
                <div class="form-group  has-feedback m-b-40">
                    <input type="text" class="form-control input-sm text-uppercase" id="observacion_produccion" name="observacion_produccion" value="<?= isset($produccion_intelectual_persona[0]['observacion_produccion']) ? $produccion_intelectual_persona[0]['observacion_produccion'] : '' ?>">
                    <span class="bar"></span>
                    <label for="observacion_produccion">Observaci&oacute;n Producci&oacute;n</label>
                </div>

                <div class="form-group m-b-40">
                    <select class="form-control input-sm p-0" id="estado_produccion" name="estado_produccion">
                        <option value="REGISTRADO" <?php if (isset($produccion_intelectual_persona[0]['estado_produccion'])) echo ($produccion_intelectual_persona[0]['estado_produccion'] == 'REGISTRADO' ? 'selected="selected"' : '') ?>>REGISTRADO</option>
                        <option value="REVISADO" <?php if (isset($produccion_intelectual_persona[0]['estado_produccion'])) echo ($produccion_intelectual_persona[0]['estado_produccion'] == 'REVISADO' ? 'selected="selected"' : '') ?>>REVISADO</option>
                        <option value="OBSERVADO" <?php if (isset($produccion_intelectual_persona[0]['estado_produccion'])) echo ($produccion_intelectual_persona[0]['estado_produccion'] == 'OBSERVADO' ? 'selected="selected"' : '') ?>>OBSERVADO</option>
                    </select><span class="bar"></span>
                    </select><span class="bar"></span>
                    <label for="estado_produccion">Estado Producci&oacute;n Intelectual</label>
                </div>

                <div class="d-flex flex-row-reverse form-actions">
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <button type="button" class="btn btn-rounded btn-block btn-warning btn-sm" data-dismiss="modal">Cancelar</button>
                    </div>

                    <div class="col-md-12 col-lg-5 col-xl-5">
                        <button class="btn btn-rounded btn-block btn-info btn-sm" id="<?= isset($produccion_intelectual_persona) ? 'actualizar_produccion_intelectual_persona' : 'insertar_produccion_intelectual_persona' ?>" type="submit"><i class="mdi mdi-plus-circle"></i> <?= isset($produccion_intelectual_persona) ? 'Actualizar Produccion Intelectual' : 'Insertar Produccion Intelectual' ?> </button>
                    </div>
                </div>
                </form>


            </div>
        </div>
    </div>
</div>