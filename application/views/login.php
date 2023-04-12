<!DOCTYPE html>
<html lang="en">

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
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('main/css/style.css'); ?>" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo base_url('main/css/colors/blue.css'); ?>" id="theme" rel="stylesheet">
    <!-- Favicon icon -->
    <link type="image/ico" href="<?php echo base_url("assets/images/favicon.ico"); ?>" rel="shortcut icon" />
    <link type="image/png" href="<?php echo base_url("assets/images/favicon.png"); ?>" rel="icon" />
    <link type="image/png" href="<?php echo base_url("assets/images/favicon.png"); ?>" rel="apple-touch-icon" />
    <link href="<?php echo base_url('assets/plugins/toast-master/css/jquery.toast.css'); ?>" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper" class="login-register login-sidebar" style="background-image:url(../assets/images/background/login-register.jpg);">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" id="form_iniciar_sesion" action="<?php echo base_url('auth/autentificar'); ?>" method="POST">
                    <a href="<?= base_url() ?>" class="text-center db"><img class="img-responsive" src="<?php echo base_url('assets/images/posgrado1.png') ?>" alt="Home" /></a>
                    <div class="alert alert-info">
                        <h3 class="text-info"><i class="fa fa-exclamation-circle"></i> Para Iniciar Sesión</h3>
                        Ingrese su usuario y contraseña por favor
                    </div>
                    <div class="form-group m-t-40">
                        <div class="col-xs-12">
                            <input name="nombre_usuario" class="form-control text-uppercase" type="text" required="" placeholder="Usuario" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input name="clave_usuario" class="form-control" type="password" required="" placeholder="Contraseña">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input name="guardar" id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup"> Recordarme en este Equipo </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-rounded btn-block btn-info" id="autentificar" type="submit">Iniciar Sesión</button>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p> <a href="<?= base_url() ?>" class="text-primary m-l-5"><b>Volver a la p&aacute;gina principal</b></a></p>

                            <!-- <p>¿No tienes una cuenta? <a href="pages-register2.html" class="text-primary m-l-5"><b>Regístrate</b></a></p> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                            <div class="social"><a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a> <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a> </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('main/js/custom.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/toast-master/js/jquery.toast.js'); ?>"></script>
</body>

</html>