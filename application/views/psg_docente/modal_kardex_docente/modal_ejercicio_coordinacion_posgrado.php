<!-- Date picker plugins css -->
<!-- <link href="<?= base_url('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') ?>" rel="stylesheet" type="text/css" /> -->
<!-- Daterange picker plugins css -->
<!-- <link href="<?= base_url('assets/plugins/timepicker/bootstrap-timepicker.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('assets/plugins/bootstrap-daterangepicker/daterangepicker.css') ?>" rel="stylesheet"> -->

<!-- Date Picker Plugin JavaScript -->
<!-- <script src="<?= base_url('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') ?>"></script> -->
<!-- Date range Plugin JavaScript -->
<!-- <script src="<?= base_url('assets/plugins/timepicker/bootstrap-timepicker.min.js') ?>"></script> -->
<!-- <script src="<?= base_url('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') ?>"></script> -->


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title">Form Validation</h4>
                <h6 class="card-subtitle">Bootstrap Form Validation check the <a href="http://reactiveraven.github.io/jqBootstrapValidation/">official website
                    </a></h6> -->
                <!-- <form class="m-t-0" novalidate> -->
                <?= form_open('', array('id' => 'form_ejercicio_coordinacion_posgrado', 'class' => 'floating-labels m-t-0')); ?>

                <!-- campos input ocultos -->

                <input type="hidden" name="tipo_docencia_interno" id="tipo_docencia_interno" value="COORDINADOR">
                <input type="hidden" name="id_persona" id="id_persona" value="<?= $id_persona ?>">

                <!-- fin campos input ocultos -->

                <div class="row">
                    <div class="col-lg-4">
                        <!-- <div class="form-group">
                                <h5>Buscar por Gesti&oacute;n <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="id_gestion" name="id_gestion" class="form-control small" required data-validation-required-message="This field is required"> </div>
                                <div class="form-control-feedback"><small>Add <code>required</code> attribute to
                                        field for required validation.</small></div>
                            </div> -->
                        <div class="form-group m-t-10">
                            <select class="form-control p-40" style="padding: 0;" name="seleccionar_gestion" id="seleccionar_gestion_coordinacion">
                                <option value="todo">Todas las Gestiones</option>
                                <?php foreach ($lista_gestion as $gestion) { ?>
                                    <option value="<?= $gestion['id_gestion'] ?>"><?= $gestion['gestion'] ?></option>
                                <?php } ?>

                            </select><span class="bar"></span>
                            <label for="seleccionar_gestion">Buscar por Gesti&oacute;n</label>
                        </div>
                    </div>
                    <div class="col-lg-8">

                        <!-- <div class="form-group">
                            <h5>Seleccionar Programa <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="text" class="form-control" required data-validation-required-message="This field is required"> </div>
                            <div class="form-control-feedback"><small>Add <code>required</code> attribute to
                                    field for required validation.</small></div>
                        </div> -->
                        <div class="form-group m-t-10">
                            <select class="form-control p-40" style="padding: 0;" name="id_planificacion_programa" id="id_planificacion_programa_coordinacion">
                                <option>Seleccione</option>
                                <?php foreach ($lista_programa as $programa) { ?>
                                    <option value="<?= $programa['id_planificacion_programa'] ?>">(<?= ($programa['id_gestion'] + 2000) ?>) <?= $programa['nombre_programa'] ?> [VERSI&Oacute;N: <?= $programa['numero_version'] ?>]</option>
                                <?php } ?>

                            </select><span class="bar"></span>
                            <label for="id_planificacion_programa">Seleccionar Programa</label>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-4">
                        <!-- <div class="form-group">
                            <h5>N&uacute;mero M&oacute;dulo <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="text" class="form-control" required data-validation-required-message="This field is required"> </div>
                            <div class="form-control-feedback"><small>Add <code>required</code> attribute to
                                    field for required validation.</small></div>
                        </div> -->

                        <div class="form-group m-t-10">
                            <input type="text" class="form-control" name="nro_nombramiento" id="nro_nombramiento_coordinador">
                            <span class="bar"></span>
                            <label for="nro_nombramiento_coordinador">N&uacute;mero Nombramiento</label>
                        </div>
                    </div>
                    <!-- <div class="col-lg-8">

                        <h5 class="box-title m-t-0">Duraci&oacute;n del Nombramiento</h5>

                        <div class="input-daterange input-group" id="date-range">
                            <input type="text" class="form-control" name="start">
                            <span class="input-group-addon bg-info b-0 text-white">a</span>
                            <input type="text" class="form-control" name="end">
                        </div>

                    </div> -->

                    <div class="col-md-4">
                        <div class="form-group has-success m-t-10">
                            <input type="text" class="form-control" name="fecha_inicio" id="fecha_inicio" value="<?= date('Y-m-d') ?>">
                            <span class="bar"></span>
                            <label for="fecha_inicio">Fecha Inicio Nombramiento</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group has-success m-t-10">
                            <input type="text" class="form-control" name="fecha_fin" id="fecha_fin" value="<?= date('Y-m-d') ?>">
                            <span class="bar"></span>
                            <label for="fecha_fin">Fecha Fin Nombramiento</label>
                        </div>
                    </div>


                </div>

                <div class="row">
                    <div class="col-md-12 col-lg-4">
                        <!-- <div class="form-group">
                            <h5>Horas Acad&eacute;micas <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="text" class="form-control" required data-validation-required-message="This field is required"> </div>
                            <div class="form-control-feedback"><small>Add <code>required</code> attribute to
                                    field for required validation.</small></div>
                        </div> -->

                        <div class="form-group m-t-10">
                            <input type="text" class="form-control" name="carga_horaria" id="carga_horaria_coordinador">
                            <span class="bar"></span>
                            <label for="carga_horaria_coordinador">Horas Acad&eacute;micas </label>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-8">
                        <!-- <div class="form-group">
                            <h5>Descripci&oacute;n <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="text" class="form-control" required data-validation-required-message="This field is required"> </div>
                            <div class="form-control-feedback"><small>Add <code>required</code> attribute to
                                    field for required validation.</small></div>
                        </div> -->

                        <div class="form-group m-t-10">
                            <input type="text" class="form-control" name="descripcion_docencia_interno" id="descripcion_coordinador_interno">
                            <span class="bar"></span>
                            <label for="descripcion_coordinador_interno">Descripci&oacute;n </label>
                        </div>
                    </div>
                </div>

                <div class="text-xs-right">
                    <button type="button" id="insertar_ejercicio_coordinacion_posgrado" class="btn btn-sm waves-effect waves-light btn-rounded btn-info">Guardar</button>
                    <button type="reset" class="btn btn-sm waves-effect waves-light btn-rounded btn-warning" data-dismiss="modal">Cancelar</button>
                </div>

                </form>
                <!-- <?= form_close() ?> -->
            </div>
        </div>
    </div>
</div>