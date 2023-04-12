<div class="row page-titles mb-2">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Inscripci&oacute;n programa</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Inicio</a></li>
            <li class="breadcrumb-item">Inscripci&oacute;n</li>
            <!-- <li class="breadcrumb-item active"> <?= mb_convert_case($publicacion_detalle->nombre_programa, MB_CASE_TITLE_SIMPLE); ?></li> -->
            <li class="breadcrumb-item active"> <?= strtoupper($publicacion_detalle->nombre_programa) ?></li>

        </ol>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <!-- columna 1 -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="efecto_sticky">
                <div class="card">

                    <img class="card-img-top img-responsive" src="<?= base_url('img/img_publicaciones/' . $publicacion_detalle->nombre_archivo) ?>" alt="Card image cap">
                    <div class="card-body text-center">
                        <h4 class="font-normal"><?= $publicacion_detalle->descripcion_grado_academico ?> EN:</h4>
                        <p class="m-b-0 m-t-10"><?= $publicacion_detalle->nombre_programa ?></p>
                        <!-- <a class="btn  btn-outline-info btn-rounded waves-effect waves-light m-t-20" href="">M&aacute;s informaci&oacute;n</a> -->
                    </div>
                </div>

                <!-- <div class="card ">
                    <div class="d-flex flex-row">
                        <div class="p-10 bg-info">
                            <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3>
                        </div>
                        <div class="align-self-center m-l-20">
                            <h3 class="m-b-0 text-info">Bs. <?= $publicacion_detalle->costo_matricula ?> </h3>
                            <h5 class="text-muted m-b-0">Costo Matr&iacute;cula</h5>
                        </div>
                    </div>
                </div>

                <div class="card ">
                    <div class="d-flex flex-row">
                        <div class="p-10 bg-warning">
                            <h3 class="text-white box m-b-0"><i class="ti-wallet"></i></h3>
                        </div>
                        <div class="align-self-center m-l-20">
                            <h3 class="m-b-0 text-info">Bs. <?= $publicacion_detalle->costo_colegiatura ?> </h3>
                            <h5 class="text-muted m-b-0">Costo Colegiatura</h5>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>

        <!-- columna 2 -->
        <div class="col-lg-8 col-xlg-9 col-md-7 ">
            <div class="card ">
                <div class="tab-pane active " id="formulario_preinscripcion" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-outline-info">
                                <div class="card-header">
                                    <h4 class="m-b-0 text-white">FORMULARIO DE INSCRIPCIÓN</h4>
                                </div>
                                <div class="card-body">
                                    <?= form_open('', array('id' => 'form_inscripcion_online', 'novalidate' => 'true')); ?>
                                    <?php if (isset($id_inscripcion)) : ?>
                                        <input type="hidden" name="id_inscripcion" value="<?= $id_inscripcion ?>">
                                    <?php endif ?>
                                    <div class="form-body">

                                        <input type="hidden" id="descripcion_programa_cliente" name="descripcion_programa_cliente" value="<?= $publicacion_detalle->descripcion_grado_academico ?>">

                                        <input type="hidden" id="nombre_programa_cliente" name="nombre_programa_cliente" value="<?= $publicacion_detalle->nombre_programa ?>">

                                        <input type="hidden" id="nombre_completo_usuario" name="nombre_completo_usuario" value="<?= $nombre_completo_usuario ?>">

                                        <h3 class="box-title">DATOS DEL DEP&Oacute;SITO BANCARIO</h3>
                                        <hr>

                                        <h4 class="card-title">Registre su Dep&oacute;sito de Matr&iacute;cula Bs. <?= $publicacion_detalle->costo_matricula; ?><span class="text-danger"> *</span></h4>
                                        <div id="responsivo_movil">
                                            <div class="view_all_dt row">
                                                <div class="col-lg-6 col-xl-6 col-md-12" style="display: block;margin: auto;">
                                                    <div class="view_img_left">
                                                        <div class="view__img">
                                                            <img src="<?php echo base_url('img/uploads/add_img.jpg') ?>" alt="" id="mostrar_img_dep_matricula" name="mostrar_img_dep_matricula" onclick="document.getElementById('img_dep_matricula').click()" style="cursor: pointer; width:100%;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-xl-6 col-md-12">
                                                    <div class="view_img_right">
                                                        <!-- <label class="control-label">Respaldo de Dep&oacute;sito de Matr&iacute;cula Bs. 200 <span class="text-danger"> *</span></label> -->

                                                        <p>Toma una Fotograf&iacute;a o carga una imagen de tu Dep&oacute;sito de matr&iacute;cula.</p>

                                                        <div class="form-group">

                                                            <button type="button" class="btn btn-sm btn-info btn-block" onclick="document.getElementById('img_dep_matricula').click()"><i class="fa fa-upload"> </i> Cargar Dep&oacute;sito de matr&iacute;cula</button>

                                                            <div class="controls custom-file" id="dep_matricula" style="display: none;">
                                                                <input type="file" class="custom-file-input" id="img_dep_matricula" name="img_dep_matricula" accept="image/*" required data-validation-required-message="Este campo es requerido">
                                                                <label class="custom-file-label form-control" for="img_dep_matricula"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xl-12 col-md-12 ">
                                                            <div class="form-group has-success m-t-20">
                                                                <label class="control-label">N&uacute;mero de Dep&oacute;sito <span class="text-danger"> *</span></label>
                                                                <div class="controls">
                                                                    <div class="controls">
                                                                        <input class="form-control numeros-inputmask" type="text" name="nro_deposito_matricula" id="nro_deposito_matricula" maxvalue="50" required data-validation-required-message="Este campo es requerido">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12 col-xl-12 col-md-12">
                                                            <div class="form-group has-success">
                                                                <label class="control-label">Fecha de Dep&oacute;sito<span class="text-danger"> *</span></label>
                                                                <div class="controls">
                                                                    <div class="controls">
                                                                        <input type="text" name="fecha_deposito_matricula" id="fecha_deposito_matricula" class="form-control" required data-validation-required-message="Este campo es requerido">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="responsivo_movil">
                                            <h4 class="card-title">Registre su Dep&oacute;sito por Colegiatura (1ra Cuota)<span class="text-danger"> *</span></h4>
                                            <div class="view_all_dt row m-t-20">
                                                <div class="col-lg-6 col-xl-6 col-md-12">


                                                    <div class="view_img_right">
                                                        <!-- <label class="control-label">Respaldo de la primera cuota <span class="text-danger"> *</span></label> -->
                                                        <p> Toma una Fotograf&iacute;a o carga una imagen de tu Dep&oacute;sito por colegiatura.</p>
                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-sm btn-info btn-block" onclick="document.getElementById('img_dep_cuota_ini').click()"><i class="fa fa-upload"> </i> Cargar Dep&oacute;sito por colegiatura</button>

                                                            <div class="controls custom-file" id="dep_cuota_inicial" style="display: none;">
                                                                <input type="file" class="custom-file-input" id="img_dep_cuota_ini" name="img_dep_cuota_ini" accept="image/*">
                                                                <label class="custom-file-label form-control" for="img_dep_cuota_ini"></label>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12 col-xl-12 col-md-12">
                                                            <div class="form-group has-success">
                                                                <label class="control-label">N&uacute;mero de Dep&oacute;sito <span class="text-danger"> *</span></label>
                                                                <div class="controls">
                                                                    <div class="controls">
                                                                        <input class="form-control numeros-inputmask" type="text" name="nro_deposito_cuota_ini" id="nro_deposito_cuota_ini">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12 col-xl-12 col-md-12">
                                                            <div class="form-group has-success">
                                                                <label class="control-label">Fecha de Dep&oacute;sito <span class="text-danger"> *</span></label>
                                                                <div class="controls">
                                                                    <div class="controls">
                                                                        <input type="text" name="fecha_deposito_cuota_ini" id="fecha_deposito_cuota_ini" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="col-lg-6 col-xl-6 col-md-12" style="display: block;margin: auto;">
                                                    <div class="view_img_left">
                                                        <div class="view__img">
                                                            <img src="<?php echo base_url('img/uploads/add_img.jpg') ?>" alt="" id="mostrar_img_dep_cuota_ini" name="mostrar_img_dep_cuota_ini" onclick="document.getElementById('img_dep_cuota_ini').click()" style="cursor: pointer; width:100%;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="d-flex flex-row-reverse form-actions">

                                            <div class="col-md-6">

                                                <button type="submit" class="btn btn-rounded btn-block btn-info "> <i class="fa fa-check-circle"></i> ENVIAR DATOS PARA LA INSCRIPCIÓN</button>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-rounded btn-block btn-warning btn_usuario_cancelar_inscripcion"> <i class="fa fa-window-close"></i> CANCELAR</button>
                                            </div>
                                        </div>
                                    </div>
                                    <?= form_close() ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>