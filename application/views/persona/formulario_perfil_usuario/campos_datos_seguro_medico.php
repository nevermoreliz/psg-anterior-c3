<div class="card-outline-info">
    <div class="card-header">
        <h4 class="m-b-0 text-white">Datos de Seguro Medico</h4>
    </div>
    <div class="card-body">


        <?= form_open('', ['id' => 'form_vista_perfil_campos_datos_seguro_medico', 'enctype' => 'multipart/form-data', 'style' => 'font-size: 13px;']); ?>

        <div class="row">
            <div class="col-md-12 col-lg-6 col-xl-6">


                <div class="form-group m-b-20">
                    <?php if (isset($datos_persona[0]['id_afp'])) { ?>
                        <label for="id_caja_salud">ID Caja Salud</label>
                        <select class="form-control p-0" id="id_caja_salud" disabled>

                            <?php foreach (['1' => 'FUTURO', '2' => 'PREVISION'] as $key => $id_afp) : ?>
                                <option value="<?= $key ?>" <?= $datos_persona[0]['id_afp'] == $key ? 'selected' : ''; ?>><?= $id_afp ?></option>
                            <?php endforeach; ?>
                        </select>

                    <?php } else { ?>

                        <div class="form-group has-warning has-feedback m-b-40">
                            <label for="id_caja_salud">ID Caja Salud</label>
                            <input type="text" class="form-control form-control-warning" id="id_caja_salud">
                        </div>


                    <?php } ?>



                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-6">

                <?php if (!is_null($datos_persona[0]['caja_salud_fecha_afiliacion'])) { ?>
                    <div class="form-group has-success  m-b-20">
                        <label for="caja_salud_fecha_afiliacion">Fecha Afiliaci&oacute;n</label>
                        <input type="date" class="form-control input-sm" id="caja_salud_fecha_afiliacion" value="<?= date('Y-m-d') ?>" readonly>
                    </div>
                <?php } else { ?>

                    <div class="form-group has-warning has-feedback m-b-20">
                        <label for="caja_salud_fecha_afiliacion">Fecha Afiliaci&oacute;n</label>
                        <input type="text" class="form-control form-control-warning" id="caja_salud_fecha_afiliacion" value="campo vacio">
                    </div>


                <?php } ?>


            </div>

            <div class="col-md-12 col-lg-6 col-xl-6">

                <?php if (isset($datos_persona[0]['caja_salud_numero_asegurado'])) { ?>
                    <div class="form-group m-b-20">
                        <label for="caja_salud_numero_asegurado">Numero Asegurado</label>
                        <input type="text" class="form-control input-sm" id="caja_salud_numero_asegurado" value="<?= $datos_persona[0]['caja_salud_numero_asegurado'] ?>" readonly>
                    </div>
                <?php } else { ?>

                    <div class="form-group has-warning has-feedback m-b-40">
                        <label for="caja_salud_numero_asegurado">Numero Asegurado</label>
                        <input type="text" class="form-control form-control-warning" id="caja_salud_numero_asegurado" value="llenar campo">
                    </div>

                <?php } ?>


            </div>

        </div>

        <div class="text-xs-right">
            <button type="button" id="btn_modificar_vista_perfil_usuario_datos_seguro_medico" class="btn waves-effect waves-light btn-rounded btn-info">Modificar Datos Seguro Medico</button>
        </div>

        <!-- </form> -->
        <?php form_close() ?>


        <!-- <form class="floating-labels m-t-10">
            <div class="row">
                <div class="col-md-12 col-lg-6 col-xl-6">


                    <div class="form-group m-b-40">
                        <?php if (isset($datos_persona[0]['id_afp'])) { ?>
                            <select class="form-control p-0" id="id_caja_salud" disabled>

                                <?php foreach (['1' => 'FUTURO', '2' => 'PREVISION'] as $key => $id_afp) : ?>
                                    <option value="<?= $key ?>" <?= $datos_persona[0]['id_afp'] == $key ? 'selected' : ''; ?>><?= $id_afp ?></option>
                                <?php endforeach; ?>
                            </select><span class="bar"></span>
                            <label for="id_caja_salud">ID Caja Salud</label>
                        <?php } else { ?>

                            <div class="form-group has-warning has-feedback m-b-40">
                                <input type="text" class="form-control form-control-warning" id="id_caja_salud"><span class="bar"></span>
                                <label for="id_caja_salud">ID Caja Salud</label>
                            </div>


                        <?php } ?>



                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-6">

                    <?php if (!is_null($datos_persona[0]['caja_salud_fecha_afiliacion'])) { ?>
                        <div class="form-group has-success  m-b-40">
                            <input type="date" class="form-control input-sm" id="caja_salud_fecha_afiliacion" value="<?= date('Y-m-d') ?>" readonly><span class="bar"></span>
                            <label for="caja_salud_fecha_afiliacion">Fecha Afiliaci&oacute;n</label>
                        </div>
                    <?php } else { ?>

                        <div class="form-group has-warning has-feedback m-b-40">
                            <input type="text" class="form-control form-control-warning" id="caja_salud_fecha_afiliacion"><span class="bar"></span>
                            <label for="caja_salud_fecha_afiliacion">Fecha Afiliaci&oacute;n</label>
                        </div>


                    <?php } ?>


                </div>

                <div class="col-md-12 col-lg-6 col-xl-6">

                    <?php if (isset($datos_persona[0]['caja_salud_numero_asegurado'])) { ?>
                        <div class="form-group m-b-40">
                            <input type="text" class="form-control input-sm" id="caja_salud_numero_asegurado" value="<?= $datos_persona[0]['caja_salud_numero_asegurado'] ?>" readonly><span class="bar"></span>
                            <label for="caja_salud_numero_asegurado">Numero Asegurado</label>
                        </div>
                    <?php } else { ?>

                        <div class="form-group has-warning has-feedback m-b-40">
                            <input type="text" class="form-control form-control-warning" id="caja_salud_numero_asegurado" value="llenar campo"><span class="bar"></span>
                            <label for="caja_salud_numero_asegurado">Numero Asegurado</label>
                        </div>


                    <?php } ?>


                </div>

            </div>
        </form> -->
    </div>
</div>