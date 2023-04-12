/** @format */

$(document).ready(function () {
	$('#codigo_archivo_personal').focus();

	var fechaInicial = moment().format('YYYY-MM-DD');
	var fechaFinal = moment().format('YYYY-MM-DD');

	capturar_evento_tecla_beca();

	capturar_evento_tecla_pasante();

	// Rango de fecha
	$('#reportrange').click(function (e) {
		e.preventDefault();
		e.stopPropagation();
	});

	jQuery('#reportrange').daterangepicker(
		{
			ranges: {
				Hoy: [moment(), moment()],
				Ayer: [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Últimos 7 días': [moment().subtract(6, 'days'), moment()],
				'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
				'Este mes': [moment().startOf('month'), moment().endOf('month')],
				'Último mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
			},
			start: moment(),
			end: moment(),
			locale: {
				separator: ' - ',
				applyLabel: 'Aplicar',
				cancelLabel: 'Cancelar',
				fromLabel: 'de',
				toLabel: 'hasta',
				customRangeLabel: 'Rango personalizado',
			},
		},
		function (start, end) {
			$('#reportrange span').html(start.format('DD-MM-YYYY') + ' <i class="fa fa-minus"></i> ' + end.format('DD-MM-YYYY'));

			fechaInicial = start.format('YYYY-MM-DD');

			fechaFinal = end.format('YYYY-MM-DD');
		}
	);

	// Impresion de la asistencia de usuarios
	$('#form_reporte_asistencia').submit(function (e) {
		e.preventDefault();
		e.stopPropagation();

		// Validacion
		if ($('#codigo_archivo_personal').val().length == 0) {
			alertaSimple('Error', '<li>Ingrese su codigo personal !!!</li>', 'top-right', 'error', 4000);
			$('#codigo_archivo_personal').focus();
			return 0;
		} else {
			//Verificamos si el usuario esta registrado
			$.ajax({
				type: 'post',
				url: '/asistencia/verificar_registro_codigo_personal',
				data: $('#form_reporte_asistencia').serialize(),
				dataType: 'JSON',
			})
				.done(function (data) {
					// Verificamos sus asignacion de horario
					$.ajax({
						type: 'POST',
						url: '/asistencia/verificar_asignaciones_horario',
						data: {
							codigo_archivo_personal: $('#codigo_archivo_personal').val(),
						},
						dataType: 'JSON',
					}).done(function (response) {
						var tipo_marcado = '';
						var data = $('#codigo_archivo_personal').val();
						if (response.asignaciones == 1) {
							tipo_marcado = response.tipo_marcado;
							imprimir_reporte_asistencia(data, tipo_marcado);
						} else if (response.asignaciones > 0) {
							// El usuario tiene muchas asignaciones
							if ($('#tipo_marcado').val().length == 0) {
								alertaSimple('Error', '<li>Por favor seleccione el tipo marcado!!!</li>', 'top-right', 'error', 4000);
							} else {
								tipo_marcado = $('#tipo_marcado').val();
								imprimir_reporte_asistencia(data, tipo_marcado);
							}
						} else {
							alertaSimple(
								'Error',
								'<li>No tiene asignaciones de horario!!!</li> <li>O su asignación de horario esta desactivo!!!</li>',
								'top-right',
								'#ff6849',
								'error',
								4000
							);
							limpiar();
						}
					});
				})
				.fail(function (response) {
					limpiar();
					alertaSimple('Error', '<li>No se encuentra registrado en el sistema !!!</li>', 'top-right', 'error', 4000);
				});
		}
	});

	// Limpiar los campos del formulario
	function limpiar() {
		$('#codigo_archivo_personal').val('');
		$('#codigo_archivo_personal').focus();
		$('#tipo_marcado').val('');
		return 0;
	}

	// Capturar teclado evento b con flecha arriba
	function capturar_evento_tecla_beca() {
		window.addEventListener(
			'keyup',
			function (event) {
				if (event.code == 'ArrowUp') {
					$('#tipo_marcado').val('BECA');
				}
			},
			false
		);
	}

	// Capturar teclado evento b con flecha abajo
	function capturar_evento_tecla_pasante() {
		window.addEventListener(
			'keyup',
			function (event) {
				if (event.code == 'ArrowDown') {
					$('#tipo_marcado').val('PASANTE');
				}
			},
			false
		);
	}

	// Se imprime el pdf en un modal
	function imprimir_reporte_asistencia(codigo_archivo_personal, tipo_marcado) {
		$('#reporte_pdf').prop(
			'src',
			window.location.origin +
				'/asistencia/reporte_asistencia_usuario?data=' +
				codigo_archivo_personal +
				'&tipo_marcado= ' +
				tipo_marcado +
				'&fechaInicial=' +
				fechaInicial +
				'&fechaFinal=' +
				fechaFinal
		);
		$('#imprimir_reporte_modal').modal('show');
		limpiar();
	}
});
