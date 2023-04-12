$(document).ready(function () {
    $(".select2").select2();
    var url = "<?php echo base_url();?>notas_posgraduante/";
    var texto_gestion = '';
    var limit = 9;
    var start = 0;
    var accion = 'inactivo';
    var controladorTiempo = "";

    function lazzy_loader(limit) {
        var salida_html = '';
        for (var count = 0; count < limit; count++) {
            salida_html += '<div class="post_data">';
            salida_html += '<p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p>';
            salida_html += '<p><span class="content-placeholder" style="width:100%; height: 100px;">&nbsp;</span></p>';
            salida_html += '</div>';
        }
        $('#iniciar_datos_message').html(salida_html);
    }
    lazzy_loader(limit);

    function iniciar_datos() {
        buscar_planificacion_programa();
    }
    if (accion == 'inactivo') {
        accion = 'activo';
        iniciar_datos();
    }
    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() > $("#iniciar_datos").height() && accion == 'inactivo') {
            lazzy_loader(limit);
            accion = 'activo';
            start = start + limit;
            setTimeout(function () {
                buscar_planificacion_programa();
            }, 1000);
        }
    });
    $('#contenido_pagina')
        .on('keyup', '#buscar_planificacion', function () {
            start = 0;
            $('#iniciar_datos').html("");
            $('#iniciar_datos_message').html("");
            accion = 'inactivo';
            //buscar_planificacion_programa();
            clearTimeout(controladorTiempo);
            controladorTiempo = setTimeout(buscar_planificacion_programa, 800);

        })
        .on('change', '#id_gestion,#id_grado_academico,#id_tipo_programa,#version_programa,#vigentes,#ci_docente_posgraduante', function () {
            start = 0;
            $('#iniciar_datos').html("");
            $('#iniciar_datos_message').html("");
            accion = 'inactivo';
            buscar_planificacion_programa();
        })
    /* .on('change', 'input[name=buscar_planificacion]', function (event) {
        if ($(this).prop('checked')) {
          alert("chequed");
        }
        else{
          alert("desseleccionado");
        }
      })*/
    function buscar_planificacion_programa() {
        var texto_gestion = $("#id_gestion option:selected").text();
        var texto_grado_academico = $("#id_grado_academico option:selected").text();
        var texto_tipo_programa = $("#id_tipo_programa option:selected").text();
        var version_programa = $("#version_programa option:selected").text();
        var buscar_planificacion = $("#buscar_planificacion").val();
        var ci_docente_posgraduante = $("#ci_docente_posgraduante").val();
        var vigentes = "";
        if ($('#vigentes').prop('checked')) {
            vigentes = $("#vigentes").val();
        }
        $.post(url + "buscar_planificacion_programa", { texto_gestion, texto_grado_academico, texto_tipo_programa, version_programa, buscar_planificacion, vigentes, ci_docente_posgraduante, limit, start }, function (resp) {
            if (resp == '') {
                $('#iniciar_datos_message').html('<p class="text-danger">No se encontraron más resultados...</code></p>');
                accion = 'activo';
            } else {
                $('#iniciar_datos').append(resp);
                $('#iniciar_datos_message').html("");
                accion = 'inactivo';
            }
        });
    }
    $("#iniciar_datos")
        .on('click', '#id_planificacion_programa_modulo', function () {
            var id_planificacion_programa = $(this).val();
            var id_gestion = $(this).data('id_gestion_programa');
            $.post(url + "lista_modulos", { id_planificacion_programa, id_gestion }, function (resp) {
                if (resp.length != '') {
                    /*var pdf = JSON.parse(resp);*/
                    $("#contenido_notas_posgraduente_ver").html(resp);
                    $("#modal_notas_posgraduente_ver").modal({
                        backdrop: 'static', // This disable for click outside event
                        keyboard: true // This for keyboard event
                    });
                } else {
                    alertaSimple('ALERTA', 'El programa no cuenta con modulos ni paralelos', 'top-right', 'error', 6000);
                }

            });
        })
        .on('click', '#lista_docente', function () {
            var id_planificacion_programa = $(this).val();
            var id_gestion = $(this).data('id_gestion_programa');
            $.post(url + "lista_docente", { id_planificacion_programa, id_gestion }, function (resp) {
                $("#titulo_modal_posgraduante").html('REPORTE');
                /*var pdf = JSON.parse(resp);*/
                $("#contenido_notas_posgraduente_ver").html('<embed src="data:application/pdf;base64,' + resp + '#toolbar=1&navpanes=1&scrollbar=1&zoom=200,200,100" type="application/pdf" width="100%" height="1000px" style="border: none;"/>');
                $("#modal_notas_posgraduente_ver").modal({
                    backdrop: 'static', // This disable for click outside event
                    keyboard: true // This for keyboard event
                });
            });
        })
        .on('click', '#lista_posgraduante', function () {
            var id_planificacion_programa = $(this).val();
            var id_gestion = $(this).data('id_gestion_programa');
            $.post(url + "lista_posgraduante", { id_planificacion_programa, id_gestion }, function (resp) {
                $("#titulo_modal_posgraduante").html('REPORTE');
                $("#contenido_notas_posgraduente_ver").html('<embed src="data:application/pdf;base64,' + resp + '#toolbar=1&navpanes=1&scrollbar=1&zoom=200,200,100" type="application/pdf" width="100%" height="1000px" style="border: none;"/>');
                $("#modal_notas_posgraduente_ver").modal({
                    backdrop: 'static', // This disable for click outside event
                    keyboard: true // This for keyboard event
                });
            });
        })
        .on('click', '#certificado_calificacion', function () {
            var id_planificacion_programa = $(this).val();
            var id_gestion = $(this).data('id_gestion_programa');
            $.post(url + "certificado_calificacion", { id_planificacion_programa, id_gestion }, function (resp) {
                $("#titulo_modal_posgraduante").html('REPORTE');
                $("#contenido_notas_posgraduente_ver").html('<embed src="data:application/pdf;base64,' + resp + '#toolbar=1&navpanes=1&scrollbar=1&zoom=200,200,100" type="application/pdf" width="100%" height="1000px" style="border: none;"/>');
                $("#modal_notas_posgraduente_ver").modal({
                    backdrop: 'static', // This disable for click outside event
                    keyboard: true // This for keyboard event
                });
            });
        })

    $("#contenido_notas_posgraduente_ver")
        .on('click', '#adicionar_nota', function () {
            var id_modulo_programa = $(this).val();
            var id_gestion_programa_modulo = $(this).data('id_gestion_programa_modulo');
            var id_asignacion_modulo_programa = '';
            if ($("#id_asignacion_modulo_programa_" + id_modulo_programa).is(':checked')) {
                id_asignacion_modulo_programa = $("#id_asignacion_modulo_programa_" + id_modulo_programa).val();
            }
            if (id_modulo_programa != '' && id_gestion_programa_modulo != '' && id_asignacion_modulo_programa != '') {
                $.post(url + "adicionar_nota", { id_asignacion_modulo_programa, id_gestion_programa_modulo }, function (resp) {
                    $("#contenido_notas_posgraduente_nota").html(resp);
                    $('#modal_notas_posgraduente_ver').animate({
                        scrollTop: $("#contenido_notas_posgraduente_nota").offset().top
                    }, 1000);
                    $('#notas_posgraduante_nota').DataTable({
                        lengthMenu: [
                            [10, 20, 30, 50, 100, -1],
                            [10, 20, 30, 50, 100, 'Todo']
                        ],
                        iDisplayLength: -1,
                        /* paging: false*/
                    });

                });
            } else {
                alertaSimple('ALERTA', 'Seleccione paralelo', 'top-right', 'warning', 6000);
            }
        })
        .on('click', '#subir_nota_archivo', function () {
            var id_modulo_programa = $(this).val();
            var id_gestion_programa_modulo = $(this).data('id_gestion_programa_modulo');
            var id_asignacion_modulo_programa = '';
            if ($("#id_asignacion_modulo_programa_" + id_modulo_programa).is(':checked')) {
                id_asignacion_modulo_programa = $("#id_asignacion_modulo_programa_" + id_modulo_programa).val();
            }
            if (id_modulo_programa != '' && id_gestion_programa_modulo != '' && id_asignacion_modulo_programa != '') {
                $("#archivo_excel_" + id_modulo_programa).trigger("click")
                    .on("change", function () {
                        // desactivar que cuarde en memoria click 
                        $("#archivo_excel_" + id_modulo_programa).off();
                        var formData = new FormData($('#form_archivo_excel_' + id_modulo_programa)[0]);
                        formData.append("id_gestion_programa_modulo", id_gestion_programa_modulo);
                        formData.append("id_asignacion_modulo_programa", id_asignacion_modulo_programa);
                        formData.append("id_modulo_programa", id_modulo_programa);
                        $.ajax({
                            type: 'POST',
                            url: url + "subir_nota_archivo",
                            data: formData,
                            processData: false,
                            contentType: false,
                            cache: false,
                            async: false,
                        })
                            .done(function (data) {
                                $("#archivo_excel_" + id_modulo_programa).val('');
                                if (typeof data == 'object') {
                                    alertaSimple('ALERTA', 'El tipo de archivo que intentas subir no está permitido', 'top-right', 'warning', 6000);
                                } else {
                                    $("#contenido_notas_posgraduente_nota").html(data);
                                    $('#modal_notas_posgraduente_ver').animate({
                                        scrollTop: $("#contenido_notas_posgraduente_nota").offset().top
                                    }, 1000);
                                    $('#notas_posgraduante_nota').DataTable({
                                        lengthMenu: [
                                            [10, 20, 30, 50, 100, -1],
                                            [10, 20, 30, 50, 100, 'Todo']
                                        ],
                                        iDisplayLength: -1,
                                        /* paging: false*/
                                    });

                                }

                            })
                    });
            } else {
                alertaSimple('ALERTA', 'Seleccione paralelo', 'top-right', 'warning', 6000);
            }
        })
        .on('click', '#acta_calificacion', function () {
            var id_modulo_programa = $(this).val();
            var id_gestion_programa_modulo = $(this).data('id_gestion_programa_modulo');
            var id_asignacion_modulo_programa = '';
            if ($("#id_asignacion_modulo_programa_" + id_modulo_programa).is(':checked')) {
                id_asignacion_modulo_programa = $("#id_asignacion_modulo_programa_" + id_modulo_programa).val();
            }
            if (id_modulo_programa != '' && id_gestion_programa_modulo != '' && id_asignacion_modulo_programa != '') {
                $.post(url + "acta_calificacion", { id_asignacion_modulo_programa, id_gestion_programa_modulo }, function (resp) {
                    $("#contenido_notas_posgraduente_nota").html('<embed src="data:application/pdf;base64,' + resp + '#toolbar=1&navpanes=1&scrollbar=1&zoom=200,200,100" type="application/pdf" width="100%" height="1000px" style="border: none;"/>');
                    $('#modal_notas_posgraduente_ver').animate({
                        scrollTop: $("#contenido_notas_posgraduente_nota").offset().top
                    }, 1000);

                });
            } else {
                alertaSimple('ALERTA', 'Seleccione paralelo', 'top-right', 'warning', 6000);
            }
        })
        .on('click', '#lista_posgraduante_excel', function () {
            var id_modulo_programa = $(this).val();
            var id_gestion_programa_modulo = $(this).data('id_gestion_programa_modulo');
            var id_asignacion_modulo_programa = '';
            if ($("#id_asignacion_modulo_programa_" + id_modulo_programa).is(':checked')) {
                id_asignacion_modulo_programa = $("#id_asignacion_modulo_programa_" + id_modulo_programa).val();
            }
            if (id_modulo_programa != '' && id_gestion_programa_modulo != '' && id_asignacion_modulo_programa != '') {
                window.open(url + "lista_posgraduante_excel/" + id_asignacion_modulo_programa + "/" + id_gestion_programa_modulo, '_blank');
                /*$.post(url + "lista_posgraduante_excel/" + id_asignacion_modulo_programa + "/" + id_gestion_programa_modulo, {}, function(resp) {
                    window.open(this.url, '_blank');
                });*/
            } else {
                alertaSimple('ALERTA', 'Seleccione paralelo', 'top-right', 'warning', 6000);
            }
        })
        .on('click', '#volver_notas_posgraduante_nota', function () {
            $("#modal_notas_posgraduente_nota").modal('hide');
            //$("#modal_notas_posgraduente_nota").remove();
        })
        .on('keyup', '#nota_final_modulo', function () {
            var id_asignacion_modulo_programa = $("#id_asignacion_modulo_programa").val();
            var id_persona_posgraduante = $(this).data('id_persona_posgraduante');
            var nota_final_modulo = $(this).val();
            if (!(nota_final_modulo >= 0 && nota_final_modulo <= 100)) {
                nota_final_modulo = null;
                $(this).val("");
            }
            $.post(url + "regisgrar_nota_final_modulo", { id_asignacion_modulo_programa, id_persona_posgraduante, nota_final_modulo }, function (resp) {
                $("#progres_" + id_persona_posgraduante).html(resp);
            })
        })
        .on('keyup', '#observacion_inscripcion', function () {
            var id_asignacion_modulo_programa = $("#id_asignacion_modulo_programa").val();
            var id_persona_posgraduante = $(this).data('id_persona_posgraduante');
            var observacion_inscripcion = $(this).val();
            $.post(url + "regisgrar_observacion_nota_final_modulo", { id_asignacion_modulo_programa, id_persona_posgraduante, observacion_inscripcion }, function (resp) { })
        })
        .on('click', '.id_asignacion_modulo_programa_checbox', function () {
            $(".id_asignacion_modulo_programa_checbox").prop("checked", false);
            $(this).prop("checked", true);
            $("#contenido_notas_posgraduente_nota").html('');

        })

});