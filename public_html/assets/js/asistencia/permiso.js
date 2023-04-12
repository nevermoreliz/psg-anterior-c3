/** @format */

$(document).ready(function () {
	//Librerias
	$.get({
		url: '/assets/js/asistencia/bootbox.js',
	});
	$.get({
		url: '/assets/js/asistencia/bootstrap-datepicker.min.js',
	});

	capturar_evento_tecla_beca();

	capturar_evento_tecla_pasante();

	// Rango de fecha
	$('#reportrange').click(function (e) {
		e.preventDefault();
		e.stopPropagation();
	});

	jQuery('#reportrange').daterangepicker(
		{
			ranges: {},
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

	// Realiar  solicitud de permiso
	$('#form_permiso').on('submit', function (e) {
		e.preventDefault();

		if ($('#fecha').val().length == 0) {
			alertaSimple('Error', '<li>Ingrese su la fecha de permiso  !!!</li>', 'top-right', 'error', 4000);
			$('#fecha').focus();
			return 0;
		} else if ($('#motivo').val().length >= 0 && $('#motivo').val().length <= 5) {
			alertaSimple('Error', '<li>Ingrese el motivo del permiso!!!</li>', 'top-right', 'error', 4000);
			$('#motivo').focus();
			return 0;
		} else if ($('#codigo_archivo_personal').val().length == 0) {
			alertaSimple('Error', '<li>Ingrese su código personal !!!</li>', 'top-right', 'error', 4000);
			$('#codigo_archivo_personal').focus();
			return 0;
		} else {
			// Una vez validados los campos se verifica que el usuario este registrado
			$.ajax({
				type: 'post',
				url: '/asistencia/verificar_registro_codigo_personal',
				data: $('#form_permiso').serialize(),
				dataType: 'JSON',
			})
				.done(function (data) {
					// Verificamos sus asignacion de horario
					$.ajax({
						type: 'POST',
						url: '/asistencia/verificar_asignaciones_horario',
						data: $('#form_permiso').serialize(),
						dataType: 'JSON',
					}).done(function (response) {
						let codigo_archivo_personal = $('#codigo_archivo_personal').val();
						let tipo_marcado = '';
						let fecha = $('#fecha').val();
						let id_asignacion_horario = response.id_asignacion_horario;
						let motivo = $('#motivo').val();

						if (response.asignaciones == 1) {
							// El usuario tiene una sola asignacion
							tipo_marcado = $('#tipo_marcado').val();
							verificar_permiso(codigo_archivo_personal, fecha, response.tipo_marcado, response.id_asignacion_horario, motivo);
						} else {
							//El usuario tiene muchas asignaciones;
							if ($('#tipo_marcado').val().length == 0) {
								alertaSimple('Error', '<li>Por favor seleccione el tipo marcado!!!</li>', 'top-right', 'error', 4000);
							} else {
								tipo_marcado = $('#tipo_marcado').val();
								verificar_permiso(codigo_archivo_personal, fecha, tipo_marcado, null, motivo);
							}
						}
					});
				})
				.fail(function (data) {
					alertaSimple('Error', '<li>No esta registrado en el sistema!!!</li>', 'top-right', 'error', 4000);
				});
		}
	});

	var id_asignacion_horario = '';

	// Se verifica el id asignacion horario
	function verificar_permiso(codigo_archivo_personal, fecha, tipo_marcado, id_asignacion_horario, motivo) {
		var datos = new FormData();
		datos.append('codigo_archivo_personal', codigo_archivo_personal);
		datos.append('tipo_marcado', tipo_marcado);

		if (id_asignacion_horario == null) {
			$.ajax({
				type: 'POST',
				url: '/asistencia/buscar_id_asignacion_horario',
				data: datos,
				dataType: 'JSON',
				processData: false,
				contentType: false,
			}).done(function (response) {
				imprimir_permiso(codigo_archivo_personal, fecha, tipo_marcado, response.id_asignacion_horario, motivo);
			});
		} else {
			imprimir_permiso(codigo_archivo_personal, fecha, tipo_marcado, id_asignacion_horario, motivo);
		}
	}

	// se imprime el permiso en el modal
	function imprimir_permiso(codigo_archivo_personal, fecha, tipo_marcado, id_asignacion_horario, motivo) {
		$('#reporte_permiso').prop(
			'src',
			'https://posgrado.upea.bo/asistencia/reporte_permiso?cod=' +
				codigo_archivo_personal +
				'&fecha=' +
				fecha +
				'&tipo_marcado=' +
				tipo_marcado +
				'&motivo=' +
				motivo
		);
		$('#imprimir_permiso_modal').modal('show');

		$('.btn-confirmar-permiso').attr('data-id', id_asignacion_horario);
		$('.btn-confirmar-permiso').attr('data-date', fecha);
	}

	// Confirmar el dia de permiso
	$('.btn-confirmar-permiso').on('click', function () {
		let id = $(this).attr('data-id');
		let fecha = $(this).attr('data-date');

		if (id.length > 0 && fecha.length > 0) {
			bootbox.confirm('Estás seguro de perdir permiso el : ' + fecha, function (result) {
				if (result) {
					// se realiza el permiso
					let fechaahora = fecha + ' ' + moment().format('HH:mm:ss');
					$.ajax({
						type: 'POST',
						url: '/asistencia/agregar_permiso',
						data: { id_asignacion_horario: id, fecha: fechaahora },
						dataType: 'JSON',
					})
						.done(function (response) {
							if (typeof response.exito !== 'undefined') {
								alertaSimple('ÉXITO', response.exito, 'top-right', 'success', 4000);
								limpiar();
							}
						})
						.fail(function (data) {
							alertaSimple('Error', '<li>Error al pedir permiso!!!</li>', 'top-right', 'error', 4000);
							limpiar();
						});
				}
			});
		} else {
			alertaSimple('Error', '<li>Error al pedir permiso!!!</li>', 'top-right', 'error', 4000);
		}
	});

	/**
	 * Uso: Cancelar permiso
	 */
	$('.btn-cancalar-permiso').on('click', function () {
		if ($('#fecha').val().length == 0) {
			alertaSimple('Error', '<li>Ingrese la fecha de permiso para cancelar !!!</li>', 'top-right', 'error', 4000);
			$('#fecha').focus();
			return 0;
		} else if ($('#codigo_archivo_personal').val().length == 0) {
			alertaSimple('Error', '<li>Ingrese su código personal !!!</li>', 'top-right', 'error', 4000);
			$('#codigo_archivo_personal').focus();
			return 0;
		} else {
			let fecha = $('#fecha').val();
			let cod = $('#codigo_archivo_personal').val();
			$.ajax({
				type: 'POST',
				url: '/asistencia/verificar_asignaciones_horario',
				data: { codigo_archivo_personal: cod },
				dataType: 'JSON',
			}).done(function (response) {
				if (response.asignaciones == 1) {
					// El usuario tiene una asignacion de horario
					cancelar_permiso(cod, response.id_asignacion_horario, response.tipo_marcado, fecha);
				} else if (response.asignaciones > 1) {
					// El usuario tiene muchas asignaciones
					if ($('#tipo_marcado').val().length == 0) {
						alertaSimple('Error', '<li>Por favor seleccione el tipo marcado!!!</li>', 'top-right', 'error', 4000);
					} else {
						cancelar_permiso(cod, null, $('#tipo_marcado').val(), fecha);
					}
				} else {
					// El usuario no tienes asignaciones
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
		}
	});

	// funciton cancelar permiso
	function cancelar_permiso(cod, id_asignacion_horario, tipo_marcado, fecha) {
		var datos = new FormData();
		datos.append('codigo_archivo_personal', cod);
		datos.append('tipo_marcado', tipo_marcado);
		if (id_asignacion_horario == null) {
			$.ajax({
				type: 'POST',
				url: '/asistencia/buscar_id_asignacion_horario',
				data: datos,
				dataType: 'JSON',
				processData: false,
				contentType: false,
			})
				.done(function (response) {
					cancelar_permiso_true(cod, response.id_asignacion_horario, tipo_marcado, fecha);
				})
				.fail(function () {
					alertaSimple('Error', '<li>No tiene asignacion de horario!!!</li>', 'top-right', 'error', 4000);
					limpiar();
				});
		} else {
			cancelar_permiso_true(cod, id_asignacion_horario, tipo_marcado, fecha);
		}
	}

	// buscar el id fecha_asistencia a eliminar
	function cancelar_permiso_true(cod, id_asignacion_horario, tipo_marcado, fecha) {
		$.ajax({
			type: 'POST',
			url: '/asistencia/buscar_permiso',
			data: {
				id_asignacion_horario: id_asignacion_horario,
				fecha: fecha,
				tipo_marcado: tipo_marcado,
			},
			dataType: 'JSON',
		}).done(function (response) {
			if (typeof response.error !== 'undefined') {
				alertaSimple('Error', response.error, 'top-right', 'error', 4000);
				limpiar();
			} else {
				bootbox.confirm('Estás seguro de cancelar el permiso solicitado', function (result) {
					if (result) {
						$.ajax({
							type: 'POST',
							url: '/asistencia/eliminar_permiso',
							data: { id_fecha_asistencia: response.id_fecha_asistencia },
							dataType: 'JSON',
						}).done(function (response) {
							if (typeof response.exito !== 'undefined') {
								alertaSimple('CORRECTO', response.exito, 'top-right', 'success', 4000);
								limpiar();
							}
							limpiar();
						});
					} else {
						limpiar();
					}
				});
			}
		});
	}

	// Fecha de permiso
	// jQuery("#fecha").datepicker({
	//   autoclose: true,
	//   format: "yyyy-mm-dd",
	//   todayHighlight: true
	// });

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

	$(document).on('click', '.btn-cerrar', function () {
		$('#codigo_archivo_personal').val('');
		$('#tipo_marcado').val('');
		$('#fecha').val('');
		$('#motivo').val('');
		$('.btn-confirmar-permiso').attr('data-id', '');
		$('.btn-confirmar-permiso').attr('data-date', '');
	});

	function limpiar() {
		$('#codigo_archivo_personal').val('');
		$('#tipo_marcado').val('');
		$('#fecha').val('');
		$('#motivo').val('');
		$('.btn-confirmar-permiso').attr('data-id', '');
		$('.btn-confirmar-permiso').attr('data-date', '');
	}
});
