<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css" />
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles m-b-0">
    <div class="col-md-5 align-self-center">

        <h3 class="text-themecolor">Mis Programas</h3>
    </div>
    <!-- <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
            <li class="breadcrumb-item active">Mis Programas</li>
        </ol>
    </div> -->

</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->


    <!-- Row -->

    <div class="row el-element-overlay" id="datos_programa">

        <!-- <pre>
        <?= var_dump($listar_programas_inscritos); ?>
        </pre> -->

        <?php foreach ($listar_programas_inscritos as $listar_programa) : ?>



            <!-- <pre>
            <?= var_dump($listar_programa); ?>
            </pre> -->

            <?php if ($listar_programa->estado_inscripcion != 'DESCARTADO') : ?>

                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <!-- <input type="text" name="id_planificacion_programa" id="id_planificacion_programa" value="<?= $listar_programa->id_planificacion_programa ?>">
                        <input type="text" name="id_persona" id="id_persona" value="<?= $listar_programa->id_persona ?>"> -->
                        <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1">
                                <img src="<?= base_url($listar_programa->ruta_archivo) ?>" alt="user">
                            </div>
                            <div class="card-body little-profile text-center">
                                <div class="pro-img <?= ($listar_programa->estado_inscripcion == 'OBSERVADO') ? 'animated infinite pulse' : '' ?>" style="margin-bottom: 15px;">
                                    <!-- shield.svg -->
                                    <img src="../img/iconos_avatar/<?php if ($listar_programa->estado_inscripcion == 'REGISTRADO') {
                                                                        echo "impatient.svg";
                                                                    } elseif ($listar_programa->estado_inscripcion == 'OBSERVADO') {
                                                                        echo "caution.svg";
                                                                    } elseif ($listar_programa->estado_inscripcion == 'CONFIRMADO') {
                                                                        echo "shield.svg";
                                                                    } elseif ($listar_programa->estado_inscripcion == 'INSCRITO') {
                                                                        echo "shield.svg";
                                                                    } elseif ($listar_programa->estado_inscripcion == 'MATRICULADO') {
                                                                        echo "shield.svg";
                                                                    } ?>" alt="user" style="position:relative; width: 80px; height: 80px;-webkit-box-shadow: 0 0 0px rgba(0, 0, 0, 0);border-radius: 0%;" />
                                </div>

                                <h3 class="m-b-0">Estado de la Inscripci&oacute;n</h3>
                                <!-- Confirmado -->
                                <p style="margin-bottom: 15px;">
                                    <?php if ($listar_programa->estado_inscripcion == 'REGISTRADO') {
                                        echo "Registrado";
                                    } elseif ($listar_programa->estado_inscripcion == 'OBSERVADO') {
                                        echo "Observado";
                                    } elseif ($listar_programa->estado_inscripcion == 'CONFIRMADO') {
                                        echo "Confirmado";
                                    } elseif ($listar_programa->estado_inscripcion == 'INSCRITO') {
                                        echo "Inscrito";
                                    } elseif ($listar_programa->estado_inscripcion == 'MATRICULADO') {
                                        echo "Matriculado";
                                    } ?>
                                </p>

                                <?php if ($listar_programa->estado_inscripcion == 'REGISTRADO') { ?>
                                    <button id="btn_modificar_inscripcion" data-codigo-programa="<?= $listar_programa->id_publicacion ?>" class="waves-effect waves-dark btn btn-info btn-md btn-rounded">Modificar Inscripci&oacute;n</button>
                                <?php } elseif ($listar_programa->estado_inscripcion == 'OBSERVADO') { ?>
                                    <!-- <a href="javascript:void(0)" class="m-t-0 waves-effect waves-dark btn btn-info btn-md btn-rounded">Ver Observaciones</a> -->

                                    <button id="btn_observacion_inscripcion" data-id-planificacion-programa="<?= $listar_programa->id_planificacion_programa ?>" data-id-persona="<?= $usuario['id_persona'] ?>" data-codigo-programa="<?= $listar_programa->id_publicacion ?>" class="m-t-0 waves-effect waves-dark btn btn-info btn-md btn-rounded">Ver Observaciones</button>
                                <?php } elseif ($listar_programa->estado_inscripcion == 'CONFIRMADO') { ?>
                                    <a href="javascript:void(0)" class="m-t-0 waves-effect waves-dark btn btn-info btn-md btn-rounded">Ver Detalles</a>
                                <?php } elseif ($listar_programa->estado_inscripcion == 'INSCRITO') { ?>
                                    <a href="javascript:void(0)" class="m-t-0 waves-effect waves-dark btn btn-info btn-md btn-rounded">Ver Inscrito</a>
                                <?php } elseif ($listar_programa->estado_inscripcion == 'MATRICULADO') { ?>
                                    <a href="javascript:void(0)" class="m-t-0 waves-effect waves-dark btn btn-info btn-md btn-rounded">Matriculado</a>
                                <?php } ?>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary btn-circle btn-lg" style="border-radius: 50px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti-printer"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item click" id="formulario_inscripcion_<?= $listar_programa->id_planificacion_programa ?>" data-p="<?= $listar_programa->id_persona ?>" data-pp="<?= $listar_programa->id_planificacion_programa ?>" data-tipo="formulario_inscripcion" href="" download="mi formulario preinscripcion de <?= mb_convert_case($listar_programa->descripcion_grado_academico . ' en ' . $listar_programa->nombre_programa, MB_CASE_LOWER, "UTF-8") ?>">Formulario pre-Inscripcion</a>
                                        <a class="dropdown-item  click" id="carta_compromiso_<?= $listar_programa->id_planificacion_programa ?>" data-p="<?= $listar_programa->id_persona ?>" data-pp="<?= $listar_programa->id_planificacion_programa ?>" data-tipo="carta_compromiso" href="" download="mi carta de compromiso de <?= mb_convert_case($listar_programa->descripcion_grado_academico . ' en ' . $listar_programa->nombre_programa, MB_CASE_LOWER, "UTF-8") ?>">Carta de compromiso</a>
                                        <a class="dropdown-item  click" id="solicitud_inscripcion_<?= $listar_programa->id_planificacion_programa ?>" data-p="<?= $listar_programa->id_persona ?>" data-pp="<?= $listar_programa->id_planificacion_programa ?>" data-tipo="solicitud_inscripcion" href="" download="mi solicitud de inscripicion de <?= mb_convert_case($listar_programa->descripcion_grado_academico . ' en ' . $listar_programa->nombre_programa, MB_CASE_LOWER, "UTF-8") ?>">Solicitud de Inscripci&oacute;n</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        <?php endforeach ?>

    </div>

    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

</div>

<div class="modal" id="modal_listar_programas_participantes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="overflow-y: scroll;">
    <div id="modal_listar_programas_participantes-dialog" class="modal-dialog" role="document">
        <div class="modal-content">
            <div id="modal_listar_programas_participantes-header" class="modal-header bg-color-psg">
                <h5 id="modal_listar_programas_participantes-title" class="modal-title text-white"></h5>
                <button id="modal_listar_programas_participantes-close" type="button" class="close btn-warning" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modal_listar_programas_participantes-body" class="modal-body">
                <h1>aea</h1>
            </div>
            <!--<div id="modal-footer" class="modal-footer">
                <div class="form-actions float-right">
                    <button type="button" class="btn btn-inverse btn-sm" data-dismiss="grado-academico">Cancelar</button>
                    <button type="submit" class="btn btn-warning btn-sm"> <i class="fa fa-check"></i> Guardar</button>
                </div>-->
        </div>
    </div>
</div>


<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->

<script>
    $(document).ready(function() {

        $(".click").each(function() {
            var id_persona = $(this).attr('data-p');
            var id_planificacion_programa = $(this).attr('data-pp');
            var tipo = $(this).attr('data-tipo');
            switch (tipo) {
                case 'formulario_inscripcion':
                    // alert(id_planificacion_programa);
                    $.post('matriculacion/matriculacion_imprimir', {
                        id_persona,
                        id_planificacion_programa,
                        tipo
                    }).done(function(r) {

                        if (typeof r.exito !== 'undefined') {
                            $('#formulario_inscripcion_' + id_planificacion_programa).attr('href', r.exito);
                        } else swal('ERROR', r.error, 'error');
                    });
                    break;
                case 'carta_compromiso':
                    $.post('matriculacion/matriculacion_imprimir', {
                        id_persona,
                        id_planificacion_programa,
                        tipo
                    }).done(function(r) {

                        if (typeof r.exito !== 'undefined') {
                            $('#carta_compromiso_' + id_planificacion_programa).attr('href', r.exito);
                        } else swal('ERROR', r.error, 'error');
                    });
                    break;
                case 'solicitud_inscripcion':
                    $.post('matriculacion/matriculacion_imprimir', {
                        id_persona,
                        id_planificacion_programa,
                        tipo
                    }).done(function(r) {

                        if (typeof r.exito !== 'undefined') {
                            $('#solicitud_inscripcion_' + id_planificacion_programa).attr('href', r.exito);
                        } else swal('ERROR', r.error, 'error');
                    });
                    break;

                case 'formulario_01':
                    $.post('matriculacion/matriculacion_imprimir', {
                        id_persona,
                        id_planificacion_programa,
                        tipo
                    }).done(function(r) {

                        if (typeof r.exito !== 'undefined') {
                            $('#formulario_01_' + id_planificacion_programa).attr('href', r.exito);
                        } else swal('ERROR', r.error, 'error');
                    });
                    break;
                default:
                    break;
            }
        });


    });
</script>