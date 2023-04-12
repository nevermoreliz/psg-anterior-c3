$(document).ready(function() {
    var url = "<?php echo base_url();?>docente/";
    var url_notas_posgraduante = "<?php echo base_url();?>notas_posgraduante/";
    var accion = 'inactivo';
    var limite = 3;
    var inicio = 7;

    function loading(limite) {
        var salida_html = '';
        for (var count = 0; count < limite; count++) {
            salida_html += '<div class="post_data">';
            salida_html += '<p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p>';
            salida_html += '<p><span class="content-placeholder" style="width:100%; height: 100px;">&nbsp;</span></p>';
            salida_html += '</div>';
        }
        $('#iniciar_datos_message').html(salida_html);
    }
    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() > $("#iniciar_datos").height() && accion == 'inactivo') {
            accion = 'activo';
            loading(limite);
            inicio = inicio + limite;
            setTimeout(function() {
                listar_programa_docente();

            }, 1000);
            return true;
        }
    });

    function listar_programa_docente() {
        $.post(url + "listar_programa_docente", { inicio, limite }, function(resp) {
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
    $('#contenido_pagina')
        .on('click', '#id_asignacion_modulo_programa_s', function() {
            // var id_modulo_programa = $(this).val();
            $("#titulo_modal_posgraduante").html($(this).data('titulo_programa'));
            var id_gestion_programa_modulo = $(this).data('id_gestion_programa');
            var id_asignacion_modulo_programa = $(this).val(); // $("#id_asignacion_modulo_programa_" + id_modulo_programa).val();
            $.post(url_notas_posgraduante + "adicionar_nota", { id_asignacion_modulo_programa, id_gestion_programa_modulo }, function(resp) {
                $("#contenido_datos_docente").html(resp);
                $("#modal_docente").modal({
                    backdrop: 'static', // This disable for click outside event
                    keyboard: true // This for keyboard event
                });
                $('#notas_posgraduante_nota').DataTable({
                    lengthMenu: [
                        [10, 20, 30, 50, 100, -1],
                        [10, 20, 30, 50, 100, 'Todo']
                    ],
                    iDisplayLength: -1,
                    /* paging: false*/
                });
            });
        })
        .on('click', '#lista_posgraduante_excel', function() {
            var id_gestion_programa_modulo = $(this).data('id_gestion_programa');
            var id_asignacion_modulo_programa = $(this).val();
            if (id_gestion_programa_modulo != '' && id_asignacion_modulo_programa != '') {
                window.open(url_notas_posgraduante + "lista_posgraduante_excel/" + id_asignacion_modulo_programa + "/" + id_gestion_programa_modulo, '_blank');
            } else {
                alertaSimple('ALERTA', 'Seleccione paralelo', 'top-right', 'warning', 6000);
            }
        })
    $("#contenido_datos_docente")
        .on('keyup', '#nota_final_modulo', function() {
            var id_asignacion_modulo_programa = $("#id_asignacion_modulo_programa").val();
            var id_persona_posgraduante = $(this).data('id_persona_posgraduante');
            var nota_final_modulo = $(this).val();
            if (!(nota_final_modulo >= 0 && nota_final_modulo <= 100)) {
                nota_final_modulo = null;
                $(this).val("");
            }
            $.post(url_notas_posgraduante + "regisgrar_nota_final_modulo", { id_asignacion_modulo_programa, id_persona_posgraduante, nota_final_modulo }, function(resp) {
                $("#progres_" + id_persona_posgraduante).html(resp);
            })
        })
        .on('keyup', '#observacion_inscripcion', function() {
            var id_asignacion_modulo_programa = $("#id_asignacion_modulo_programa").val();
            var id_persona_posgraduante = $(this).data('id_persona_posgraduante');
            var observacion_inscripcion = $(this).val();
            $.post(url_notas_posgraduante + "regisgrar_observacion_nota_final_modulo", { id_asignacion_modulo_programa, id_persona_posgraduante, observacion_inscripcion }, function(resp) {})
        })

});