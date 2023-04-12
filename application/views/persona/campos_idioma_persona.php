<div class="row">
    <div class="col-12">

        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title">Animated Line Inputs Form With Floating Labels</h4>
                <h6 class="card-subtitle">Just add <code>floating-labels</code> class to the form and
                    <code>has-warning, has-success, has-danger & has-error</code> for various inputs.
                    For input with icon add <code>has-feedback</code> class.</h6> -->

                <!-- form para idioma de la persona -->
                <!-- <form class="floating-labels m-t-10"> -->
                <?= form_open('', ['class' => 'floating-labels m-t-20', 'id' => 'form_idioma_persona', 'enctype' => 'multipart/form-data']); ?>

                <!-- campos ocultos -->
                <input type="hidden" name="id_persona" id="id_persona" value="<?= $persona[0]['id_persona'] ?>">

                <?php if (isset($idioma_persona[0]['id_idioma_persona'])) : ?>
                    <input type="hidden" name="id_idioma_persona" id="id_idioma_persona" value="<?= $idioma_persona[0]['id_idioma_persona'] ?>">
                <?php endif ?>


                <div class="row">
                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <div class="form-group has-success m-b-40">
                            <select class="form-control input-sm p-0" id="id_idioma" name="id_idioma">
                                <option value="SIN SELECCIONAR">-- SELECCIONAR --</option>
                                <?php if (isset($idioma_persona[0]['id_idioma'])) : ?>
                                    <?php foreach ($tipos_idioma as $key => $tipo_idioma) : ?>
                                        <option value="<?= $tipo_idioma['id_idioma'] ?>" <?= $idioma_persona[0]['id_idioma'] == $tipo_idioma['id_idioma'] ? 'selected' : '' ?>><?= $tipo_idioma['descripcion_idioma'] ?></option>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <?php foreach ($tipos_idioma as $key => $tipo_idioma) : ?>
                                        <option value="<?= $tipo_idioma['id_idioma'] ?>"><?= $tipo_idioma['descripcion_idioma'] ?></option>
                                    <?php endforeach; ?>
                                <?php endif ?>
                            </select><span class="bar"></span>
                            <label for="id_idioma">Idioma</label>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <div class="form-group has-success m-b-40">
                            <select class="form-control input-sm p-0" id="nivel_idioma" name="nivel_idioma">
                                <option value="SIN SELECCIONAR">-- SELECCIONAR --</option>
                                <option value="BASICO" <?php if (isset($idioma_persona[0]['nivel_idioma'])) echo ($idioma_persona[0]['nivel_idioma'] == 'BASICO' ? 'selected="selected"' : '') ?>>BASICO</option>
                                <option value="INTERMEDIO" <?php if (isset($idioma_persona[0]['nivel_idioma'])) echo ($idioma_persona[0]['nivel_idioma'] == 'INTERMEDIO' ? 'selected="selected"' : '') ?>>INTERMEDIO</option>
                                <option value="AVANZADO" <?php if (isset($idioma_persona[0]['nivel_idioma'])) echo ($idioma_persona[0]['nivel_idioma'] == 'AVANZADO' ? 'selected="selected"' : '') ?>>AVANZADO</option>
                            </select><span class="bar"></span>
                            <label for="nivel_idioma">Nivel Idioma</label>
                        </div>
                    </div>
                </div>

                <div class="form-group  m-b-40">
                    <input type="text" class="form-control input-sm text-uppercase" id="descripcion_idioma" name="descripcion_idioma" value="<?= isset($idioma_persona[0]['descripcion_idioma']) ? $idioma_persona[0]['descripcion_idioma'] : '' ?>">
                    <span class="bar"></span>
                    <label for="descripcion_idioma">Descripci&oacute;n </label>
                </div>
                <div class="form-group has-success m-b-40">
                    <select class="form-control input-sm p-0" id="estado_idioma_persona" name="estado_idioma_persona">
                        <option value="REGISTRADO" <?php if (isset($idioma_persona[0]['estado_idioma_persona'])) echo ($idioma_persona[0]['estado_idioma_persona'] == 'REGISTRADO' ? 'selected="selected"' : '') ?>>REGISTRADO</option>
                        <option value="REVISADO" <?php if (isset($idioma_persona[0]['estado_idioma_persona'])) echo ($idioma_persona[0]['estado_idioma_persona'] == 'REVISADO' ? 'selected="selected"' : '') ?>>REVISADO</option>
                        <option value="OBSERVADO" <?php if (isset($idioma_persona[0]['estado_idioma_persona'])) echo ($idioma_persona[0]['estado_idioma_persona'] == 'OBSERVADO' ? 'selected="selected"' : '') ?>>OBSERVADO</option>
                    </select><span class="bar"></span>
                    <label for="estado_idioma_persona">Estado</label>
                </div>


                <div class="d-flex flex-row-reverse form-actions">
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <button type="button" class="btn btn-rounded btn-block btn-warning btn-sm" data-dismiss="modal">Cancelar</button>
                    </div>

                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <button class="btn btn-rounded btn-block btn-info btn-sm" id="<?= isset($idioma_persona) ? 'actualizar_idioma_persona' : 'insertar_idioma_persona' ?>" type="submit"><i class="mdi mdi-plus-circle"></i> <?= isset($idioma_persona) ? 'Actualizar Idioma' : 'Insertar Idioma' ?> </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>