/** @format */

$(document).ready(function () {
	$.get({
		url: '/assets/js/asistencia/bootbox.js',
	});
	$.get({
		url: '/assets/js/asistencia/bootstrap-datepicker.min.js',
	});

	/**
	 * Uso :  Carga de datos a datatable
	 */
	$('#tabla_listar_dias_festivos')
		.DataTable({
			responsive: true,
			processing: true,
			serverSide: true,
			ajax: '/asistencia/ajax_listar_dias_festivos',
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
					searchable: false,
					orderable: false,
					targets: 3,
					data: null,
					render: function (data, type, row, meta) {
						return data[3] === 't'
							? "<a class='btn btn-success btn-xs btn-estado-dias-festivos text-white' data-toggle='tooltip' title='Desactivar' data='" +
									data[0] +
									"' value='f'>Activo</a>"
							: "<a class='btn btn-danger btn-xs btn-estado-dias-festivos text-white' data-toggle='tooltip' title='Activar' data='" +
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
							'" class="btn btn-warning btn-sm mdi mdi-tooltip-edit text-white btn-editar-dia-festivo" data-toggle="tooltip" title="Editar"></a><a data-value="' +
							data[0] +
							'" class="btn btn-danger btn-sm mdi mdi-delete-forever text-white btn-eliminar-dia-festivo" data-toggle="tooltip" title="Eliminar"></a></div>'
						);
					},
				},
			],
		})
		.on('click', 'a.btn-editar-dia-festivo', function (event) {
			$.ajax({
				method: 'post',
				url: '/asistencia/campos_dias_festivos',
				data: {
					id_dias_festivos: event.target.getAttribute('data-value'),
				},
				dataType: 'html',
			}).done(function (data) {
				parametrosModal('#dias-festivos', 'Editar día festivo', 'modal-md', false, false);

				$('#dias-festivos-body').html(data);

				jQuery('#fecha').datepicker({
					autoclose: true,
					format: 'yyyy-mm-dd',
					todayHighlight: true,
				});

				/**
				 * Accion: Salta cuando se envia el Formulario Modal que llamamos para agregar tipo horario
				 * Retorna: Un objeto JSON con el id insertado
				 */
				submit_dia_festivo();
			});
		})
		.on('click', 'a.btn-estado-dias-festivos', function (event) {
			let valor = event.target.getAttribute('value');
			var estado = '';
			valor == 'f' ? (estado = 'desactivar') : (estado = 'activar');
			bootbox.confirm('Estás seguro de ' + estado + ' el día festivo?', function (result) {
				if (result) {
					$.ajax({
						method: 'post',
						url: '/asistencia/estado_dia_festivo',
						data: {
							id_dias_festivos: event.target.getAttribute('data'),
							estado: event.target.getAttribute('value'),
						},
						dataType: 'JSON',
					})
						.done(function (response) {
							if (typeof response.exito !== 'undefined') {
								$('#tabla_listar_dias_festivos').DataTable().draw();

								alertaSimple('ÉXITO', response.exito, 'top-right', 'success', 4000);
							}
						})
						.fail(function (xhr) {
							alertaSimple('ERROR', 'No se puede activar o desactivar el día festivo!!!', 'top-right', 'error', 4000);
						});
				}
			});
		})
		.on('click', 'a.btn-eliminar-dia-festivo', function () {
			let id = event.target.getAttribute('data-value');
			bootbox.confirm('Estás seguro de ELIMINAR el día festivo?', function (result) {
				if (result) {
					$.ajax({
						method: 'post',
						url: '/asistencia/eliminar_dia_festivo',
						data: {
							id_dias_festivos: id,
						},
						dataType: 'JSON',
					})
						.done(function (response) {
							if (typeof response.exito !== 'undefined') {
								$('#tabla_listar_dias_festivos').DataTable().draw();

								alertaSimple('ÉXITO', response.exito, 'top-right', 'success', 4000);
							}
						})
						.fail(function (xhr) {
							alertaSimple('Error', 'No se puede eliminar el día festivo!!!', 'top-right', 'error', 4000);
						});
				}
			});
		});

	/**
	 * Descripción : Se encarga de cargar el formulario via ajax,
	 *               mostrar modal y guardar el horario.
	 */

	$('#btn_agregar_dia_festivo').on('click', function (e) {
		e.preventDefault();
		$.ajax({
			method: 'post',
			url: '/asistencia/campos_dias_festivos',
			data: {
				id_dias_festivos: null,
			},
			dataType: 'html',
		}).done(function (data) {
			parametrosModal('#dias-festivos', 'Agregar día festivo', 'modal-md', false, false);

			$('#dias-festivos-body').html(data);

			jQuery('#fecha').datepicker({
				autoclose: true,
				format: 'yyyy-mm-dd',
				todayHighlight: true,
			});

			/**
			 * Accion: Salta cuando se envia el Formulario Modal que llamamos para agregar tipo horario
			 * Retorna: Un objeto JSON con el id insertado
			 */
			submit_dia_festivo();
		});
	});

	window.submit_dia_festivo = function () {
		$('#frm_dias_festivos').on('submit', function (e) {
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: '/asistencia/guardar_dia_festivo',
				data: new FormData(e.target),
				processData: false,
				contentType: false,
				cache: false,
				async: false,
			})
				.done(function (response) {
					if (typeof response.exito !== 'undefined') {
						$('#tabla_listar_dias_festivos').DataTable().draw();
						$('#dias-festivos').modal('hide');
						alertaSimple('ÉXITO', response.exito, 'top-right', 'success', 4000);
					} else {
						alertaSimple('Por favor llene los campos!!!', response.errors, 'top-right', 'error', 4000);
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
