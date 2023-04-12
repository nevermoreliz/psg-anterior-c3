/** @format */

$(document).ready(function () {
	// Carga de la libreria bootbox
	$.get({ url: '/assets/js/asistencia/bootbox.js' });
	$.get({ url: '/assets/js/asistencia/select2.min.js' });

	/**
	 * Uso :  Carga de datos a datatable
	 */
	$('#tabla_listar_asignacion_horarios')
		.DataTable({
			responsive: true,
			processing: true,
			serverSide: true,
			ajax: '/asistencia/ajax_listar_asignacion_horario',
			responsive: true,
			language: {
				sProcessing: 'Procesando...',
				sLengthMenu: 'Mostrar _MENU_ registros',
				sZeroRecords: 'No se encontraron resultados',
				sEmptyTable: 'Ningún dato disponible en esta tabla',
				sInfo: 'Mostrando registros del _START_ al _END_ de un total de _TOTAL_',
				sInfoEmpty: 'Mostrando registros del 0 al 0 de un total de 0',
				sInfoFiltered: '(filtrado de un total de _MAX_ registros)',
				sInfoPostFix: '',
				sSearch: 'Buscar:',
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
			columnDefs: [
				{
					searchable: true,
					orderable: true,
					targets: 3,
					data: null,
					render: function (data, type, row, meta) {
						return data[3] === 'MT' ? 'MEDIO TIEMPO' : 'TIEMPO COMPLETO';
					},
				},
				{
					searchable: false,
					orderable: false,
					targets: 7,
					data: null,
					render: function (data, type, row, meta) {
						return data[7] === 't'
							? "<a class='btn btn-success btn-xs btn-estado-asignacion-horario text-white' data-toggle='tooltip' title='Desactivar' data='" +
									data[0] +
									"' value='f'>Activo</a>"
							: "<a class='btn btn-danger btn-xs btn-estado-asignacion-horario text-white' data-toggle='tooltip' title='Activar' data='" +
									data[0] +
									"' value='t'>Desactivo</a>";
					},
				},
				{
					searchable: false,
					orderable: false,
					targets: -1,
					data: null,
					render: function (data, type, row, meta) {
						return (
							'<div class="btn-group" role="group"><a data-value="' +
							data[0] +
							'" class="btn btn-warning btn-sm mdi mdi-tooltip-edit text-white btn-editar-asignacion-horario" data-toggle="tooltip" title="Editar"></a><a data-value="' +
							data[0] +
							'" class="btn btn-danger btn-sm mdi mdi-delete-forever text-white btn-eliminar-asignacion-horario" data-toggle="tooltip" title="Eliminar"></a></div>'
						);
					},
				},
			],
		})
		.on('click', 'a.btn-editar-asignacion-horario', function (event) {
			$.ajax({
				method: 'post',
				url: '/asistencia/campos_asignacion_horario',
				data: {
					id_asignacion_horario: event.target.getAttribute('data-value'),
				},
				dataType: 'html',
			}).done(function (data) {
				parametrosModal('#asignacion-horario', 'Editar tipo horario', 'modal-md', false, false);

				$('#asignacion-horario-body').html(data);

				// Select2 campo tipo_horario
				$('#id_tipo_horario').select2({
					allowClear: true,
					dropdownParent: $('#asignacion-horario'),
					width: '100%',
				});

				// Select2 campo id_cargo_unidad
				$('#id_cargo_unidad').select2({
					allowClear: true,
					dropdownParent: $('#asignacion-horario'),
					width: '100%',
				});

				/**
				 * Accion: Salta cuando se envia el Formulario Modal que llamamos para asignar horario
				 * Retorna: Un objeto JSON con el id insertado
				 */
				submit_asignacion_horario();
			});
		})
		.on('click', 'a.btn-estado-asignacion-horario', function (event) {
			let valor = event.target.getAttribute('value');
			var estado = '';
			valor == 'f' ? (estado = 'desactivar') : (estado = 'activar');
			bootbox.confirm('Estás seguro de ' + estado + ' la asignación de horario?', function (result) {
				if (result) {
					$.ajax({
						method: 'post',
						url: '/asistencia/estado_asignacion_horario',
						data: {
							id_asignacion_horario: event.target.getAttribute('data'),
							estado: event.target.getAttribute('value'),
						},
						dataType: 'JSON',
					})
						.done(function (response) {
							if (typeof response.exito !== 'undefined') {
								$('#tabla_listar_asignacion_horarios').DataTable().draw();

								alertaSimple('ÉXITO', response.exito, 'top-right', 'success', 4000);
							}
						})
						.fail(function (xhr) {
							alertaSimple('Error', 'No se puede activar o desactivar la asignación!!!', 'top-right', 'error', 4000);
						});
				}
			});
		})
		.on('click', 'a.btn-eliminar-asignacion-horario', function () {
			let id = event.target.getAttribute('data-value');
			bootbox.confirm('Estás seguro de ELIMINAR asignación de horario?', function (result) {
				if (result) {
					$.ajax({
						method: 'post',
						url: '/asistencia/eliminar_asignacion_horario',
						data: { id_asignacion_horario: id },
						dataType: 'json',
					})
						.done(function (response) {
							if (typeof response.exito !== 'undefined') {
								$('#tabla_listar_asignacion_horarios').DataTable().draw();
								alertaSimple('ÉXITO', response.exito, 'top-right', 'success', 4000);
							}
						})
						.fail(function (xhr) {
							alertaSimple('Error', 'No se puede eliminar la asignación!!!', 'top-right', 'error', 4000);
						});
				}
			});
		});

	/**
	 * Descripción : Se encarga de cargar el formulario via ajax,
	 *               mostrar modal y guardar asignacion horario.
	 */
	$('#btn_agregar_asignacion_horario').on('click', function (e) {
		e.preventDefault();
		$.ajax({
			method: 'post',
			url: '/asistencia/campos_asignacion_horario',
			data: { id_asignacion_horario: null },
			dataType: 'html',
		}).done(function (data) {
			parametrosModal('#asignacion-horario', 'Asignar horario', 'modal-lg', false, false);

			$('#asignacion-horario-body').html(data);

			// Select2 campo tipo_horario
			$('#id_tipo_horario').select2({
				allowClear: true,
				dropdownParent: $('#asignacion-horario'),
				width: '100%',
			});

			// Select2 campo id_cargo_unidad
			$('#id_cargo_unidad').select2({
				allowClear: true,
				dropdownParent: $('#asignacion-horario'),
				width: '100%',
			});

			/**
			 * Accion: Salta cuando se envia el Formulario Modal que llamamos para asignar horario
			 * Retorna: Un objeto JSON con el id insertado
			 */
			submit_asignacion_horario();
		});
	});
	/**
	 * Accion: Se encarga de enviar formulario de form_tipo_horario ya sea para insertar o editar
	 * Retorna: Un objeto JSON informando si todo fue correcto
	 */
	window.submit_asignacion_horario = function () {
		$('#frm_asignacion_horario').on('submit', function (e) {
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: '/asistencia/guardar_asignacion_horario',
				data: new FormData(e.target),
				processData: false,
				contentType: false,
				cache: false,
				async: false,
			})
				.done(function (response) {
					if (typeof response.exito !== 'undefined') {
						$('#tabla_listar_asignacion_horarios').DataTable().draw();
						$('#asignacion-horario').modal('hide');
						alertaSimple('ÉXITO', response.exito, 'top-right', 'success', 4000);
					} else {
						alertaSimple('ERROR', response.errors, 'top-right', 'error', 4000);
					}
				})
				.fail(function (jqXHR, textStatus) {
					alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
				});
		});
	};

	/**
	 * Descripción  : Esta function se encarga de asignar Titúlo, Tamaño, onEscape a un Modal
	 * titulo       : Titúlo que desea que poner a su Modal.
	 * tamaño		: modal-lg, modal-sm.
	 * onEscape     : true si desea que la tecla escape cierre el Modal
	 * backdrop     : true si desea que el modal solo se cierre con botones
	 */
	function parametrosModal(idModal, titulo, tamano, onEscape, backdrop) {
		$(idModal + '-title').html(titulo);
		$(idModal + '-dialog').addClass(tamano);
		$(idModal).modal({
			backdrop: backdrop,
			keyboard: onEscape,
			focus: false,
			show: true,
		});
	}
});
