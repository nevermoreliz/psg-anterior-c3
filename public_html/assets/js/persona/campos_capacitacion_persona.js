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
    $('#insertar_capacitacion_persona').on('click', function (e) {
        // alert('insertar');
        e.preventDefault();
        $.ajax({
                method: 'POST',
                url: '/persona/insertar_capacitacion_persona',
                data: new FormData($('#form_capacitacion_persona')[0]),
                // data: $('#form_capacitacion_persona').serialize(),
                // dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                async: false,
            })
            .done(function (respuesta) {
                if (typeof respuesta.exito !== 'undefined') {
                    $('#modal_campos_capacitacion_persona').modal('hide');
                    $('#tabla_listar_capacitaciones').DataTable().draw();
                } else {
                    alertaSimple('Campos Obligatorios', respuesta.error, 'top-right', 'warning', 6000);
                }
            })
            .fail(function (jqXHR, textStatus) {
                alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
                console.log(jqXHR.responseText);
            });
    });
    $('#actualizar_capacitacion_persona').on('click', function (e) {

        // alert('actualizar');
        e.preventDefault();
        $.ajax({
                method: 'post',
                url: '/persona/actualizar_capacitacion_persona',
                data: new FormData($('#form_capacitacion_persona')[0]),
                // data: $('#form_capacitacion_persona').serialize(),
                // dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                async: false,

            })
            .done(function (respuesta) {
                if (typeof respuesta.exito !== 'undefined') {
                    $('#modal_campos_capacitacion_persona').modal('hide');
                    $('#tabla_listar_capacitaciones').DataTable().draw();
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

    /** inicializando datapiker */
    $('#fecha_capacitacion').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false,
    });
});