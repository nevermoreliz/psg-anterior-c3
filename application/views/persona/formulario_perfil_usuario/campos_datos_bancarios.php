<div class="card-outline-info">
    <div class="card-header">
        <h4 class="m-b-0 text-white">Datos Bancarios</h4>
    </div>
    <div class="card-body">

        <?= form_open('', ['id' => 'form_vista_perfil_campos_datos_bancarios', 'enctype' => 'multipart/form-data', 'style' => 'font-size: 13px;']); ?>

        <div class="row">
            <div class="col-md-12 col-lg-6 col-xl-6">
                <div class="form-group m-b-20">
                    <?php if (isset($datos_persona[0]['id_banco'])) { ?>
                        <label for="id_banco">ID Banco</label>
                        <select class="form-control p-0" id="id_banco" disabled>

                            <?php foreach (['1' => 'CAJA', '2' => 'BANCO UNION'] as $key => $id_banco) : ?>
                                <option value="<?= $key ?>" <?= $datos_persona[0]['id_banco'] == $key ? 'selected' : ''; ?>><?= $id_banco ?></option>
                            <?php endforeach; ?>
                        </select>

                    <?php } else { ?>
                        <div class="form-group has-warning has-feedback m-b-40">
                            <label for="id_banco">ID Banco</label>
                            <input type="text" class="form-control form-control-warning" id="id_banco"><span class="bar"></span>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-6">
                <div class="form-group m-b-20 <?= isset($datos_persona[0]['numero_cuenta_bancaria']) ? '' : 'has-warning' ?>">
                    <label for="numero_cuenta_bancaria">Nro Cuenta Bancaria</label>
                    <input type="text" class="form-control input-sm <?= isset($datos_persona[0]['numero_cuenta_bancaria']) ? '' : 'form-control-warning' ?>" id="numero_cuenta_bancaria" value="<?= $datos_persona[0]['numero_cuenta_bancaria'] ?>" <?= isset($datos_persona[0]['afp_numero_nua']) ? 'readonly' : '' ?>>

                </div>
            </div>
        </div>

        <div class="text-xs-right">
            <button type="button" id="btn_modificar_vista_perfil_usuario_datos_bancarios" class="btn waves-effect waves-light btn-rounded btn-info">Modificar Datos Bancarios</button>
        </div>

        <!-- </form> -->
        <?php form_close() ?>

        <!-- <form class="floating-labels m-t-20">
            <div class="row">
                <div class="col-md-12 col-lg-6 col-xl-6">
                    <div class="form-group m-b-40">
                        <?php if (isset($datos_persona[0]['id_banco'])) { ?>
                            <select class="form-control p-0" id="id_banco" disabled>


                                <?php foreach (['1' => 'CAJA', '2' => 'BANCO UNION'] as $key => $id_banco) : ?>
                                    <option value="<?= $key ?>" <?= $datos_persona[0]['id_banco'] == $key ? 'selected' : ''; ?>><?= $id_banco ?></option>
                                <?php endforeach; ?>
                            </select><span class=" bar"></span>
                            <label for="id_banco">ID Banco</label>
                        <?php } else { ?>
                            <div class="form-group has-warning has-feedback m-b-40">
                                <input type="text" class="form-control form-control-warning" id="id_banco"><span class="bar"></span>
                                <label for="id_banco">ID Banco</label>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-6">
                    <div class="form-group m-b-40 <?= isset($datos_persona[0]['numero_cuenta_bancaria']) ? '' : 'has-warning' ?>">
                        <input type="text" class="form-control input-sm <?= isset($datos_persona[0]['numero_cuenta_bancaria']) ? '' : 'form-control-warning' ?>" id="numero_cuenta_bancaria" value="<?= $datos_persona[0]['numero_cuenta_bancaria'] ?>" <?= isset($datos_persona[0]['afp_numero_nua']) ? 'readonly' : '' ?>><span class="bar"></span>
                        <label for="numero_cuenta_bancaria">Nro Cuenta Bancaria</label>
                    </div>
                </div>
            </div>

        </form> -->
    </div>
</div>