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
                .addClass('active'); ;

        ) {
            if (!e.is('li')) break;
            e = e.parent().addClass('in').parent().addClass('active');
        }
    });

$(document).ready(function () {

    // $("#seleccionar_gestion").select2({
    //     width: '100%',
    //     allowClear: true,
    //     multiple: false,
    //     dropdownParent: $("#seleccionar_gestion").parent(),
    //     escapeMarkup: function (m) {
    //         return m;
    //     },
    // });

    $('#fecha_inicio').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });

    $('#fecha_fin').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });

    $('#insertar_promocion_red_social').on('click', function (e) {
        // alert('insertar');
        e.preventDefault();
        $.ajax({
            method: 'POST',
            url: '/admin_marketing/insertar_promocion_red_social',
            data: new FormData($('#form_promocion_red_social')[0]),
            // data: $('#form_capacitacion_persona').serialize(),
            // dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            async: false,
        })
            .done(function (respuesta) {
                if (typeof respuesta.exito !== 'undefined') {
                    $('#modal_campos_promocion_red_social').modal('hide');
                    $('#tabla_listar_promocion_red_social').DataTable().draw();
                    // redireccionar por ajax a otra vista
                    $.ajax({
                        url: '/admin_marketing/listar_promocion_red_social',
                        dataType: 'html',
                    }).done(function (respuesta) {
                        $('.psg-contenedor').hide(0).html(respuesta).fadeIn('slow');
                    });
                    // mostrar una alerta para notificar al usuario que fue correcto la accion
                    alertaSimple('EXITOSO', 'Se registro correctamente', 'top-right', 'success', 6000);

                } else {
                    // mostrar una alerta para los campos vacios con warning
                    alertaSimple('Campos Obligatorios', respuesta.error, 'top-right', 'warning', 6000);
                }
            })
            .fail(function (jqXHR, textStatus) {
                alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
                console.log(jqXHR.responseText);
            });
    });
    $('#actualizar_promocion_red_social').on('click', function (e) {
        // alert('actualizar');
        e.preventDefault();
        $.ajax({
            method: 'post',
            url: '/admin_marketing/actualizar_promocion_red_social',
            data: new FormData($('#form_promocion_red_social')[0]),
            // data: $('#form_capacitacion_persona').serialize(),
            // dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            async: false,

        })
            .done(function (respuesta) {
                if (typeof respuesta.exito !== 'undefined') {
                    $('#modal_campos_promocion_red_social').modal('hide');
                    $('#tabla_listar_promocion_red_social').DataTable().draw();
                    alertaSimple('EXITOSO', 'Registro Actualizado', 'top-right', 'success', 6000);
                } else {
                    alertaSimple('Campos Obligatorios', respuesta.error, 'top-right', 'warning', 6000);
                }
            })
            .fail(function (jqXHR, textStatus) {
                alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
                console.log(jqXHR.responseText);
            });
    });
});