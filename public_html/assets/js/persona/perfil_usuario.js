$('.floating-labels .form-control')
    .on('focus blur', function (i) {
        $(this)
            .parents('.form-group')
            .toggleClass('focused', 'focus' === i.type || this.value.length > 0);
    })
    .trigger('blur'),
    $(function () {
        for (
            var i = window.location,
                e = $('ul#sidebarnav a')
                .filter(function () {
                    return this.href == i;
                })
                .addClass('active')
                .parent()
                .addClass('active');;

        ) {
            if (!e.is('li')) break;
            e = e.parent().addClass('in').parent().addClass('active');
        }
    });

$(document).ready(function () {

    // /**  poner contenido del controlador a campos_datos_personales */
    // $.ajax({
    //     method: 'POST',
    //     url: '/persona/vista_perfil_campos_datos_personales',
    //     data: {
    //         // ci: event.target.getAttribute('data-value')
    //     },
    //     dataType: 'html',
    // }).done(function (response) {

    //     $('#campos_datos_personales').html(response);
    // });

    // /**  poner visa de ejercicio Docencia o coordinacion en posgrado  */
    // $.ajax({
    //     method: 'POST',
    //     url: '/psg_docente/campos_kardex_docente',
    //     // url: '/persona/vista_perfil_campos_formacion_academica',
    //     data: {
    //         // ci: event.target.getAttribute('data-value')
    //     },
    //     dataType: 'html',
    // }).done(function (response) {

    //     $('#campos_formacion_academica').html(response);
    // });

    // /**  poner visa de formacion academica */
    // $.ajax({
    //     method: 'POST',
    //     url: '/persona/listar_grados_academicos_persona',
    //     // url: '/persona/vista_perfil_campos_formacion_academica',
    //     data: {
    //         // ci: event.target.getAttribute('data-value')
    //     },
    //     dataType: 'html',
    // }).done(function (response) {

    //     $('#campos_formacion_academica_grados_academicos').html(response);
    // });

    // /**  poner contenido del controlador a campos_datos_bancarios */
    // $.ajax({
    //     method: 'POST',
    //     url: '/persona/vista_perfil_campos_datos_bancarios',
    //     data: {
    //         // ci: event.target.getAttribute('data-value')
    //     },
    //     dataType: 'html',
    // }).done(function (response) {

    //     $('#campos_datos_bancarios').html(response);
    // });

    // /**  poner contenido del controlador a campos_datos_afp */
    // $.ajax({
    //     method: 'POST',
    //     url: '/persona/vista_perfil_campos_datos_afp',
    //     data: {
    //         // ci: event.target.getAttribute('data-value')
    //     },
    //     dataType: 'html',
    // }).done(function (response) {

    //     $('#campos_datos_afp').html(response);
    // });

    // /**  poner contenido del controlador a campos_datos_afp */
    // $.ajax({
    //     method: 'POST',
    //     url: '/persona/vista_perfil_campos_datos_seguro_medico',
    //     data: {
    //         // ci: event.target.getAttribute('data-value')
    //     },
    //     dataType: 'html',
    // }).done(function (response) {

    //     $('#campos_datos_seguro_medico').html(response);
    // });

});