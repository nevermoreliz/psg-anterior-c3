<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php if (!isset($notificaciones)) $notificaciones = ''; ?>
<?php if (!isset($auth)) $auth = ''; ?>
<?php if (!isset($menu)) $menu = ''; ?>
<?php if (!isset($menu_horizontal)) $menu_horizontal = ''; ?>
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
    <!--<link href="<?php echo base_url('horizontal/css/colors/default-dark.css'); ?>" id="theme" rel="stylesheet" /> -->
    <link href="<?php echo base_url('horizontal/css/colors/default.css'); ?>" id="theme" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/posgrado.css'); ?>" rel="stylesheet" />

    <link href="<?php echo base_url('assets/plugins/Magnific-Popup-master/dist/magnific-popup.css'); ?>" rel="stylesheet" />

    <link href="<?php echo base_url('assets/plugins/bootstrap-select/bootstrap-select.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/plugins/select2/dist/css/select2.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/plugins/datatables-responsive/css/responsive.dataTables.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/plugins/wizard/steps.css') ?>" rel="stylesheet" />

    <!-- campos css agregados por jhonatan -->


    <!-- Date picker plugins css -->
    <link href="<?= base_url('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- fin campos css agregados por jhonatan -->

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
                    <!-- <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                            //quite ? al inicar el php
                            <php echo $auth; ?> 
                        </li>
                    </ul> -->
                    <ul class="navbar-nav my-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url('img/imagenes_prueba/iniciosesion/user.svg'); ?>" alt="user" class="profile-pic"></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">


                                            <div class="u-img"><img style="width: 60px;" src="<?php echo base_url('img/imagenes_prueba/iniciosesion/user.svg'); ?>" alt="user">
                                            </div>
                                            <div class="u-text" style="padding-left: 0px;">
                                                <center>
                                                    <h4>Bienvenido</h4>
                                                    <!-- <p class="text-muted">varun@gmail.com</p> -->
                                                    <a href="<?= base_url('login') ?>" class="btn btn-rounded btn-info btn-sm">Iniciar Sesi&oacute;n</a>
                                                </center>

                                            </div>

                                        </div>
                                    </li>
                            
                                </ul>
                            </div>
                        </li>
                    </ul>
                    <!-- <a href="<?= base_url('login') ?>" class="btn btn-sm waves-effect waves-light btn-rounded btn-info"> Login</a> -->


                </div>
            </nav>
        </header>
        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <?php echo $menu_horizontal; ?>
            </div>
        </aside>
        <div class="page-wrapper" style="padding-top: 30px;">
            <div class="psg-contenedor"><?php echo $contenido; ?></div>
            
            <footer class="footer text-right"><small>Posgrado UPEA <?php echo "&copy;2019-" . date('Y'); ?> <label class="label label-warning text-dark" id="ahora" data-toggle="tooltip" data-placement="top" title="<?php echo fecha_literal(date('Y-m-d'), 1); ?>"><i class="fa fa-clock-o"></i> <?php echo date('H:i:s'); ?></label></small></footer>
        </div>
    </div>

    <script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('horizontal/js/jquery.slimscroll.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/posgrado.js'); ?>"></script>
    <script src="<?php echo base_url('horizontal/js/waves.js'); ?>"></script>
    <script src="<?php echo base_url('horizontal/js/sidebarmenu.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/sparkline/jquery.sparkline.min.js'); ?>"></script>
    <script src="<?php echo base_url('horizontal/js/custom.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/toast-master/js/jquery.toast.js'); ?>"></script>

    <script src="<?php echo base_url('assets/plugins/raphael/raphael-min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/morrisjs/morris.min.js'); ?>"></script>

    <script src="<?php echo base_url('assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup-init.js'); ?>"></script>

    <!-- campos js agregados por jhonatan -->

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo base_url('horizontal/js/validation.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/inputmask/dist/min/jquery.inputmask.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/marketing/validation.js'); ?>"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="<?= base_url('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') ?>"></script>
    <!-- fin campos agregados por jhonatan -->

    <script src="<?php echo base_url('assets/plugins/select2/dist/js/select2.full.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/bootstrap-select/bootstrap-select.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/moment/min/moment-with-locales.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/asistencia/bootbox.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.js'); ?>"></script>

    
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
                    position: `top-center`,
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

    <script>
        jQuery(document).ready(function() {

            // For select 2
            $(".select2").select2();
            $('.selectpicker').selectpicker();

        });
    </script>
    
</body>

</html>