/** @format */
/** */
$(document).ready(function () {


    // PRIMERA SECCION
    $('#abrir_form_docente_externo_pre_grado').on('click', function (event) {

        event.preventDefault();

        $.ajax({
            method: "POST",
            url: "/psg_docente/campos_docente_externo_pre_grado",
            data: {
                id_persona: event.target.getAttribute("data-id"),
            },
            dataType: "html",
        }).done(function (response) {
            parametrosModal("#modal_docente_externo_pre_grado", "NUEVO EJERCICIO DE LA DOCENCIA DE GRADO - DOCENTE EXTERNO.", "modal-lg", false, false);

            $("#modal_docente_externo_pre_grado-body").html(response);
        });
    })

    var aquiesta = $('#tabla_listar_ejercicio_pre_grado_docente_externo')
        .DataTable({
            // scrollY: "300px",
            // scrollX: true,
            // scrollCollapse: true,
            paging: false,
            processing: true,
            serverSide: true,
            autoWidth: false,
            searching: false,
            ajax: {
                type: 'GET',
                url: '/psg_docente/listar_ajax_docente_externo_pre_grado/?id_persona=' + $('#id_persona').val(),
            },
            responsive: true,
            language: {
                // url: 'assets/plugins/datatables/Spanish.json',
                sProcessing: 'Procesando...',
                sLengthMenu: 'Mostrar _MENU_ registros',
                sZeroRecords: 'No se encontraron resultados',
                sEmptyTable: 'No se Encontro Registros sobre la Experiencia de Docencia Anteriores en Otras Universidades.',
                sInfo: 'Mostrando registros del _START_ al _END_ de un total de _TOTAL_',
                sInfoEmpty: 'Mostrando registros del 0 al 0 de un total de 0',
                sInfoFiltered: '(filtrado de un total de _MAX_ registros)',
                sInfoPostFix: '',
                // sSearch: 'Buscar:',
                sUrl: '',
                sInfoThousands: ',',
                sLoadingRecords: 'Cargando...',
                oPaginate: {
                    sFirst: 'Primero',
                    sLast: 'Último',
                    sNext: 'Siguiente',
                    sPrevious: 'Anterior',
                },
                oAria: {
                    sSortAscending: ': Activar para ordenar la columna de manera ascendente',
                    sSortDescending: ': Activar para ordenar la columna de manera descendente',
                },

            },

            // dom: 'Blfrtip',
            // dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
            //     "<'row'<'col-sm-12'tr>>" +
            //     "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            lengthMenu: [
                [2, 10, 30, 50, -1],
                [2, 10, 30, 50, 'Todo'],
            ],

            columnDefs: [

                {
                    visible: false,
                    targets: [0],
                    searchable: false,
                },
                {

                    searchable: false,
                    orderable: false,
                    sortable: true,
                    targets: 1,
                    data: null,
                    render: function (data, type, full, meta) {
                        return meta.row + 1;
                    }
                },

                {
                    searchable: false,
                    orderable: false,
                    targets: 2,
                    data: null,
                    render: function (data, type, row, meta) {
                        return (
                            `<div class ="btn-group" >
                                <button type="button" class="btn btn-block btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Acci&oacute;n
                                </button>								
                                <div class="dropdown-menu animated flipInY">
                                    <a id="editar" style="cursor:default" class="dropdown-item small editar" 
                                    data-value="` + data[0] + `" title="Editar">
                                        <i class="ti-pencil-alt"> </i>Editar
                                    </a>
                                    <a id="eliminar" style="cursor:default" class="dropdown-item small eliminar" data-value = "` + data[0] + `"	title="Eliminar">
                                        <i class="ti-trash"> </i>Eliminar
                                    </a>                                    
                                </div>									
                            </div> `
                        );
                    },
                },
                {
                    searchable: false,
                    orderable: false,
                    targets: 8,
                    data: null,
                    render: function (data, type, row, meta) {
                        // var fecha1 = moment('2016-08-12');
                        // var fecha2 = moment('2020-08-13');
                        // console.log(fecha2.diff(fecha1, 'days'), ' dias de diferencia');
                        // console.log(fecha2.diff(fecha1, 'months'), ' dias de diferencia');
                        var fecha1 = moment(data[6]);
                        var fecha2 = moment(data[7]);
                        var dias = fecha2.diff(fecha1, 'days');
                        var mes_decimal = fecha2.diff(fecha1, 'months') + '.' + dias
                        var numero_mes = (fecha2.diff(fecha1, 'years') * 12) + Math.ceil(mes_decimal)

                        return (
                            // numero_mes + ` meses (` + dias + ` dias) `
                            numero_mes
                        );
                    },
                }
            ],

        })
        .on('click', 'a#eliminar', function (event) {

            bootbox.confirm(
                '¿Esta usted seguro que desea eliminar el registro?',
                function (result) {
                    if (result) {
                        $.post('/psg_docente/eliminar_campos_docente_externo_pre_grado', {
                                id_docencia_externo: event.target.getAttribute('data-value'),
                            })
                            .done(function (response) {
                                $('#tabla_listar_ejercicio_pre_grado_docente_externo').DataTable().draw();
                                alertaSimple('EXITOSO', 'Se elimino el registro ' + event.target.getAttribute('data-value'), 'top-right', 'info', 4000);
                            })
                            .fail(function (jqXHR, textStatus) {
                                alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
                                console.log(jqXHR.resposnseText);
                            });
                    }
                }
            );
        });









    // SEGUNDA SECCION
    $('#abrir_form_ejercicio_docencia_posgrado').on('click', function (event) {
        event.preventDefault();

        $.ajax({
            method: "POST",
            url: "/psg_docente/campos_ejercicio_docencia_posgrado",
            data: {
                id_persona: event.target.getAttribute("data-id"),
            },
            dataType: "html",
        }).done(function (response) {
            parametrosModal("#modal_ejercicio_docencia_posgrado", "NUEVO EJERCICIO DE DOCENCIA DE POSGRADO.", "modal-lg", false, false);
            $("#modal_ejercicio_docencia_posgrado-body").html(response);
        });
    });


    $('#tabla_listar_ejercicio_docencia_posgrado')
        .DataTable({
            // // scrollY: "300px",
            // // scrollX: true,
            // scrollCollapse: true,
            paging: false,
            processing: true,
            serverSide: true,
            autoWidth: false,
            searching: false,
            ajax: {
                type: 'GET',
                url: '/psg_docente/listar_ajax_ejercicio_docencia_posgrado/?id_persona=' + $('#id_persona').val(),
            },
            responsive: true,
            language: {
                // url: 'assets/plugins/datatables/Spanish.json',

                sProcessing: 'Procesando...',
                sLengthMenu: 'Mostrar _MENU_ registros',
                sZeroRecords: 'No se encontraron resultados',
                sEmptyTable: 'No se Encontro Registros sobre la Experiencia de Docencia Anteriores en Otras Universidades.',
                sInfo: 'Mostrando registros del _START_ al _END_ de un total de _TOTAL_',
                sInfoEmpty: 'Mostrando registros del 0 al 0 de un total de 0',
                sInfoFiltered: '(filtrado de un total de _MAX_ registros)',
                sInfoPostFix: '',
                // sSearch: 'Buscar:',
                sUrl: '',
                sInfoThousands: ',',
                sLoadingRecords: 'Cargando...',
                oPaginate: {
                    sFirst: 'Primero',
                    sLast: 'Último',
                    sNext: 'Siguiente',
                    sPrevious: 'Anterior',
                },
                oAria: {
                    sSortAscending: ': Activar para ordenar la columna de manera ascendente',
                    sSortDescending: ': Activar para ordenar la columna de manera descendente',
                },

            },

            // dom: 'Blfrtip',
            // dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
            //     "<'row'<'col-sm-12'tr>>" +
            //     "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            lengthMenu: [
                [2, 10, 30, 50, -1],
                [2, 10, 30, 50, 'Todo'],
            ],

            columnDefs: [

                {
                    visible: false,
                    targets: [0],
                    searchable: false,
                },
                {

                    searchable: false,
                    orderable: false,
                    sortable: true,
                    targets: 1,
                    data: null,
                    render: function (data, type, full, meta) {
                        return meta.row + 1;
                    }
                },

                {
                    searchable: false,
                    orderable: false,
                    targets: 2,
                    data: null,
                    render: function (data, type, row, meta) {
                        return (
                            `<div class ="btn-group" >
                                <button type="button" class="btn btn-block btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Acci&oacute;n
                                </button>								
                                <div class="dropdown-menu animated flipInY">
                                    <a id="editar" style="cursor:default" class="dropdown-item small editar" 
                                    data-value="` + data[0] + `" title="Editar">
                                        <i class="ti-pencil-alt"> </i>Editar
                                    </a>
                                    <a id="eliminar" style="cursor:default" class="dropdown-item small eliminar" data-value = "` + data[0] + `"	title="Eliminar">
                                        <i class="ti-trash"> </i>Eliminar
                                    </a>                                    
                                </div>									
                            </div> `
                        );
                    },
                },
                {
                    searchable: false,
                    orderable: false,
                    targets: 9,
                    data: null,
                    render: function (data, type, row, meta) {
                        // var fecha1 = moment('2016-08-12');
                        // var fecha2 = moment('2020-08-13');
                        // console.log(fecha2.diff(fecha1, 'days'), ' dias de diferencia');
                        // console.log(fecha2.diff(fecha1, 'months'), ' dias de diferencia');
                        var fecha1 = moment(data[10]);
                        var fecha2 = moment(data[11]);
                        var dias = fecha2.diff(fecha1, 'days');
                        var mes = fecha2.diff(fecha1, 'months')
                        var numero_mes = (fecha2.diff(fecha1, 'years') * 12) + mes

                        return (
                            numero_mes + ` meses (` + dias + ` dias) `

                        );
                    },
                }
            ],
            order: [
                [3, "desc"]
            ]

        })
        .on('click', 'a#eliminar', function (event) {

            bootbox.confirm(
                '¿Esta usted seguro que desea eliminar el registro?',
                function (result) {
                    if (result) {
                        $.post('/psg_docente/eliminar_campos_ejercicio_docencia_posgrado', {
                                id_docencia_interno: event.target.getAttribute('data-value'),
                            })
                            .done(function (response) {
                                $('#tabla_listar_ejercicio_docencia_posgrado').DataTable().draw();
                                alertaSimple('EXITOSO', 'Se elimino el registro ' + event.target.getAttribute('data-value'), 'top-right', 'info', 4000);
                            })
                            .fail(function (jqXHR, textStatus) {
                                alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
                                console.log(jqXHR.resposnseText);
                            });
                    }
                }
            );
        });

    // TERCERA SECCION
    $('#abrir_form_ejercicio_coordinacion_posgrado').on('click', function (event) {
        event.preventDefault();

        $.ajax({
            method: "POST",
            url: "/psg_docente/campos_ejercicio_coordinacion_posgrado",
            data: {
                id_persona: event.target.getAttribute("data-id"),
            },
            dataType: "html",
        }).done(function (response) {
            parametrosModal("#modal_ejercicio_coordinacion_posgrado", "NUEVO EJERCICIO DE COORDINACION DE POSGRADO.", "modal-lg", false, false);
            $("#modal_ejercicio_coordinacion_posgrado-body").html(response);
        });
    })
});