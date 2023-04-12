<input name="ci" value="<?= isset($persona) ? $persona[0]['ci'] : $ci_persona ?>" type="hidden" />
<input id="id_persona" value="<?= isset($persona) ? $persona[0]['id_persona'] : '' ?>" type="hidden" />

<!-- ARREGLO DE CAMPOS -->
<div class="">
    <div class="card card-outline-info">

        <div class="card-header">
            <h4 class="m-b-0 text-white">FORMACI&Oacute;N ACAD&Eacute;MICA</h4>
        </div>

        <div class="card-body">

            <div class="form-body">
                <!-- <h3 class="box-title m-t-10">DOCENTE EXTERNO</h3>
                <hr> -->

                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <!-- <div class="card"> -->
                        <div class="">
                            <!-- <div class="card-body"> -->
                            <div class="">
                                <!-- <a id="insertar_grado_academico_persona" href="" class=" btn-sm btn waves-effect waves-light btn-rounded btn-outline-info" data-id="<?= $persona[0]['id_persona'] ?>">
                                    AGREGAR GRADO ACAD&Eacute;MICO
                                </a> -->

                                <button id="insertar_grado_academico_persona" data-value="<?= $persona[0]['id_persona'] ?>" class="btn-sm btn waves-effect waves-light btn-rounded btn-outline-info"> <i class="fa fa-plus"></i> AGREGAR GRADO ACAD&Eacute;MICO</button>

                                <div class=" table-responsive m-t-10">
                                    <table id="tabla_listar_grados_academicos" class="display nowrap table table-hover table-striped table-bordered small" cellspacing="0" width="100%">
                                        <thead>
                                            <th>#</th>
                                            <th>Acciones</th>
                                            <th>Descripci&oacute;n Grado Acad&eacute;mico</th>
                                            <th>Institución</th>
                                            <th>Año de Expedición</th>
                                            <th>Estado</th>
                                            <th>Nº Registro</th>
                                            <th>Observacion</th>

                                        </thead>
                                        <!-- <tfoot>
                                            <th>#</th>
                                            <th>Acciones</th>
                                            <th>Descripci&oacute;n Grado Acad&eacute;mico</th>
                                            <th>Institución</th>
                                            <th>Año de Expedición</th>
                                            <th>Nº Registro</th>

                                        </tfoot> -->
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>

<!-- CAPACITACIONES DE LA PERSONA -->
<div class="">
    <div class="card card-outline-info">

        <div class="card-header">
            <h4 class="m-b-0 text-white">CAPACITACI&Oacute;N</h4>
        </div>

        <div class="card-body">

            <div class="form-body">
                <!-- <h3 class="box-title m-t-10">DOCENTE EXTERNO</h3>
                <hr> -->

                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <!-- <div class="card"> -->
                        <div class="">
                            <!-- <div class="card-body"> -->
                            <div class="">

                                <button id="agregar_capacitacion_persona" data-value="<?= $persona[0]['id_persona'] ?>" class="btn-sm btn waves-effect waves-light btn-rounded btn-outline-info"> <i class="fa fa-plus"></i> AGREGAR CAPACITACI&Oacute;N</button>

                                <div class=" table-responsive m-t-10">
                                    <table id="tabla_listar_capacitaciones" class="display nowrap table table-hover table-striped table-bordered small" cellspacing="0" width="100%">
                                        <thead>
                                            <th>#</th>
                                            <th>Acciones</th>
                                            <th>Nombre Capacitacion</th>
                                            <th>Institución</th>
                                            <th>Año de Expedición</th>
                                            <th>Estado</th>
                                            <th>Observaci&oacute;n</th>
                                        </thead>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>

<!-- IDIOMA DE LA PERSONA -->
<div class="">
    <div class="card card-outline-info">

        <div class="card-header">
            <h4 class="m-b-0 text-white">IDIOMAS</h4>
        </div>

        <div class="card-body">

            <div class="form-body">
                <!-- <h3 class="box-title m-t-10">DOCENTE EXTERNO</h3>
                <hr> -->

                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <!-- <div class="card"> -->
                        <div class="">
                            <!-- <div class="card-body"> -->
                            <div class="">

                                <button id="agregar_idioma_persona" data-value="<?= $persona[0]['id_persona'] ?>" class="btn-sm btn waves-effect waves-light btn-rounded btn-outline-info"> <i class="fa fa-plus"></i> AGREGAR IDIOMA</button>

                                <div class=" table-responsive m-t-10">
                                    <table id="tabla_listar_idioma_persona" class="display nowrap table table-hover table-striped table-bordered small" cellspacing="0" width="100%">
                                        <thead>
                                            <th>#</th>
                                            <th>Acciones</th>
                                            <th>Idioma</th>
                                            <th>Nivel</th>
                                            <th>Descripci&oacute;n</th>
                                            <th>Estado</th>
                                        </thead>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>

<!-- PRODUCCION INTELECTUAL DE LA PERSONA -->
<?php if (es(array('SUPERADMIN', 'ADMINISTRADOR', 'DOCENTE_POSGRADO', 'TECNICO_MATRICULADOR'))) : ?>
    <div class="">
        <div class="card card-outline-info">

            <div class="card-header">
                <h4 class="m-b-0 text-white">PRODUCCION INTELECTUAL</h4>
            </div>

            <div class="card-body">

                <div class="form-body">
                    <!-- <h3 class="box-title m-t-10">DOCENTE EXTERNO</h3>
                <hr> -->

                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <!-- <div class="card"> -->
                            <div class="">
                                <!-- <div class="card-body"> -->
                                <div class="">

                                    <button id="agregar_produccion_intelectual_persona" data-value="<?= $persona[0]['id_persona'] ?>" class="btn-sm btn waves-effect waves-light btn-rounded btn-outline-info"> <i class="fa fa-plus"></i> AGREGAR PRODUCCION INTELECTUAL</button>

                                    <div class=" table-responsive m-t-10">
                                        <table id="tabla_listar_produccion_intelectual_persona" class="display nowrap table table-hover table-striped table-bordered small" cellspacing="0" width="100%">
                                            <thead>
                                                <th>#</th>
                                                <th>Acciones</th>
                                                <th>Tipo Producci&oacute;n</th>
                                                <th>titulo</th>
                                                <th>Año</th>
                                                <th>Estado</th>
                                                <th>Observacion</th>
                                            </thead>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
<?php endif ?>