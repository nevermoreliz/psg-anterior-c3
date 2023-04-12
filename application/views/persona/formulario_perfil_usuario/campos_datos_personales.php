<!-- <?= var_dump($datos_persona[0]); ?> -->

<div class=" card-outline-info">
    <div class="card-header">
        <h4 class="m-b-0 text-white">Datos Personales

            <span class="mytooltip tooltip-effect-1">
                <span class="tooltip-item2"><button class="btn  btn-sm btn-outline-primary " id="info_datos_personales"><i class=" ti-info-alt fa-lg"></i></button></span>
                <span class="tooltip-content4 clearfix">
                    <span class="tooltip-text2">
                        Si el nombre completo, fecha nacimiento, carnet de identidad, son erróneos comuníquese lo más antes posible con el soporte de posgrado <a href="https://wa.me/59176296846?text=Buenas Tardes Posgrado, querio solicitar el cambio de mis datos personales, ¿Cual es el procedimiento?" target="_blank">aqui</a> ya que todo tramite o documentación será realizada con los datos ingresados en el sistema.

                    </span>
                </span>
            </span>

        </h4>
    </div>
    <div class="card-body">

        <!-- <form class="m-t-0" novalidate="" style="font-size: 13px;"> -->
        <?= form_open('', ['id' => 'form_vista_perfil_campos_datos_personales', 'enctype' => 'multipart/form-data', 'style' => 'font-size: 13px;']); ?>

        <div class="row">
            <div class="col-md-12 col-lg-3 col-xl-3">
                <div class="form-group m-b-20">
                    <label for="ci">Carnet</label>
                    <input type="text" class="form-control input-sm" id="ci" name="ci" value="<?= $datos_persona[0]['ci'] ?>" disabled><span class="bar"></span>
                </div>
            </div>
            <div class="col-md-12 col-lg-3 col-xl-3">

                <div class="form-group m-b-20">
                    <label for="expedido">Expedido</label>
                    <select class="form-control p-0" id="expedido" name="expedido" disabled>
                        <?php foreach (['LP' => 'LA PAZ', 'OR' => 'ORURO', 'PT' => 'POTOSI', 'CBBA' => 'COCHABAMBA', 'CH' => 'CHUQUISACA', 'TJ' => 'TARIJA', 'PND' => 'PANDO', 'BN' => 'BENI', 'SCZ' => 'SANTA CRUZ'] as $key => $departamento) : ?>
                            <option value="<?= $key ?>" <?= $datos_persona[0]['expedido'] == $key ? 'selected' : ''; ?>><?= $departamento ?></option>
                        <?php endforeach; ?>
                    </select>

                </div>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-4">

                <div class="form-group m-b-20">
                    <label for="tipo_documento">Tipo Documento</label>
                    <select class="form-control p-0" id="tipo_documento" name="tipo_documento" disabled>
                        <?php foreach (['CI' => 'CÉDULA DE IDENTIDAD', 'CIE' => 'CI EXTRANJERO', 'DNI' => 'D.N.I.', 'PASAPORTE' => 'PASAPORTE'] as $key => $tipo_documento) : ?>
                            <option value="<?= $key ?>" <?= $datos_persona[0]['tipo_documento'] == $key ? 'selected' : ''; ?>><?= $tipo_documento ?></option>
                        <?php endforeach; ?>

                    </select>

                </div>
            </div>
            <div class="col-md-12 col-lg-2 col-xl-2">
                <div class="form-group m-b-20">
                    <label for="id_pais_nacionalidad">Nacionalidad</label>
                    <select class="form-control p-0" id="id_pais_nacionalidad" name="id_pais_nacionalidad" disabled>
                        <?php if (isset($datos_persona[0]['id_pais_nacionalidad'])) { ?>
                            <?php foreach ($paises as $key => $pais) : ?>
                                <option value="<?= $pais['id_pais'] ?>" <?= $datos_persona[0]['id_pais_nacionalidad'] == $pais['id_pais'] ? 'selected' : ''; ?>><?= $pais['nombre_pais'] ?></option>
                            <?php endforeach; ?>
                        <?php } else { ?>
                            <?php foreach ($paises as $key => $pais) : ?>
                                <option value="<?= $pais['id_pais'] ?>"><?= $pais['nombre_pais'] ?></option>
                            <?php endforeach ?>
                        <?php } ?>

                    </select>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-4 col-xl-4">
                <div class="form-group m-b-20">
                    <label for="nombre">Nombre(s)</label>
                    <input type="text" class="form-control input-sm" id="nombre" name="nombre" value="<?= $datos_persona[0]['nombre'] ?>" disabled>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-4">
                <div class="form-group m-b-20">
                    <label for="paterno">Paterno</label>
                    <input type="text" class="form-control input-sm" id="paterno" name="paterno" value="<?= $datos_persona[0]['paterno'] ?>" disabled>

                </div>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-4">
                <div class="form-group m-b-20">
                    <label for="materno">Materno</label>
                    <input type="text" class="form-control input-sm" id="materno" name="materno" value="<?= $datos_persona[0]['materno'] ?>" disabled>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-4 col-xl-4">
                <div class="form-group has-success  m-b-20">
                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                    <input type="date" class="form-control input-sm" id="fecha_nacimiento" name="fecha_nacimiento" value="<?= $datos_persona[0]['fecha_nacimiento'] ?>" disabled>

                </div>

            </div>
            <div class="col-md-12 col-lg-8 col-xl-8">
                <div class="form-group m-b-20">
                    <label for="lugar_nacimiento">Lugar de Nacimiento</label>
                    <input type="text" class="form-control input-sm" id="lugar_nacimiento" name="lugar_nacimiento" value="<?= $datos_persona[0]['lugar_nacimiento'] ?>">

                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12 col-lg-4 col-xl-4">

                <div class="form-group m-b-20">
                    <label for="genero">Genero</label>
                    <select class="form-control p-0" id="genero" name="genero" disabled>
                        <?php if (isset($datos_persona[0]['genero'])) { ?>
                            <?php foreach (['MASCULINO', 'FEMENINO'] as $key => $value) { ?>
                                <option value="<?= $value ?>" <?= $datos_persona[0]['genero'] == $value ? 'selected' : '' ?>><?= $value ?></option>
                            <?php } ?>
                        <?php } else { ?>

                            <option value="campo vacio">campo vacio</option>

                        <?php } ?>

                    </select>

                </div>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-4">


                <div class="form-group m-b-20">
                    <label for="estado_civil">Estado civil</label>
                    <select class="form-control p-0" id="estado_civil" name="estado_civil">
                        <?php if (isset($datos_persona[0]['estado_civil'])) { ?>
                            <?php foreach (['SOLTERO' => 'SOLTERO', 'CASADO' => 'CASADO', 'DIVORCIADO' => 'DIVORCIADO', 'VIUDO' => 'VIUDO', 'CONVIVIENTE' => 'CONVIVIENTE'] as $key => $estado_civil) : ?>
                                <option value="<?= $key ?>" <?= $datos_persona[0]['estado_civil'] == $key ? 'selected' : ''; ?>><?= $estado_civil ?></option>
                            <?php endforeach; ?>
                        <?php } else { ?>

                            <option value="campo vacio">campo vacio</option>

                        <?php } ?>
                    </select>

                </div>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-4">
                <div class="form-group m-b-20">
                    <label for="email">Correo Electronico</label>
                    <input type="text" class="form-control input-sm" id="email" name="email" value="<?= $datos_persona[0]['email'] ?>">

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="form-group m-b-20">
                    <label for="domicilio">Domicilio</label>
                    <input type="text" class="form-control input-sm" id="domicilio" name="domicilio" value="<?= $datos_persona[0]['domicilio'] ?>">

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-4 col-xl-4">
                <div class="form-group m-b-20">
                    <label for="celular">Celular</label>
                    <input type="text" class="form-control input-sm" id="celular" name="celular" value="<?= $datos_persona[0]['celular'] ?>">
                </div>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-4">
                <div class="form-group m-b-420">
                    <label for="telefono">Telefono Fijo</label>
                    <input type="text" class="form-control input-sm" id="telefono" name="telefono" value="<?= $datos_persona[0]['telefono'] ?>">
                </div>
            </div>
            <div class="col-md-12 col-lg-4 col-xl-4">
                <div class="form-group m-b-20">
                    <label for="profesion">Profesi&oacute;n</label>
                    <input type="text" class="form-control input-sm" id="profesion" name="profesion" disabled>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-6 col-xl-6">
                <div class="form-group m-b-20">
                    <label for="oficio_trabajo">Ocupaci&oacute;n</label>
                    <input type="text" class="form-control input-sm" id="oficio_trabajo" name="oficio_trabajo" value="<?= $datos_persona[0]['oficio_trabajo'] ?>">
                </div>
            </div>
        </div>

        <div class="text-xs-right">
            <button type="button" id="btn_modificar_vista_perfil_usuario_datos_personales" class="btn waves-effect waves-light btn-rounded btn-info">Modificar Datos Personales</button>
        </div>

        <!-- </form> -->
        <?php form_close() ?>



        <!-- <form class="floating-labels m-t-10">
            <div class="row">
                <div class="col-md-12 col-lg-3 col-xl-3">
                    <div class="form-group m-b-40">
                        <input type="text" class="form-control input-sm" id="ci" value="<?= $datos_persona[0]['ci'] ?>" disabled><span class="bar"></span>
                        <label for="ci">Carnet</label>
                    </div>
                </div>
                <div class="col-md-12 col-lg-3 col-xl-3">

                    <div class="form-group m-b-40">
                        <select class="form-control p-0" id="expedido" disabled>
                            <?php foreach (['LP' => 'LA PAZ', 'OR' => 'ORURO', 'PT' => 'POTOSI', 'CBBA' => 'COCHABAMBA', 'CH' => 'CHUQUISACA', 'TJ' => 'TARIJA', 'PND' => 'PANDO', 'BN' => 'BENI', 'SCZ' => 'SANTA CRUZ'] as $key => $departamento) : ?>
                                <option value="<?= $key ?>" <?= $datos_persona[0]['expedido'] == $key ? 'selected' : ''; ?>><?= $departamento ?></option>
                            <?php endforeach; ?>

                        </select><span class="bar"></span>
                        <label for="expedido">Expedido</label>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 col-xl-4">

                    <div class="form-group m-b-40">
                        <select class="form-control p-0" id="tipo_documento" disabled>
                            <?php foreach (['CI' => 'CÉDULA DE IDENTIDAD', 'CIE' => 'CI EXTRANJERO', 'DNI' => 'D.N.I.', 'PASAPORTE' => 'PASAPORTE'] as $key => $tipo_documento) : ?>
                                <option value="<?= $key ?>" <?= $datos_persona[0]['tipo_documento'] == $key ? 'selected' : ''; ?>><?= $tipo_documento ?></option>
                            <?php endforeach; ?>

                        </select><span class="bar"></span>
                        <label for="tipo_documento">Tipo Documento</label>
                    </div>
                </div>
                <div class="col-md-12 col-lg-2 col-xl-2">
                    <div class="form-group m-b-40">
                        <select class="form-control p-0" id="id_pais_nacionalidad" disabled>
                            <?php if (isset($datos_persona[0]['id_pais_nacionalidad'])) { ?>
                                <?php foreach ($paises as $key => $pais) : ?>
                                    <option value="<?= $pais['id_pais'] ?>" <?= $datos_persona[0]['id_pais_nacionalidad'] == $pais['id_pais'] ? 'selected' : ''; ?>><?= $pais['nombre_pais'] ?></option>
                                <?php endforeach; ?>
                            <?php } else { ?>
                                <?php foreach ($paises as $key => $pais) : ?>
                                    <option value="<?= $pais['id_pais'] ?>"><?= $pais['nombre_pais'] ?></option>
                                <?php endforeach ?>
                            <?php } ?>

                        </select><span class="bar"></span>
                        <label for="id_pais_nacionalidad">Nacionalidad</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-4 col-xl-4">
                    <div class="form-group m-b-40">
                        <input type="text" class="form-control input-sm" id="nombre" value="<?= $datos_persona[0]['nombre'] ?>" disabled><span class="bar"></span>
                        <label for="nombre">Nombre(s)</label>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 col-xl-4">
                    <div class="form-group m-b-40">
                        <input type="text" class="form-control input-sm" id="paterno" value="<?= $datos_persona[0]['paterno'] ?>" disabled><span class="bar"></span>
                        <label for="paterno">Paterno</label>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 col-xl-4">
                    <div class="form-group m-b-40">
                        <input type="text" class="form-control input-sm" id="materno" value="<?= $datos_persona[0]['materno'] ?>" disabled><span class="bar"></span>
                        <label for="materno">Materno</label>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 col-lg-4 col-xl-4">
                    <div class="form-group has-success  m-b-40">
                        <input type="date" class="form-control input-sm" id="fecha_nacimiento" value="<?= $datos_persona[0]['fecha_nacimiento'] ?>" disabled><span class="bar"></span>
                        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                    </div>

                </div>
                <div class="col-md-12 col-lg-8 col-xl-8">
                    <div class="form-group m-b-40">
                        <input type="text" class="form-control input-sm" id="lugar_nacimiento" value="<?= $datos_persona[0]['lugar_nacimiento'] ?>"><span class="bar"></span>
                        <label for="lugar_nacimiento">Lugar de Nacimeiento</label>
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-md-12 col-lg-4 col-xl-4">

                    <div class="form-group m-b-40">
                        <select class="form-control p-0" id="genero" disabled>
                            <?php if (isset($datos_persona[0]['genero'])) { ?>
                                <?php foreach (['MASCULINO', 'FEMENINO'] as $key => $value) { ?>
                                    <option value="<?= $value ?>" <?= $datos_persona[0]['genero'] == $value ? 'selected' : '' ?>><?= $value ?></option>
                                <?php } ?>
                            <?php } else { ?>

                                <option value="campo vacio">campo vacio</option>

                            <?php } ?>

                        </select><span class="bar"></span>
                        <label for="genero">Genero</label>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 col-xl-4">


                    <div class="form-group m-b-40">
                        <select class="form-control p-0" id="estado_civil">
                            <?php if (isset($datos_persona[0]['estado_civil'])) { ?>
                                <?php foreach (['SOLTERO' => 'SOLTERO', 'CASADO' => 'CASADO', 'DIVORCIADO' => 'DIVORCIADO', 'VIUDO' => 'VIUDO', 'CONVIVIENTE' => 'CONVIVIENTE'] as $key => $estado_civil) : ?>
                                    <option value="<?= $key ?>" <?= $datos_persona[0]['estado_civil'] == $key ? 'selected' : ''; ?>><?= $estado_civil ?></option>
                                <?php endforeach; ?>
                            <?php } else { ?>

                                <option value="campo vacio">campo vacio</option>

                            <?php } ?>
                        </select><span class="bar"></span>
                        <label for="estado_civil">Estado civil</label>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 col-xl-4">
                    <div class="form-group m-b-40">
                        <input type="text" class="form-control input-sm" id="email" value="<?= $datos_persona[0]['email'] ?>" disabled><span class="bar"></span>
                        <label for="email">Correo Electronico</label>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group m-b-40">
                        <input type="text" class="form-control input-sm" id="domicilio" value="<?= $datos_persona[0]['domicilio'] ?>"><span class="bar"></span>
                        <label for="domicilio">Domicilio</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-4 col-xl-4">
                    <div class="form-group m-b-40">
                        <input type="text" class="form-control input-sm" id="celular" value="<?= $datos_persona[0]['celular'] ?>"><span class="bar"></span>
                        <label for="celular">Celular</label>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 col-xl-4">
                    <div class="form-group m-b-40">
                        <input type="text" class="form-control input-sm" id="telefono" value="<?= $datos_persona[0]['telefono'] ?>"><span class="bar"></span>
                        <label for="telefono">Telefono Fijo</label>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 col-xl-4">
                    <div class="form-group m-b-40">
                        <input type="text" class="form-control input-sm" id="profesion" disabled><span class="bar"></span>
                        <label for="profesion">Profesi&oacute;n</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-6 col-xl-6">
                    <div class="form-group m-b-40">
                        <input type="text" class="form-control input-sm" id="oficio_trabajo" value="<?= $datos_persona[0]['oficio_trabajo'] ?>" disabled><span class="bar"></span>
                        <label for="oficio_trabajo">Ocupaci&oacute;n</label>
                    </div>
                </div>
            </div>

        </form> -->

    </div>
</div>

<div class="modal" id="modal_form_vista_perfil_campos_datos_personales" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">

    <div id="modal_form_vista_perfil_campos_datos_personales-dialog" class="modal-dialog" role="document">

        <div class="modal-content">
            <div id="modal-header" class="modal-header bg-color-psg ">

                <h5 id="modal_form_vista_perfil_campos_datos_personales-title" class="modal-title text-white"></h5>

                <button type="button" id="modal_form_vista_perfil_campos_datos_personales-close" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> &times; </span>
                </button>
            </div>

            <div id="modal_form_vista_perfil_campos_datos_personales-body" class="modal-body">

            </div>


        </div>
    </div>
</div>