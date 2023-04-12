/** @format */

$(document).ready(function () {
	$.get({ url: '/assets/js/asistencia/bootbox.js' });
	$.get({ url: '/assets/js/asistencia/bootstrap-clockpicker.min.js' });
	/**
	 * Uso :  Carga de datos a datatable
	 */
	$('#tabla_listar_horarios')
		.DataTable({
			responsive: true,
			processing: true,
			serverSide: true,
			ajax: '/asistencia/ajax_listar_horarios',
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
					targets: 1,
					data: null,
					render: function (data, type, row, meta) {
						return data[1] === 'MT' ? 'MEDIO TIEMPO' : 'TIEMPO COMPLETO';
					},
				},
				{
					searchable: false,
					orderable: false,
					targets: 6,
					data: null,
					render: function (data, type, row, meta) {
						return data[6] === 't'
							? "<a class='btn btn-success btn-xs btn-estado-horario text-white' data-toggle='tooltip' title='Desactivar' data='" +
									data[0] +
									"' value='f'>Activo</a>"
							: "<a class='btn btn-danger btn-xs btn-estado-horario text-white' data-toggle='tooltip' title='Activar' data='" +
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
							'<a data-value="' +
							data[0] +
							'" class="btn btn-warning btn-sm mdi mdi-tooltip-edit text-white btn-editar-horario" data-toggle="tooltip" title="Editar"></a>'
						);
					},
				},
			],
		})
		.on('click', 'a.btn-editar-horario', function (event) {
			$.ajax({
				method: 'post',
				url: '/asistencia/campos_tipo_horario',
				data: { id_tipo_horario: event.target.getAttribute('data-value') },
				dataType: 'html',
			}).done(function (data) {
				parametrosModal('#tipo-horario', 'Editar tipo horario', 'modal-md', false, false);

				$('#tipo-horario-body').html(data);

				// Cálculo de la carga horaria
				calcular_carga_horaria();

				// Inicializar clockpicker para los campo hora_inicio y hora_fin
				$('.clockpicker').clockpicker();

				/**
				 * Accion: Salta cuando se envia el Formulario Modal que llamamos para agregar tipo horario
				 * Retorna: Un objeto JSON con el id insertado
				 */
				submit_tipo_horario();
			});
		})
		.on('click', 'a.btn-estado-horario', function (event) {
			let valor = event.target.getAttribute('value');
			var estado = '';
			valor == 'f' ? (estado = 'desactivar') : (estado = 'activar');
			bootbox.confirm('Estás seguro de ' + estado + ' el tipo horario?', function (result) {
				if (result) {
					$.ajax({
						method: 'post',
						url: '/asistencia/estado_tipo_horario',
						data: {
							id_tipo_horario: event.target.getAttribute('data'),
							estado: event.target.getAttribute('value'),
						},
						dataType: 'json',
					})
						.done(function (response) {
							if (typeof response.exito !== 'undefined') {
								$('#tabla_listar_horarios').DataTable().draw();
								alertaSimple('ÉXITO', response.exito, 'top-right', 'success', 4000);
							}
						})
						.fail(function (xhr) {
							alertaSimple('ERROR', 'No se puede activar o desactivar el horario!!!', 'top-right', 'error', 4000);
						});
				}
			});
		});

	/**
	 * Descripción : Se encarga de cargar el formulario via ajax,
	 *               mostrar modal y guardar el horario.
	 */

	$('#btn_agregar_horario').on('click', function (e) {
		e.preventDefault();
		$.ajax({
			method: 'post',
			url: '/asistencia/campos_tipo_horario',
			data: { id_tipo_horario: null },
			dataType: 'html',
		}).done(function (data) {
			parametrosModal('#tipo-horario', 'Agregar tipo horario', 'modal-md', false, false);

			$('#tipo-horario-body').html(data);

			// Cálculo de la carga horaria
			calcular_carga_horaria();

			// Inicializar clockpicker para los campo hora_inicio y hora_fin
			$('.clockpicker').clockpicker();

			/**
			 * Accion: Salta cuando se envia el Formulario Modal que llamamos para agregar tipo horario
			 * Retorna: Un objeto JSON con el id insertado
			 */
			submit_tipo_horario();
		});
	});

	/**
	 * Accion: Se encarga de enviar formulario de form_tipo_horario ya sea para insertar o editar
	 * Retorna: Un objeto JSON informando si todo fue correcto
	 */
	window.submit_tipo_horario = function () {
		$('#frm_tipo_horario').on('submit', function (e) {
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: '/asistencia/guardar_tipo_horario',
				data: new FormData(e.target),
				processData: false,
				contentType: false,
				cache: false,
				async: false,
			})
				.done(function (response) {
					if (typeof response.exito !== 'undefined') {
						$('#tabla_listar_horarios').DataTable().draw();
						$('#tipo-horario').modal('hide');
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
	 * Accion: Se encarga de  de enviar la carga horaria
	 * Retorna: carga horaria calculado
	 */
	window.calcular_carga_horaria = function () {
		$('#hora_inicio').on('change', function (e) {
			if ($('#hora_inicio').val().length > 0) {
				calculardiferencia();
			}
		});

		$('#hora_fin').on('change', function (e) {
			e.preventDefault();
			if ($('#hora_fin').val().length > 0) {
				calculardiferencia();
			}
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

	/**
	 * Uso  : Funciones para calcular la carga horaria
	 */
	function newDate(partes) {
		var date = new Date(0);
		date.setHours(partes[0]);
		date.setMinutes(partes[1]);
		return date;
	}

	function prefijo(num) {
		return num < 10 ? '0' + num : num;
	}

	function calculardiferencia() {
		var dateDesde = newDate($('#hora_inicio').val().split(':'));
		var dateHasta = newDate($('#hora_fin').val().split(':'));

		var minutos = (dateHasta - dateDesde) / 1000 / 60;
		var horas = Math.floor(minutos / 60);
		minutos = minutos % 60;

		$('#carga_horaria').val(parseInt(prefijo(horas) + '.' + prefijo(minutos)));
	}
});
