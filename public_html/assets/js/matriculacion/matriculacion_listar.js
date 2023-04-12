$(document).ready(function () {
	window.ajax_listar_posgraduantes = function () {
		var gestion = $('#id_gestion option:selected').text();
		var grado_academico = $('#id_grado_academico option:selected').text();
		var tipo_programa = $('#id_tipo_programa option:selected').text();
		var numero_version = $('#version_programa option:selected').text();
		var texto = $('#texto').val();

		$.post('/matriculacion/ajax_listar_posgraduantes', { gestion, grado_academico, tipo_programa, numero_version, texto, limit, start }, function (respuesta) {
			if (typeof respuesta.exito !== 'undefined') {
				$('#datos').append(respuesta.vista);
				$('#datos_vacios').empty();
				accion = 'inactivo';
			} else if (typeof respuesta.error !== 'undefined') {
				$('#datos_vacios').html('<p class="text-danger">No se encontraron más resultados...</code></p>');
				accion = 'activo';
			}
		}).fail(function (jqXHR, textStatus) {
			alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
			console.log(jqXHR.responseText);
		});
	};
	$('.select2').select2();
	var texto_gestion = '';
	var limit = 4;
	var start = 0;
	var accion = 'inactivo';
	var controladorTiempo = '';

	function lazzy_loader(limit) {
		var salida_html = '';
		for (var count = 0; count < limit; count++) {
			salida_html += '<div class="post_data">';
			salida_html += '<p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p>';
			salida_html += '<p><span class="content-placeholder" style="width:100%; height: 100px;">&nbsp;</span></p>';
			salida_html += '</div>';
		}
		$('#datos_vacios').html(salida_html);
	}
	lazzy_loader(limit);

	function iniciar_datos() {
		ajax_listar_posgraduantes();
	}
	if (accion == 'inactivo') {
		accion = 'activo';
		iniciar_datos();
	}
	$(window).scroll(function () {
		if ($(window).scrollTop() + $(window).height() > $('#datos').height() && accion == 'inactivo') {
			lazzy_loader(limit);
			accion = 'activo';
			start = start + limit;
			setTimeout(function () {
				ajax_listar_posgraduantes();
			}, 1000);
		}
	});

	$('#page-content')
		.on('keyup', '#texto', function (e) {
			start = 0;
			$('#datos').empty();
			$('#datos_vacios').empty();
			action = 'inactive';
			clearTimeout(controladorTiempo);
			controladorTiempo = setTimeout(ajax_listar_posgraduantes, 2000);
		})
		.on('change', '#id_gestion, #id_grado_academico, #id_tipo_programa, #version_programa', function (e) {
			start = 0;
			$('#datos').empty();
			$('#datos_vacios').empty();
			action = 'inactive';
			ajax_listar_posgraduantes();
		});
	$.get('/assets/js/matriculacion/matriculacion_funciones_globales.js');

	$('#datos').on('click', '.matriculacion_imprimir_matricula', function () {
		$.post('/matriculacion/matriculacion_imprimir_matricula', { id_matricula_gestion: $(this).attr('data-id-matricula-gestion') })
			.done(function (respuesta) {
				if (typeof respuesta.exito !== 'undefined') {
					parametrosModal('#historial', 'Imprimir Matricula', 'modal-lg', false, true);
					$('#historial-body').html('<embed type="application/pdf" src="' + respuesta.exito + '" width="100%" height="' + $(window).height() + '" style="border: none;" />');
				} else alertaSimple('ERROR', respuesta.error, 'top-right', 'warning', 2000);
			})
			.fail(function (jqXHR, textStatus) {
				console.log(jqXHR.responseText);
			});
	});

	$('#datos').on('click', '.editar-matricula', function () {
		$.ajax({
			url: '/matriculacion/matriculacion_matricula_editar',
			data: { id_matricula_gestion: $(this).attr('data-id-matricula-gestion'), id_persona: $(this).attr('data-id-persona'), id_planificacion_programa: $(this).attr('data-id-planificacion-programa') },
			type: 'post',
		})
			.done(function (respuesta) {
				$('#historial-body').html(respuesta.vista.final_output);
				parametrosModal('#historial', 'Editar Matricula ' + respuesta.programa.nombre_programa, 'modal-lg', false, true);
				$('#actualizar-matricula').on('click', function (e) {
					$.ajax({
						url: '/matriculacion/matriculacion_matricula_actualizar',
						type: 'post',
						data: $('#form_matricula_editar').serialize(),
					}).done(function (respuesta) {
						if (typeof respuesta.exito !== 'undefined') {
							alertaSimple('INFORMACIÓN', respuesta.exito, 'top-right', 'info', 2000);
							$('#historial').modal('hide');
							$.post('/matriculacion/buscar_tarjeta', {
								id_persona: $('#actualizar-matricula').attr('data-id-persona'),
								id_planificacion_programa: $('#actualizar-matricula').attr('data-id-planificacion-programa'),
							}).done(function (respuesta) {
								elemento = $('#' + (parseInt($('#actualizar-matricula').attr('data-id-persona')) + parseInt($('#actualizar-matricula').attr('data-id-planificacion-programa'))));
								elemento.html(respuesta.vista);
								$(elemento).children('div').removeClass();
							});
						} else {
							alertaSimple('ERROR', respuesta.error, 'top-right', 'warning', 2000);
						}
					});
				});
			})
			.fail(function (jqXHR, textStatus) {
				alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
				console.log(jqXHR.responseText);
			});
	});

	// $('#datos').on('click', '.datos-personales', function () {
	// 	$.ajax({
	// 		method: 'POST',
	// 		url: '/persona/campos_datos_personales',
	// 		data: {
	// 			id_persona: $(this).attr('data-id-persona'),
	// 		},
	// 		dataType: 'html',
	// 	}).done(function (response) {
	// 		parametrosModal('#modal', 'Actualizar Datos', 'modal-lg', false, true);
	// 		$('#modal-body').html(response);
	// 	});
	// });
});
