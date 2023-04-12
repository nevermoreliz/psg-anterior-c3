$(document).ready(function () {
	$('#datos').on('click', '.click', function (e) {
		var id_persona = $(this).attr('data-id-p');
		var id_planificacion_programa = $(this).attr('data-id-pp');
		var tipo = $(this).attr('data-tipo');
		var estado_inscripcion = $(this).attr('data-estado-inscripcion');
		var url = $(this).attr('data-url');
		var nombre = $(this).attr('data-nombre');
		switch (url) {
			case 'matriculacion/verifica_matriculas_restantes':
				$.post(url, {
					id_persona,
					id_planificacion_programa,
				}).done(function (respuesta) {
					if (typeof respuesta.exito !== 'undefined')
						$.post('/matriculacion/matriculacion_matricula_agregar', {
							id_persona,
							id_planificacion_programa,
						}).done(function (b) {
							$('#historial-body').html(b.vista.final_output);
							parametrosModal('#historial', 'Agregar Matricula ' + b.programa.nombre_programa, 'modal-xl', false, 'static');
						});
					else swal('INFORMACIÓN', respuesta.error, 'info');
				});
				break;
			case 'persona/campos_datos_personales':
				$.post(url, {
					id_persona,
				}).done(function (response) {
					parametrosModal('#modal', 'Actualizar Datos', 'modal-lg', false, true);
					$('#modal-body').html(response);
				});
				break;
			case 'matriculacion/matriculacion_inscripcion_actualizar':
				switch (estado_inscripcion) {
					case 'CONFIRMADO':
						$.post('inscripcion/inscripcion_verificar_datos', { id_persona, id_planificacion_programa }).done(function (r) {
							$('#historial-body').html(r.vista.final_output);
							parametrosModal('#historial', 'Verifique los Datos de la Pre Inscripcion ', 'modal-xl', false, 'static');
							$('#observar-inscripcion').on('click', function () {
								observar_inscripcion('matriculacion/matriculacion_inscripcion_actualizar', $(this).attr('data-id-p'), $(this).attr('data-id-pp'), 'OBSERVADO');
							});
							$('#confirmar-inscripcion').on('click', function () {
								swal(
									{
										title: '¿Esta seguro de ' + nombre + ' al participante?',
										text: 'Este cambio no podrá ser revertido, ya que se creara un usuario y contraseña para el POSGRADUANTE',
										type: 'warning',
										showCancelButton: true,
										confirmButtonColor: '#DD6B55',
										confirmButtonText: 'Aceptar',
										cancelButtonText: 'Cancelar',
										closeOnConfirm: false,
									},
									function () {
										$.post(url, { id_persona, id_planificacion_programa, estado_inscripcion }).done(function (r) {
											if (typeof r.exito !== 'undefined') {
												buscar_tarjeta(id_persona, id_planificacion_programa);
												swal('INFORMACIÓN', r.exito, 'success');
											} else swal('INFORMACIÓN', r.error, 'info');
										});
										$('#historial').modal('hide');
										$.post('/matriculacion/agregar_usuario', { id_persona, grupos: ['POSGRADUANTE'] }).done(function (r) {
											if (typeof r.exito !== 'undefined') {
												swal('INFORMACIÓN', r.exito, 'success');
											} else swal('INFORMACIÓN', r.error, 'error');
										});
									}
								);
							});
						});
						break;
					case 'DESCARTADO':
						bootbox.confirm({
							centerVertical: true,
							animate: false,
							size: 'large',
							onEscape: false,
							backdrop: 'static',
							locale: 'es',
							message: '¿Esta usted seguro que desea descartar esta inscripción, no se podra recuperar la información?',
							callback: function (result) {
								if (result) {
									$.post(url, {
										id_persona,
										id_planificacion_programa,
										estado_inscripcion,
									}).done(function (r) {
										if (typeof r.exito !== 'undefined') {
											$('#' + (parseInt(id_persona) + parseInt(id_planificacion_programa))).html('');
											swal('INFORMACIÓN', r.exito, 'success');
										} else swal('INFORMACIÓN', r.error, 'info');
									});
								}
							},
						});
						break;
					case 'OBSERVADO':
						observar_inscripcion(url, id_persona, id_planificacion_programa, estado_inscripcion);
						break;
					default:
						swal(
							{
								title: '¿Esta seguro de ' + nombre + ' al participante?',
								text: 'Este cambio no podrá ser revertido',
								type: 'warning',
								showCancelButton: true,
								confirmButtonColor: '#DD6B55',
								confirmButtonText: 'Aceptar',
								cancelButtonText: 'Cancelar',
								closeOnConfirm: false,
							},
							function () {
								$.post(url, {
									id_persona,
									id_planificacion_programa,
									estado_inscripcion,
								}).done(function (r) {
									if (typeof r.exito !== 'undefined') {
										buscar_tarjeta(id_persona, id_planificacion_programa);
										swal('INFORMACIÓN', r.exito, 'success');
									} else swal('INFORMACIÓN', r.error, 'info');
								});
							}
						);
						break;
				}

				break;
			case 'matriculacion/matriculacion_imprimir':
				$.post(url, {
					id_persona,
					id_planificacion_programa,
					tipo,
				}).done(function (r) {
					if (typeof r.exito !== 'undefined') {
						parametrosModal('#historial', 'Imprimir Ficha de Inscrición', 'modal-lg', false, 'static');
						$('#historial-body').html('<embed type="application/pdf" src="' + r.exito + '" width="100%" height="' + $(window).height() + '" style="border: none;" />');
					} else swal('ERROR', r.error, 'error');
				});
				break;
		}
	});
});

function buscar_tarjeta(id_persona, id_planificacion_programa) {
	$.post('/matriculacion/buscar_tarjeta', {
		id_persona,
		id_planificacion_programa,
	}).done(function (respuesta) {
		elemento = $('#' + (parseInt(id_persona) + parseInt(id_planificacion_programa)));
		elemento.html(respuesta.vista);
		$(elemento).children('div').removeClass();
	});
}
function observar_inscripcion(url, id_persona, id_planificacion_programa, estado_inscripcion) {
	bootbox.prompt({
		centerVertical: true,
		animate: false,
		inputType: 'textarea',
		size: 'large',
		locale: 'es',
		onEscape: false,
		closeButton: true,
		backdrop: 'static',
		title: 'Describa que observaciones tiene sobre esta Inscripción',
		callback: function (result) {
			if (typeof result == 'string' ? (new String(result).trim() !== '' ? true : false) : false) {
				$.post(url, { id_persona, id_planificacion_programa, estado_inscripcion, observacion_inscripcion: result.trim() }).done(function (r) {
					if (typeof r.exito !== 'undefined') {
						buscar_tarjeta(id_persona, id_planificacion_programa);
						swal('INFORMACIÓN', r.exito, 'success');
						$('#historial').modal('hide');
					} else swal('INFORMACIÓN', r.error, 'info');
				});
			}
		},
	});
}
!(function ($) {
	'use strict';
	var SweetAlert = function () {};

	(SweetAlert.prototype.init = function () {}), ($.SweetAlert = new SweetAlert()), ($.SweetAlert.Constructor = SweetAlert);
})(window.jQuery),
	(function ($) {
		'use strict';
		$.SweetAlert.init();
	})(window.jQuery);

		