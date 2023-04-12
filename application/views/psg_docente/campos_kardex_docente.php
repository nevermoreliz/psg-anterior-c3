<!-- VARIABLES PRUEBAS -->

<!-- <?= $id_persona ?> -->
<!-- <?= var_dump($formularios_emitidos); ?> -->

<!-- INPUTS OCULTOS -->
<input type="hidden" id="id_persona" name="id_persona" value="<?= $id_persona ?>">
<!-- PANEL DE: 4. EJERCICIO DE LA DOCENCIA DE GRADDO -->
<div class="row m-t-0">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">IV. EJERCICIO DE LA DOCENCIA DE GRADO</h4>
            </div>
            <div class="card-body">

                <div class="form-body">
                    <h3 class="card-title">DOCENCIA PRE-GRADO</h3>
                    <hr>

                    <div class="row p-t-20">

                        <div class="col-lg-12">
                            <!-- <div class="card"> -->
                            <div class="">
                                <!-- <div class="card-body"> -->
                                <div class="">
                                    <!-- <pre>
                                        <?= var_dump($docencia_pregrado); ?>
                                    </pre> -->
                                    <div class="table-responsive table-hover">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Gesti&oacute;n</th>
                                                    <th>Sede</th>
                                                    <th>Descripci&oacute;n</th>
                                                    <th>Tiempo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $numero = 1; ?>
                                                <?php $total = 0; ?>
                                                <?php foreach ($docencia_pregrado as $docente_ejercicio_pregrado) : ?>
                                                    <tr>
                                                        <td><?= $numero++ ?></td>
                                                        <td><?= $docente_ejercicio_pregrado->gestion ?></td>
                                                        <td><?= $docente_ejercicio_pregrado->sede ?></td>
                                                        <td><?= $docente_ejercicio_pregrado->descripcion ?></td>
                                                        <td><span class="label label-danger"><?= intval($docente_ejercicio_pregrado->meses) ?></span> </td>
                                                    </tr>
                                                    <?php $total += intval($docente_ejercicio_pregrado->meses); ?>
                                                <?php endforeach ?>

                                                <tr>
                                                    <td colspan="4" style="text-align: right">TOTAL TIEMPO MESES (Experiencia en
                                                        Docencia Pre-Grado)
                                                    </td>
                                                    <td><?= $total; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                    </div>


                    <h3 class="box-title m-t-10">DOCENTE EXTERNO</h3>
                    <hr>

                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <!-- <div class="card"> -->
                            <div class="">
                                <!-- <div class="card-body"> -->
                                <div class="">
                                    <a id="abrir_form_docente_externo_pre_grado" href="" class=" btn-sm btn waves-effect waves-light btn-rounded btn-outline-info" data-id="<?= $id_persona ?>">
                                        AGREGAR EJERCICIO DE DOCENCIA GRADO-DOCENTE EXTERNO
                                    </a>

                                    <div class="table-responsive m-t-10">
                                        <table id="tabla_listar_ejercicio_pre_grado_docente_externo" class="display nowrap table table-hover table-striped table-bordered small" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>#</th>
                                                    <th>Acci&oacute;n</th>
                                                    <th>Universidad</th>
                                                    <th>&Aacute;rea/Facultad/Carrera</th>
                                                    <th>Carga Horaria</th>
                                                    <th>Fecha Inicio</th>
                                                    <th>Fecha Fin</th>
                                                    <th>Tiempo</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $a = 1;
                                                $total_mes = 0;
                                                ?>
                                                <?php foreach ($listar_ejecicio_docente_externo as $ejercicio_docente_externo) {
                                                    $fecha1 = new DateTime($ejercicio_docente_externo['fecha_inicio_docencia']);
                                                    $fecha2 = new DateTime($ejercicio_docente_externo['fecha_fin_docencia']);
                                                    $diff = $fecha1->diff($fecha2);
                                                    $mes_decimal = $diff->m . '.' . $diff->days;
                                                    // print_r($diff);
                                                    // echo $mes_decimal . ' - ' . ceil($mes_decimal) . '<br>';
                                                    $numero_mes = ($diff->y * 12) + ceil($mes_decimal);
                                                    $total_mes = $total_mes + $numero_mes
                                                ?>
                                                    <!-- <tr>
                                                    <th>#</th>
                                                    <th>1</th>
                                                    <th>ELIMINAR</th>
                                                    <th>UPEA</th>
                                                    <th>SISTEMAS</th>
                                                    <th>800</th>
                                                    <th>200-02-1996</th>
                                                    <th>1996-08-222</th>
                                                    <th>0 MESES 2 DIAS</th>
                                                    </tr> -->
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <!-- <th colspan="9">Total timepo MESES(Experiencia laboral)</th> -->
                                                    <th colspan="8">Total tiempo MESES(Experiencia laboral)</th>
                                                    <th colspan="1" id="aqui1"><?php echo (empty($total_mes) ? '0 meses' : $total_mes . ' meses') ?></th>


                                                </tr>
                                            </tfoot>

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
</div>

<!-- PANEL DE: 5 EJERCICIO DE LA DOCENCIA DE POSGRADO -->
<div class="row m-t-0">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">V. EJERCICIO DE LA DOCENCIA DE POSGRADO (Archivo Docente POSGRADO).</h4>
            </div>
            <div class="card-body">

                <div class="form-body">


                    <div class="row">

                        <div class="col-md-12 col-lg-12">
                            <!-- <div class="card"> -->
                            <div class="">
                                <!-- <div class="card-body"> -->
                                <div class="">

                                    <div class="row">
                                        <div class="col-md-12 col-lg-6 col-xl-6">
                                            <a id="abrir_form_ejercicio_docencia_posgrado" href="" class=" btn-sm btn waves-effect waves-light btn-rounded btn-outline-info" data-id="<?= $id_persona ?>">
                                                AGREGAR EJERCICIO DE DOCENCIA DE POSGRADO.
                                            </a>
                                        </div>
                                        <div class="col-md-12 col-lg-6 col-xl-6">
                                            <a id="abrir_form_ejercicio_coordinacion_posgrado" href="" class=" btn-sm btn waves-effect waves-light btn-rounded btn-outline-info" data-id="<?= $id_persona ?>">
                                                AGREGAR EJERCICIO DE COORDINACION DE POSGRADO.
                                            </a>
                                        </div>
                                    </div>

                                    <div class="table-responsive m-t-10">

                                        <table id="tabla_listar_ejercicio_docencia_posgrado" class="display nowrap table table-hover table-striped table-bordered small" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>

                                                    <th>#</th>
                                                    <th>#</th>
                                                    <th>Acci&oacute;n</th>
                                                    <th>Gesti&oacute;n</th>
                                                    <th>&Aacute;rea/Facultad/Carrera</th>
                                                    <th>Programa</th>
                                                    <th>M&oacute;dulo</th>
                                                    <th>Paralelo</th>
                                                    <th>Horas</th>
                                                    <th>Tiempo</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $y = 1;
                                                $total_mes_ejercicio_docente_posgrado = 0;
                                                foreach ($lista_ejercicio_docencia_posgrado as $ejercicio_docencia) {
                                                    $fecha1 = new DateTime($ejercicio_docencia['fecha_inicio']);
                                                    $fecha2 = new DateTime($ejercicio_docencia['fecha_fin']);
                                                    $diff = $fecha1->diff($fecha2);
                                                    $numero_mes_ejercicio_docente_posgrado = ($diff->y * 12) + $diff->m;
                                                    $total_mes_ejercicio_docente_posgrado = $total_mes_ejercicio_docente_posgrado + $numero_mes_ejercicio_docente_posgrado
                                                ?>
                                                    <!-- <tr>
                                                        <td><?= $y++ ?></td>
                                                        <td>botones</td>
                                                        <td><?= $ejercicio_docencia['gestion'] ?></td>
                                                        <td><?= $ejercicio_docencia['nombre_unidad'] ?></td>
                                                        <td><?= $ejercicio_docencia['nombre_programa'] ?></td>
                                                        <td><?= $ejercicio_docencia['nombre_modulo'] ?></td>
                                                        <td><?= $ejercicio_docencia['paralelo'] ?></td>
                                                        <td><?= $ejercicio_docencia['carga_horaria'] ?></td>
                                                        <td><?= $numero_mes_ejercicio_docente_posgrado ?> meses (<?= $diff->days ?> dias)</td>
                                                        <td>botones</td>
                                                    </tr> -->
                                                <?php } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="5">TOTAL TIEMPO MESES (Experiencia Docencia Posgrado)</td>
                                                    <td colspan="4"><?= empty($total_mes_ejercicio_docente_posgrado) ? '0 meses' : $total_mes_ejercicio_docente_posgrado . ' meses' ?></td>
                                                    <td colspan="1"></td>
                                                </tr>
                                            </tfoot>

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
</div>

<!-- SESSION DE FORMULARIOS EMITIDOS -->
<div class="row m-t-0">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-header">
                <h4 class="m-b-0 text-white">FORMULARIOS EMITIDOS</h4>
            </div>
            <div class="card-body">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <!-- <div class="card"> -->
                            <div class="">
                                <!-- <div class="card-body"> -->
                                <div class="">
                                    <?php if (es(array('SUPERADMIN', 'ADMINISTRADOR', 'KARDEX_POSGRADO'))) : ?>
                                        <div class="row">
                                            <div class="col-md-12 col-lg-6 col-xl-6">
                                                <a id="abrir_form_ejercicio_docencia_posgrado" href="" class=" btn-sm btn waves-effect waves-light btn-rounded btn-outline-info" data-id="<?= $id_persona ?>">
                                                    <i class="ti-receipt "></i> GENERAR FORMULARIO
                                                </a>
                                            </div>

                                        </div>
                                    <?php endif; ?>
                                    <div class="table-responsive m-t-10">
                                        <table id="tabla_listar_formularios_emitidos" class="display nowrap table table-hover table-striped table-bordered small" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>

                                                    <th>Correlativo</th>
                                                    <th>Tipo</th>
                                                    <th>Monto</th>
                                                    <th>Fecha</th>
                                                    <th>Estado</th>
                                                    <?php if (es(array('SUPERADMIN', 'ADMINISTRADOR', 'KARDEX_POSGRADO'))) : ?>
                                                        <th>Imprimir</th>
                                                    <?php endif; ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if ($formularios_emitidos != null) { ?>
                                                    <?php foreach ($formularios_emitidos as $formulario_emitido) { ?>
                                                        <tr>
                                                            <td><?= $formulario_emitido['correlativo_formulario'] ?></td>
                                                            <td><?= $formulario_emitido['tipo_formulario'] ?></td>
                                                            <td><?= $formulario_emitido['monto_formulario'] ?></td>
                                                            <td><?= fecha_literal($formulario_emitido['fecha_emision_formulario'], 2); ?></td>
                                                            <td><?= $formulario_emitido['estado_formulario'] ?></td>
                                                            <?php if (es(array('SUPERADMIN', 'ADMINISTRADOR', 'KARDEX_POSGRADO'))) : ?>
                                                                <td>
                                                                    <a target="_blank" class="btn btn-sm btn-info" href="">
                                                                        <i class="fa fa-print"></i> Imprimir Formulario
                                                                    </a>
                                                                </td>
                                                            <?php endif; ?>
                                                        </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                            <!-- <tfoot>
                                                <tr>

                                                    <th>Correlativo</th>
                                                    <th>Tipo</th>
                                                    <th>Monto</th>
                                                    <th>Fecha</th>
                                                    
                                                    
                                                    
                                                    <th>Estado</th>
                                                    <th>Imprimir</th>



                                                </tr>
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
</div>