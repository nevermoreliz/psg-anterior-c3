<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php if (!isset($notificaciones)) $notificaciones = ''; ?>
<?php if (!isset($auth)) $auth = ''; ?>
<?php if (!isset($menu_horizontal_admin)) $menu_horizontal_admin = ''; ?>
<?php if (!isset($contenido)) $contenido = ''; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="text/html" http-equiv="Content-Type" />
    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="Centro de Estudios y Formación de Posgrado e Investigación de la Universidad Pública de El Alto" name="description" />
    <meta content="POSGRADO,CEFORPI,UPEA" name="keywords" />
    <meta content="Team PSG: Erik Marcelo Cuaquira Mendoza, Walter Emilio Paco Siles" name="author" />
    <link type="image/ico" href="<?php echo base_url("assets/images/favicon.ico"); ?>" rel="shortcut icon" />
    <link type="image/png" href="<?php echo base_url("assets/images/favicon.png"); ?>" rel="icon" />
    <link type="image/png" href="<?php echo base_url("assets/images/favicon.png"); ?>" rel="apple-touch-icon" />
    <title>Posgrado CEFORPI UPEA</title>
    <link href="<?php echo base_url('assets/css/poppins.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/plugins/toast-master/css/jquery.toast.css'); ?>" rel="stylesheet" />

    <link href="<?php echo base_url('assets/plugins/morrisjs/morris.css'); ?>" rel="stylesheet" />

    <link href="<?php echo base_url('horizontal/css/style.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('horizontal/css/colors/default.css'); ?>" id="theme" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/posgrado.css'); ?>" rel="stylesheet" />

    <link href="<?php echo base_url('assets/plugins/Magnific-Popup-master/dist/magnific-popup.css'); ?>" rel="stylesheet" />

    <link href="<?php echo base_url('assets/plugins/bootstrap-select/bootstrap-select.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/plugins/select2/dist/css/select2.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/plugins/dropzone-master/dist/dropzone.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/asistencia/daterangepicker.css'); ?>" rel="stylesheet">

    <link href="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/plugins/datatables-responsive/css/responsive.dataTables.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css'); ?>" rel="stylesheet">

    <link href="<?= base_url('assets/plugins/wizard/steps.css'); ?>" rel="stylesheet">
    <!-- campos agregados por jhonatan -->

    <!-- summernotes CSS -->
    <link href="<?= base_url('/assets/plugins/summernote/dist/summernote.css'); ?>" rel="stylesheet" />

    <!-- Date picker plugins css -->
    <link href="<?= base_url('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') ?>" rel="stylesheet" type="text/css" />

    <link href="<?= base_url() ?>/assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
    <!-- fin campos agregados por jhonatan -->

    <?php if (is_file(FCPATH . 'assets/css/' . $this->router->class . '/' . $this->router->method . '.css')) : ?>
        <link href="<?php echo base_url('assets/css/' . $this->router->class . '/' . $this->router->method . '.css'); ?>" rel="stylesheet" />
    <?php endif; ?>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="fix-header fix-sidebar card-no-border logo-center">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <div class="preload" style="display:none">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
        </svg>
    </div>
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand" href="https://www.upea.bo/" target="_blank">
                        <b>
                            <!-- <img src="<?php echo base_url('assets/images/upea.png'); ?>" style="height: 40px;" alt="UPEA" class="dark-logo" />
                            <img src="<?php echo base_url('assets/images/upea.png'); ?>" style="height: 40px;" alt="UPEA" class="light-logo" /> -->
                            <!-- <img src="<?php echo base_url('img/logos/l_upea2020.png'); ?>" style="height: 40px;" alt="UPEA" class="dark-logo" />
                            <img src="<?php echo base_url('img/logos/l_upea2020.png'); ?>" style="height: 40px;" alt="UPEA" class="light-logo" /> -->
                        </b>
                    </a>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>">
                        <span>
                            <img src="<?php echo base_url('assets/images/posgrado.png'); ?>" style="width: 128px;" alt="POSGRADO" class="dark-logo" />

                            <img src="<?php echo base_url('assets/images/posgrado.png'); ?>" style="width: 128px;" alt="POSGRADO" class="light-logo" />
                        </span>
                    </a>
                </div>
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <?php echo $notificaciones; ?>
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-users pulse animated infinite"></i>
                                <!-- <img class="pulse animated infinite" src="img/imagenes_prueba/hombre.svg" style="width: 30px;" alt=""> -->
                                <?= $this->session->userdata('nombre_grupo', TRUE) ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <?php foreach ($accesos as $key => $value) : ?>
                                    <a class="dropdown-item" href="<?= base_url('/Auth/acceso/?nombre_grupo=' . $value['nombre_grupo']) ?>"><i class="fa fa-user"></i> <?= $value['nombre_grupo'] ?></a>
                                <?php endforeach; ?>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <?php echo $auth; ?>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar psg-main">
            <div class="scroll-sidebar">
                <?php echo $menu_horizontal_admin; ?>
            </div>
        </aside>
        <div class="page-wrapper">

            <!-- notificacion si al usuario posgraduante o docente le falta completar -->
            <!-- <?= var_dump($usuario) ?> -->
            <div class="page-titles" style="padding-bottom: 0px;">
                <div class="container-fluid" style="padding-bottom: 0px;">
                    <?php if (isset($datos_del_participante)) : ?>
                        <div class="alert alert-danger ">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                            <div>
                                <h1>
                                    <div class="">
                                        <i class="ti-alert animated flash infinite"></i> <b>COMUNICADO </b><br>
                                    </div>
                                </h1>
                                Por favor Complete Toda su informaci&oacute;n para no tener problemas en sus tramites o documentos
                                <ol>
                                    <?php foreach ($datos_del_participante['datos_persona'] as $key => $datos_persona) : ?>

                                        <?php if (es(['POSGRADUANTE'])) : ?>
                                            <?php if ($key == 'datos_personales') : ?>
                                                <li><?= mb_convert_case(str_replace("_", " ", $key), MB_CASE_TITLE, "UTF-8") ?> -> Click <a href="javascript:void(0);" class="<?= $key ?>"><u><em>aqu&iacute;</em></u></a> para ir a completar la informaci&oacute;n</li>
                                            <?php endif ?>
                                        <?php elseif (es(['DOCENTE_POSGRADO'])) : ?>
                                            <li><?= mb_convert_case(str_replace("_", " ", $key), MB_CASE_TITLE, "UTF-8") ?> -> Click <a href="javascript:void(0);" class="<?= $key ?>"><u><em>aqu&iacute;</em></u></a> para ir a completar la informaci&oacute;n</li>
                                        <?php endif ?>

                                    <?php endforeach ?>

                                    <?php if (empty($datos_del_participante['datos_grado_academico_persona'])) : ?>
                                        <li>No tiene registrado un grado academico -> Click <a href="javascript:void(0);" class="grados_academicos"><u><em>aqu&iacute;</em></u></a> para ir y agregar un grado acad&eacute;mico</li>
                                    <?php endif ?>

                                    <?php if (empty($datos_del_participante['datos_capacitacion_persona'])) : ?>
                                        <li>No tiene registrado ninguna capacitaci&oacute;n -> Click <a href="javascript:void(0);" class="grados_academicos"><u><em>aqu&iacute;</em></u></a> para ir y agregar sus capacitaciones</li>
                                    <?php endif ?>

                                    <?php if (empty($datos_del_participante['datos_idioma_persona'])) : ?>
                                        <li>No tiene registrado ning&uacute;n idioma que habla -> Click <a href="javascript:void(0);" class="grados_academicos"><u><em>aqu&iacute;</em></u></a> para ir y agregar sus idiomas</li>
                                    <?php endif ?>


                                </ol>
                            </div>
                        <?php endif ?>
                        </div>
                </div>

                <?= $this->router->class ?>
                <br>
                <?= $this->router->method ?>
                <br>

                <!-- en class psg-contenedor agregar o quitar  style="overflow: scroll" -->
                <div class="psg-contenedor"><?php echo $contenido; ?></div>


                <footer class="footer text-right"><small>Posgrado UPEA <?php echo "&copy;2019-" . date('Y'); ?> <label class="label label-warning text-dark" id="ahora" data-toggle="tooltip" data-placement="top" title="<?php echo fecha_literal(date('Y-m-d'), 1); ?>"><i class="fa fa-clock-o"></i> <?php echo date('H:i:s'); ?></label></small></footer>
            </div>

        </div>
        <script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/plugins/bootstrap/js/popper.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('horizontal/js/jquery.slimscroll.js'); ?>"></script>
        <script src="<?php echo base_url('horizontal/js/waves.js'); ?>"></script>
        <script src="<?php echo base_url('horizontal/js/sidebarmenu.js'); ?>"></script>
        <script src="<?php echo base_url('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/plugins/sparkline/jquery.sparkline.min.js'); ?>"></script>
        <script src="<?php echo base_url('horizontal/js/custom.min.js'); ?>"></script>

        <script src="<?php echo base_url('assets/plugins/select2/dist/js/select2.full.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/plugins/toast-master/js/jquery.toast.js'); ?>"></script>

        <script src="<?php echo base_url('assets/plugins/raphael/raphael-min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/plugins/morrisjs/morris.min.js'); ?>"></script>



        <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.js'); ?>"></script>

        <script src="<?php echo base_url('assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/plugins/dropzone-master/dist/dropzone.js'); ?>"></script>

        <script src="<?php echo base_url('assets/plugins/jQuery-Autocomplete/jquery.autocomplete.min.js'); ?>"></script>

        <script src="<?php echo base_url('assets/js/asistencia/bootbox.js'); ?>"></script>
        <script src="<?php echo base_url('assets/plugins/moment/min/moment-with-locales.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js'); ?>"></script>


        <script src="<?php echo base_url('assets/plugins/Buttons-1.6.3/js/dataTables.buttons.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/plugins/jszip/dist/jszip.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/plugins/pdfmake/build/pdfmake.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/plugins/Buttons-1.6.3/js/buttons.html5.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/plugins/Buttons-1.6.3/js/buttons.print.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/plugins/pdfmake/build/vfs_fonts.js') ?>"></script>

        <!-- asistencia reporte -->
        <script src="<?php echo base_url("assets/js/asistencia/daterangepicker.js"); ?>"></script>
        <!-- fin asistencia -->

        <!-- campos agregados por jhonatan -->
        <script src="<?php echo base_url("assets/plugins/summernote/dist/summernote.min.js"); ?>"></script>
        <script src="<?php echo base_url('assets/plugins/sweetalert/sweetalert.min.js') ?>"></script>
        <!-- Date Picker Plugin JavaScript -->
        <script src="<?php echo base_url('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') ?>"></script>


        <script src="<?php echo base_url('horizontal/js/validation.js'); ?>"></script>

        <script src="<?php echo base_url('assets/plugins/inputmask/dist/min/jquery.inputmask.bundle.min.js'); ?>"></script>

        <script src="<?php echo base_url('assets/js/admin_posgraduante/listar_programas_participantes.js'); ?>"></script>

        <script src="<?php echo base_url('assets/js/base_horizontal_admin.js'); ?>"></script>
        <!-- <script src="<?php echo base_url('assets/js/marketing/validation.js'); ?>"></script> -->
        <!-- fin campos agregados por jhonatan -->

        <script src="<?php echo base_url('assets/js/posgrado.js'); ?>"></script>

        <?php if (is_file(FCPATH . 'assets/js/' . $this->router->class . '/' . $this->router->method . '.js')) : ?>
            <script src="<?php echo base_url('assets/js/' . $this->router->class . '/' . $this->router->method . '.js'); ?>"></script>
        <?php endif; ?>

        <script type="text/javascript">
            $(function() {
                "use strict";
                <?php foreach ($this->session->flashdata() as $kmsg => $msg) : ?>
                    $.toast({
                        icon: `<?php echo ((is_numeric($kmsg) || empty($kmsg)) ? 'error' : $kmsg); ?>`,
                        heading: `<?php echo ((is_numeric($kmsg) || empty($kmsg)) ? 'ERROR [' . $kmsg . ']' : 'INFORMACIÓN'); ?>`,
                        text: `<?php echo $msg ?>`,
                        position: `top-right`,
                        showHideTransition: `plain`,
                        allowToastClose: true,
                        loaderBg: `#FFF`,
                        hideAfter: 5000,
                        stack: 5
                    });
                <?php endforeach; ?>
                setInterval(function() {
                    var ahora = new Date();
                    $("label#ahora").html('<i class="fa fa-clock-o"></i> ' + (ahora.getHours() < 10 ? "0" : "") + ahora.getHours() + ":" + (ahora.getMinutes() < 10 ? "0" : "") + ahora.getMinutes() + ":" + (ahora.getSeconds() < 10 ? "0" : "") + ahora.getSeconds());
                }, 1000);
            });
            $(document).on('keydown', function(e) {
                if ((e.which || e.keyCode) === 116) e.preventDefault();
            });
        </script>


</body>

</html>