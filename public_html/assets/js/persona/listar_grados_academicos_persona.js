/** @format */

$(document).ready(function () {

    // ejemplo de mostrar un boton
    // var permiso = [];
    // $.get('/auth/ajax_es_autententificado').done(function (respuesta) {
    //     permiso = respuesta.exito.nombre_grupo == false ? false : (respuesta.exito.nombre_grupo).split(",");
    //     if (permiso.includes("POSGRADUANTE")) {
    //         console.log('entro');
    //     }
    // })

    /**
     * Se dispara cuando se quiera agregar un nuevo grado academico para la persona
     */
    $.get('/auth/ajax_es_autententificado').done(function (respuesta) {

        permiso = respuesta.exito.nombre_grupo == false ? false : (respuesta.exito.nombre_grupo).split(",");
        var lenguajeDatatable = '/assets/plugins/datatables/Spanish.json';
        $('#insertar_grado_academico_persona').on('click', function (e) {
            e.preventDefault();
            $.ajax({
                method: 'post',
                url: '/persona/campos_grados_academicos',
                data: {
                    id_persona: e.target.getAttribute('data-value'),
                },
                dataType: 'html',
            }).done(function (data) {
                parametrosModal('#grado-academico', 'Agregando Grados Academicos', 'modal-lg', false, false);
                $('#grado-academico-body').html(data);

                $('#insertar_grado_academico').on('click', function (event) {
                    event.preventDefault();

                    // let formData = new FormData();
                    // formData.append('id_unidad_academica', $('[name="id_unidad_academica"]').val());
                    // formData.append('id_persona', $('#id_persona').val());
                    // formData.append('id_grado_academico', $('[name="id_grado_academico"]').val());
                    // formData.append('id_tipo_documento_academico', $('[name="id_tipo_documento_academico"]').val());
                    // formData.append('numero_titulo', $('[name="numero_titulo"]').val());
                    // formData.append('id_modalidad_titulacion', $('[name="id_modalidad_titulacion"]').val());
                    // formData.append('descripcion_grado_academico', $('[name="descripcion_grado_academico_persona"]').val());
                    // formData.append('observacion', $('[name="observacion"]').val());
                    // formData.append('fecha_emision', $('[name="fecha_emision"]').val());
                    // formData.append('id_respaldo_digital', $('[name="id_respaldo_digital"]').val());

                    $.ajax({
                            type: 'POST',
                            url: '/persona/insertar_grados_academicos',
                            data: new FormData($('#form_campos_grados_academicos')[0]),
                            processData: false,
                            contentType: false,
                            cache: false,
                            async: false,
                        })
                        .done(function (data) {
                            if (typeof data.exito !== 'undefined') {
                                $('#grado-academico').modal('hide');
                                $('#tabla_listar_grados_academicos').DataTable().draw();
                            } else {
                                alertaSimple('ERROR', data.error, 'top-right', 'error', 3000);
                            }
                        })
                        .fail(function (jqXHR, textStatus) {
                            alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
                            console.log(jqXHR.responseText);
                        });
                });

                /**
                 * Este evento se dispara cuando el usuario desea subir su fotografia de su diploma
                 */
                $('#respaldo_digital').on('click', function (event) {
                    event.preventDefault();
                    event.stopPropagation();
                    listar_archivos();
                });
            });
        });


        $('#tabla_listar_grados_academicos')
            .DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                paging: false,
                language: lenguajeDatatable,
                ajax: {
                    type: 'GET',
                    url: '/persona/ajax_listar_grados_academicos/?id_persona=' + $('#id_persona').val(),
                },
                columnDefs: [{
                    searchable: false,
                    orderable: false,
                    targets: 1,
                    data: null,
                    render: function (data, type, row, meta) {
                        return (
                            `<div class ="btn-group" >
									<button type="button" class="btn btn-block btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Acci&oacute;n
									</button>								
                                    <div class="dropdown-menu animated flipInY">

                                         ` + ((permiso.includes("SUPERADMIN")) || (permiso.includes("ADMINISTRADOR")) || (permiso.includes("TECNICO_DOCENTE")) ? `
										<a id="editar" style="cursor:default" class="dropdown-item small editar" 
										data-value="` + data[0] + `" title="Editar">
											<i class="ti-pencil-alt"> </i>Editar
										</a>
										<a id="eliminar" style="cursor:default" class="dropdown-item small eliminar" data-value = "` + data[0] + `"	title="Eliminar">
											<i class="ti-trash"> </i>Eliminar
                                        </a>` : '') + `

										<a id="respaldo_digital" style="cursor:default" class="dropdown-item small respaldo_digital" data-value = "` + data[0] + `"	title="respaldo digital">
											<i class="ti-eye"> </i>respaldo digital
										</a>
										
									</div>									
						    </div> `
                            // <button class="btn btn-sm btn-info respaldo_digital" id="respaldo_digital" data-value="` + data[0] + `"><i class="fa fa-eye"></i></button>
                        );

                    },
                }, ],
                order: [
                    [4, 'desc']
                ]
            })
            .on('click', '#editar', function (event) {
                $.ajax({
                    method: 'post',
                    url: '/persona/campos_grados_academicos_editar',
                    data: {
                        id_grado_academico_persona: event.target.getAttribute('data-value'),
                        id_persona: $('#id_persona').val(),
                    },
                    dataType: 'html',
                }).done(function (data) {
                    parametrosModal('#grado-academico', 'Actualizando Grado Academico', 'modal-lg', true, true);
                    $('#grado-academico-body').html(data);

                    $('#actualizar_grado_academico').on('click', function (event) {
                        event.preventDefault();

                        // let formData = new FormData();
                        // formData.append('id_grado_academico_persona', $('#id_grado_academico_persona').val());
                        // formData.append('id_unidad_academica', $('[name="id_unidad_academica"]').val());
                        // formData.append('id_grado_academico', $('[name="id_grado_academico"]').val());
                        // formData.append('id_tipo_documento_academico', $('[name="id_tipo_documento_academico"]').val());
                        // formData.append('numero_titulo', $('[name="numero_titulo"]').val());
                        // formData.append('id_modalidad_titulacion', $('[name="id_modalidad_titulacion"]').val());
                        // formData.append('fecha_emision', $('[name="fecha_emision"]').val());
                        // formData.append('descripcion_grado_academico', $('[name="descripcion_grado_academico_persona"]').val());
                        // // formData.append('id_respaldo_digital', $('[name="id_respaldo_digital"]').val());
                        // formData.append('observacion', $('[name="observacion"]').val());

                        $.ajax({
                                type: 'POST',
                                url: '/persona/actualizar_grados_academicos',
                                data: new FormData($('#form_campos_grados_academicos')[0]),
                                processData: false,
                                contentType: false,
                                cache: false,
                                async: false,
                            })
                            .done(function (data) {
                                if (typeof data.exito !== 'undefined') {
                                    $('#grado-academico').modal('hide');
                                    $('#tabla_listar_grados_academicos').DataTable().draw();
                                } else {
                                    alertaSimple('ERROR', data.error, 'top-right', 'error', 3000);
                                }
                            })
                            .fail(function (jqXHR, textStatus) {
                                alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
                                console.log(jqXHR.responseText);
                            });
                    });

                    /**
                     * Este evento se dispara cuando el usuario desea subir su fotografia de su diploma
                     */
                    $('#respaldo_digital').on('click', function (event) {
                        event.preventDefault();
                        event.stopPropagation();
                        listar_archivos();
                    });
                });
            })
            .on('click', 'a#eliminar', function (event) {
                confirm('¿Esta usted seguro que desea eliminar el registro?') ?
                    $.post('/persona/eliminar_grados_academicos', {
                        id_grado_academico_persona: event.target.getAttribute('data-value'),
                    })
                    .done(function (response) {
                        $('#tabla_listar_grados_academicos').DataTable().draw();
                        alertaSimple('EXITOSO', 'Se elimino el registro ' + event.target.getAttribute('data-value'), 'top-right', 'info', 4000);
                    })
                    .fail(function (jqXHR, textStatus) {
                        alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
                        console.log(jqXHR.resposnseText);
                    }) :
                    false;
            })
            .on('click', 'a#respaldo_digital', function (event) {


                $.ajax({
                    method: 'post',
                    url: '/persona/vista_respaldo_digital',
                    data: {
                        id_persona: $('#id_persona').val(),
                        id_grado_academico_persona: event.target.getAttribute('data-value'),

                    },
                    dataType: 'html',
                }).done(function (data) {
                    parametrosModal('#grado-academico', 'GALERIA DE RESPALDO DIGITAL DEL GRADO ACADEMICO', 'modal-lg', true, true);
                    $('#grado-academico-body').html(data);
                });


            });



        // SECCION CAPACITACIONES PERSONA
        $('#agregar_capacitacion_persona').on('click', function (e) {
            e.preventDefault();
            $.ajax({
                method: 'post',
                url: '/persona/campos_capacitacion_persona',
                data: {
                    id_persona: e.target.getAttribute('data-value'),
                },
                dataType: 'html',
            }).done(function (data) {
                parametrosModal('#modal_campos_capacitacion_persona', 'Agregar nueva Capacitaci&oacute;n', 'modal-lg', false, false);
                $('#modal_campos_capacitacion_persona-body').html(data);
            });
        });


        $('#tabla_listar_capacitaciones')
            .DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                paging: false,
                language: lenguajeDatatable,
                ajax: {
                    type: 'GET',
                    url: '/persona/ajax_listar_capacitacion/?id_persona=' + $('#id_persona').val(),
                },
                columnDefs: [{
                    searchable: false,
                    orderable: false,
                    targets: 1,
                    data: null,
                    render: function (data, type, row, meta) {
                        return (
                            `<div class ="btn-group" >
                                <button type="button" class="btn btn-block btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Acci&oacute;n
                                </button>								
                                <div class="dropdown-menu animated flipInY">


                                    ` + ((permiso.includes("SUPERADMIN")) || (permiso.includes("ADMINISTRADOR")) || (permiso.includes("TECNICO_DOCENTE")) ? `
                                    <a id="editar" style="cursor:default" class="dropdown-item small editar" 
                                    data-value="` + data[0] + `" title="Editar">
                                        <i class="ti-pencil-alt"> </i>Editar
                                    </a>
                                    <a id="eliminar" style="cursor:default" class="dropdown-item small eliminar" data-value = "` + data[0] + `"	title="Eliminar">
                                        <i class="ti-trash"> </i>Eliminar
                                    </a>` : '') + `                                   

                                    <a id="respaldo_digital" style="cursor:default" class="dropdown-item small respaldo_digital" data-value = "` + data[0] + `"	title="respaldo digital">
                                        <i class="ti-eye"> </i>respaldo digital
                                    </a>
                                    
                                </div>									
                             </div>`

                        );

                    },
                }, ],
                order: [
                    [4, 'desc']
                ]
            })
            .on('click', '#editar', function (event) {
                $.ajax({
                    method: 'post',
                    url: '/persona/actualizar_campos_capacitacion_persona',
                    data: {
                        id_capacitacion_persona: event.target.getAttribute('data-value'),
                        id_persona: $('#id_persona').val(),
                    },
                    dataType: 'html',
                }).done(function (data) {
                    parametrosModal('#modal_campos_capacitacion_persona', 'Actualizando Capacitacion', 'modal-lg', true, true);
                    $('#modal_campos_capacitacion_persona-body').html(data);
                });
            })
            .on('click', 'a#eliminar', function (event) {
                bootbox.confirm({
                    message: '¿Esta usted seguro que desea eliminar el registro?',
                    centerVertical: true,
                    animate: false,
                    buttons: {
                        confirm: {
                            label: '<i class="fa fa-check-circle-o"></i> Si eliminar',
                            className: 'btn btn-rounded btn-block btn-info btn-sm',
                        },
                        cancel: {
                            label: '<i class="fa fa-times-circle-o"></i> Cancelar',
                            className: 'btn btn-rounded btn-block btn-warning btn-sm',
                        },
                    },
                    callback: function (result) {
                        if (result)
                            $.post('/persona/eliminar_capacitacion_persona', {
                                id_capacitacion_persona: event.target.getAttribute('data-value'),
                            })
                            .done(function (response) {
                                $('#tabla_listar_capacitaciones').DataTable().draw();
                                alertaSimple('EXITOSO', 'Se elimino el registro ' + event.target.getAttribute('data-value'), 'top-right', 'success', 4000);
                            })
                            .fail(function (jqXHR, textStatus) {
                                alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
                                console.log(jqXHR.resposnseText);
                            })
                    },
                });
            })
            .on('click', 'a#respaldo_digital', function (event) {
                $.ajax({
                    method: 'post',
                    url: '/persona/vista_respaldo_digital',
                    data: {
                        id_persona: $('#id_persona').val(),
                        id_capacitacion_persona: event.target.getAttribute('data-value'),
                    },
                    dataType: 'html',
                }).done(function (data) {
                    parametrosModal('#grado-academico', 'GALERIA DE RESPALDO DIGITAL DEL GRADO ACADEMICO', 'modal-lg', true, true);
                    $('#grado-academico-body').html(data);
                });
            });


        // SECCION IDIOMA PERSONA
        $('#agregar_idioma_persona').on('click', function (e) {
            e.preventDefault();
            $.ajax({
                method: 'post',
                url: '/persona/campos_idioma_persona',
                data: {
                    id_persona: e.target.getAttribute('data-value'),
                },
                dataType: 'html',
            }).done(function (data) {
                parametrosModal('#modal_campos_idioma_persona', 'Agregar nuevo Idioma', 'modal-lg', false, false);
                $('#modal_campos_idioma_persona-body').html(data);
            });
        });


        $('#tabla_listar_idioma_persona')
            .DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                paging: false,
                language: lenguajeDatatable,
                ajax: {
                    type: 'GET',
                    url: '/persona/ajax_listar_idioma_persona/?id_persona=' + $('#id_persona').val(),
                },
                columnDefs: [{
                    searchable: false,
                    orderable: false,
                    targets: 1,
                    data: null,
                    render: function (data, type, row, meta) {
                        return (
                            `<div class ="btn-group" >
                                <button type="button" class="btn btn-block btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Acci&oacute;n
                                </button>								
                                <div class="dropdown-menu animated flipInY">
                                   
                                    ` + ((permiso.includes("SUPERADMIN")) || (permiso.includes("ADMINISTRADOR")) || (permiso.includes("TECNICO_DOCENTE")) ? `
                                    <a id="editar" style="cursor:default" class="dropdown-item small editar" 
                                    data-value="` + data[0] + `" title="Editar">
                                        <i class="ti-pencil-alt"> </i>Editar
                                    </a>
                                    <a id="eliminar" style="cursor:default" class="dropdown-item small eliminar" data-value = "` + data[0] + `"	title="Eliminar">
                                        <i class="ti-trash"> </i>Eliminar
                                    </a>` : '') + `                                    

                                    <a id="respaldo_digital" style="cursor:default" class="dropdown-item small respaldo_digital" data-value = "` + data[0] + `"	title="respaldo digital">
                                        <i class="ti-eye"> </i>respaldo digital
                                    </a>
                                    
                                </div>									
                            </div>`
                            // <button class="btn btn-sm btn-info respaldo_digital" id="respaldo_digital" data-value="` + data[0] + `"><i class="fa fa-eye"></i></button>
                        );

                    },
                }, ],
                // order: [
                //     [4, 'desc']
                // ]
            })
            .on('click', '#editar', function (event) {
                $.ajax({
                    method: 'post',
                    url: '/persona/actualizar_campos_idioma_persona',
                    data: {
                        id_idioma_persona: event.target.getAttribute('data-value'),
                        id_persona: $('#id_persona').val(),
                    },
                    dataType: 'html',
                }).done(function (data) {
                    parametrosModal('#modal_campos_idioma_persona', 'Actualizando Datos Idioma', 'modal-lg', true, true);
                    $('#modal_campos_idioma_persona-body').html(data);
                });
            })
            .on('click', 'a#eliminar', function (event) {
                bootbox.confirm({
                    message: '¿Esta usted seguro que desea eliminar el registro?',
                    centerVertical: true,
                    animate: false,
                    buttons: {
                        confirm: {
                            label: '<i class="fa fa-check-circle-o"></i> Si eliminar',
                            className: 'btn btn-rounded btn-block btn-info btn-sm',
                        },
                        cancel: {
                            label: '<i class="fa fa-times-circle-o"></i> Cancelar',
                            className: 'btn btn-rounded btn-block btn-warning btn-sm',
                        },
                    },
                    callback: function (result) {
                        if (result)
                            $.post('/persona/eliminar_idioma_persona', {
                                id_idioma_persona: event.target.getAttribute('data-value'),
                            })
                            .done(function (response) {
                                $('#tabla_listar_idioma_persona').DataTable().draw();
                                // mostrar una alerta de exitoso para avisar all usuario que ya se elimino
                                alertaSimple('EXITOSO', 'Se elimino el registro ' + event.target.getAttribute('data-value'), 'top-right', 'success', 4000);
                            })
                            .fail(function (jqXHR, textStatus) {
                                alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
                                console.log(jqXHR.resposnseText);
                            })
                    },
                });
            })
            .on('click', 'a#respaldo_digital', function (event) {
                $.ajax({
                    method: 'post',
                    url: '/persona/vista_respaldo_digital',
                    data: {
                        id_persona: $('#id_persona').val(),
                        id_capacitacion_persona: event.target.getAttribute('data-value'),
                    },
                    dataType: 'html',
                }).done(function (data) {
                    parametrosModal('#grado-academico', 'GALERIA DE RESPALDO DIGITAL DEL GRADO ACADEMICO', 'modal-lg', true, true);
                    $('#grado-academico-body').html(data);
                });
            });


        // SECCION PRODUCCION INTELECTUAL PERSONA
        $('#agregar_produccion_intelectual_persona').on('click', function (e) {
            e.preventDefault();
            $.ajax({
                method: 'post',
                url: '/persona/campos_produccion_intelectual_persona',
                data: {
                    id_persona: e.target.getAttribute('data-value'),
                },
                dataType: 'html',
            }).done(function (data) {
                parametrosModal('#modal_campos_produccion_intelectual_persona', 'Agregar Producci&oacute;n Intelectual', 'modal-lg', false, false);
                $('#modal_campos_produccion_intelectual_persona-body').html(data);
            });
        });



        $('#tabla_listar_produccion_intelectual_persona')
            .DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                paging: false,
                language: lenguajeDatatable,
                ajax: {
                    type: 'GET',
                    url: '/persona/ajax_listar_produccion_intelectual_persona/?id_persona=' + $('#id_persona').val(),
                },
                columnDefs: [{
                    searchable: false,
                    orderable: false,
                    targets: 1,
                    data: null,
                    render: function (data, type, row, meta) {
                        return (
                            `<div class ="btn-group" >
                                <button type="button" class="btn btn-block btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Acci&oacute;n
                                </button>								
                                <div class="dropdown-menu animated flipInY">

                                     ` + ((permiso.includes("SUPERADMIN")) || (permiso.includes("ADMINISTRADOR")) || (permiso.includes("TECNICO_DOCENTE")) ? `
                                    <a id="editar" style="cursor:default" class="dropdown-item small editar" 
                                    data-value="` + data[0] + `" title="Editar">
                                        <i class="ti-pencil-alt"> </i>Editar
                                    </a>
                                    <a id="eliminar" style="cursor:default" class="dropdown-item small eliminar" data-value = "` + data[0] + `"	title="Eliminar">
                                        <i class="ti-trash"> </i>Eliminar
                                    </a>` : '') + `
                                   

                                    <a id="respaldo_digital" style="cursor:default" class="dropdown-item small respaldo_digital" data-value = "` + data[0] + `"	title="respaldo digital">
                                        <i class="ti-eye"> </i>respaldo digital
                                    </a>
                                    
                                </div>									
                            </div> `
                            // <button class="btn btn-sm btn-info respaldo_digital" id="respaldo_digital" data-value="` + data[0] + `"><i class="fa fa-eye"></i></button>
                        );

                    },
                }, ],
                order: [
                    [4, 'desc']
                ]
            })
            .on('click', '#editar', function (event) {
                $.ajax({
                    method: 'post',
                    url: '/persona/actualizar_campos_produccion_intelectual_persona',
                    data: {
                        id_produccion_intelectual: event.target.getAttribute('data-value'),
                        id_persona: $('#id_persona').val(),
                    },
                    dataType: 'html',
                }).done(function (data) {
                    parametrosModal('#modal_campos_produccion_intelectual_persona', 'Actualizando Datos Producci&oacute;n Intelectual', 'modal-lg', true, true);
                    $('#modal_campos_produccion_intelectual_persona-body').html(data);
                });
            })
            .on('click', 'a#eliminar', function (event) {
                bootbox.confirm({
                    message: '¿Esta usted seguro que desea eliminar el registro?',
                    centerVertical: true,
                    animate: false,
                    buttons: {
                        confirm: {
                            label: '<i class="fa fa-check-circle-o"></i> Si eliminar',
                            className: 'btn btn-rounded btn-block btn-info btn-sm',
                        },
                        cancel: {
                            label: '<i class="fa fa-times-circle-o"></i> Cancelar',
                            className: 'btn btn-rounded btn-block btn-warning btn-sm',
                        },
                    },
                    callback: function (result) {
                        if (result)
                            $.post('/persona/eliminar_produccion_intelectual_persona', {
                                id_produccion_intelectual: event.target.getAttribute('data-value'),
                            })
                            .done(function (response) {
                                $('#tabla_listar_produccion_intelectual_persona').DataTable().draw();
                                // mostrar una alerta de exitoso para avisar all usuario que ya se elimino
                                alertaSimple('EXITOSO', 'Se elimino el registro ' + event.target.getAttribute('data-value'), 'top-right', 'success', 4000);
                            })
                            .fail(function (jqXHR, textStatus) {
                                alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
                                console.log(jqXHR.resposnseText);
                            })
                    },
                });
            })
            .on('click', 'a#respaldo_digital', function (event) {
                $.ajax({
                    method: 'post',
                    url: '/persona/vista_respaldo_digital',
                    data: {
                        id_persona: $('#id_persona').val(),
                        id_capacitacion_persona: event.target.getAttribute('data-value'),
                    },
                    dataType: 'html',
                }).done(function (data) {
                    parametrosModal('#grado-academico', 'GALERIA DE RESPALDO DIGITAL DEL GRADO ACADEMICO', 'modal-lg', true, true);
                    $('#grado-academico-body').html(data);
                });
            });
    })
});