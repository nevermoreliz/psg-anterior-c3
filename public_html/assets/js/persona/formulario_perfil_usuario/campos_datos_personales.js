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
    $('#btn_modificar_vista_perfil_usuario_datos_personales').click(function (event) {
        // console.log($('[name="fecha_nacimiento"]').val());
        swal({
                title: '¿Esta seguro de modificar tus datos?',
                text: 'Verifique si los datos son correctos antes de continuar, todos los documentos o tramites se realizara con los datos que modificara si usted ya tiene documentos o tramites ',
                type: 'info',
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Aceptar',
                cancelButtonText: 'Cancelar',
                closeOnConfirm: false,
            },
            function () {
                event.preventDefault();
                var ci_persona = $('[name="ci"]').val();

                let formData = new FormData();
                // formData.append(event.target.name, event.target.value.trim());
                formData.append('ci', ci_persona);
                formData.append('expedido', $('[name="expedido"]').val());
                formData.append('tipo_documento', $('[name="tipo_documento"]').val());
                formData.append('id_pais_nacionalidad', $('[name="id_pais_nacionalidad"]').val());
                formData.append('nombre', $('[name="nombre"]').val());
                formData.append('paterno', $('[name="paterno"]').val());
                formData.append('materno', $('[name="materno"]').val());
                formData.append('fecha_nacimiento', $('[name="fecha_nacimiento"]').val());
                formData.append('lugar_nacimiento', $('[name="lugar_nacimiento"]').val());
                formData.append('genero', $('[name="genero"]').val());
                formData.append('estado_civil', $('[name="estado_civil"]').val());
                formData.append('email', $('[name="email"]').val());
                formData.append('domicilio', $('[name="domicilio"]').val());
                formData.append('celular', $('[name="celular"]').val());
                formData.append('telefono', $('[name="telefono"]').val());
                formData.append('oficio_trabajo', $('[name="oficio_trabajo"]').val());
                $.ajax({
                        type: 'POST',
                        url: '/persona/actualizar_datos_personales',
                        dataType: 'json',
                        data: formData,
                        // data: new FormData($("#form_vista_perfil_campos_datos_personales")[0]),
                        processData: false,
                        contentType: false,
                        cache: false,
                        async: false,
                    }).done(function (data) {

                        if (typeof data.exito != 'undefined') {
                            swal('Datos Actualizados', 'haga click en "ok" para continuar');
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
                        } else {
                            // alert('entro .done por else');
                            alertaSimple('INFORMACIÓN', data.error, 'top-right', 'warning', 8000);
                        }
                    })
                    .fail(function (jqXHR, textStatus) {
                        // alert('entro en .fail');
                        alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
                        console.log(jqXHR.responseText);
                    });
            }
        );
    });


});