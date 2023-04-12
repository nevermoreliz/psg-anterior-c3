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
    // $('#id_unidad_academica').select2();
    // $.fn.modal.Constructor.prototype.enforceFocus = function () {};
    $("#id_unidad_academica").select2({

        width: '100%',
        allowClear: true,
        multiple: false,
        dropdownParent: $("#id_unidad_academica").parent(),
        escapeMarkup: function (m) {
            return m;
        },
    });

    jQuery('#date-range').datepicker({
        toggleActive: true
    });

    $('#insertar_docente_externo_pre_grado').on('click', function (event) {
        event.preventDefault();

        $.ajax({
                type: 'POST',
                url: '/psg_docente/insertar_campos_docente_externo_pre_grado',
                data: new FormData($('#form_docente_externo_pre_grado')[0]),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
            })
            .done(function (data) {
                if (typeof data.exito !== 'undefined') {
                    console.log('entro aqui');
                    $('#modal_docente_externo_pre_grado').modal('hide');
                    $('#tabla_listar_ejercicio_pre_grado_docente_externo').DataTable().draw();
                } else {
                    alertaSimple('ERROR', data.error, 'top-right', 'error', 3000);
                }
            })
            .fail(function (jqXHR, textStatus) {
                alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
                console.log(jqXHR.responseText);
            });
    });

});