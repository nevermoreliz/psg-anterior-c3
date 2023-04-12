<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Notificaci&oacute;n</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Inicio</a></li>
            <li class="breadcrumb-item active">Notificaci&oacute;n</li>
            <!-- <li class="breadcrumb-item active">Session Idle Timeout</li> -->
        </ol>
    </div>
    <!-- <div>
        <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
    </div> -->
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">



    <input type="hidden" name="id_planificacion_programa" id="id_planificacion_programa" value="<?= $_GET['key'] ?>">
    <input type="hidden" name="id_persona" id="id_persona" value="<?= $_GET['token'] ?>">



    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Gracias por su Inscripci&oacute;n </h4>
                    <p>Concluy&oacute; su inscripci&oacute;n en l&iacute;nea satisfactoriamente, se realizar&aacute; la revisi&oacute;n correspondiente de sus datos enviados para la inscripci&oacute;n del programa. Este proceso durar&aacute; 48 horas si est&aacute; todo correcto, se le enviar&aacute; a su correo electr&oacute;nico y n&uacute;mero de WhatsApp su <strong><em><u>USUARIO Y CONTRASEÑA</u></em></strong>, si no, se le enviar&aacute; las observaciones correspondientes
                        <br>
                        <br>
                        <strong> NOTA:</strong>
                        <br>
                        1.- Si pasa m&aacute;s de 48 horas comuniquese con el administrador o al n&uacute;mero <strong><a href="https://api.whatsapp.com/send?phone=59176296846&text=Pasó las 48 horas y no me llego mi usuario y contraseña o alguna observación" title="haga click para enviar un mensaje de WhatsApp">76296846</a></strong>
                        <br>
                        2.- <strong> Para regularizar la inscripci&oacute;n debe entregar toda la documentaci&oacute;n f&iacute;sica a su coordinador del programa durante el periodo de dos semanas.</strong>
                        <br>
                        <br>
                        <strong> Descarga tus archivos:</strong>
                        <br>
                        1.- <a href="" id="carta_compromiso" download="Carta de Compromiso">CARTA DE COMPROMISO</a>
                        <br>
                        2.- <a href="" id="formulario_inscripcion" download="Formulario de inscripcion">FORMULARIO DE INSCRIPCI&Oacute;N</a>
                        <br>
                        3.- <a href="" id="solicitud_inscripcion" download="Solicitud de inscripcion">SOLICITUD DE INSCRIPCI&Oacute;N </a>
                        <br>
                        <!-- 4.- <a href="" id="formulario_01" download="formulario 01">FORMULARIO 01</a> -->
                        <!-- <br> -->
                        <br>

                        <a href="<?= base_url() ?>" class="btn btn-sm waves-effect waves-light  btn-outline-info"> Volver Inicio</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
<script>
    // console.log($('#id_persona').val())
    // console.log($('#id_planificacion_programa').val())
    $.post('/marketing/matriculacion_imprimir', {
        id_persona: $('#id_persona').val(),
        id_planificacion_programa: $('#id_planificacion_programa').val(),
        tipo: 'carta_compromiso'
    }).done(function(respuesta) {

        if (typeof respuesta.exito !== 'undefined') {
            $('#carta_compromiso').attr('href', respuesta.exito);
        } else swal('ERROR', respuesta.error, 'error');
        // nalertaSimple('ERROR', respuesta.error, 'top-right', 'warning', 2000);
    });

    $.post('/marketing/matriculacion_imprimir', {
        id_persona: $('#id_persona').val(),
        id_planificacion_programa: $('#id_planificacion_programa').val(),
        tipo: 'formulario_inscripcion'
    }).done(function(respuesta) {

        if (typeof respuesta.exito !== 'undefined') {

            $('#formulario_inscripcion').attr('href', respuesta.exito);
        } else swal('ERROR', respuesta.error, 'error');
        // nalertaSimple('ERROR', respuesta.error, 'top-right', 'warning', 2000);
    });

    $.post('/marketing/matriculacion_imprimir', {
        id_persona: $('#id_persona').val(),
        id_planificacion_programa: $('#id_planificacion_programa').val(),
        tipo: 'solicitud_inscripcion'
    }).done(function(respuesta) {
        if (typeof respuesta.exito !== 'undefined') {
            $('#solicitud_inscripcion').attr('href', respuesta.exito);
        } else swal('ERROR', respuesta.error, 'error');
        // nalertaSimple('ERROR', respuesta.error, 'top-right', 'warning', 2000);
    });

    $.post('/marketing/matriculacion_imprimir', {
        id_persona: $('#id_persona').val(),
        id_planificacion_programa: $('#id_planificacion_programa').val(),
        tipo: 'formulario_01'
    }).done(function(respuesta) {
        if (typeof respuesta.exito !== 'undefined') {
            $('#formulario_01').attr('href', respuesta.exito);
        } else swal('ERROR', respuesta.error, 'error');
        // nalertaSimple('ERROR', respuesta.error, 'top-right', 'warning', 2000);
    });
</script>