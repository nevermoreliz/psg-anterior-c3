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

    $('#tabla_listar_personas_no_docente').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        language: {
            url: "/assets/plugins/datatables/Spanish.json",
        },
        ajax: "/psg_docente/listar_ajax_personas_no_docentes",
        dom: "lfrtip",
        buttons: ["copy", "csv", "excel", "pdf", "print"],
        columnDefs: [
            // {
            //     searchable: true,
            //     orderable: true,
            //     targets: 0,
            //     data: null,
            //     render: function (data, type, row, meta) {
            //         return data[0] + " " + data[8];
            //     },
            // },

            {
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
									<a id="insertar_nuevo_docente" style="cursor:default" class="dropdown-item small insertar_nuevo_docente" 
									data-value="` + data[1] + `" title="Actualizar los datos del Docente y Agregar al plantel docente posgrado">
										<i class="fa fa-user-circle-o"> </i> Insertar Nuevo Docente
									</a>																
								</div>								
							</div> `
                    );

                    // return '<a data-value="' + data[0] + '" class="btn btn-sm btn-warning " data-toggle="tooltip" title="Ir a Kardex del docente"><i class="ti-folder"> </i>Kardex Docente</a>';
                },
            },
        ],
    }).on('click', 'a', function (event) {
        $.ajax({
            method: 'POST',
            url: '/persona/campos_datos_personales',
            data: {
                ci: event.target.getAttribute('data-value'),
            },
            dataType: 'html',
        }).done(function (response) {

            parametrosModal('#modal_nuevo_docente_actualizar', 'Actualizar Datos', 'modal-lg', false, true);
            $('#modal_nuevo_docente_actualizar-body').html(response);
        });
    });
});