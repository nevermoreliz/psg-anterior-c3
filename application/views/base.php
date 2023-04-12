<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php if (!isset($notificaciones)) $notificaciones = ''; ?>
<?php if (!isset($auth)) $auth = ''; ?>
<?php if (!isset($menu)) $menu = ''; ?>
<?php if (!isset($contenido)) $contenido = ''; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="text/html; charset=UTF-8" http-equiv="content-type">
    <title>POSGRADO CEFORPI UPEA</title>
    <meta name="title" content="Team PSG" />
    <meta name="description" content="Centro de Estudios y Formación de Posgrado e Investigación de la Universidad Pública de El Alto" />
    <meta name="keywords" content="POSGRADO,CEFORPI,UPEA" />
    <meta name="author" content="Team PSG" />
    <meta name="application-name" content="Sistema PSG" />
    <meta name="robots" content="index, follow">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <link href="<?php echo base_url('assets/css/poppins.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/plugins/toast-master/css/jquery.toast.css'); ?>" rel="stylesheet" />

    <link href="<?php echo base_url('assets/plugins/morrisjs/morris.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('main/css/style.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('main/css/colors/default-dark.css'); ?>" id="theme" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/posgrado.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/plugins/tablesaw-master/dist/tablesaw.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/plugins/Magnific-Popup-master/dist/magnific-popup.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/asistencia/daterangepicker.css'); ?>" rel="stylesheet">

    <?php if (is_file(FCPATH . 'assets/css/' . $this->router->class . '/' . $this->router->method . '.css')) : ?>
        <link href="<?php echo base_url('assets/css/' . $this->router->class . '/' . $this->router->method . '.css'); ?>" rel="stylesheet" />
    <?php endif; ?>
    <link type="image/ico" href="<?php echo base_url("assets/images/favicon.ico"); ?>" rel="shortcut icon" />
    <link type="image/png" href="<?php echo base_url("assets/images/favicon.png"); ?>" rel="icon" />
    <link type="image/png" href="<?php echo base_url("assets/images/favicon.png"); ?>" rel="apple-touch-icon" />
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div class="preload" style="display:none">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
        </svg>
    </div>

    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- <div class="navbar-header">
                    <a class="navbar-brand" href="http://www.upea.bo/" target="_blank" title="Visitar UPEA.bo">
                        <b>
                            <img src="<?php echo base_url('assets/images/upea.png'); ?>" style="height: 40px;" alt="UPEA" class="dark-logo" />
                            <img src="<?php echo base_url('assets/images/upea.png'); ?>" style="height: 40px;" alt="UPEA" class="light-logo" />
                        </b>
                    </a>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>">
                        <span>
                            <img src="<?php echo base_url('assets/images/posgrado.png'); ?>" style="width: 128px;" alt="POSGRADO" class="dark-logo" />
                            <img src="<?php echo base_url('assets/images/posgrado.png'); ?>" style="width: 128px;" alt="POSGRADO" class="light-logo" />
                        </span>
                    </a>
                </div> -->
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
                        <?php echo $notificaciones; ?>
                    </ul>
                    <ul class="navbar-nav my-lg-0 ">

                        <li class="nav-item dropdown" class="">
                            <?php echo $auth; ?>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar">
            <div class="scroll-sidebar">
                <div class="user-profile">
                    <div class="profile-img"> <img src="<?php echo base_url('assets/images/personas/persona.jpg'); ?>" alt="user" />
                        <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </div>
                    <div class="profile-text">
                        <h5>Ingenieria de sistemas</h5>
                        <a href="javascript:void(0)" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
                        <a href="javascript:void(0)" class="" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
                        <a href="<?php echo base_url('logout'); ?>" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
                        <div class="dropdown-menu animated flipInY">
                            <a href="javascript:void(0)" class="dropdown-item"><i class="fa fa-envelope"></i> Enviar
                                Mensajes</a>
                        </div>
                    </div>
                </div>
                <aside class="psg-main"><?php echo $menu; ?></aside>
            </div>
        </aside>
        <div class="page-wrapper">
            <div class="psg-contenedor"><?php echo $contenido; ?></div>
            <footer class="footer text-right"><small>Posgrado UPEA <?php echo "&copy;2019-" . date('Y'); ?> <label class="label label-warning text-dark" id="ahora" data-toggle="tooltip" data-placement="top" title="<?php echo fecha_literal(date('Y-m-d'), 1); ?>"><i class="fa fa-clock-o"></i>
                        <?php echo date('H:i:s'); ?></label></small>
            </footer>
        </div>
    </div>
    <script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('main/js/jquery.slimscroll.js'); ?>"></script>
    <script src="<?php echo base_url('main/js/waves.js'); ?>"></script>
    <script src="<?php echo base_url('main/js/sidebarmenu.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/sparkline/jquery.sparkline.min.js'); ?>"></script>
    <script src="<?php echo base_url('main/js/custom.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/toast-master/js/jquery.toast.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/raphael/raphael-min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/morrisjs/morris.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/posgrado.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/tablesaw-master/dist/tablesaw.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/asistencia/moment.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/asistencia/daterangepicker.js'); ?>"></script>


    <!-- This is data table -->
    <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>

    <script src="<?php echo base_url('assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup.min.js'); ?>"></script>




    <?php if (!empty($this->session->flashdata())) : ?>
        <script>
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
            });
        </script>
    <?php endif; ?>
    <?php if (is_file(FCPATH . 'assets/js/' . $this->router->class . '/' . $this->router->method . '.js')) : ?>
        <script src="<?php echo base_url('assets/js/' . $this->router->class . '/' . $this->router->method . '.js'); ?>">
        </script>
    <?php endif; ?>
</body>

</html>