<div class="card-outline-info">
    <div class="card-header">
        <h4 class="m-b-0 text-white">Datos AFP</h4>
    </div>
    <div class="card-body">


        <?= form_open('', ['id' => 'form_vista_perfil_campos_datos_afp', 'enctype' => 'multipart/form-data', 'style' => 'font-size: 13px;']); ?>

        <div class="row">
            <div class="col-md-12 col-lg-6 col-xl-6">

                <div class="form-group m-b-20">
                    <?php if (isset($datos_persona[0]['id_afp'])) { ?>
                        <label for="id_afp">ID AFP</label>
                        <select class="form-control p-0" id="id_afp" disabled>
                            <?php foreach (['1' => 'FUTURO', '2' => 'PREVISION'] as $key => $id_afp) : ?>
                                <option value="<?= $key ?>" <?= $datos_persona[0]['id_afp'] == $key ? 'selected' : ''; ?>><?= $id_afp ?></option>
                            <?php endforeach; ?>
                        </select>

                    <?php } else { ?>

                        <div class="form-group has-warning has-feedback m-b-20">
                            <input type="text" class="form-control form-control-warning" id="id_afp"><span class="bar"></span>
                            <label for="id_afp">ID AFP</label>
                        </div>

                    <?php } ?>

                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-6">
                <div class="form-group <?= isset($datos_persona[0]['afp_numero_nua']) ? '' : 'has-warning' ?> m-b-20">
                    <label for="afp_numero_nua">AFP Numero nua</label>
                    <input type="text" class="form-control input-sm <?= isset($datos_persona[0]['afp_numero_nua']) ? '' : 'form-control-warning' ?>" id="afp_numero_nua" value="<?= $datos_persona[0]['afp_numero_nua'] ?>" <?= isset($datos_persona[0]['afp_numero_nua']) ? 'readonly' : '' ?>>

                </div>
            </div>

        </div>

        <div class="text-xs-right">
            <button type="button" id="btn_modificar_vista_perfil_usuario_datos_afp" class="btn waves-effect waves-light btn-rounded btn-info">Modificar Datos AFP</button>
        </div>

        <!-- </form> -->
        <?php form_close() ?>


        <!-- <form class="floating-labels m-t-10">
            <div class="row">
                <div class="col-md-12 col-lg-6 col-xl-6">

                    <div class="form-group m-b-40">
                        <?php if (isset($datos_persona[0]['id_afp'])) { ?>
                            <select class="form-control p-0" id="id_afp" disabled>
                                <?php foreach (['1' => 'FUTURO', '2' => 'PREVISION'] as $key => $id_afp) : ?>
                                    <option value="<?= $key ?>" <?= $datos_persona[0]['id_afp'] == $key ? 'selected' : ''; ?>><?= $id_afp ?></option>
                                <?php endforeach; ?>
                            </select><span class="bar"></span>
                            <label for="id_afp">ID AFP</label>
                        <?php } else { ?>

                            <div class="form-group has-warning has-feedback m-b-40">
                                <input type="text" class="form-control form-control-warning" id="id_afp"><span class="bar"></span>
                                <label for="id_afp">ID AFP</label>
                            </div>

                        <?php } ?>

                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-6">
                    <div class="form-group <?= isset($datos_persona[0]['afp_numero_nua']) ? '' : 'has-warning' ?> m-b-40">
                        <input type="text" class="form-control input-sm <?= isset($datos_persona[0]['afp_numero_nua']) ? '' : 'form-control-warning' ?>" id="afp_numero_nua" value="<?= $datos_persona[0]['afp_numero_nua'] ?>" <?= isset($datos_persona[0]['afp_numero_nua']) ? 'readonly' : '' ?>><span class="bar"></span>
                        <label for="afp_numero_nua">AFP Numero nua</label>
                    </div>
                </div>

            </div>
        </form> -->

    </div>
</div>