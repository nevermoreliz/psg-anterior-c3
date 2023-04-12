<!-- miga de pan lado Derecha -->
<div class="row page-titles mb-2">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Inscripci&oacute;n Programa</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Inicio</a></li>
            <li class="breadcrumb-item">inscripci&oacute;n</li>
            <!-- <li class="breadcrumb-item active"> <?= mb_convert_case($publicacion_detalle->nombre_programa, MB_CASE_TITLE_SIMPLE); ?></li> -->
            <li class="breadcrumb-item active"> <?= strtoupper($publicacion_detalle->nombre_programa) ?></li>
        </ol>
    </div>

</div>
<!-- End miga de pan lado Derecha -->

<!-- Container fluid  -->

<div class="container-fluid">

    <!-- Start Page Content -->

    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">

            <div class="efecto_sticky">

                <div class="card">
                    <!-- 
                        /descripcion_grado_academico/nombre_tipo_programa/id_publicacion
                     -->


                    <!-- <?= var_dump($publicacion_detalle->descripcion_grado_academico); ?> -->

                    <a href="<?= base_url(mb_convert_case($publicacion_detalle->descripcion_grado_academico . '/' . str_replace(" ", "-", $publicacion_detalle->nombre_tipo_programa) . '/' . $publicacion_detalle->id_publicacion, MB_CASE_LOWER)) ?>" style="cursor:pointer" target="_blank">

                        <img class="card-img-top img-responsive" src="<?= base_url('img/img_publicaciones/' . $publicacion_detalle->nombre_archivo) ?>" alt="Card image cap">
                    </a>
                    <div class="card-body text-center">

                        <center>

                            <h4 class="font-normal"><?= $publicacion_detalle->descripcion_grado_academico ?> EN:</h4>


                            <p class="m-b-0 m-t-10"><?= $publicacion_detalle->nombre_programa ?>
                            </p>
                        </center>


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

                <!-- agregar requisitos lado lateral -->




            </div>
        </div>
        <!-- Column -->

        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7 ">
            <div class="card ">
                <!-- bloque de formulario de inscripcio -->
                <?php if ($publicacion_detalle->estado_publicacion == 'PUBLICADO') { ?>
                    <div class="tab-pane active " id="formulario_preinscripcion" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-outline-info">
                                    <div class="card-header">
                                        <h4 class="m-b-0 text-white">FORMULARIO DE INSCRIPCIÓN</h4>
                                    </div>
                                    <div class="card-body" oncopy="return false" onpaste="return false">
                                        <?php if (!is_numeric($ci)) : ?>
                                            <!-- <form id="form_verificacion_inscripcion" name="form_verificacion_inscripcion" method="POST" action="<?= base_url('marketing/detalle_programa/' . mb_convert_case($publicacion_detalle->descripcion_grado_academico . '/' . $publicacion_detalle->nombre_tipo_programa . '/' . $id_publicacion, MB_CASE_LOWER)) ?>"> -->
                                            <form id="form_verificacion_inscripcion" name="form_verificacion_inscripcion" method="POST" novalidate>
                                                <!-- <?= form_open('', array('id' => 'form_verificacion_inscripcion')); ?> -->
                                                <h3 class="card-title text-center">ESCRIBE TU NÚMERO DE CARNET</h3>
                                                <hr>

                                                <!-- sector oculto -->
                                                <input type="hidden" name="descripcion_grado_academico" class="form-control" value="<?= $publicacion_detalle->descripcion_grado_academico ?>">

                                                <input type="hidden" name="nombre_tipo_programa" class="form-control" value="<?= $publicacion_detalle->nombre_tipo_programa ?>">

                                                <input type="hidden" name="id_pub" class="form-control" value="<?= $id_publicacion ?>">

                                                <div class="d-flex justify-content-center">
                                                    <div class="row p-t-0 d-flex justify-content-center">
                                                        <!-- <div class="col-lg-5 col-xl-5 col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Nombre completo<span class="text-danger"> *</span></label>
                                                                <div class="controls">
                                                                    <div class="row">
                                                                        <div class="col-lg-12 col-xl-12 col-md-12">
                                                                            <input type="text" name="nombre_completo" class="form-control texto-inputmask text-uppercase" maxlength="50" required data-validation-required-message="Este campo es requerido" data-validation-maxlength-message="Demasiado largo: Máximo de '50' caracteres" autocomplete="off">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <small class="form-control-feedback"> This is inline help </small>
                                                            </div>
                                                        </div> -->

                                                        <div class="col-lg-12 col-xl-12 col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Carnet de Identidad<span class="text-danger"> *</span></label>
                                                                <div class="controls">
                                                                    <div class="row">
                                                                        <div class="col-lg-6 col-xl-6 col-md-12">
                                                                            <input type="text" name="ci" id="ci" class="form-control ci-inputmask text-uppercase" maxlength="15" minlength="5" required data-validation-required-message="Este campo es requerido" data-validation-maxlength-message="Demasiado largo: Máximo de '15' caracteres" data-validation-minlength-message="Demasiado corto: Minimo de '5' caracteres" autocomplete="off">
                                                                        </div>

                                                                        <div class="col-lg-6 col-xl-6 col-md-12">
                                                                            <button type="submit" id="revision" name="revision" class="btn btn-info"><i class="fa fa-plus"></i> Inscribirme</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- <small class="form-control-feedback"> This is inline help </small> -->
                                                            </div>
                                                        </div>

                                                        <!-- <div class="col-lg-12 col-xl-12 col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Fecha Nacimiento<span class="text-danger"> *</span></label>
                                                                <div class="controls">
                                                                    <div class="row">
                                                                        <div class="col-lg-8 col-xl-8 col-md-12">
                                                                            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control texto-inputmask text-uppercase" maxlength="50" required data-validation-required-message="Este campo es requerido" data-validation-maxlength-message="Demasiado largo: Máximo de '50' caracteres" autocomplete="off">
                                                                        </div>

                                                                        <div class="col-lg-3 col-xl-3 col-md-12">
                                                                            <button type="submit" id="revision" name="revision" class="btn btn-info"><i class="fa fa-plus"></i> Inscribirme</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <small class="form-control-feedback"> This is inline help </small>
                                                            </div>


                                                        </div> -->


                                                    </div>
                                                </div>

                                            </form>
                                        <?php else : ?>

                                            <!-- <form action="" novalidate> -->
                                            <?= form_open('', array('id' => 'form_inscripcion_online', 'novalidate' => 'false')); ?>

                                            <!-- campos ocultos -->


                                            <input type="hidden" id="id_publicacion" name="id_publicacion" value="<?php echo $id_publicacion ?>">

                                            <input type="hidden" id="id_planificacion_programa" name="id_planificacion_programa" value="<?php echo $publicacion_detalle->id_planificacion_programa ?>">

                                            <input type="hidden" id="estado" name="estado" value="ACTIVO">

                                            <input type="hidden" id="descripcion_programa_cliente" name="descripcion_programa_cliente" value="<?= $publicacion_detalle->descripcion_grado_academico ?>">


                                            <input type="hidden" id="nombre_programa_cliente" name="nombre_programa_cliente" value="<?= $publicacion_detalle->nombre_programa ?>">

                                            <div class="form-body">
                                                <h3 class="card-title">CARNET DE IDENTIDAD</h3>
                                                <hr>

                                                <div class="row p-t-0">
                                                    <div class="col-lg-5 col-xl-5 col-md-12">

                                                        <div class="form-group">
                                                            <label class="control-label">Carnet de Identidad<span class="text-danger"> *</span></label>
                                                            <div class="controls">
                                                                <div class="row">
                                                                    <div class="col-lg-6 col-xl-6 col-md-12">
                                                                        <input type="number" name="ci" id="ci" class="form-control texto-inputmask text-uppercase" maxlength="50" required data-validation-required-message="Este campo es requerido" data-validation-maxlength-message="Demasiado largo: Máximo de '50' caracteres" autocomplete="off" value="<?= $ci ?>" readonly="readonly">
                                                                    </div>

                                                                    <div class="col-lg-6 col-xl-6 col-md-12">
                                                                        <a href="<?= base_url(mb_convert_case($publicacion_detalle->descripcion_grado_academico . '/' . $publicacion_detalle->nombre_tipo_programa . '/' . $id_publicacion, MB_CASE_LOWER)) ?>" class="btn  btn-info"><i class="fa fa-refresh"></i> Reiniciar</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <small class="form-control-feedback"> Ingrese su carnet para inscribirse </small>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-lg-3 col-xl-3 col-md-12">
                                                        <div class="form-group ">
                                                            <label class="control-label">Expedido En<span class="text-danger"> *</span></label>
                                                            <div class="controls">
                                                                <select name="expedido" id="expedido" required="" class="form-control text-uppercase" aria-invalid="false" data-validation-required-message="Este campo es requerido">
                                                                    <option value="LP" <?php if (!empty($datos_persona[0]['expedido'])) echo ($datos_persona[0]['expedido'] == 'LP' ? 'selected="selected"' : ''); ?>>
                                                                        LP</option>
                                                                    <option value="CH" <?php if (!empty($datos_persona[0]['expedido'])) echo ($datos_persona[0]['expedido'] == 'CH' ? 'selected="selected"' : ''); ?>>
                                                                        CH</option>
                                                                    <option value="CB" <?php if (!empty($datos_persona[0]['expedido'])) echo ($datos_persona[0]['expedido'] == 'CB' ? 'selected="selected"' : ''); ?>>
                                                                        CB</option>
                                                                    <option value="OR" <?php if (!empty($datos_persona[0]['expedido'])) echo ($datos_persona[0]['expedido'] == 'OR' ? 'selected="selected"' : ''); ?>>
                                                                        OR</option>
                                                                    <option value="PT" <?php if (!empty($datos_persona[0]['expedido'])) echo ($datos_persona[0]['expedido'] == 'PT' ? 'selected="selected"' : ''); ?>>
                                                                        PT</option>
                                                                    <option value="TJ" <?php if (!empty($datos_persona[0]['expedido'])) echo ($datos_persona[0]['expedido'] == 'TJ' ? 'selected="selected"' : ''); ?>>
                                                                        TJ</option>
                                                                    <option value="SC" <?php if (!empty($datos_persona[0]['expedido'])) echo ($datos_persona[0]['expedido'] == 'SC' ? 'selected="selected"' : ''); ?>>
                                                                        SC</option>
                                                                    <option value="BE" <?php if (!empty($datos_persona[0]['expedido'])) echo ($datos_persona[0]['expedido'] == 'BE' ? 'selected="selected"' : ''); ?>>
                                                                        BE</option>
                                                                    <option value="PD" <?php if (!empty($datos_persona[0]['expedido'])) echo ($datos_persona[0]['expedido'] == 'PD' ? 'selected="selected"' : ''); ?>>
                                                                        PD</option>
                                                                </select>
                                                                <div class="help-block"></div>
                                                            </div>
                                                            <small class="form-control-feedback"> Seleccione </small>
                                                        </div>

                                                    </div>
                                                    <!--/span-->

                                                </div>

                                                <!-- RESPALDOS CARNET -->
                                                <!--TODO: aqui  carnet  -->
                                                <h4 class="card-title">Respaldo Digital de tu Carnet de Identidad<span class="text-danger"> *</span></h4>
                                                <!-- <h6 class="card-subtitle">
                                                    Toma una fotograf&iacute;a clara del anverso de tu carnet de identidad o carga una Imagen en formato jpeg, jpg, png.
                                                </h6> -->
                                                <div id="responsivo_movil">
                                                    <div class="view_all_dt row">

                                                        <!--/ bloque carnet anverso -->
                                                        <div class="col-lg-6 col-xl-6 col-md-12" style="display: block;margin: auto;">
                                                            <div class="view_img_left">
                                                                <!--/sector imagen  -->
                                                                <div class="view__img">


                                                                    <img src="<?php echo base_url('img/uploads/add_img.jpg') ?>" alt="" id="mostrar_img_ci_delante" name="mostrar_img_ci_delante" onclick="document.getElementById('img_ci_delante').click()" style="cursor: pointer; width:100%;">

                                                                </div>

                                                                <!--/ sector de input file  -->
                                                                <div class="view_img_right">
                                                                    <!-- <label class="control-label">Saque una Foto o Imagen de la cara de su Carnet <span class="text-danger"> *</span></label> -->
                                                                    <p>Toma una Fotograf&iacute;a o carga una imagen del lado anverso de tu carnet de identidad.</p>
                                                                    <!-- <pre>
                                                                            <?= var_dump($archivos_programas_persona_externa); ?>
                                                                        </pre> -->

                                                                    <div class="form-group">
                                                                        <button type="button" class="btn btn-sm btn-info btn-block" onclick="document.getElementById('img_ci_delante').click()"><i class="fa fa-upload"> </i> Cargar lado ANVERSO</button>

                                                                        <div class="controls custom-file" id="ci_delante" style="display: none;">
                                                                            <input type="file" class="custom-file-input " id="img_ci_delante" name="img_ci_delante" required data-validation-required-message="Este campo es requerido">
                                                                            <label id="label_img_name_ci_delante" class="custom-file-label form-control" for="img_ci_delante"></label>
                                                                        </div>
                                                                    </div>

                                                                </div>


                                                            </div>
                                                        </div>

                                                        <!--/ bloque carnet reverso -->
                                                        <div class="col-lg-6 col-xl-6 col-md-12" style="display: block;margin: auto;">
                                                            <div class="view_img_left">
                                                                <!--/sector imagen  -->
                                                                <div class="view__img">

                                                                    <img src="<?php echo base_url('img/uploads/add_img.jpg') ?>" alt="" id="mostrar_img_ci_atras" name="mostrar_img_ci_atras" onclick="document.getElementById('img_ci_atras').click()" style="cursor: pointer; width:100%;">

                                                                </div>

                                                                <!--/ sector de input file  -->
                                                                <div class="view_img_right">
                                                                    <!-- <label class="control-label">Saque una foto o suba una Imagen de la parte de atras de su carnet <span class="text-danger"> *</span></label> -->
                                                                    <p>Toma una Fotograf&iacute;a o carga una imagen del lado reverso de tu carnet de identidad.</p>

                                                                    <div class="form-group">
                                                                        <button type="button" class="btn btn-sm btn-info btn-block" onclick="document.getElementById('img_ci_atras').click()"><i class="fa fa-upload"> </i> Cargar lado REVERSO</button>

                                                                        <div class="controls custom-file" id="ci_atras" style="display: none;">
                                                                            <input type="file" class="custom-file-input" id="img_ci_atras" name="img_ci_atras" required data-validation-required-message="Este campo es requerido">
                                                                            <label id="label_img_name_ci_atras" class="custom-file-label form-control" for="img_ci_atras"></label>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- FIN RESPALDOS CARNET -->

                                                <h3 class="card-title">DATOS PERSONALES</h3>
                                                <hr>
                                                <div class="row p-t-20">
                                                    <!--/input nombre-->
                                                    <div class="col-lg-4 col-xl-4 col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label">Nombre(s)<span class="text-danger"> *</span></label>
                                                            <div class="controls">
                                                                <input type="text" name="nombre" id="nombre" class="form-control texto-inputmask" maxlength="50" required data-validation-required-message="Este campo es requerido" data-validation-maxlength-message="Demasiado largo: Máximo de '50' caracteres" value="<?php if (!empty($datos_persona[0]['nombre'])) echo $datos_persona[0]['nombre']; ?>">
                                                            </div>
                                                            <!-- <small class="form-control-feedback"> This is inline help </small> -->
                                                        </div>

                                                    </div>

                                                    <!--/input paterno-->
                                                    <div class="col-lg-4 col-xl-4 col-md-6">
                                                        <div class="form-group ">
                                                            <label class="control-label">Paterno<span class="text-danger"> *</span></label>
                                                            <div class="controls">
                                                                <input type="text" name="paterno" id="paterno" class="form-control texto-inputmask text-uppercase" maxlength="50" required data-validation-required-message="Este campo es requerido" data-validation-maxlength-message="Demasiado largo: Máximo de '50' caracteres" value="<?php if (!empty($datos_persona[0]['paterno'])) echo $datos_persona[0]['paterno']; ?>">
                                                            </div>
                                                            <!-- <small class="form-control-feedback"> This field has error. </small> -->
                                                        </div>
                                                    </div>

                                                    <!--/input materno-->
                                                    <div class="col-lg-4 col-xl-4 col-md-6">
                                                        <div class="form-group ">
                                                            <label class="control-label">Materno<span class="text-danger"> *</span></label>
                                                            <div class="controls">
                                                                <input type="text" name="materno" id="materno" class="form-control texto-inputmask text-uppercase" maxlength="50" required data-validation-required-message="Este campo es requerido" data-validation-maxlength-message="Demasiado largo: Máximo de '50' caracteres" value="<?php if (!empty($datos_persona[0]['materno'])) echo $datos_persona[0]['materno']; ?>">
                                                            </div>
                                                            <!-- <small class="form-control-feedback"> This field has error. </small> -->
                                                        </div>
                                                    </div>

                                                </div>

                                                <!--/row-->
                                                <div class="row">

                                                    <!--/input genero-->
                                                    <div class="col-md-6">
                                                        <div class="form-group has-success">
                                                            <label class="control-label">Género<span class="text-danger"> *</span></label>
                                                            <div class="controls">
                                                                <select name="genero" id="genero" required="" class="form-control text-uppercase" aria-invalid="false" data-validation-required-message="Este campo es requerido">
                                                                    <option value="" <?php if (!empty($datos_persona[0]['genero'])) echo ($datos_persona[0]['genero'] == '' ? 'selected="selected"' : ''); ?>>
                                                                        SELECIONE SU GENERO </option>
                                                                    <option value="M" <?php if (!empty($datos_persona[0]['genero'])) echo ($datos_persona[0]['genero'] == 'MASCULINO' ? 'selected="selected"' : ''); ?>>
                                                                        MASCULINO</option>
                                                                    <option value="F" <?php if (!empty($datos_persona[0]['genero'])) echo ($datos_persona[0]['genero'] == 'FEMENINO' ? 'selected="selected"' : ''); ?>>
                                                                        FEMENINO</option>

                                                                </select>
                                                                <div class="help-block"></div>
                                                            </div>
                                                            <small class="form-control-feedback"> Seleccione su Género </small>
                                                        </div>
                                                    </div>

                                                    <!--/input fecha nacimiento-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Fecha Nacimiento<span class="text-danger"> *</span></label>

                                                            <!-- <div class="controls">
                                                                <div class="controls">
                                                                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control texto-inputmask text-uppercase" placeholder="<?= date("Y-m-d") ?>" value="<?php if (!empty($datos_persona[0]['fecha_nacimiento'])) echo $datos_persona[0]['fecha_nacimiento']; ?>" required data-validation-required-message="Este campo es requerido"> </div>
                                                            </div> -->

                                                            <div class="row">
                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="controls">
                                                                        <select name="diax" id="diax" required="" data-size="6" class="form-control text-uppercase" aria-invalid="false" data-validation-required-message="Este campo es requerido">
                                                                            <?php for ($i = 1; $i <= 31; $i++) : ?>
                                                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                                            <?php endfor; ?>
                                                                        </select>
                                                                        <div class="help-block"></div>
                                                                    </div>
                                                                    <small class="form-control-feedback"> Dia </small>
                                                                </div>

                                                                <div class="col-lg-4 col-md-6">
                                                                    <div class="controls">
                                                                        <select name="mesx" id="mesx" required="" data-size="6" class="form-control text-uppercase" aria-invalid="false" data-validation-required-message="Este campo es requerido">
                                                                            <?php for ($i = 1; $i <= 12; $i++) : ?>
                                                                                <?php if ($i < 10) : ?>
                                                                                    <option value="<?php echo '0' . $i; ?>"><?php echo mes_literal($i); ?></option>
                                                                                <?php else : ?>
                                                                                    <option value="<?php echo $i; ?>"><?php echo mes_literal($i); ?></option>
                                                                                <?php endif ?>
                                                                            <?php endfor; ?>
                                                                        </select>
                                                                        <div class="help-block"></div>
                                                                    </div>
                                                                    <small class="form-control-feedback"> Mes </small>
                                                                </div>

                                                                <div class="col-lg-4 col-md-12">
                                                                    <div class="controls">
                                                                        <select name="aniox" id="aniox" required="" data-size="8" class="form-control text-uppercase" aria-invalid="false" data-validation-required-message="Este campo es requerido">
                                                                            <?php for ($i = intval(date('Y') - 17); $i >= 1920; $i--) : ?>
                                                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                                            <?php endfor; ?>
                                                                        </select>
                                                                        <div class="help-block"></div>
                                                                    </div>
                                                                    <small class="form-control-feedback"> A&ntilde;o </small>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>

                                                </div>
                                                <!--/row-->

                                                <!--/row-->
                                                <div class="row">
                                                    <!--/input lugar de nacimiento-->
                                                    <div class=" col-lg-8 col-xl-8 col-md-12">
                                                        <div class="form-group has-success">
                                                            <label class="control-label">Lugar de Nacimiento (Como indica su Carnet) <span class="text-danger"> *</span></label>
                                                            <div class="controls">
                                                                <div class="controls">
                                                                    <input type="text" name="lugar_nacimiento" id="lugar_nacimiento" class="form-control  text-uppercase" maxlength="50" required data-validation-required-message="Este campo es requerido" data-validation-maxlength-message="Demasiado largo: Máximo de '50' caracteres" value="<?php if (!empty($datos_persona[0]['lugar_nacimiento'])) echo $datos_persona[0]['lugar_nacimiento']; ?>">
                                                                </div>
                                                                <!-- <small class="form-control-feedback"> This is inline help </small> -->

                                                            </div>

                                                        </div>
                                                    </div>

                                                    <!--/input cuidad donde vive-->
                                                    <div class=" col-lg-4 col-xl-4 col-md-12">
                                                        <div class="form-group has-success">
                                                            <label class="control-label">Ciudad donde vive<span class="text-danger"> *</span></label>
                                                            <div class="controls">
                                                                <select name="ciudad_donde_vive" id="ciudad_donde_vive" required="" class="form-control text-uppercase select2" aria-invalid="false" data-validation-required-message="Este campo es requerido">
                                                                    <option value="">SELECCIONE LA CUIDAD</option>
                                                                    <?php if (isset($datos_persona[0]['ciudad_donde_vive'])) { ?>
                                                                        <?php foreach (array(
                                                                            'BENI - BAURES' => 'BENI - BAURES',
                                                                            'BENI - BENI' => 'BENI - BENI',
                                                                            'BENI - EXALTACION' => 'BENI - EXALTACION',
                                                                            'BENI - GUAYARAMERIN' => 'BENI - GUAYARAMERIN',
                                                                            'BENI - HUACARAJE' => 'BENI - HUACARAJE',
                                                                            'BENI - LORETO' => 'BENI - LORETO',
                                                                            'BENI - MAGDALENA' => 'BENI - MAGDALENA',
                                                                            'BENI - PUERTO SILES' => 'BENI - PUERTO SILES',
                                                                            'BENI - REYES' => 'BENI - REYES',
                                                                            'BENI - RIBERALTA' => 'BENI - RIBERALTA',
                                                                            'BENI - RURRENABAQUE' => 'BENI - RURRENABAQUE',
                                                                            'BENI - SAN ANDRES' => 'BENI - SAN ANDRES',
                                                                            'BENI - SAN BORJA' => 'BENI - SAN BORJA',
                                                                            'BENI - SAN IGNACIO DE MOXOS' => 'BENI - SAN IGNACIO DE MOXOS',
                                                                            'BENI - SAN JAVIER' => 'BENI - SAN JAVIER',
                                                                            'BENI - SAN JOAQUIN' => 'BENI - SAN JOAQUIN',
                                                                            'BENI - SAN RAMON' => 'BENI - SAN RAMON',
                                                                            'BENI - SANTA ANA DEL YACUMA' => 'BENI - SANTA ANA DEL YACUMA',
                                                                            'BENI - TRINIDAD' => 'BENI - TRINIDAD',
                                                                            'CHUQUISACA - ALCALA' => 'CHUQUISACA - ALCALA',
                                                                            'CHUQUISACA - AZURDUY' => 'CHUQUISACA - AZURDUY',
                                                                            'CHUQUISACA - CAMARGO' => 'CHUQUISACA - CAMARGO',
                                                                            'CHUQUISACA - CHUQUISACA' => 'CHUQUISACA - CHUQUISACA',
                                                                            'CHUQUISACA - CULPINA' => 'CHUQUISACA - CULPINA',
                                                                            'CHUQUISACA - EL VILLAR' => 'CHUQUISACA - EL VILLAR',
                                                                            'CHUQUISACA - HUACARETA' => 'CHUQUISACA - HUACARETA',
                                                                            'CHUQUISACA - HUACAYA' => 'CHUQUISACA - HUACAYA',
                                                                            'CHUQUISACA - ICLA' => 'CHUQUISACA - ICLA',
                                                                            'CHUQUISACA - INCAHUASI' => 'CHUQUISACA - INCAHUASI',
                                                                            'CHUQUISACA - LAS CARRERAS' => 'CHUQUISACA - LAS CARRERAS',
                                                                            'CHUQUISACA - MACHARETI' => 'CHUQUISACA - MACHARETI',
                                                                            'CHUQUISACA - MOJOCOYA' => 'CHUQUISACA - MOJOCOYA',
                                                                            'CHUQUISACA - MONTEAGUDO' => 'CHUQUISACA - MONTEAGUDO',
                                                                            'CHUQUISACA - PADILLA' => 'CHUQUISACA - PADILLA',
                                                                            'CHUQUISACA - POROMA' => 'CHUQUISACA - POROMA',
                                                                            'CHUQUISACA - PRESTO' => 'CHUQUISACA - PRESTO',
                                                                            'CHUQUISACA - SAN LUCAS' => 'CHUQUISACA - SAN LUCAS',
                                                                            'CHUQUISACA - SOPACHUY' => 'CHUQUISACA - SOPACHUY',
                                                                            'CHUQUISACA - SUCRE' => 'CHUQUISACA - SUCRE',
                                                                            'CHUQUISACA - TARABUCO' => 'CHUQUISACA - TARABUCO',
                                                                            'CHUQUISACA - TARVITA' => 'CHUQUISACA - TARVITA',
                                                                            'CHUQUISACA - TOMINA' => 'CHUQUISACA - TOMINA',
                                                                            'CHUQUISACA - VILLA ABECIA' => 'CHUQUISACA - VILLA ABECIA',
                                                                            'CHUQUISACA - VILLA CHARCAS' => 'CHUQUISACA - VILLA CHARCAS',
                                                                            'CHUQUISACA - VILLA SERRANO' => 'CHUQUISACA - VILLA SERRANO',
                                                                            'CHUQUISACA - VILLA VACA GUZMAN' => 'CHUQUISACA - VILLA VACA GUZMAN',
                                                                            'CHUQUISACA - YAMPARAEZ' => 'CHUQUISACA - YAMPARAEZ',
                                                                            'CHUQUISACA - YOTALA' => 'CHUQUISACA - YOTALA',
                                                                            'CHUQUISACA - ZUDAÑEZ' => 'CHUQUISACA - ZUDAÑEZ',
                                                                            'COCHABAMBA - AIQUILE' => 'COCHABAMBA - AIQUILE',
                                                                            'COCHABAMBA - ALALAY' => 'COCHABAMBA - ALALAY',
                                                                            'COCHABAMBA - ANZALDO' => 'COCHABAMBA - ANZALDO',
                                                                            'COCHABAMBA - ARANI' => 'COCHABAMBA - ARANI',
                                                                            'COCHABAMBA - ARBIETO' => 'COCHABAMBA - ARBIETO',
                                                                            'COCHABAMBA - ARQUE' => 'COCHABAMBA - ARQUE',
                                                                            'COCHABAMBA - AYOPAYA' => 'COCHABAMBA - AYOPAYA',
                                                                            'COCHABAMBA - BOLIVAR' => 'COCHABAMBA - BOLIVAR',
                                                                            'COCHABAMBA - CAPINOTA' => 'COCHABAMBA - CAPINOTA',
                                                                            'COCHABAMBA - CERCADO' => 'COCHABAMBA - CERCADO',
                                                                            'COCHABAMBA - CHIMORE' => 'COCHABAMBA - CHIMORE',
                                                                            'COCHABAMBA - CLIZA' => 'COCHABAMBA - CLIZA',
                                                                            'COCHABAMBA - COCAPATA' => 'COCHABAMBA - COCAPATA',
                                                                            'COCHABAMBA - COCHABAMBA' => 'COCHABAMBA - COCHABAMBA',
                                                                            'COCHABAMBA - COLCAPIRHUA' => 'COCHABAMBA - COLCAPIRHUA',
                                                                            'COCHABAMBA - COLOMI' => 'COCHABAMBA - COLOMI',
                                                                            'COCHABAMBA - CUCHUMUELA' => 'COCHABAMBA - CUCHUMUELA',
                                                                            'COCHABAMBA - ENTRE RIOS' => 'COCHABAMBA - ENTRE RIOS',
                                                                            'COCHABAMBA - MANCOMUNIDAD DEL CONO SUR' => 'COCHABAMBA - MANCOMUNIDAD DEL CONO SUR',
                                                                            'COCHABAMBA - MIZQUE' => 'COCHABAMBA - MIZQUE',
                                                                            'COCHABAMBA - MOROCHATA' => 'COCHABAMBA - MOROCHATA',
                                                                            'COCHABAMBA - OMEREQUE' => 'COCHABAMBA - OMEREQUE',
                                                                            'COCHABAMBA - PASARAPA' => 'COCHABAMBA - PASARAPA',
                                                                            'COCHABAMBA - POCONA' => 'COCHABAMBA - POCONA',
                                                                            'COCHABAMBA - POJO' => 'COCHABAMBA - POJO',
                                                                            'COCHABAMBA - PUERTO VILLARROEL' => 'COCHABAMBA - PUERTO VILLARROEL',
                                                                            'COCHABAMBA - PUNATA' => 'COCHABAMBA - PUNATA',
                                                                            'COCHABAMBA - QUILLACOLLO' => 'COCHABAMBA - QUILLACOLLO',
                                                                            'COCHABAMBA - SACABA' => 'COCHABAMBA - SACABA',
                                                                            'COCHABAMBA - SACABAMBA' => 'COCHABAMBA - SACABAMBA',
                                                                            'COCHABAMBA - SAN BENITO' => 'COCHABAMBA - SAN BENITO',
                                                                            'COCHABAMBA - SANTIVAÑEZ' => 'COCHABAMBA - SANTIVAÑEZ',
                                                                            'COCHABAMBA - SHINAHOTA' => 'COCHABAMBA - SHINAHOTA',
                                                                            'COCHABAMBA - SICAYA' => 'COCHABAMBA - SICAYA',
                                                                            'COCHABAMBA - SIPE SIPE' => 'COCHABAMBA - SIPE SIPE',
                                                                            'COCHABAMBA - TACACHI' => 'COCHABAMBA - TACACHI',
                                                                            'COCHABAMBA - TAPACARI' => 'COCHABAMBA - TAPACARI',
                                                                            'COCHABAMBA - TARATA' => 'COCHABAMBA - TARATA',
                                                                            'COCHABAMBA - TIQUIPAYA' => 'COCHABAMBA - TIQUIPAYA',
                                                                            'COCHABAMBA - TIRAQUE' => 'COCHABAMBA - TIRAQUE',
                                                                            'COCHABAMBA - TOCOPAYA' => 'COCHABAMBA - TOCOPAYA',
                                                                            'COCHABAMBA - TOKO' => 'COCHABAMBA - TOKO',
                                                                            'COCHABAMBA - TOLATA' => 'COCHABAMBA - TOLATA',
                                                                            'COCHABAMBA - TOTORA' => 'COCHABAMBA - TOTORA',
                                                                            'COCHABAMBA - VACAS' => 'COCHABAMBA - VACAS',
                                                                            'COCHABAMBA - VILA VILA' => 'COCHABAMBA - VILA VILA',
                                                                            'COCHABAMBA - VILLA RIVERO' => 'COCHABAMBA - VILLA RIVERO',
                                                                            'COCHABAMBA - VILLA TUNARI' => 'COCHABAMBA - VILLA TUNARI',
                                                                            'COCHABAMBA - VINTO' => 'COCHABAMBA - VINTO',
                                                                            'EXTRANJERO' => 'EXTRANJERO',
                                                                            'LA PAZ - ACHACACHI' => 'LA PAZ - ACHACACHI',
                                                                            'LA PAZ - ACHOCALLA' => 'LA PAZ - ACHOCALLA',
                                                                            'LA PAZ - ALTO BENI' => 'LA PAZ - ALTO BENI',
                                                                            'LA PAZ - ANCORAIMES' => 'LA PAZ - ANCORAIMES',
                                                                            'LA PAZ - APOLO' => 'LA PAZ - APOLO',
                                                                            'LA PAZ - AUCAPATA' => 'LA PAZ - AUCAPATA',
                                                                            'LA PAZ - AYATA' => 'LA PAZ - AYATA',
                                                                            'LA PAZ - AYO AYO' => 'LA PAZ - AYO AYO',
                                                                            'LA PAZ - BATALLAS' => 'LA PAZ - BATALLAS',
                                                                            'LA PAZ - CAIROMA' => 'LA PAZ - CAIROMA',
                                                                            'LA PAZ - CAJUATA' => 'LA PAZ - CAJUATA',
                                                                            'LA PAZ - CALACOTO' => 'LA PAZ - CALACOTO',
                                                                            'LA PAZ - CALAMARCA' => 'LA PAZ - CALAMARCA',
                                                                            'LA PAZ - CAQUIAVIRI' => 'LA PAZ - CAQUIAVIRI',
                                                                            'LA PAZ - CARANAVI' => 'LA PAZ - CARANAVI',
                                                                            'LA PAZ - CATACORA' => 'LA PAZ - CATACORA',
                                                                            'LA PAZ - CHARAÑA' => 'LA PAZ - CHARAÑA',
                                                                            'LA PAZ - CHARARILLA' => 'LA PAZ - CHARARILLA',
                                                                            'LA PAZ - CHUA COCANI' => 'LA PAZ - CHUA COCANI',
                                                                            'LA PAZ - CHULUMANI' => 'LA PAZ - CHULUMANI',
                                                                            'LA PAZ - CHUMA' => 'LA PAZ - CHUMA',
                                                                            'LA PAZ - COLLANA' => 'LA PAZ - COLLANA',
                                                                            'LA PAZ - COLQUENCHA' => 'LA PAZ - COLQUENCHA',
                                                                            'LA PAZ - COLQUIRI' => 'LA PAZ - COLQUIRI',
                                                                            'LA PAZ - COMANCHE' => 'LA PAZ - COMANCHE',
                                                                            'LA PAZ - COMBAYA' => 'LA PAZ - COMBAYA',
                                                                            'LA PAZ - COPACABANA' => 'LA PAZ - COPACABANA',
                                                                            'LA PAZ - CORIPATA' => 'LA PAZ - CORIPATA',
                                                                            'LA PAZ - CORO CORO' => 'LA PAZ - CORO CORO',
                                                                            'LA PAZ - COROICO' => 'LA PAZ - COROICO',
                                                                            'LA PAZ - CURVA' => 'LA PAZ - CURVA',
                                                                            'LA PAZ - DESAGUADERO' => 'LA PAZ - DESAGUADERO',
                                                                            'LA PAZ - EL ALTO' => 'LA PAZ - EL ALTO',
                                                                            'LA PAZ - ESCOMA' => 'LA PAZ - ESCOMA',
                                                                            'LA PAZ - GUANAY' => 'LA PAZ - GUANAY',
                                                                            'LA PAZ - GUAQUI' => 'LA PAZ - GUAQUI',
                                                                            'LA PAZ - HUARINA' => 'LA PAZ - HUARINA',
                                                                            'LA PAZ - HUATAJATA' => 'LA PAZ - HUATAJATA',
                                                                            'LA PAZ - HUMANATA' => 'LA PAZ - HUMANATA',
                                                                            'LA PAZ - ICHOCA' => 'LA PAZ - ICHOCA',
                                                                            'LA PAZ - INQUISIVI' => 'LA PAZ - INQUISIVI',
                                                                            'LA PAZ - IRUPANA' => 'LA PAZ - IRUPANA',
                                                                            'LA PAZ - IXIAMAS' => 'LA PAZ - IXIAMAS',
                                                                            'LA PAZ - JESUS DE MACHACA' => 'LA PAZ - JESUS DE MACHACA',
                                                                            'LA PAZ - JUAN JOSE PEREZ' => 'LA PAZ - JUAN JOSE PEREZ',
                                                                            'LA PAZ - LA ASUNTA' => 'LA PAZ - LA ASUNTA',
                                                                            'LA PAZ - LAJA' => 'LA PAZ - LAJA',
                                                                            'LA PAZ - LA PAZ' => 'LA PAZ - LA PAZ',
                                                                            'LA PAZ - LICOMA PAMPA' => 'LA PAZ - LICOMA PAMPA',
                                                                            'LA PAZ - LURIBAY' => 'LA PAZ - LURIBAY',
                                                                            'LA PAZ - MALLA' => 'LA PAZ - MALLA',
                                                                            'LA PAZ - MAPIRI' => 'LA PAZ - MAPIRI',
                                                                            'LA PAZ - MECAPACA' => 'LA PAZ - MECAPACA',
                                                                            'LA PAZ - MOCOMOCO' => 'LA PAZ - MOCOMOCO',
                                                                            'LA PAZ - NAZACARA DE PACAJES' => 'LA PAZ - NAZACARA DE PACAJES',
                                                                            'LA PAZ - PALCA' => 'LA PAZ - PALCA',
                                                                            'LA PAZ - PALOS BLANCOS' => 'LA PAZ - PALOS BLANCOS',
                                                                            'LA PAZ - PAPEL PAMPA' => 'LA PAZ - PAPEL PAMPA',
                                                                            'LA PAZ - PATACAMAYA' => 'LA PAZ - PATACAMAYA',
                                                                            'LA PAZ - PELECHUCO' => 'LA PAZ - PELECHUCO',
                                                                            'LA PAZ - PUCARANI' => 'LA PAZ - PUCARANI',
                                                                            'LA PAZ - PUERTO ACOSTA' => 'LA PAZ - PUERTO ACOSTA',
                                                                            'LA PAZ - PUERTO CARABUCO' => 'LA PAZ - PUERTO CARABUCO',
                                                                            'LA PAZ - PUERTO PEREZ' => 'LA PAZ - PUERTO PEREZ',
                                                                            'LA PAZ - QUIABAYA' => 'LA PAZ - QUIABAYA',
                                                                            'LA PAZ - QUIME' => 'LA PAZ - QUIME',
                                                                            'LA PAZ - SAN ANDRES DE MACHACA' => 'LA PAZ - SAN ANDRES DE MACHACA',
                                                                            'LA PAZ - SAN BUENA VENTURA' => 'LA PAZ - SAN BUENA VENTURA',
                                                                            'LA PAZ - SAN PEDRO DE CURAHUARA' => 'LA PAZ - SAN PEDRO DE CURAHUARA',
                                                                            'LA PAZ - SAN PEDRO DE TIQUINA' => 'LA PAZ - SAN PEDRO DE TIQUINA',
                                                                            'LA PAZ - SANTIAGO DE CALLAPA' => 'LA PAZ - SANTIAGO DE CALLAPA',
                                                                            'LA PAZ - SANTIAGO DE HUATA' => 'LA PAZ - SANTIAGO DE HUATA',
                                                                            'LA PAZ - SANTIAGO DE MACHACA' => 'LA PAZ - SANTIAGO DE MACHACA',
                                                                            'LA PAZ - SAPAHAQUI' => 'LA PAZ - SAPAHAQUI',
                                                                            'LA PAZ - SICA SICA' => 'LA PAZ - SICA SICA',
                                                                            'LA PAZ - SORATA' => 'LA PAZ - SORATA',
                                                                            'LA PAZ - TACACOMA' => 'LA PAZ - TACACOMA',
                                                                            'LA PAZ - TARACO' => 'LA PAZ - TARACO',
                                                                            'LA PAZ - TEOPONTE' => 'LA PAZ - TEOPONTE',
                                                                            'LA PAZ - TIAWANACU' => 'LA PAZ - TIAWANACU',
                                                                            'LA PAZ - TIPUANI' => 'LA PAZ - TIPUANI',
                                                                            'LA PAZ - TITO YUPANQUI' => 'LA PAZ - TITO YUPANQUI',
                                                                            'LA PAZ - UMALA' => 'LA PAZ - UMALA',
                                                                            'LA PAZ - VIACHA' => 'LA PAZ - VIACHA',
                                                                            'LA PAZ - WALDO BALLIVIAN' => 'LA PAZ - WALDO BALLIVIAN',
                                                                            'LA PAZ - YACO' => 'LA PAZ - YACO',
                                                                            'LA PAZ - YANACACHI' => 'LA PAZ - YANACACHI',
                                                                            'ORURO - ANDAMARCA' => 'ORURO - ANDAMARCA',
                                                                            'ORURO - ANTEQUERA' => 'ORURO - ANTEQUERA',
                                                                            'ORURO - BELEN DE ANDAMARCA' => 'ORURO - BELEN DE ANDAMARCA',
                                                                            'ORURO - CARACOLLO' => 'ORURO - CARACOLLO',
                                                                            'ORURO - CHALLAPATA' => 'ORURO - CHALLAPATA',
                                                                            'ORURO - CHIPAYA' => 'ORURO - CHIPAYA',
                                                                            'ORURO - CHOQUECOTA' => 'ORURO - CHOQUECOTA',
                                                                            'ORURO - COIPASA' => 'ORURO - COIPASA',
                                                                            'ORURO - CORQUE' => 'ORURO - CORQUE',
                                                                            'ORURO - CRUZ DE MACHACAMARCA' => 'ORURO - CRUZ DE MACHACAMARCA',
                                                                            'ORURO - CURAHUARA DE CARANGAS' => 'ORURO - CURAHUARA DE CARANGAS',
                                                                            'ORURO - EL CHORRO' => 'ORURO - EL CHORRO',
                                                                            'ORURO - ESCARA' => 'ORURO - ESCARA',
                                                                            'ORURO - ESMERALDA' => 'ORURO - ESMERALDA',
                                                                            'ORURO - EUCALIPTUS' => 'ORURO - EUCALIPTUS',
                                                                            'ORURO - HUACHACALLA' => 'ORURO - HUACHACALLA',
                                                                            'ORURO - HUANUNI' => 'ORURO - HUANUNI',
                                                                            'ORURO - HUAYLLAMARCA' => 'ORURO - HUAYLLAMARCA',
                                                                            'ORURO - LA RIVERA' => 'ORURO - LA RIVERA',
                                                                            'ORURO - MACHACAMARCA' => 'ORURO - MACHACAMARCA',
                                                                            'ORURO - ORURO' => 'ORURO - ORURO',
                                                                            'ORURO - PAMPA AULLAGAS' => 'ORURO - PAMPA AULLAGAS',
                                                                            'ORURO - PARI O SORACACHI' => 'ORURO - PARI O SORACACHI',
                                                                            'ORURO - PAZÑA' => 'ORURO - PAZÑA',
                                                                            'ORURO - POOPO' => 'ORURO - POOPO',
                                                                            'ORURO - QUILLACAS' => 'ORURO - QUILLACAS',
                                                                            'ORURO - SABAYA' => 'ORURO - SABAYA',
                                                                            'ORURO - SALINAS DE GARCI MENDOZA' => 'ORURO - SALINAS DE GARCI MENDOZA',
                                                                            'ORURO - SANTIAGO DE HUARI' => 'ORURO - SANTIAGO DE HUARI',
                                                                            'ORURO - TODOS SANTOS' => 'ORURO - TODOS SANTOS',
                                                                            'ORURO - TOLEDO' => 'ORURO - TOLEDO',
                                                                            'ORURO - TOTORA' => 'ORURO - TOTORA',
                                                                            'ORURO - TURCO' => 'ORURO - TURCO',
                                                                            'ORURO - YUNGUYO DEL LITORAL' => 'ORURO - YUNGUYO DEL LITORAL',
                                                                            'OTROS - NACIONAL' => 'OTROS - NACIONAL',
                                                                            'OTROS' => 'OTROS',
                                                                            'OTROS - SIN DEFINIR' => 'OTROS - SIN DEFINIR',
                                                                            'PANDO - BELLA FLOR' => 'PANDO - BELLA FLOR',
                                                                            'PANDO - BOLPEBRA' => 'PANDO - BOLPEBRA',
                                                                            'PANDO - COBIJA' => 'PANDO - COBIJA',
                                                                            'PANDO - EL SENA' => 'PANDO - EL SENA',
                                                                            'PANDO - FILADELFIA' => 'PANDO - FILADELFIA',
                                                                            'PANDO - INGAVI' => 'PANDO - INGAVI',
                                                                            'PANDO - NUEVA ESPERANZA' => 'PANDO - NUEVA ESPERANZA',
                                                                            'PANDO - PORVENIR' => 'PANDO - PORVENIR',
                                                                            'PANDO - PUERTO GONZALO MORENO' => 'PANDO - PUERTO GONZALO MORENO',
                                                                            'PANDO - PUERTO RICO' => 'PANDO - PUERTO RICO',
                                                                            'PANDO - SAN LORENZO' => 'PANDO - SAN LORENZO',
                                                                            'PANDO - SAN PEDRO' => 'PANDO - SAN PEDRO',
                                                                            'PANDO - SANTA ROSA DEL ABUNÁ' => 'PANDO - SANTA ROSA DEL ABUNÁ',
                                                                            'PANDO - SANTOS MERCADO' => 'PANDO - SANTOS MERCADO',
                                                                            'PANDO - VILLA NUEVA' => 'PANDO - VILLA NUEVA',
                                                                            'POTOSI - ACASIO' => 'POTOSI - ACASIO',
                                                                            'POTOSI - ARAMPAMPA' => 'POTOSI - ARAMPAMPA',
                                                                            'POTOSI - ATOCHA' => 'POTOSI - ATOCHA',
                                                                            'POTOSI - BETANZOS' => 'POTOSI - BETANZOS',
                                                                            'POTOSI - CAIZA "D"' => 'POTOSI - CAIZA "D"',
                                                                            'POTOSI - CARIPUYO' => 'POTOSI - CARIPUYO',
                                                                            'POTOSI - CHAQUI' => 'POTOSI - CHAQUI',
                                                                            'POTOSI - CHAYANTA' => 'POTOSI - CHAYANTA',
                                                                            'POTOSI - CHUQUIHUTA AYLLU JUCUMANI' => 'POTOSI - CHUQUIHUTA AYLLU JUCUMANI',
                                                                            'POTOSI - CKOCHAS' => 'POTOSI - CKOCHAS',
                                                                            'POTOSI - COLCHA K' => 'POTOSI - COLCHA K',
                                                                            'POTOSI - COLQUECHACA' => 'POTOSI - COLQUECHACA',
                                                                            'POTOSI - COTAGAITA' => 'POTOSI - COTAGAITA',
                                                                            'POTOSI - LLALLAGUA' => 'POTOSI - LLALLAGUA',
                                                                            'POTOSI - LLICA' => 'POTOSI - LLICA',
                                                                            'POTOSI - MOJINETE' => 'POTOSI - MOJINETE',
                                                                            'POTOSI - OCURI' => 'POTOSI - OCURI',
                                                                            'POTOSI - POCOATA' => 'POTOSI - POCOATA',
                                                                            'POTOSI - POCOATA' => 'POTOSI - POCOATA',
                                                                            'POTOSI - PORCO' => 'POTOSI - PORCO',
                                                                            'POTOSI - POTOSI' => 'POTOSI - POTOSI',
                                                                            'POTOSI - PUNA' => 'POTOSI - PUNA',
                                                                            'POTOSI - RAVELO' => 'POTOSI - RAVELO',
                                                                            'POTOSI - SACACA' => 'POTOSI - SACACA',
                                                                            'POTOSI - SAN AGUSTIN' => 'POTOSI - SAN AGUSTIN',
                                                                            'POTOSI - SAN ANTONIO DE ESMORUCO' => 'POTOSI - SAN ANTONIO DE ESMORUCO',
                                                                            'POTOSI - SAN PABLO' => 'POTOSI - SAN PABLO',
                                                                            'POTOSI - SAN PEDRO' => 'POTOSI - SAN PEDRO',
                                                                            'POTOSI - SAN PEDRO DE QUEMES' => 'POTOSI - SAN PEDRO DE QUEMES',
                                                                            'POTOSI - TACOBAMBA' => 'POTOSI - TACOBAMBA',
                                                                            'POTOSI - TAHUA' => 'POTOSI - TAHUA',
                                                                            'POTOSI - TINGUIPAYA' => 'POTOSI - TINGUIPAYA',
                                                                            'POTOSI - TOMAVE' => 'POTOSI - TOMAVE',
                                                                            'POTOSI - TORO TORO' => 'POTOSI - TORO TORO',
                                                                            'POTOSI - TUPIZA' => 'POTOSI - TUPIZA',
                                                                            'POTOSI - UNCIA' => 'POTOSI - UNCIA',
                                                                            'POTOSI - URMIRI' => 'POTOSI - URMIRI',
                                                                            'POTOSI - UYUNI' => 'POTOSI - UYUNI',
                                                                            'POTOSI - VILLAZON' => 'POTOSI - VILLAZON',
                                                                            'POTOSI - VITICHI' => 'POTOSI - VITICHI',
                                                                            'POTOSI - YOCALLA' => 'POTOSI - YOCALLA',
                                                                            'SANTA CRUZ - ASCENSION DE GUARAYOS' => 'SANTA CRUZ - ASCENSION DE GUARAYOS',
                                                                            'SANTA CRUZ - AYACUCHO' => 'SANTA CRUZ - AYACUCHO',
                                                                            'SANTA CRUZ - BOYUIBE' => 'SANTA CRUZ - BOYUIBE',
                                                                            'SANTA CRUZ - BUENA VISTA' => 'SANTA CRUZ - BUENA VISTA',
                                                                            'SANTA CRUZ - CABEZAS' => 'SANTA CRUZ - CABEZAS',
                                                                            'SANTA CRUZ - CAMIRI' => 'SANTA CRUZ - CAMIRI',
                                                                            'SANTA CRUZ - CARMEN RIVERO TORREZ' => 'SANTA CRUZ - CARMEN RIVERO TORREZ',
                                                                            'SANTA CRUZ - CHARAGUA' => 'SANTA CRUZ - CHARAGUA',
                                                                            'SANTA CRUZ - COLPA BELGICA' => 'SANTA CRUZ - COLPA BELGICA',
                                                                            'SANTA CRUZ - COMARAPA' => 'SANTA CRUZ - COMARAPA',
                                                                            'SANTA CRUZ - CONCEPCION' => 'SANTA CRUZ - CONCEPCION',
                                                                            'SANTA CRUZ - COTOCA' => 'SANTA CRUZ - COTOCA',
                                                                            'SANTA CRUZ - CUATRO CAÑADAS' => 'SANTA CRUZ - CUATRO CAÑADAS',
                                                                            'SANTA CRUZ - CUEVO' => 'SANTA CRUZ - CUEVO',
                                                                            'SANTA CRUZ - EL PUENTE' => 'SANTA CRUZ - EL PUENTE',
                                                                            'SANTA CRUZ - EL TORNO' => 'SANTA CRUZ - EL TORNO',
                                                                            'SANTA CRUZ - FERNANDEZ ALONSO' => 'SANTA CRUZ - FERNANDEZ ALONSO',
                                                                            'SANTA CRUZ - GENERAL SAAVEDRA' => 'SANTA CRUZ - GENERAL SAAVEDRA',
                                                                            'SANTA CRUZ - GUTIERREZ' => 'SANTA CRUZ - GUTIERREZ',
                                                                            'SANTA CRUZ - LA GUARDIA' => 'SANTA CRUZ - LA GUARDIA',
                                                                            'SANTA CRUZ - LAGUNILLAS' => 'SANTA CRUZ - LAGUNILLAS',
                                                                            'SANTA CRUZ - MAIRANA' => 'SANTA CRUZ - MAIRANA',
                                                                            'SANTA CRUZ - MINEROS' => 'SANTA CRUZ - MINEROS',
                                                                            'SANTA CRUZ - MONTERO' => 'SANTA CRUZ - MONTERO',
                                                                            'SANTA CRUZ - MORO MORO' => 'SANTA CRUZ - MORO MORO',
                                                                            'SANTA CRUZ - OKINAWA I' => 'SANTA CRUZ - OKINAWA I',
                                                                            'SANTA CRUZ - PAILON' => 'SANTA CRUZ - PAILON',
                                                                            'SANTA CRUZ - PAMPA GRANDE' => 'SANTA CRUZ - PAMPA GRANDE',
                                                                            'SANTA CRUZ - PORTACHUELO' => 'SANTA CRUZ - PORTACHUELO',
                                                                            'SANTA CRUZ - POSTRER VALLE' => 'SANTA CRUZ - POSTRER VALLE',
                                                                            'SANTA CRUZ - PUCARA' => 'SANTA CRUZ - PUCARA',
                                                                            'SANTA CRUZ - PUERTO QUIJARRO' => 'SANTA CRUZ - PUERTO QUIJARRO',
                                                                            'SANTA CRUZ - PUERTO SUAREZ' => 'SANTA CRUZ - PUERTO SUAREZ',
                                                                            'SANTA CRUZ - QUIRUSILLAS' => 'SANTA CRUZ - QUIRUSILLAS',
                                                                            'SANTA CRUZ - ROBORE' => 'SANTA CRUZ - ROBORE',
                                                                            'SANTA CRUZ - SAIPINA' => 'SANTA CRUZ - SAIPINA',
                                                                            'SANTA CRUZ - SAMAIPATA' => 'SANTA CRUZ - SAMAIPATA',
                                                                            'SANTA CRUZ - SAN ANTONIO DE LOMERIO' => 'SANTA CRUZ - SAN ANTONIO DE LOMERIO',
                                                                            'SANTA CRUZ - SAN CARLOS' => 'SANTA CRUZ - SAN CARLOS',
                                                                            'SANTA CRUZ - SAN IGNACIO DE VELASCO' => 'SANTA CRUZ - SAN IGNACIO DE VELASCO',
                                                                            'SANTA CRUZ - SAN JAVIER' => 'SANTA CRUZ - SAN JAVIER',
                                                                            'SANTA CRUZ - SAN JOSE DE CHIQUITOS' => 'SANTA CRUZ - SAN JOSE DE CHIQUITOS',
                                                                            'SANTA CRUZ - SAN JUAN' => 'SANTA CRUZ - SAN JUAN',
                                                                            'SANTA CRUZ - SAN JULIAN' => 'SANTA CRUZ - SAN JULIAN',
                                                                            'SANTA CRUZ - SAN MATIAS' => 'SANTA CRUZ - SAN MATIAS',
                                                                            'SANTA CRUZ - SAN MIGUEL' => 'SANTA CRUZ - SAN MIGUEL',
                                                                            'SANTA CRUZ - SAN PEDRO DE BUENA VISTA' => 'SANTA CRUZ - SAN PEDRO DE BUENA VISTA',
                                                                            'SANTA CRUZ - SAN RAFAEL DE VELASCO' => 'SANTA CRUZ - SAN RAFAEL DE VELASCO',
                                                                            'SANTA CRUZ - SAN RAMON' => 'SANTA CRUZ - SAN RAMON',
                                                                            'SANTA CRUZ - SANTA CRUZ DE LA SIERRA' => 'SANTA CRUZ - SANTA CRUZ DE LA SIERRA',
                                                                            'SANTA CRUZ - SANTA ROSA DEL SARA' => 'SANTA CRUZ - SANTA ROSA DEL SARA',
                                                                            'SANTA CRUZ - TRIGAL' => 'SANTA CRUZ - TRIGAL',
                                                                            'SANTA CRUZ - URUBICHA' => 'SANTA CRUZ - URUBICHA',
                                                                            'SANTA CRUZ - VALLEGRANDE' => 'SANTA CRUZ - VALLEGRANDE',
                                                                            'SANTA CRUZ - WARNES' => 'SANTA CRUZ - WARNES',
                                                                            'SANTA CRUZ - YAPACANI' => 'SANTA CRUZ - YAPACANI',
                                                                            'TARIJA - BERMEJO' => 'TARIJA - BERMEJO',
                                                                            'TARIJA - CARAPARI' => 'TARIJA - CARAPARI',
                                                                            'TARIJA - EL PUENTE' => 'TARIJA - EL PUENTE',
                                                                            'TARIJA - ENTRE RIOS' => 'TARIJA - ENTRE RIOS',
                                                                            'TARIJA - PADCAYA' => 'TARIJA - PADCAYA',
                                                                            'TARIJA - SAN LORENZO' => 'TARIJA - SAN LORENZO',
                                                                            'TARIJA - TARIJA' => 'TARIJA - TARIJA',
                                                                            'TARIJA - URIONDO' => 'TARIJA - URIONDO',
                                                                            'TARIJA - VILLAMONTES' => 'TARIJA - VILLAMONTES',
                                                                            'TARIJA - YACUIBA' => 'TARIJA - YACUIBA',
                                                                            'TARIJA - YUNCHARA' => 'TARIJA - YUNCHARA'
                                                                        )
                                                                            as $key => $ciudad_interesado) : ?>
                                                                            <option value="<?= $key ?>" <?= $datos_persona[0]['ciudad_donde_vive'] == $key ? 'selected' : ''; ?>><?= $ciudad_interesado ?></option>
                                                                        <?php endforeach; ?>
                                                                    <?php } else { ?>
                                                                        <?php foreach (array(
                                                                            'BENI - BAURES' => 'BENI - BAURES',
                                                                            'BENI - BENI' => 'BENI - BENI',
                                                                            'BENI - EXALTACION' => 'BENI - EXALTACION',
                                                                            'BENI - GUAYARAMERIN' => 'BENI - GUAYARAMERIN',
                                                                            'BENI - HUACARAJE' => 'BENI - HUACARAJE',
                                                                            'BENI - LORETO' => 'BENI - LORETO',
                                                                            'BENI - MAGDALENA' => 'BENI - MAGDALENA',
                                                                            'BENI - PUERTO SILES' => 'BENI - PUERTO SILES',
                                                                            'BENI - REYES' => 'BENI - REYES',
                                                                            'BENI - RIBERALTA' => 'BENI - RIBERALTA',
                                                                            'BENI - RURRENABAQUE' => 'BENI - RURRENABAQUE',
                                                                            'BENI - SAN ANDRES' => 'BENI - SAN ANDRES',
                                                                            'BENI - SAN BORJA' => 'BENI - SAN BORJA',
                                                                            'BENI - SAN IGNACIO DE MOXOS' => 'BENI - SAN IGNACIO DE MOXOS',
                                                                            'BENI - SAN JAVIER' => 'BENI - SAN JAVIER',
                                                                            'BENI - SAN JOAQUIN' => 'BENI - SAN JOAQUIN',
                                                                            'BENI - SAN RAMON' => 'BENI - SAN RAMON',
                                                                            'BENI - SANTA ANA DEL YACUMA' => 'BENI - SANTA ANA DEL YACUMA',
                                                                            'BENI - TRINIDAD' => 'BENI - TRINIDAD',
                                                                            'CHUQUISACA - ALCALA' => 'CHUQUISACA - ALCALA',
                                                                            'CHUQUISACA - AZURDUY' => 'CHUQUISACA - AZURDUY',
                                                                            'CHUQUISACA - CAMARGO' => 'CHUQUISACA - CAMARGO',
                                                                            'CHUQUISACA - CHUQUISACA' => 'CHUQUISACA - CHUQUISACA',
                                                                            'CHUQUISACA - CULPINA' => 'CHUQUISACA - CULPINA',
                                                                            'CHUQUISACA - EL VILLAR' => 'CHUQUISACA - EL VILLAR',
                                                                            'CHUQUISACA - HUACARETA' => 'CHUQUISACA - HUACARETA',
                                                                            'CHUQUISACA - HUACAYA' => 'CHUQUISACA - HUACAYA',
                                                                            'CHUQUISACA - ICLA' => 'CHUQUISACA - ICLA',
                                                                            'CHUQUISACA - INCAHUASI' => 'CHUQUISACA - INCAHUASI',
                                                                            'CHUQUISACA - LAS CARRERAS' => 'CHUQUISACA - LAS CARRERAS',
                                                                            'CHUQUISACA - MACHARETI' => 'CHUQUISACA - MACHARETI',
                                                                            'CHUQUISACA - MOJOCOYA' => 'CHUQUISACA - MOJOCOYA',
                                                                            'CHUQUISACA - MONTEAGUDO' => 'CHUQUISACA - MONTEAGUDO',
                                                                            'CHUQUISACA - PADILLA' => 'CHUQUISACA - PADILLA',
                                                                            'CHUQUISACA - POROMA' => 'CHUQUISACA - POROMA',
                                                                            'CHUQUISACA - PRESTO' => 'CHUQUISACA - PRESTO',
                                                                            'CHUQUISACA - SAN LUCAS' => 'CHUQUISACA - SAN LUCAS',
                                                                            'CHUQUISACA - SOPACHUY' => 'CHUQUISACA - SOPACHUY',
                                                                            'CHUQUISACA - SUCRE' => 'CHUQUISACA - SUCRE',
                                                                            'CHUQUISACA - TARABUCO' => 'CHUQUISACA - TARABUCO',
                                                                            'CHUQUISACA - TARVITA' => 'CHUQUISACA - TARVITA',
                                                                            'CHUQUISACA - TOMINA' => 'CHUQUISACA - TOMINA',
                                                                            'CHUQUISACA - VILLA ABECIA' => 'CHUQUISACA - VILLA ABECIA',
                                                                            'CHUQUISACA - VILLA CHARCAS' => 'CHUQUISACA - VILLA CHARCAS',
                                                                            'CHUQUISACA - VILLA SERRANO' => 'CHUQUISACA - VILLA SERRANO',
                                                                            'CHUQUISACA - VILLA VACA GUZMAN' => 'CHUQUISACA - VILLA VACA GUZMAN',
                                                                            'CHUQUISACA - YAMPARAEZ' => 'CHUQUISACA - YAMPARAEZ',
                                                                            'CHUQUISACA - YOTALA' => 'CHUQUISACA - YOTALA',
                                                                            'CHUQUISACA - ZUDAÑEZ' => 'CHUQUISACA - ZUDAÑEZ',
                                                                            'COCHABAMBA - AIQUILE' => 'COCHABAMBA - AIQUILE',
                                                                            'COCHABAMBA - ALALAY' => 'COCHABAMBA - ALALAY',
                                                                            'COCHABAMBA - ANZALDO' => 'COCHABAMBA - ANZALDO',
                                                                            'COCHABAMBA - ARANI' => 'COCHABAMBA - ARANI',
                                                                            'COCHABAMBA - ARBIETO' => 'COCHABAMBA - ARBIETO',
                                                                            'COCHABAMBA - ARQUE' => 'COCHABAMBA - ARQUE',
                                                                            'COCHABAMBA - AYOPAYA' => 'COCHABAMBA - AYOPAYA',
                                                                            'COCHABAMBA - BOLIVAR' => 'COCHABAMBA - BOLIVAR',
                                                                            'COCHABAMBA - CAPINOTA' => 'COCHABAMBA - CAPINOTA',
                                                                            'COCHABAMBA - CERCADO' => 'COCHABAMBA - CERCADO',
                                                                            'COCHABAMBA - CHIMORE' => 'COCHABAMBA - CHIMORE',
                                                                            'COCHABAMBA - CLIZA' => 'COCHABAMBA - CLIZA',
                                                                            'COCHABAMBA - COCAPATA' => 'COCHABAMBA - COCAPATA',
                                                                            'COCHABAMBA - COCHABAMBA' => 'COCHABAMBA - COCHABAMBA',
                                                                            'COCHABAMBA - COLCAPIRHUA' => 'COCHABAMBA - COLCAPIRHUA',
                                                                            'COCHABAMBA - COLOMI' => 'COCHABAMBA - COLOMI',
                                                                            'COCHABAMBA - CUCHUMUELA' => 'COCHABAMBA - CUCHUMUELA',
                                                                            'COCHABAMBA - ENTRE RIOS' => 'COCHABAMBA - ENTRE RIOS',
                                                                            'COCHABAMBA - MANCOMUNIDAD DEL CONO SUR' => 'COCHABAMBA - MANCOMUNIDAD DEL CONO SUR',
                                                                            'COCHABAMBA - MIZQUE' => 'COCHABAMBA - MIZQUE',
                                                                            'COCHABAMBA - MOROCHATA' => 'COCHABAMBA - MOROCHATA',
                                                                            'COCHABAMBA - OMEREQUE' => 'COCHABAMBA - OMEREQUE',
                                                                            'COCHABAMBA - PASARAPA' => 'COCHABAMBA - PASARAPA',
                                                                            'COCHABAMBA - POCONA' => 'COCHABAMBA - POCONA',
                                                                            'COCHABAMBA - POJO' => 'COCHABAMBA - POJO',
                                                                            'COCHABAMBA - PUERTO VILLARROEL' => 'COCHABAMBA - PUERTO VILLARROEL',
                                                                            'COCHABAMBA - PUNATA' => 'COCHABAMBA - PUNATA',
                                                                            'COCHABAMBA - QUILLACOLLO' => 'COCHABAMBA - QUILLACOLLO',
                                                                            'COCHABAMBA - SACABA' => 'COCHABAMBA - SACABA',
                                                                            'COCHABAMBA - SACABAMBA' => 'COCHABAMBA - SACABAMBA',
                                                                            'COCHABAMBA - SAN BENITO' => 'COCHABAMBA - SAN BENITO',
                                                                            'COCHABAMBA - SANTIVAÑEZ' => 'COCHABAMBA - SANTIVAÑEZ',
                                                                            'COCHABAMBA - SHINAHOTA' => 'COCHABAMBA - SHINAHOTA',
                                                                            'COCHABAMBA - SICAYA' => 'COCHABAMBA - SICAYA',
                                                                            'COCHABAMBA - SIPE SIPE' => 'COCHABAMBA - SIPE SIPE',
                                                                            'COCHABAMBA - TACACHI' => 'COCHABAMBA - TACACHI',
                                                                            'COCHABAMBA - TAPACARI' => 'COCHABAMBA - TAPACARI',
                                                                            'COCHABAMBA - TARATA' => 'COCHABAMBA - TARATA',
                                                                            'COCHABAMBA - TIQUIPAYA' => 'COCHABAMBA - TIQUIPAYA',
                                                                            'COCHABAMBA - TIRAQUE' => 'COCHABAMBA - TIRAQUE',
                                                                            'COCHABAMBA - TOCOPAYA' => 'COCHABAMBA - TOCOPAYA',
                                                                            'COCHABAMBA - TOKO' => 'COCHABAMBA - TOKO',
                                                                            'COCHABAMBA - TOLATA' => 'COCHABAMBA - TOLATA',
                                                                            'COCHABAMBA - TOTORA' => 'COCHABAMBA - TOTORA',
                                                                            'COCHABAMBA - VACAS' => 'COCHABAMBA - VACAS',
                                                                            'COCHABAMBA - VILA VILA' => 'COCHABAMBA - VILA VILA',
                                                                            'COCHABAMBA - VILLA RIVERO' => 'COCHABAMBA - VILLA RIVERO',
                                                                            'COCHABAMBA - VILLA TUNARI' => 'COCHABAMBA - VILLA TUNARI',
                                                                            'COCHABAMBA - VINTO' => 'COCHABAMBA - VINTO',
                                                                            'EXTRANJERO' => 'EXTRANJERO',
                                                                            'LA PAZ - ACHACACHI' => 'LA PAZ - ACHACACHI',
                                                                            'LA PAZ - ACHOCALLA' => 'LA PAZ - ACHOCALLA',
                                                                            'LA PAZ - ALTO BENI' => 'LA PAZ - ALTO BENI',
                                                                            'LA PAZ - ANCORAIMES' => 'LA PAZ - ANCORAIMES',
                                                                            'LA PAZ - APOLO' => 'LA PAZ - APOLO',
                                                                            'LA PAZ - AUCAPATA' => 'LA PAZ - AUCAPATA',
                                                                            'LA PAZ - AYATA' => 'LA PAZ - AYATA',
                                                                            'LA PAZ - AYO AYO' => 'LA PAZ - AYO AYO',
                                                                            'LA PAZ - BATALLAS' => 'LA PAZ - BATALLAS',
                                                                            'LA PAZ - CAIROMA' => 'LA PAZ - CAIROMA',
                                                                            'LA PAZ - CAJUATA' => 'LA PAZ - CAJUATA',
                                                                            'LA PAZ - CALACOTO' => 'LA PAZ - CALACOTO',
                                                                            'LA PAZ - CALAMARCA' => 'LA PAZ - CALAMARCA',
                                                                            'LA PAZ - CAQUIAVIRI' => 'LA PAZ - CAQUIAVIRI',
                                                                            'LA PAZ - CARANAVI' => 'LA PAZ - CARANAVI',
                                                                            'LA PAZ - CATACORA' => 'LA PAZ - CATACORA',
                                                                            'LA PAZ - CHARAÑA' => 'LA PAZ - CHARAÑA',
                                                                            'LA PAZ - CHARARILLA' => 'LA PAZ - CHARARILLA',
                                                                            'LA PAZ - CHUA COCANI' => 'LA PAZ - CHUA COCANI',
                                                                            'LA PAZ - CHULUMANI' => 'LA PAZ - CHULUMANI',
                                                                            'LA PAZ - CHUMA' => 'LA PAZ - CHUMA',
                                                                            'LA PAZ - COLLANA' => 'LA PAZ - COLLANA',
                                                                            'LA PAZ - COLQUENCHA' => 'LA PAZ - COLQUENCHA',
                                                                            'LA PAZ - COLQUIRI' => 'LA PAZ - COLQUIRI',
                                                                            'LA PAZ - COMANCHE' => 'LA PAZ - COMANCHE',
                                                                            'LA PAZ - COMBAYA' => 'LA PAZ - COMBAYA',
                                                                            'LA PAZ - COPACABANA' => 'LA PAZ - COPACABANA',
                                                                            'LA PAZ - CORIPATA' => 'LA PAZ - CORIPATA',
                                                                            'LA PAZ - CORO CORO' => 'LA PAZ - CORO CORO',
                                                                            'LA PAZ - COROICO' => 'LA PAZ - COROICO',
                                                                            'LA PAZ - CURVA' => 'LA PAZ - CURVA',
                                                                            'LA PAZ - DESAGUADERO' => 'LA PAZ - DESAGUADERO',
                                                                            'LA PAZ - EL ALTO' => 'LA PAZ - EL ALTO',
                                                                            'LA PAZ - ESCOMA' => 'LA PAZ - ESCOMA',
                                                                            'LA PAZ - GUANAY' => 'LA PAZ - GUANAY',
                                                                            'LA PAZ - GUAQUI' => 'LA PAZ - GUAQUI',
                                                                            'LA PAZ - HUARINA' => 'LA PAZ - HUARINA',
                                                                            'LA PAZ - HUATAJATA' => 'LA PAZ - HUATAJATA',
                                                                            'LA PAZ - HUMANATA' => 'LA PAZ - HUMANATA',
                                                                            'LA PAZ - ICHOCA' => 'LA PAZ - ICHOCA',
                                                                            'LA PAZ - INQUISIVI' => 'LA PAZ - INQUISIVI',
                                                                            'LA PAZ - IRUPANA' => 'LA PAZ - IRUPANA',
                                                                            'LA PAZ - IXIAMAS' => 'LA PAZ - IXIAMAS',
                                                                            'LA PAZ - JESUS DE MACHACA' => 'LA PAZ - JESUS DE MACHACA',
                                                                            'LA PAZ - JUAN JOSE PEREZ' => 'LA PAZ - JUAN JOSE PEREZ',
                                                                            'LA PAZ - LA ASUNTA' => 'LA PAZ - LA ASUNTA',
                                                                            'LA PAZ - LAJA' => 'LA PAZ - LAJA',
                                                                            'LA PAZ - LA PAZ' => 'LA PAZ - LA PAZ',
                                                                            'LA PAZ - LICOMA PAMPA' => 'LA PAZ - LICOMA PAMPA',
                                                                            'LA PAZ - LURIBAY' => 'LA PAZ - LURIBAY',
                                                                            'LA PAZ - MALLA' => 'LA PAZ - MALLA',
                                                                            'LA PAZ - MAPIRI' => 'LA PAZ - MAPIRI',
                                                                            'LA PAZ - MECAPACA' => 'LA PAZ - MECAPACA',
                                                                            'LA PAZ - MOCOMOCO' => 'LA PAZ - MOCOMOCO',
                                                                            'LA PAZ - NAZACARA DE PACAJES' => 'LA PAZ - NAZACARA DE PACAJES',
                                                                            'LA PAZ - PALCA' => 'LA PAZ - PALCA',
                                                                            'LA PAZ - PALOS BLANCOS' => 'LA PAZ - PALOS BLANCOS',
                                                                            'LA PAZ - PAPEL PAMPA' => 'LA PAZ - PAPEL PAMPA',
                                                                            'LA PAZ - PATACAMAYA' => 'LA PAZ - PATACAMAYA',
                                                                            'LA PAZ - PELECHUCO' => 'LA PAZ - PELECHUCO',
                                                                            'LA PAZ - PUCARANI' => 'LA PAZ - PUCARANI',
                                                                            'LA PAZ - PUERTO ACOSTA' => 'LA PAZ - PUERTO ACOSTA',
                                                                            'LA PAZ - PUERTO CARABUCO' => 'LA PAZ - PUERTO CARABUCO',
                                                                            'LA PAZ - PUERTO PEREZ' => 'LA PAZ - PUERTO PEREZ',
                                                                            'LA PAZ - QUIABAYA' => 'LA PAZ - QUIABAYA',
                                                                            'LA PAZ - QUIME' => 'LA PAZ - QUIME',
                                                                            'LA PAZ - SAN ANDRES DE MACHACA' => 'LA PAZ - SAN ANDRES DE MACHACA',
                                                                            'LA PAZ - SAN BUENA VENTURA' => 'LA PAZ - SAN BUENA VENTURA',
                                                                            'LA PAZ - SAN PEDRO DE CURAHUARA' => 'LA PAZ - SAN PEDRO DE CURAHUARA',
                                                                            'LA PAZ - SAN PEDRO DE TIQUINA' => 'LA PAZ - SAN PEDRO DE TIQUINA',
                                                                            'LA PAZ - SANTIAGO DE CALLAPA' => 'LA PAZ - SANTIAGO DE CALLAPA',
                                                                            'LA PAZ - SANTIAGO DE HUATA' => 'LA PAZ - SANTIAGO DE HUATA',
                                                                            'LA PAZ - SANTIAGO DE MACHACA' => 'LA PAZ - SANTIAGO DE MACHACA',
                                                                            'LA PAZ - SAPAHAQUI' => 'LA PAZ - SAPAHAQUI',
                                                                            'LA PAZ - SICA SICA' => 'LA PAZ - SICA SICA',
                                                                            'LA PAZ - SORATA' => 'LA PAZ - SORATA',
                                                                            'LA PAZ - TACACOMA' => 'LA PAZ - TACACOMA',
                                                                            'LA PAZ - TARACO' => 'LA PAZ - TARACO',
                                                                            'LA PAZ - TEOPONTE' => 'LA PAZ - TEOPONTE',
                                                                            'LA PAZ - TIAWANACU' => 'LA PAZ - TIAWANACU',
                                                                            'LA PAZ - TIPUANI' => 'LA PAZ - TIPUANI',
                                                                            'LA PAZ - TITO YUPANQUI' => 'LA PAZ - TITO YUPANQUI',
                                                                            'LA PAZ - UMALA' => 'LA PAZ - UMALA',
                                                                            'LA PAZ - VIACHA' => 'LA PAZ - VIACHA',
                                                                            'LA PAZ - WALDO BALLIVIAN' => 'LA PAZ - WALDO BALLIVIAN',
                                                                            'LA PAZ - YACO' => 'LA PAZ - YACO',
                                                                            'LA PAZ - YANACACHI' => 'LA PAZ - YANACACHI',
                                                                            'ORURO - ANDAMARCA' => 'ORURO - ANDAMARCA',
                                                                            'ORURO - ANTEQUERA' => 'ORURO - ANTEQUERA',
                                                                            'ORURO - BELEN DE ANDAMARCA' => 'ORURO - BELEN DE ANDAMARCA',
                                                                            'ORURO - CARACOLLO' => 'ORURO - CARACOLLO',
                                                                            'ORURO - CHALLAPATA' => 'ORURO - CHALLAPATA',
                                                                            'ORURO - CHIPAYA' => 'ORURO - CHIPAYA',
                                                                            'ORURO - CHOQUECOTA' => 'ORURO - CHOQUECOTA',
                                                                            'ORURO - COIPASA' => 'ORURO - COIPASA',
                                                                            'ORURO - CORQUE' => 'ORURO - CORQUE',
                                                                            'ORURO - CRUZ DE MACHACAMARCA' => 'ORURO - CRUZ DE MACHACAMARCA',
                                                                            'ORURO - CURAHUARA DE CARANGAS' => 'ORURO - CURAHUARA DE CARANGAS',
                                                                            'ORURO - EL CHORRO' => 'ORURO - EL CHORRO',
                                                                            'ORURO - ESCARA' => 'ORURO - ESCARA',
                                                                            'ORURO - ESMERALDA' => 'ORURO - ESMERALDA',
                                                                            'ORURO - EUCALIPTUS' => 'ORURO - EUCALIPTUS',
                                                                            'ORURO - HUACHACALLA' => 'ORURO - HUACHACALLA',
                                                                            'ORURO - HUANUNI' => 'ORURO - HUANUNI',
                                                                            'ORURO - HUAYLLAMARCA' => 'ORURO - HUAYLLAMARCA',
                                                                            'ORURO - LA RIVERA' => 'ORURO - LA RIVERA',
                                                                            'ORURO - MACHACAMARCA' => 'ORURO - MACHACAMARCA',
                                                                            'ORURO - ORURO' => 'ORURO - ORURO',
                                                                            'ORURO - PAMPA AULLAGAS' => 'ORURO - PAMPA AULLAGAS',
                                                                            'ORURO - PARI O SORACACHI' => 'ORURO - PARI O SORACACHI',
                                                                            'ORURO - PAZÑA' => 'ORURO - PAZÑA',
                                                                            'ORURO - POOPO' => 'ORURO - POOPO',
                                                                            'ORURO - QUILLACAS' => 'ORURO - QUILLACAS',
                                                                            'ORURO - SABAYA' => 'ORURO - SABAYA',
                                                                            'ORURO - SALINAS DE GARCI MENDOZA' => 'ORURO - SALINAS DE GARCI MENDOZA',
                                                                            'ORURO - SANTIAGO DE HUARI' => 'ORURO - SANTIAGO DE HUARI',
                                                                            'ORURO - TODOS SANTOS' => 'ORURO - TODOS SANTOS',
                                                                            'ORURO - TOLEDO' => 'ORURO - TOLEDO',
                                                                            'ORURO - TOTORA' => 'ORURO - TOTORA',
                                                                            'ORURO - TURCO' => 'ORURO - TURCO',
                                                                            'ORURO - YUNGUYO DEL LITORAL' => 'ORURO - YUNGUYO DEL LITORAL',
                                                                            'OTROS - NACIONAL' => 'OTROS - NACIONAL',
                                                                            'OTROS' => 'OTROS',
                                                                            'OTROS - SIN DEFINIR' => 'OTROS - SIN DEFINIR',
                                                                            'PANDO - BELLA FLOR' => 'PANDO - BELLA FLOR',
                                                                            'PANDO - BOLPEBRA' => 'PANDO - BOLPEBRA',
                                                                            'PANDO - COBIJA' => 'PANDO - COBIJA',
                                                                            'PANDO - EL SENA' => 'PANDO - EL SENA',
                                                                            'PANDO - FILADELFIA' => 'PANDO - FILADELFIA',
                                                                            'PANDO - INGAVI' => 'PANDO - INGAVI',
                                                                            'PANDO - NUEVA ESPERANZA' => 'PANDO - NUEVA ESPERANZA',
                                                                            'PANDO - PORVENIR' => 'PANDO - PORVENIR',
                                                                            'PANDO - PUERTO GONZALO MORENO' => 'PANDO - PUERTO GONZALO MORENO',
                                                                            'PANDO - PUERTO RICO' => 'PANDO - PUERTO RICO',
                                                                            'PANDO - SAN LORENZO' => 'PANDO - SAN LORENZO',
                                                                            'PANDO - SAN PEDRO' => 'PANDO - SAN PEDRO',
                                                                            'PANDO - SANTA ROSA DEL ABUNÁ' => 'PANDO - SANTA ROSA DEL ABUNÁ',
                                                                            'PANDO - SANTOS MERCADO' => 'PANDO - SANTOS MERCADO',
                                                                            'PANDO - VILLA NUEVA' => 'PANDO - VILLA NUEVA',
                                                                            'POTOSI - ACASIO' => 'POTOSI - ACASIO',
                                                                            'POTOSI - ARAMPAMPA' => 'POTOSI - ARAMPAMPA',
                                                                            'POTOSI - ATOCHA' => 'POTOSI - ATOCHA',
                                                                            'POTOSI - BETANZOS' => 'POTOSI - BETANZOS',
                                                                            'POTOSI - CAIZA "D"' => 'POTOSI - CAIZA "D"',
                                                                            'POTOSI - CARIPUYO' => 'POTOSI - CARIPUYO',
                                                                            'POTOSI - CHAQUI' => 'POTOSI - CHAQUI',
                                                                            'POTOSI - CHAYANTA' => 'POTOSI - CHAYANTA',
                                                                            'POTOSI - CHUQUIHUTA AYLLU JUCUMANI' => 'POTOSI - CHUQUIHUTA AYLLU JUCUMANI',
                                                                            'POTOSI - CKOCHAS' => 'POTOSI - CKOCHAS',
                                                                            'POTOSI - COLCHA K' => 'POTOSI - COLCHA K',
                                                                            'POTOSI - COLQUECHACA' => 'POTOSI - COLQUECHACA',
                                                                            'POTOSI - COTAGAITA' => 'POTOSI - COTAGAITA',
                                                                            'POTOSI - LLALLAGUA' => 'POTOSI - LLALLAGUA',
                                                                            'POTOSI - LLICA' => 'POTOSI - LLICA',
                                                                            'POTOSI - MOJINETE' => 'POTOSI - MOJINETE',
                                                                            'POTOSI - OCURI' => 'POTOSI - OCURI',
                                                                            'POTOSI - POCOATA' => 'POTOSI - POCOATA',
                                                                            'POTOSI - POCOATA' => 'POTOSI - POCOATA',
                                                                            'POTOSI - PORCO' => 'POTOSI - PORCO',
                                                                            'POTOSI - POTOSI' => 'POTOSI - POTOSI',
                                                                            'POTOSI - PUNA' => 'POTOSI - PUNA',
                                                                            'POTOSI - RAVELO' => 'POTOSI - RAVELO',
                                                                            'POTOSI - SACACA' => 'POTOSI - SACACA',
                                                                            'POTOSI - SAN AGUSTIN' => 'POTOSI - SAN AGUSTIN',
                                                                            'POTOSI - SAN ANTONIO DE ESMORUCO' => 'POTOSI - SAN ANTONIO DE ESMORUCO',
                                                                            'POTOSI - SAN PABLO' => 'POTOSI - SAN PABLO',
                                                                            'POTOSI - SAN PEDRO' => 'POTOSI - SAN PEDRO',
                                                                            'POTOSI - SAN PEDRO DE QUEMES' => 'POTOSI - SAN PEDRO DE QUEMES',
                                                                            'POTOSI - TACOBAMBA' => 'POTOSI - TACOBAMBA',
                                                                            'POTOSI - TAHUA' => 'POTOSI - TAHUA',
                                                                            'POTOSI - TINGUIPAYA' => 'POTOSI - TINGUIPAYA',
                                                                            'POTOSI - TOMAVE' => 'POTOSI - TOMAVE',
                                                                            'POTOSI - TORO TORO' => 'POTOSI - TORO TORO',
                                                                            'POTOSI - TUPIZA' => 'POTOSI - TUPIZA',
                                                                            'POTOSI - UNCIA' => 'POTOSI - UNCIA',
                                                                            'POTOSI - URMIRI' => 'POTOSI - URMIRI',
                                                                            'POTOSI - UYUNI' => 'POTOSI - UYUNI',
                                                                            'POTOSI - VILLAZON' => 'POTOSI - VILLAZON',
                                                                            'POTOSI - VITICHI' => 'POTOSI - VITICHI',
                                                                            'POTOSI - YOCALLA' => 'POTOSI - YOCALLA',
                                                                            'SANTA CRUZ - ASCENSION DE GUARAYOS' => 'SANTA CRUZ - ASCENSION DE GUARAYOS',
                                                                            'SANTA CRUZ - AYACUCHO' => 'SANTA CRUZ - AYACUCHO',
                                                                            'SANTA CRUZ - BOYUIBE' => 'SANTA CRUZ - BOYUIBE',
                                                                            'SANTA CRUZ - BUENA VISTA' => 'SANTA CRUZ - BUENA VISTA',
                                                                            'SANTA CRUZ - CABEZAS' => 'SANTA CRUZ - CABEZAS',
                                                                            'SANTA CRUZ - CAMIRI' => 'SANTA CRUZ - CAMIRI',
                                                                            'SANTA CRUZ - CARMEN RIVERO TORREZ' => 'SANTA CRUZ - CARMEN RIVERO TORREZ',
                                                                            'SANTA CRUZ - CHARAGUA' => 'SANTA CRUZ - CHARAGUA',
                                                                            'SANTA CRUZ - COLPA BELGICA' => 'SANTA CRUZ - COLPA BELGICA',
                                                                            'SANTA CRUZ - COMARAPA' => 'SANTA CRUZ - COMARAPA',
                                                                            'SANTA CRUZ - CONCEPCION' => 'SANTA CRUZ - CONCEPCION',
                                                                            'SANTA CRUZ - COTOCA' => 'SANTA CRUZ - COTOCA',
                                                                            'SANTA CRUZ - CUATRO CAÑADAS' => 'SANTA CRUZ - CUATRO CAÑADAS',
                                                                            'SANTA CRUZ - CUEVO' => 'SANTA CRUZ - CUEVO',
                                                                            'SANTA CRUZ - EL PUENTE' => 'SANTA CRUZ - EL PUENTE',
                                                                            'SANTA CRUZ - EL TORNO' => 'SANTA CRUZ - EL TORNO',
                                                                            'SANTA CRUZ - FERNANDEZ ALONSO' => 'SANTA CRUZ - FERNANDEZ ALONSO',
                                                                            'SANTA CRUZ - GENERAL SAAVEDRA' => 'SANTA CRUZ - GENERAL SAAVEDRA',
                                                                            'SANTA CRUZ - GUTIERREZ' => 'SANTA CRUZ - GUTIERREZ',
                                                                            'SANTA CRUZ - LA GUARDIA' => 'SANTA CRUZ - LA GUARDIA',
                                                                            'SANTA CRUZ - LAGUNILLAS' => 'SANTA CRUZ - LAGUNILLAS',
                                                                            'SANTA CRUZ - MAIRANA' => 'SANTA CRUZ - MAIRANA',
                                                                            'SANTA CRUZ - MINEROS' => 'SANTA CRUZ - MINEROS',
                                                                            'SANTA CRUZ - MONTERO' => 'SANTA CRUZ - MONTERO',
                                                                            'SANTA CRUZ - MORO MORO' => 'SANTA CRUZ - MORO MORO',
                                                                            'SANTA CRUZ - OKINAWA I' => 'SANTA CRUZ - OKINAWA I',
                                                                            'SANTA CRUZ - PAILON' => 'SANTA CRUZ - PAILON',
                                                                            'SANTA CRUZ - PAMPA GRANDE' => 'SANTA CRUZ - PAMPA GRANDE',
                                                                            'SANTA CRUZ - PORTACHUELO' => 'SANTA CRUZ - PORTACHUELO',
                                                                            'SANTA CRUZ - POSTRER VALLE' => 'SANTA CRUZ - POSTRER VALLE',
                                                                            'SANTA CRUZ - PUCARA' => 'SANTA CRUZ - PUCARA',
                                                                            'SANTA CRUZ - PUERTO QUIJARRO' => 'SANTA CRUZ - PUERTO QUIJARRO',
                                                                            'SANTA CRUZ - PUERTO SUAREZ' => 'SANTA CRUZ - PUERTO SUAREZ',
                                                                            'SANTA CRUZ - QUIRUSILLAS' => 'SANTA CRUZ - QUIRUSILLAS',
                                                                            'SANTA CRUZ - ROBORE' => 'SANTA CRUZ - ROBORE',
                                                                            'SANTA CRUZ - SAIPINA' => 'SANTA CRUZ - SAIPINA',
                                                                            'SANTA CRUZ - SAMAIPATA' => 'SANTA CRUZ - SAMAIPATA',
                                                                            'SANTA CRUZ - SAN ANTONIO DE LOMERIO' => 'SANTA CRUZ - SAN ANTONIO DE LOMERIO',
                                                                            'SANTA CRUZ - SAN CARLOS' => 'SANTA CRUZ - SAN CARLOS',
                                                                            'SANTA CRUZ - SAN IGNACIO DE VELASCO' => 'SANTA CRUZ - SAN IGNACIO DE VELASCO',
                                                                            'SANTA CRUZ - SAN JAVIER' => 'SANTA CRUZ - SAN JAVIER',
                                                                            'SANTA CRUZ - SAN JOSE DE CHIQUITOS' => 'SANTA CRUZ - SAN JOSE DE CHIQUITOS',
                                                                            'SANTA CRUZ - SAN JUAN' => 'SANTA CRUZ - SAN JUAN',
                                                                            'SANTA CRUZ - SAN JULIAN' => 'SANTA CRUZ - SAN JULIAN',
                                                                            'SANTA CRUZ - SAN MATIAS' => 'SANTA CRUZ - SAN MATIAS',
                                                                            'SANTA CRUZ - SAN MIGUEL' => 'SANTA CRUZ - SAN MIGUEL',
                                                                            'SANTA CRUZ - SAN PEDRO DE BUENA VISTA' => 'SANTA CRUZ - SAN PEDRO DE BUENA VISTA',
                                                                            'SANTA CRUZ - SAN RAFAEL DE VELASCO' => 'SANTA CRUZ - SAN RAFAEL DE VELASCO',
                                                                            'SANTA CRUZ - SAN RAMON' => 'SANTA CRUZ - SAN RAMON',
                                                                            'SANTA CRUZ - SANTA CRUZ DE LA SIERRA' => 'SANTA CRUZ - SANTA CRUZ DE LA SIERRA',
                                                                            'SANTA CRUZ - SANTA ROSA DEL SARA' => 'SANTA CRUZ - SANTA ROSA DEL SARA',
                                                                            'SANTA CRUZ - TRIGAL' => 'SANTA CRUZ - TRIGAL',
                                                                            'SANTA CRUZ - URUBICHA' => 'SANTA CRUZ - URUBICHA',
                                                                            'SANTA CRUZ - VALLEGRANDE' => 'SANTA CRUZ - VALLEGRANDE',
                                                                            'SANTA CRUZ - WARNES' => 'SANTA CRUZ - WARNES',
                                                                            'SANTA CRUZ - YAPACANI' => 'SANTA CRUZ - YAPACANI',
                                                                            'TARIJA - BERMEJO' => 'TARIJA - BERMEJO',
                                                                            'TARIJA - CARAPARI' => 'TARIJA - CARAPARI',
                                                                            'TARIJA - EL PUENTE' => 'TARIJA - EL PUENTE',
                                                                            'TARIJA - ENTRE RIOS' => 'TARIJA - ENTRE RIOS',
                                                                            'TARIJA - PADCAYA' => 'TARIJA - PADCAYA',
                                                                            'TARIJA - SAN LORENZO' => 'TARIJA - SAN LORENZO',
                                                                            'TARIJA - TARIJA' => 'TARIJA - TARIJA',
                                                                            'TARIJA - URIONDO' => 'TARIJA - URIONDO',
                                                                            'TARIJA - VILLAMONTES' => 'TARIJA - VILLAMONTES',
                                                                            'TARIJA - YACUIBA' => 'TARIJA - YACUIBA',
                                                                            'TARIJA - YUNCHARA' => 'TARIJA - YUNCHARA'
                                                                        ) as $key => $ciudad_interesado) : ?>
                                                                            <option value="<?= $key ?>"><?= $ciudad_interesado ?></option>
                                                                        <?php endforeach ?>
                                                                    <?php } ?>

                                                                </select>
                                                                <div class="help-block"></div>
                                                            </div>
                                                            <small class="form-control-feedback"> Seleccione su Ciudad </small>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->

                                                <!--/row-->
                                                <div class="row">
                                                    <!--/input lugar donde vive-->
                                                    <div class="col-md-12">
                                                        <div class="form-group has-success">
                                                            <label class="control-label">Dirección donde vive <span class="text-danger"> *</span></label>
                                                            <div class="controls">

                                                                <div class="controls">
                                                                    <input type="text" name="domicilio" id="domicilio" class="form-control text-uppercase" maxlength="50" required data-validation-required-message="Este campo es requerido" data-validation-maxlength-message="Demasiado largo: Máximo de '50' caracteres" value="<?php if (!empty($datos_persona[0]['domicilio'])) echo $datos_persona[0]['domicilio']; ?>">
                                                                </div>
                                                                <!-- <small class="form-control-feedback"> This is inline help </small> -->

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/row-->

                                                <!--/row-->
                                                <div class="row">

                                                    <!--/input nacionalidad-->
                                                    <!-- <?= var_dump(isset($id_pais)) ?> -->

                                                    <div class="col-lg-3 col-xl-3 col-md-12">
                                                        <div class="form-group has-success">
                                                            <label class="control-label">Nacionalidad<span class="text-danger"> *</span></label>
                                                            <div class="controls">
                                                                <select name="id_pais_nacionalidad" id="id_pais_nacionalidad" required="" class="form-control text-uppercase" aria-invalid="false" data-validation-required-message="Este campo es requerido">
                                                                    <?php if (!empty($datos_persona)) { ?>
                                                                        <?php foreach ($id_pais as $pais) { ?>
                                                                            <option value="<?= $pais['id_pais'] ?>" <?= $datos_persona[0]['id_pais_nacionalidad'] == $pais['id_pais'] ? 'selected' : ''; ?>><?= $pais['nombre_pais'] ?></option>
                                                                        <?php } ?>
                                                                    <?php } else { ?>
                                                                        <?php foreach ($id_pais as $pais) { ?>
                                                                            <option value="<?= $pais['id_pais'] ?>"><?= $pais['nombre_pais'] ?></option>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                    <!-- <option value="CH">ESTADOS UNIDOS</option> -->

                                                                </select>
                                                                <div class="help-block"></div>
                                                            </div>
                                                            <small class="form-control-feedback"> Seleccione su Nacionalidad </small>
                                                        </div>
                                                    </div>

                                                    <!--/input estado civil-->
                                                    <div class="col-lg-3 col-xl-3 col-md-12 ">
                                                        <div class="form-group has-success">
                                                            <label class="control-label">Estado Civil<span class="text-danger"> *</span></label>
                                                            <div class="controls">
                                                                <select name="estado_civil" id="estado_civil" required="" class="form-control text-uppercase" aria-invalid="false" data-validation-required-message="Este campo es requerido">


                                                                    <option value="" <?php if (!empty($datos_persona[0]['estado_civil'])) echo ($datos_persona[0]['estado_civil'] == '' ? 'selected="selected"' : ''); ?>>
                                                                        SELECCIONE </option>
                                                                    <option value="SOLTERO" <?php if (!empty($datos_persona[0]['estado_civil'])) echo ($datos_persona[0]['estado_civil'] == 'SOLTERO' ? 'selected="selected"' : ''); ?>>
                                                                        SOLTERO (A)</option>
                                                                    <option value="CASADO" <?php if (!empty($datos_persona[0]['estado_civil'])) echo ($datos_persona[0]['estado_civil'] == 'CASADO' ? 'selected="selected"' : ''); ?>>
                                                                        CASADO (A)</option>
                                                                    <option value="DIVORCIADO" <?php if (!empty($datos_persona[0]['estado_civil'])) echo ($datos_persona[0]['estado_civil'] == 'DIVORCIADO' ? 'selected="selected"' : ''); ?>>
                                                                        DIVORCIADO (A)</option>
                                                                    <option value="VIUDO" <?php if (!empty($datos_persona[0]['estado_civil'])) echo ($datos_persona[0]['estado_civil'] == 'VIUDO' ? 'selected="selected"' : ''); ?>>
                                                                        VIUDO (A)</option>
                                                                    <option value="CONVIVIENTE" <?php if (!empty($datos_persona[0]['estado_civil'])) echo ($datos_persona[0]['estado_civil'] == 'CONVIVIENTE' ? 'selected="selected"' : ''); ?>>
                                                                        CONVIVIENTE</option>

                                                                </select>
                                                                <div class="help-block"></div>
                                                            </div>
                                                            <small class="form-control-feedback"> Seleccione su Estado Civil </small>
                                                        </div>
                                                    </div>

                                                    <!--/input ocupacion actual-->
                                                    <div class="col-lg-6 col-xl-6 col-md-12 ">
                                                        <div class="form-group has-success">
                                                            <label class="control-label">Ocupación actual<span class="text-danger"> *</span></label>
                                                            <div class="controls">
                                                                <div class="controls">
                                                                    <input type="text" name="oficio_trabajo" id="oficio_trabajo" class="form-control texto-varios-espacios-inputmask text-uppercase" maxlength="50" required data-validation-required-message="Este campo es requerido" data-validation-maxlength-message="Demasiado largo: Máximo de '50' caracteres" value="<?php if (!empty($datos_persona[0]['oficio_trabajo'])) echo $datos_persona[0]['oficio_trabajo']; ?>">
                                                                </div>
                                                                <!-- <small class="form-control-feedback"> This is inline help </small> -->

                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                                <!--/row-->

                                                <div class="row p-t-0">
                                                    <!--/input celular-->
                                                    <div class="col-lg-2 col-xl-2 col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Celular<span class="text-danger"> *</span></label>
                                                            <div class="controls">
                                                                <input type="text" name="celular" id="celular" class="form-control telefono-celular-inputmask text-uppercase" maxlength="8" minlength="8" required data-validation-required-message="Este campo es requerido" data-validation-maxlength-message="Demasiado largo: Máximo de '8' caracteres" data-validation-minlength-message="Demasiado corto: Minimo de '8' digitos" autocomplete="off" value="<?php if (!empty($datos_persona[0]['celular'])) echo $datos_persona[0]['celular']; ?>">
                                                            </div>
                                                            <!-- <small class="form-control-feedback"> This is inline help </small> -->
                                                        </div>

                                                    </div>

                                                    <!--/input telefono-->
                                                    <div class=" col-lg-3 col-xl-3 col-md-6">
                                                        <div class="form-group ">
                                                            <label class="control-label">Teléfono (Opcional)</label>
                                                            <div class="controls">
                                                                <input type="text" name="telefono" id="telefono" class="form-control telefono-inputmask text-uppercase" maxlength="50" data-validation-maxlength-message="Demasiado largo: Máximo de '10' caracteres" autocomplete="off" value="<?php if (!empty($datos_persona[0]['telefono'])) echo $datos_persona[0]['telefono']; ?>">
                                                            </div>
                                                            <!-- <small class="form-control-feedback"> This field has error. </small> -->
                                                        </div>
                                                    </div>

                                                    <!--/input correo electronico-->
                                                    <div class="col-lg-7 col-xl-7 col-md-12">
                                                        <div class="form-group ">
                                                            <label class="control-label">Correo Electronico<span class="text-danger"> *</span></label>
                                                            <div class="controls">
                                                                <input type="text" name="email" id="email" class="form-control email-inputmask " maxlength="50" required data-validation-required-message="Este campo es requerido" data-validation-maxlength-message="Demasiado largo: Máximo de '50' caracteres" autocomplete="off" value="<?php if (!empty($datos_persona[0]['email'])) echo $datos_persona[0]['email']; ?>">
                                                            </div>
                                                            <!-- <small class="form-control-feedback"> This field has error. </small> -->
                                                        </div>
                                                    </div>

                                                </div>



                                                <h3 class="box-title m-t-10">FORMACIÓN ACAD&Eacute;MICA</h3>
                                                <hr>

                                                <!-- seccion modo responsivo -->

                                                <div id="responsivo_movil">
                                                    <div class="view_all_dt row">

                                                        <!--/sector imagen de diploma academico-->
                                                        <div class="col-lg-6 col-xl-6 col-md-12" style="display: block;margin: auto;">
                                                            <div class="view_img_left">
                                                                <div class="view__img">

                                                                    <img src="<?php echo base_url('img/uploads/add_img.jpg') ?>" alt="" id="mostrar_img_respaldo_diploma_academico" name="mostrar_img_respaldo_diploma_academico" onclick="document.getElementById('img_diploma_academico').click()" style="cursor: pointer; width:100%;height:450px;">


                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--/sector input file-->
                                                        <div class="col-lg-6 col-xl-6 col-md-12" style="display: block;margin: auto;">



                                                            <div class="view_img_right">

                                                                <label class="control-label">Respaldo de Diploma Academico <span class="text-danger"> *</span></label>
                                                                <p>
                                                                    Toma una Fotograf&iacute;a o carga una imagen de tu Diploma Acad&eacute;mico.
                                                                </p>


                                                                <div class="form-group">
                                                                    <button type="button" class="btn btn-sm btn-info btn-block" onclick="document.getElementById('img_diploma_academico').click()"><i class="fa fa-upload"> </i> Cargar Diploma Acad&eacute;mico</button>

                                                                    <div class="controls custom-file" id="diploma_academico" style="display: none;">
                                                                        <input type="file" class="custom-file-input" id="img_diploma_academico" name="img_diploma_academico" required data-validation-required-message="Este campo es requerido">
                                                                        <label id="label_name_img_diploma_academico" class="custom-file-label form-control" for="img_diploma_academico"></label>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- fin seccion modo responsivo -->

                                                <h3 class="box-title m-t-40">DATOS DEL DEP&Oacute;SITO BANCARIO</h3>
                                                <hr>

                                                <!-- seccion modo responsivo -->
                                                <h4 class="card-title">Registre su Dep&oacute;sito de Matr&iacute;cula Bs. <?= $publicacion_detalle->costo_matricula ?><span class="text-danger"> *</span></h4>
                                                <!-- <h6 class="card-subtitle">Use Bootstrap's predefined grid classes for horizontal form
                                                    </h6> -->

                                                <!--/ BLOQUE DEPOSITO DE MATRICULA  -->
                                                <div id="responsivo_movil">
                                                    <div class="view_all_dt row">
                                                        <!--/ sector imagen deposito matricula  -->
                                                        <div class="col-lg-6 col-xl-6 col-md-12" style="display: block;margin: auto;">
                                                            <div class="view_img_left">
                                                                <div class="view__img">

                                                                    <img src="<?php echo base_url('img/uploads/add_img.jpg') ?>" alt="" id="mostrar_img_dep_matricula" name="mostrar_img_dep_matricula" onclick="document.getElementById('img_dep_matricula').click()" style="cursor: pointer; width:100%;">

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--/ sector input + input file de deposito matricula  -->
                                                        <div class="col-lg-6 col-xl-6 col-md-12">
                                                            <div class="view_img_right">
                                                                <!-- <label class="control-label">Respaldo de Dep&oacute;sito de Matr&iacute;cula Bs. 200 <span class="text-danger"> *</span></label> -->

                                                                <p>
                                                                    Toma una Fotograf&iacute;a o carga una imagen de tu Dep&oacute;sito de matr&iacute;cula.</p>

                                                                <div class="form-group">

                                                                    <button type="button" class="btn btn-sm btn-info btn-block" onclick="document.getElementById('img_dep_matricula').click()"><i class="fa fa-upload"> </i> Cargar Dep&oacute;sito de matr&iacute;cula</button>

                                                                    <div class="controls custom-file" id="dep_matricula" style="display: none;">
                                                                        <input type="file" class="custom-file-input" id="img_dep_matricula" name="img_dep_matricula" required data-validation-required-message="Este campo es requerido">
                                                                        <label id="label_img_name_dep_matricula" class="custom-file-label form-control" for="img_dep_matricula"></label>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="row">
                                                                <div class="col-lg-12 col-xl-12 col-md-12 ">
                                                                    <div class="form-group has-success m-t-20">
                                                                        <label class="control-label">Numero de Dep&oacute;sito <span class="text-danger"> *</span></label>
                                                                        <div class="controls">
                                                                            <div class="controls">
                                                                                <input type="text" name="numero_deposito_matricula" id="numero_deposito_matricula" class="form-control numeros-inputmask text-uppercase" maxlength="50" required data-validation-required-message="Este campo es requerido" data-validation-maxlength-message="Demasiado largo: Máximo de '50' caracteres" autocomplete="off" value="<?php if (!empty($datos_persona_preinscrito[0]['nro_deposito_matricula'])) echo $datos_persona_preinscrito[0]['nro_deposito_matricula']; ?>">
                                                                            </div>
                                                                            <small class="form-control-feedback"> Revise si es correcto el numero de deposito (para no ser observado en la inscripci&oacute;n)</small>
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
                                                                                <input type="text" name="fecha_deposito_matricula" id="fecha_deposito_matricula" class="form-control text-uppercase" maxlength="50" required data-validation-required-message="Este campo es requerido" data-validation-maxlength-message="Demasiado largo: Máximo de '50' caracteres" value="<?php if (!empty($datos_persona_preinscrito[0]['fecha_deposito_matricula'])) echo $datos_persona_preinscrito[0]['fecha_deposito_matricula']; ?>">
                                                                            </div>
                                                                            <!-- <small class="form-control-feedback"> This is inline help </small> -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--/ BLOQUE DEPOSITO CUOTA INICIAL  -->
                                                <div id="responsivo_movil">
                                                    <h4 class="card-title">Registre su Dep&oacute;sito por Colegiatura (1ra Cuota)<span class="text-danger"> *</span></h4>
                                                    <!-- <h6 class="card-subtitle">Use Bootstrap's predefined grid classes for horizontal form </h6> -->
                                                    <div class="view_all_dt row m-t-20">

                                                        <!--/ sector input + input file de deposito cuota inicial  -->
                                                        <div class="col-lg-6 col-xl-6 col-md-12">

                                                            <div class="view_img_right">
                                                                <!-- <label class="control-label">Respaldo de la primera cuota <span class="text-danger"> *</span></label> -->

                                                                <p>
                                                                    Toma una Fotograf&iacute;a o carga una imagen de tu Dep&oacute;sito por colegiatura.
                                                                    .</p>



                                                                <div class="form-group">
                                                                    <button type="button" class="btn btn-sm btn-info btn-block" onclick="document.getElementById('img_dep_cuota_ini').click()"><i class="fa fa-upload"> </i> Cargar Dep&oacute;sito por colegiatura</button>

                                                                    <div class="controls custom-file" id="dep_cuota_inicial" style="display: none;">
                                                                        <input type="file" class="custom-file-input" id="img_dep_cuota_ini" name="img_dep_cuota_ini">
                                                                        <label id="label_name_dep_cuota_ini" class="custom-file-label form-control" for="img_dep_cuota_ini"></label>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="row">
                                                                <div class="col-lg-12 col-xl-12 col-md-12">
                                                                    <div class="form-group has-success">
                                                                        <label class="control-label">Numero de Dep&oacute;sito <span class="text-danger"> *</span></label>
                                                                        <div class="controls">
                                                                            <div class="controls">
                                                                                <input type="text" name="numero_deposito_cuota_inicial" id="numero_deposito_cuota_inicial" class="form-control numeros-inputmask text-uppercase" maxlength="50" data-validation-maxlength-message="Demasiado largo: Máximo de '50' caracteres" value="<?php if (!empty($datos_persona_preinscrito[0]['nro_deposito_cuota_ini'])) echo $datos_persona_preinscrito[0]['nro_deposito_cuota_ini']; ?>">
                                                                            </div>
                                                                            <small class="form-control-feedback"> Revise si es correcto el numero de deposito (para no ser observado en la inscripci&oacute;n)</small>
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
                                                                                <input type="text" name="fecha_deposito_inicial" id="fecha_deposito_inicial" class="form-control text-uppercase" value="<?php if (!empty($datos_persona_preinscrito[0]['fecha_deposito_cuota_ini'])) echo $datos_persona_preinscrito[0]['fecha_deposito_cuota_ini']; ?>">
                                                                            </div>
                                                                            <!-- <small class="form-control-feedback"> This is inline help </small> -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>





                                                        </div>

                                                        <!--/ sector imagen deposito cuota inicial  -->
                                                        <div class="col-lg-6 col-xl-6 col-md-12" style="display: block;margin: auto;">
                                                            <div class="view_img_left">
                                                                <div class="view__img">

                                                                    <img src="<?php echo base_url('img/uploads/add_img.jpg') ?>" alt="" id="mostrar_img_dep_cuota_ini" name="mostrar_img_dep_cuota_ini" onclick="document.getElementById('img_dep_cuota_ini').click()" style="cursor: pointer; width:100%;">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/row-->
                                                </div>

                                                <!-- fin seccion modo responsivo -->

                                                <div class="form-actions m-t-40 row">
                                                    <div class="col-md-6">
                                                        <a href="<?php base_url() ?>" class="btn btn-rounded btn-block btn-outline-warning" id="cancelar_inscripcion_online">CANCELAR </a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <button type="submit" id="enviar_inscripcion" class="btn btn-rounded btn-block btn-info"> <i class="fa fa-check-circle"></i> ENVIAR DATOS PARA LA INSCRIPCIÓN</button>
                                                    </div>
                                                </div>

                                            </div>
                                            <!-- </form> -->
                                            <?= form_close() ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <!-- fin bloque de formulario de inscripcio -->
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->

    <!-- End PAge Content -->


    <!-- Right sidebar -->

    <!-- .right-sidebar -->

    <!-- <div class="right-sidebar">
        <div class="slimscrollright">
            <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span>
            </div>
            <div class="r-panel-body">
                <ul id="themecolors" class="m-t-20">
                    <li><b>With Light sidebar</b></li>
                    <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                    <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                    <li><a href="javascript:void(0)" data-theme="red" class="red-theme">3</a></li>
                    <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme working">4</a></li>
                    <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                    <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                    <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                    <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                    <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                    <li><a href="javascript:void(0)" data-theme="red-dark" class="red-dark-theme">9</a></li>
                    <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                    <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                    <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme ">12</a></li>
                </ul>
                <ul class="m-t-20 chatonline">
                    <li><b>Chat option</b></li>
                    <li>
                        <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div> -->

    <!-- End Right sidebar -->

</div>

<!-- End Container fluid  -->




<!-- Modal -->
<div class="modal" id="detalle_programa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div id="detalle_programa-dialog" class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div id="detalle_programa-header" class="modal-header bg-color-psg">
                <h5 id="detalle_programa-title" class="modal-title font-weight-bold text-white"></h5>
                <button type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="detalle_programa-body" class="modal-body">
            </div>

        </div>
    </div>
</div>

<div id="detalle_programa_login" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background: 00;border: none;">

            <div id="detalle_programa_login-body" class="">

            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script> -->
<!-- <script>
    $("button").click(function() {
        /*$('.card').on('#inputs_forms').each(function() {
            var cantidad = $(this).val();
            alert(cantidad)
        })*/
        $('input').each(function(indice, elemento) {
            var valor = $(elemento).val();
            console.log('El elemento con el índice ' + indice + ' contiene ' + $(elemento).val());
            if (indice == 7) {
                focus(valor, elemento)
            } else if (indice == 12) {
                focus(valor, elemento)
            }
        });
    })

    function focus(valor, elemento) {
        if (valor.trim() == "") {
            //console.log('El elemento con el índice--- ' + indice + ' contiene ' + valor); 
            $(elemento).focus()
        }
    }
</script> -->