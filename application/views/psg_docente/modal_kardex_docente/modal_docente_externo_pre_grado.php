<!-- Date picker plugins css -->
<link href="<?= base_url('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') ?>" rel="stylesheet" type="text/css" />
<!-- Daterange picker plugins css -->
<link href="<?= base_url('assets/plugins/timepicker/bootstrap-timepicker.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('assets/plugins/bootstrap-daterangepicker/daterangepicker.css') ?>" rel="stylesheet">

<!-- Date Picker Plugin JavaScript -->
<script src="<?= base_url('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') ?>"></script>
<!-- Date range Plugin JavaScript -->
<script src="<?= base_url('assets/plugins/timepicker/bootstrap-timepicker.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- <h4 class="card-title">Form Validation</h4>
                <h6 class="card-subtitle">Bootstrap Form Validation check the <a href="http://reactiveraven.github.io/jqBootstrapValidation/">official website
                    </a></h6> -->
                <!-- <form class="m-t-0" novalidate> -->
                <?= form_open('', array('id' => 'form_docente_externo_pre_grado', 'novalidate' => 'true')); ?>

                <!-- campos ocultos -->
                <input type="hidden" name="id_persona" id="id_persona" value="<?= $id_persona ?>">

                <div class="form-group">
                    <h5>Universidad <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="id_unidad_academica" id="id_unidad_academica" required="" class="form-control " aria-invalid="false">
                            <option value="">Seleccione Universidad</option>
                            <?php foreach ($listar_unidad_academica as $unidad_academica) : ?>
                                <option value="<?= $unidad_academica['id_unidad_academica'] ?>">
                                    <?= $unidad_academica['nombre_unidad_academica'] ?> [<?= $unidad_academica['abreviatura'] ?>] - <?= $unidad_academica['sede_unidad_academica'] ?> (<?= $unidad_academica['tipo_unidad_academica'] ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="help-block"></div>
                    </div>
                    <div class="form-control-feedback"><small>Add <code>required</code> attribute to
                            field for required validation.</small></div>
                </div>
                <div class="form-group">
                    <h5>&Aacute;rea/Facultad/Carrera <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="descripcion_docencia_externo" id="descripcion_docencia_externo" class="form-control" required data-validation-required-message="This field is required"> </div>
                    <div class="form-control-feedback"><small>Add <code>required</code> attribute to
                            field for required validation.</small></div>
                </div>
                <div class="form-group">
                    <h5>&Aacute;rea Docencia / Asignatura <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="area_docencia_docente_externo" id="area_docencia_docente_externo" class="form-control" required data-validation-required-message="This field is required"> </div>
                    <div class="form-control-feedback"><small>Add <code>required</code> attribute to
                            field for required validation.</small></div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <h5>Carga Horaria <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="carga_horaria" id="carga_horaria" class="form-control" required data-validation-required-message="This field is required"> </div>
                            <div class="form-control-feedback"><small>Add <code>required</code> attribute to
                                    field for required validation.</small></div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <h5 class="box-title m-t-0">Duraci&oacute;n del Nombramiento</h5>
                            <div class="input-daterange input-group" id="date-range">
                                <input type="text" class="form-control" name="fecha_inicio_docencia" id="fecha_inicio_docencia">
                                <span class="input-group-addon bg-info b-0 text-white">a</span>
                                <input type="text" class="form-control" name="fecha_fin_docencia" id="fecha_fin_docencia">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="text-xs-right">
                            <!-- <button type="submit" class="btn  waves-effect waves-light btn-rounded btn-info">Guardar</button> -->
                            <button type="button" id="insertar_docente_externo_pre_grado" class="btn  waves-effect waves-light btn-rounded btn-info">Guardar</button>
                            <button type="reset" class="btn  waves-effect waves-light btn-rounded btn-warning" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>


                </form>
            </div>
        </div>
    </div>
</div>