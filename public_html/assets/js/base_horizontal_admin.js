$(document).ready(function () {

    $('#vista_datos_personales').click(function (e) {
        // alert('apretastes');
        $.ajax({
            url: '/persona/vista_perfil',
            dataType: 'html',
        }).done(function (respuesta) {
            $('.psg-contenedor').hide(0).html(respuesta).fadeIn('slow');
            /**  poner contenido del controlador a campos_datos_personales */
            $.ajax({
                method: 'POST',
                url: '/persona/vista_perfil_campos_datos_personales',
                data: {
                    // ci: event.target.getAttribute('data-value')
                },
                dataType: 'html',
            }).done(function (response) {

                $('#contenido_perfil_usuario').html(response);
            });
        });
        /**  poner visa de ejercicio Docencia o coordinacion en posgrado  */
    });

    $('#vista_formacion_academica').click(function (e) {
        // alert('apretastes');
        $.ajax({
            url: '/persona/vista_perfil',
            dataType: 'html',
        }).done(function (respuesta) {
            $('.psg-contenedor').hide(0).html(respuesta).fadeIn('slow');
            /**  poner contenido del controlador a campos_datos_personales */
            $.ajax({
                method: 'POST',
                url: '/persona/listar_grados_academicos_persona',
                // url: '/persona/vista_perfil_campos_formacion_academica',
                data: {
                    // ci: event.target.getAttribute('data-value')
                },
                dataType: 'html',
            }).done(function (response) {

                $('#contenido_perfil_usuario').html(response);
            });
        });
        /**  poner visa de ejercicio Docencia o coordinacion en posgrado  */
    });

    $('#vista_ejercicio_docente').click(function (e) {
        // alert('apretastes');
        $.ajax({
            url: '/persona/vista_perfil',
            dataType: 'html',
        }).done(function (respuesta) {
            $('.psg-contenedor').hide(0).html(respuesta).fadeIn('slow');
            /**  poner contenido del controlador a campos_datos_personales */
            $.ajax({
                method: 'POST',
                url: '/psg_docente/campos_kardex_docente',
                // url: '/persona/vista_perfil_campos_formacion_academica',
                data: {
                    // ci: event.target.getAttribute('data-value')
                },
                dataType: 'html',
            }).done(function (response) {

                $('#contenido_perfil_usuario').html(response);
            });
        });
        /**  poner visa de ejercicio Docencia o coordinacion en posgrado  */
    });

    $('#vista_datos_bancarios').click(function (e) {
        // alert('apretastes');
        $.ajax({
            url: '/persona/vista_perfil',
            dataType: 'html',
        }).done(function (respuesta) {
            $('.psg-contenedor').hide(0).html(respuesta).fadeIn('slow');
            /**  poner contenido del controlador a campos_datos_bancarios */
            $.ajax({
                method: 'POST',
                url: '/persona/vista_perfil_campos_datos_bancarios',
                data: {
                    // ci: event.target.getAttribute('data-value')
                },
                dataType: 'html',
            }).done(function (response) {
                $('#contenido_perfil_usuario').html(response);
            });
        });
    });

    $('#vista_afp').click(function (e) {
        // alert('apretastes');
        $.ajax({
            url: '/persona/vista_perfil',
            dataType: 'html',
        }).done(function (respuesta) {
            $('.psg-contenedor').hide(0).html(respuesta).fadeIn('slow');
            /**  poner contenido del controlador a campos_datos_afp */
            $.ajax({
                method: 'POST',
                url: '/persona/vista_perfil_campos_datos_afp',
                data: {
                    // ci: event.target.getAttribute('data-value')
                },
                dataType: 'html',
            }).done(function (response) {

                $('#contenido_perfil_usuario').html(response);
            });
        });
    });

    $('#vista_seguro_medico').click(function (e) {
        // alert('apretastes');
        $.ajax({
            url: '/persona/vista_perfil',
            dataType: 'html',
        }).done(function (respuesta) {
            $('.psg-contenedor').hide(0).html(respuesta).fadeIn('slow');
            /**  poner contenido del controlador a campos_datos_afp */
            $.ajax({
                method: 'POST',
                url: '/persona/vista_perfil_campos_datos_seguro_medico',
                data: {
                    // ci: event.target.getAttribute('data-value')
                },
                dataType: 'html',
            }).done(function (response) {

                $('#contenido_perfil_usuario').html(response);
            });
        });
    });
});