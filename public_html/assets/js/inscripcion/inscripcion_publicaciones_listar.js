$(document).ready(function () {
	$('#tabla_programas_vigentes')
		.DataTable({
			processing: true,
			serverSide: true,
			autoWidth: true,
			// searching: true,
			ajax: '/inscripcion/inscripcion_publicaciones_listar_ajax',
			responsive: false,
			language: {
				url: 'assets/plugins/datatables/Spanish.json',
			},

			lengthMenu: [
				[10, 20, 30, 50, -1],
				[10, 20, 30, 50, 'Todo'],
			],

			columnDefs: [
				{
					searchable: true,
					orderable: true,
					targets: 1,
					data: null,
					render: function (data, type, row, meta) {
						return (
							`<div class="btn-group">
                    <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Acci&oacute;n
                    </button>
                    <div class="dropdown-menu animated flipInY">
                        <a class="dropdown-item small inscribir_participante" href="#" data-id-planificacion-programa="` +
							data[0] +
							`" data-id-publicacion="` +
							data[4] +
							`"><i class=" ti-user"></i> Inscribir Participante</a>
                    </div>
                </div>`
						);
					},
				},
			],
			order: [[0, 'desc']],
		})
		.on('click', 'a.inscribir_participante', function (event) {
			$.ajax({
				method: 'POST',
				url: '/inscripcion/campos_formulario_inscripcion_directa',
				data: {
					id_planificacion_programa: event.target.getAttribute('data-id-planificacion-programa'),
					id_publicacion: event.target.getAttribute('data-id-publicacion'),
				},
				dataType: 'html',
			}).done(function (response) {
				parametrosModal('#modal_inscripcion_directa', 'FORMULARIO DE INSCRIPCIÓN A UN PROGRAMA DE FORMA DIRECTA', 'modal-xl', false, 'static');
				$('#modal_inscripcion_directa-body').html(response);
			});
		});
});
