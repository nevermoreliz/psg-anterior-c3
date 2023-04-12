/** @format */

$(document).ready(function () {
	//Librerias
	$.get({ url: '/assets/js/asistencia/bootbox.js' });

	capturar_evento_tecla_beca();

	capturar_evento_tecla_pasante();

	// Focus
	$('#codigo_archivo_personal').focus();

	//Marcado ocurre cuando la tecla enter sale al presionar
	$('#codigo_archivo_personal').on('keyup', function (e) {
		$('form').bind('keypress', function (e) {
			if (e.keyCode == 13) {
				return false;
			}
		});

		var code = e.keyCode ? e.keyCode : e.which;
		if (code == 13) {
			e.preventDefault();
			e.stopPropagation();

			if ($('#codigo_archivo_personal').val().length == 0) {
				alertaSimple('Error', '<li>Ingrese su código personal !!!</li>', 'top-right', 'error', 4000);
				$('#codigo_archivo_personal').focus();
				return 0;
			} else {
				//Verificamos si el usuario esta registrado
				$.ajax({
					type: 'post',
					url: '/asistencia/verificar_registro_codigo_personal',
					data: $('#form_asistencia_marcado').serialize(),
					dataType: 'json',
				})
					.done(function (data) {
						// Verificamos sus asignacion de horario
						$.ajax({
							type: 'POST',
							url: '/asistencia/verificar_asignaciones_horario',
							data: $('#form_asistencia_marcado').serialize(),
							dataType: 'json',
						}).done(function (response) {
							// Se captura el codigo
							let cod = $('#codigo_archivo_personal').val();
							if (response.asignaciones == 1) {
								// El usuario tiene una asignacion de horario
								realizar_marcado(cod, response.tipo_marcado, response.id_asignacion_horario, response.turno);
							} else if (response.asignaciones > 1) {
								// El usuario tiene muchas asignaciones
								if ($('#tipo_marcado').val().length == 0) {
									alertaSimple('Error', '<li>Por favor seleccione el tipo marcado!!!</li>', 'top-right', 'error', 4000);
								} else {
									realizar_marcado(cod, $('#tipo_marcado').val(), null, null);
								}
							} else {
								// El usuario no tienes asignaciones
								alertaSimple(
									'Error',
									'<li>No tiene asignaciones de horario!!!</li> <li>O su asignación de horario esta desactivo!!!</li>',
									'top-right',
									'error',
									4000
								);
								limpiar();
							}
						});
						// Fin verificacion asignacion horario
					})
					.fail(function (xhr) {
						alertaSimple('Error', '<li>No se encuentra registrado en el sistema!!!</li>', 'top-right', 'error', 4000);
						limpiar();
					});
			}
		}
	});

	// Limpiar el campo codigo
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

	function realizar_marcado(cod, tipo_marcado, id_asignacion_horario, turno) {
		var datos = new FormData();
		datos.append('codigo_archivo_personal', cod);
		datos.append('tipo_marcado', tipo_marcado);
		if (id_asignacion_horario == null) {
			$.ajax({
				type: 'POST',
				url: '/asistencia/buscar_id_asignacion_horario',
				data: datos,
				dataType: 'json',
				processData: false,
				contentType: false,
			}).done(function (response) {
				verificar_salida_entrada(cod, tipo_marcado, response.id_asignacion_horario, response.turno);
			});
		} else {
			verificar_salida_entrada(cod, tipo_marcado, id_asignacion_horario, turno);
		}
	}

	function verificar_salida_entrada(cod, tipo_marcado, id_asignacion_horario, turno) {
		// Se verifica si el usuario ha marcado
		$.ajax({
			type: 'POST',
			url: '/asistencia/verificar_marcado_usuario',
			data: { id_asignacion_horario: id_asignacion_horario },
			dataType: 'json',
		}).done(function (response) {
			// SE REALIZA EL MARCADO DE ENTRADA
			if (response.numero_registros == 0) {
				// Validaciones para el tiempo completo
				if (turno == 'TC') {
					if (
						(moment().format('HH:mm') >= '07:00' && moment().format('HH:mm') <= '10:30') ||
						(moment().format('HH:mm') >= '13:00' && moment().format('HH:mm') <= '15:30')
					) {
						// Realizar el marcado para los usuarios de tiempo completo
						realizar_marcado_entrada(id_asignacion_horario);
					} else {
						alertaSimple('Error', '<li>No está en los horarios de entrada</li>', 'top-right', 'error', 4000);
						limpiar();
					}
				} else {
					// Validaciones para medio tiempo
					let entrada = response.hora_entrada.split(':');
					let hora_entrad = formatearHora(entrada[0] - 1, entrada[1]);

					if (moment().format('HH:mm') >= hora_entrad && moment().format('HH:mm') <= response.hora_salida) {
						realizar_marcado_entrada(id_asignacion_horario);
					} else {
						alertaSimple('Error', '<li>No está en los horarios de entrada</li>', 'top-right', 'error', 4000);
						limpiar();
					}
				}
			} else {
				// SE REALIZA EL MARCADO DE SALIDA
				// Validacion para los de tiempo completo
				if (turno == 'TC') {
					if (
						moment().format('HH:mm') >= '11:00' &&
						moment().format('HH:mm') <= '14:30' &&
						moment().format('HH:mm') >= '17:00' &&
						moment().format('HH:mm') <= '19:30'
					) {
						realizar_marcardo_salida(response.id_fecha_asistencia);
					} else {
						bootbox.confirm('¿Estás seguro de salir fuera de horario?', function (result) {
							if (result) {
								realizar_marcardo_salida(response.id_fecha_asistencia);
							}
						});
					}
				} else {
					// Validaciones para medio tiempo salida
					if (moment().format('HH:mm') >= response.hora_salida) {
						realizar_marcardo_salida(response.id_fecha_asistencia);
					} else {
						bootbox.confirm('¿Estás seguro de salir fuera de horario?', function (result) {
							if (result) {
								realizar_marcardo_salida(response.id_fecha_asistencia);
							}
						});
					}
				}
			}
		});
	}

	/**
	 * Uso : Se realiza el marcado
	 * @param {id_asignacion_horario}
	 */
	function realizar_marcado_entrada(id) {
		$.ajax({
			type: 'POST',
			url: '/asistencia/marcado_entrada',
			data: { id_asignacion_horario: id },
			dataType: 'json',
		})
			.done(function (response) {
				if (typeof response.exito !== 'undefined') {
					alertaSimple('ÉXITO', response.exito, 'top-right', 'success', 4000);
				}
				$('#tipo_marcado').val('');
				limpiar();
			})
			.fail(function (xhr) {
				alertaSimple('Error', '<li>Error al guardar el marcado entrada!!!</li>', 'top-right', 'error', 4000);
			});
	}

	/**
	 * Uso  Marcado de salida del usuario
	 *
	 */
	function realizar_marcardo_salida(id) {
		bootbox.prompt({
			title: 'Ingrese su actividad del horario!!!',
			callback: function (result) {
				$.ajax({
					type: 'post',
					url: '/asistencia/marcado_salida',
					data: {
						id_fecha_asistencia: id,
						descripcion: result,
					},
					dataType: 'json',
				}).done(function (response) {
					if (typeof response.exito !== 'undefined') {
						alertaSimple('ÉXITO', response.exito, 'top-right', 'success', 4000);
					}
					limpiar();
				});
			},
		});
	}

	/**
	 * Uso: se formatea hora con dos digitos
	 * Retorna: la hora formateada
	 */
	//no usado
	function formatearHora(hora, minutos) {
		if (hora >= 6 && hora <= 9) {
			return '0' + hora + ':' + minutos;
		} else {
			return hora + ':' + minutos;
		}
	}
});
