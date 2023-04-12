$(document).ready(function () {



    $("#seleccionar_gestion_coordinacion").select2({

        width: '100%',
        allowClear: true,
        multiple: false,
        dropdownParent: $("#seleccionar_gestion_coordinacion").parent(),
        escapeMarkup: function (m) {
            return m;
        },
    });

    $("#id_planificacion_programa_coordinacion").select2({

        width: '100%',
        allowClear: true,
        multiple: false,
        dropdownParent: $("#id_planificacion_programa_coordinacion").parent(),
        escapeMarkup: function (m) {
            return m;
        },
    });

    $("#seleccionar_gestion_coordinacion").change(function (event) {
        event.preventDefault();
        let id_gestion = $("#seleccionar_gestion_coordinacion").val();
        console.log(id_gestion);
        ConsultarPrograma(id_gestion);
        $("#id_planificacion_programa_coordinacion").html('<option value="">Seleccione</option>');
        $("#id_planificacion_programa_coordinacion").trigger("chosen:updated");
    });



    $('#fecha_inicio').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });
    $('#fecha_fin').bootstrapMaterialDatePicker({
        weekStart: 0,
        time: false
    });

    jQuery('#date-range').datepicker({
        toggleActive: true
    });

    $('#insertar_ejercicio_coordinacion_posgrado').on('click', function (event) {
        event.preventDefault();

        $.ajax({
                type: 'POST',
                url: '/psg_docente/insertar_campos_ejercicio_coordinacion_posgrado',
                data: new FormData($('#form_ejercicio_coordinacion_posgrado')[0]),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
            })
            .done(function (data) {
                if (typeof data.exito !== 'undefined') {
                    console.log('entro aqui');
                    $('#modal_ejercicio_coordinacion_posgrado').modal('hide');
                    $('#tabla_listar_ejercicio_docencia_posgrado').DataTable().draw();
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

function ConsultarPrograma(id_gestion) {
    $.ajax({
        url: "psg_docente/ConsultarPrograma",
        method: "POST",
        data: {
            id_gestion
        },
        success: function (respuesta) {

            // alert(respuesta);
            if (respuesta == "error") {
                $("#id_planificacion_programa_coordinacion").html('<option value="">No hay Resultados</option>');
                $("#id_planificacion_programa_coordinacion").trigger("chosen:updated");
            } else {
                var registros = eval(respuesta);
                html = "<option>Seleccione</option>";
                for (var i = 0; i < registros.length; i++) {
                    html += "<option value=" + registros[i]["id_planificacion_programa_coordinacion"] + ">" + registros[i]["nombre_programa"] + " - " + registros[i]["nombre_tipo_programa"] + "</option>";
                }
                $("#id_planificacion_programa_coordinacion").html(html);
                $("#id_planificacion_programa_coordinacion").trigger("chosen:updated");
            }
        }
    });
}


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