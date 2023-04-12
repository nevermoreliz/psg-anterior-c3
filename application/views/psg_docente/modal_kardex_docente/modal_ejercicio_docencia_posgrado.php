<!-- Date picker plugins css -->
<!-- <link href="<?= base_url('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') ?>" rel="stylesheet" type="text/css" /> -->
<!-- Daterange picker plugins css -->
<!-- <link href="<?= base_url('assets/plugins/timepicker/bootstrap-timepicker.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('assets/plugins/bootstrap-daterangepicker/daterangepicker.css') ?>" rel="stylesheet"> -->

<!-- Date Picker Plugin JavaScript -->
<!-- <script src="<?= base_url('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') ?>"></script> -->
<!-- Date range Plugin JavaScript -->
<!-- <script src="<?= base_url('assets/plugins/timepicker/bootstrap-timepicker.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') ?>"></script> -->


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title">Form Validation</h4>
                <h6 class="card-subtitle">Bootstrap Form Validation check the <a href="http://reactiveraven.github.io/jqBootstrapValidation/">official website
                    </a></h6> -->

                <!-- <form class="floating-labels m-t-0"> -->
                <?= form_open('', array('id' => 'form_ejercicio_docencia_posgrado', 'class' => 'floating-labels m-t-0')); ?>

                <!-- campos input ocultos -->

                <input type="hidden" name="tipo_docencia_interno" id="tipo_docencia_interno" value="DOCENTE">
                <input type="hidden" name="id_persona" id="id_persona" value="<?= $id_persona ?>">

                <!-- fin campos input ocultos -->
                <div class="row">
                    <div class="col-lg-4">
                        <!-- <div class="form-group">
                                <h5>Buscar por Gesti&oacute;n <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="text" class="form-control small" required data-validation-required-message="This field is required"> </div>
                                <div class="form-control-feedback"><small>Add <code>required</code> attribute to
                                        field for required validation.</small></div>
                            </div> -->
                        <div class="form-group m-t-10">
                            <select class="form-control p-40" style="padding: 0;" name="seleccionar_gestion" id="seleccionar_gestion">
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
                                    <input type="text" name="id_planificacion_programa" id="id_planificacion_programa" class="form-control" required data-validation-required-message="This field is required"> </div>
                                <div class="form-control-feedback"><small>Add <code>required</code> attribute to
                                        field for required validation.</small></div>
                            </div> -->
                        <div class="form-group m-t-10">
                            <select class="form-control p-40 select" style="padding: 0;" name="id_planificacion_programa" id="id_planificacion_programa">
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

                    <div class="col-md-12 col-lg-3">
                        <!-- <div class="form-group">
                                <h5>Tipo M&oacute;dulo <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="id_tipo_modulo" id="id_tipo_modulo" class="form-control" required data-validation-required-message="This field is required"> </div>
                                <div class="form-control-feedback"><small>Add <code>required</code> attribute to
                                        field for required validation.</small></div>
                            </div> -->
                        <div class="form-group m-t-10">
                            <select class="form-control p-40" style="padding: 0;" name="id_tipo_modulo" id="id_tipo_modulo">
                                <option>Selecione</option>
                                <?php foreach ($lista_tipo_modulo as $tipo_modulo) { ?>
                                    <option value="<?= $tipo_modulo['id_tipo_modulo'] ?>"><?= $tipo_modulo['descripcion_tipo_modulo'] ?></option>
                                <?php } ?>

                            </select><span class="bar"></span>
                            <label for="id_tipo_modulo">Tipo M&oacute;dulo </label>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-5">
                        <!-- <div class="form-group">
                                <h5>Nombre M&oacute;dulo <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="nombre_modulo" id="nombre_modulo" class="form-control" required data-validation-required-message="This field is required"> </div>
                                <div class="form-control-feedback"><small>Add <code>required</code> attribute to
                                        field for required validation.</small></div>
                            </div> -->
                        <div class="form-group m-t-10">
                            <input type="text" class="form-control" name="nombre_modulo" id="nombre_modulo" required>
                            <span class="bar"></span>
                            <label for="nombre_modulo">Nombre M&oacute;dulo</label>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-4">
                        <!-- <div class="form-group">
                                <h5>N&uacute;mero M&oacute;dulo <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="numero_modulo" id="numero_modulo" class="form-control" required data-validation-required-message="This field is required"> </div>
                                <div class="form-control-feedback"><small>Add <code>required</code> attribute to
                                        field for required validation.</small></div>
                            </div> -->
                        <div class="form-group m-t-10">
                            <select class="form-control p-40" style="padding: 0;" name="numero_modulo" id="numero_modulo">
                                <option>Seleccione</option>
                                <?php for ($i = 1; $i <= 30; $i++) { ?>
                                    <option value="<?= $i ?>">M&oacute;dulo <?= numero_romano($i) ?></option>
                                <?php } ?>
                            </select><span class="bar"></span>
                            <label for="numero_modulo">N&uacute;mero M&oacute;dulo</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <!-- <div class="form-group">
                                <h5>N&uacute;mero Nombramiento <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="nro_nombramiento" id="nro_nombramiento" class="form-control" required data-validation-required-message="This field is required"> </div>
                                <div class="form-control-feedback"><small>Add <code>required</code> attribute to
                                        field for required validation.</small></div>
                            </div> -->
                        <div class="form-group m-t-10">
                            <input type="text" class="form-control" name="nro_nombramiento" id="nro_nombramiento">
                            <span class="bar"></span>
                            <label for="nro_nombramiento">N&uacute;mero Nombramiento</label>
                        </div>
                    </div>
                    <!-- <div class="col-lg-8">

                            <h5 class="box-title m-t-0">Duraci&oacute;n del Nombramiento</h5>

                            <div class="input-daterange input-group" id="date-range">
                                <input type="text" class="form-control" name="fecha_inicio" id="fecha_inicio">
                                <span class="input-group-addon bg-info b-0 text-white">a</span>
                                <input type="text" class="form-control" name="fecha_fin" id="fecha_fin">
                            </div>

                        </div> -->
                    <div class="col-md-4">
                        <div class="form-group has-success m-t-10">
                            <input type="text" class="form-control" name="fecha_inicio" id="fecha_inicio_docente" value="<?= date('Y-m-d') ?>">
                            <span class="bar"></span>
                            <label for="fecha_inicio">Fecha Inicio Nombramiento</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group has-success m-t-10">
                            <input type="text" class="form-control" name="fecha_fin" id="fecha_fin_docente" value="<?= date('Y-m-d') ?>">
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
                                    <input type="text" name="carga_horaria" id="carga_horaria" class="form-control" required data-validation-required-message="This field is required"> </div>
                                <div class="form-control-feedback"><small>Add <code>required</code> attribute to
                                        field for required validation.</small></div>
                            </div> -->
                        <div class="form-group m-t-10">
                            <input type="text" class="form-control" name="carga_horaria" id="carga_horaria">
                            <span class="bar"></span>
                            <label for="carga_horaria">Horas Acad&eacute;micas </label>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-8">
                        <!-- <div class="form-group">
                                <h5>Descripci&oacute;n <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="descripcion_docencia_interno" id="descripcion_docencia_interno" class="form-control" required data-validation-required-message="This field is required"> </div>
                                <div class="form-control-feedback"><small>Add <code>required</code> attribute to
                                        field for required validation.</small></div>
                            </div> -->

                        <div class="form-group m-t-10">
                            <input type="text" class="form-control" name="descripcion_docencia_interno" id="descripcion_docencia_interno">
                            <span class="bar"></span>
                            <label for="descripcion_docencia_interno">Descripci&oacute;n </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <!-- <div class="form-group">
                                <h5>Modalidad de Ingreso <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="modalidad_ingreso" id="modalidad_ingreso" class="form-control" required data-validation-required-message="This field is required"> </div>
                                <div class="form-control-feedback"><small>Add <code>required</code> attribute to
                                        field for required validation.</small></div>
                            </div> -->

                        <div class="form-group m-t-10">
                            <select class="form-control p-40" style="padding: 0;" name="modalidad_ingreso" id="modalidad_ingreso">
                                <option value="INVITADO">INVITADO</option>
                                <option value="CONTRATADO">CONTRATADO</option>
                            </select><span class="bar"></span>
                            <label for="modalidad_ingreso">Modalidad de Ingreso</label>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <!-- <div class="form-group">
                                <h5>Paralelo <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="paralelo" id="paralelo" class="form-control" required data-validation-required-message="This field is required"> </div>
                                <div class="form-control-feedback"><small>Add <code>required</code> attribute to
                                        field for required validation.</small></div>
                            </div> -->

                        <div class="form-group m-t-10">
                            <select class="form-control p-40" style="padding: 0;" name="paralelo" id="paralelo">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                                <option value="F">F</option>
                                <option value="G">G</option>
                                <option value="H">H</option>
                                <option value="I">I</option>
                                <option value="J">J</option>
                            </select><span class="bar"></span>
                            <label for="paralelo">Paralelo</label>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <!-- <div class="form-group">
                                <h5>Turno <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="turno" id="turno" class="form-control" required data-validation-required-message="This field is required"> </div>
                                <div class="form-control-feedback"><small>Add <code>required</code> attribute to
                                        field for required validation.</small></div>
                            </div> -->

                        <div class="form-group m-t-10">
                            <select class="form-control p-40" style="padding: 0;" name="turno" id="turno">
                                <option value="SIN TURNO">SIN TURNO</option>
                                <option value="MAÑANA">MA&Ntilde;ANA</option>
                                <option value="TARDE">TARDE</option>
                                <option value="NOCHE">NOCHE</option>
                                <option value="MAÑANA - TARDE">MA&ntilde;ANA - TARDE</option>
                                <option value="TARDE - NOCHE">TARDE - NOCHE</option>
                            </select><span class="bar"></span>
                            <label for="turno">Turno</label>
                        </div>
                    </div>
                </div>




                <!-- <div class="form-group">
                        <h5>Lugar de clases <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="lugar_clases" id="lugar_clases" class="form-control" required data-validation-required-message="This field is required"> </div>
                        <div class="form-control-feedback"><small>Add <code>required</code> attribute to
                                field for required validation.</small></div>
                    </div> -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group m-t-10">
                            <input type="text" class="form-control" name="lugar_clases" id="lugar_clases" required>
                            <span class="bar"></span>
                            <label for="lugar_clases">Lugar de clases </label>
                        </div>

                    </div>
                </div>


                <div class="text-xs-right">
                    <button type="button" id="insertar_ejercicio_docencia_posgrado" class="btn btn-sm waves-effect waves-light btn-rounded btn-info">Guardar</button>
                    <button type="reset" class="btn btn-sm waves-effect waves-light btn-rounded btn-warning" data-dismiss="modal">Cancelar</button>
                </div>
                <!-- </form> -->
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>