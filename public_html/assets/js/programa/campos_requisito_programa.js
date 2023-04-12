/** @format */

$(document).ready(function () {
	$.get('/assets/js/programa/jquery.autocomplete.js').done(function () {
		$('#descripcion_requisito_textarea').autocomplete({
			serviceUrl: '/programa/ajax_requisitos/?id_planificacion_programa=' + $('#id_planificacion_programa').val(),
			onSelect: function (suggestion) {
				//alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
				$('.autocomplete-selected').html('Seleccionado: ' + suggestion.data);
				$('#estado_requisito_select').val(suggestion.estado_requisito);
				$('#estado_requisito_select').attr('disabled', true);

				$('[name="id_requisito"]').val(suggestion.data);
			},
			onHint: function (hint) {
				console.log('onHint');
			},
			onInvalidateSelection: function () {
				$('.autocomplete-selected').html('Seleccionado: Ninguno');
				$('#estado_requisito_select').val('');
				$('#estado_requisito_select').attr('disabled', false);
				$('[name="id_requisito"]').val('');
			},
			onSearchComplete: function (query, suggestions) {
				console.log('onSearchComplete');
			},
		});
	});
	$('[name="estado_requisito_programa"]').change(function () {
		//if ($(this).is(':checked')) {
		//	$.ajax({
		//		url: '/programa/actualizar_requisitos_programa',
		//		type: 'POST',
		//		data: { id_requisito_programa: event.target.getAttribute('data-value'), estado_requisito_programa: 'ACTIVO' },
		//		dataType: 'html',
		//	})
		//		.done(function (data) {
		//			if (typeof data.exito !== 'undefined') {
		//				alertaSimple('EXITOSO', 'Se actualizo el campo ' + event.target.name, 'top-right', 'info', 4000);
		//				$('#tabla_listar_personas').DataTable().draw();
		//			} else {
		//				alertaSimple('ERROR', data.error, 'top-right', 'error', 3000);
		//			}
		//		})
		//		.fail(function (jqXHR, textStatus) {
		//			alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
		//			console.log(jqXHR.responseText);
		//		});
		//} else {
		//	alert('Not');
		//}
	});
	$('#agregar_requisito').change(function () {
		if ($('#descripcion_requisito_textarea').val().trim() == '' || $('#estado_requisito_select').val() == '' || $('#categoria_select').val() == '') {
			alertaSimple('ERROR', 'Faltan campos que deben ser seleccionados', 'top-right', 'error', 3000);
			$(this).prop('checked', false);
		} else {
			if ($('[name="id_requisito"]').val() != '')
				$.ajax({
					url: '/programa/insertar_requisito_programa',
					type: 'POST',
					data: {
						id_planificacion_programa: $('#id_planificacion_programa').val(),
						id_requisito: $('[name="id_requisito"]').val(),
						categoria: $('#estado_requisito_select').val(),
					},
					dataType: 'json',
				})
					.done(function (data) {
						if (typeof data.exito !== 'undefined') {
							$.ajax({
								url: '/programa/campos_requisitos_programa',
								type: 'POST',
								dataType: 'json',
								data: { id_planificacion_programa: $('#id_planificacion_programa').val() },
							})
								.done(function (data) {
									if (typeof data.exito !== 'undefined') {
										$('#requisitos-body').html(data.resultado.final_output);
									} else {
										alertaSimple('ERROR', data.error, 'top-right', 'error', 3000);
									}
								})
								.fail(function (jqXHR, textStatus) {
									alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
									console.log(jqXHR.responseText);
								});
						} else {
							alertaSimple('ERROR', data.error, 'top-right', 'error', 3000);
						}
					})
					.fail(function (jqXHR, textStatus) {
						alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
						console.log(jqXHR.responseText);
					});
			else {
				$.ajax({
					url: '/programa/insertar_requisito_programa',
					type: 'POST',
					data: {
						id_planificacion_programa: $('#id_planificacion_programa').val(),
						id_requisito: $('[name="id_requisito"]').val(),
						categoria: $('#estado_requisito_select').val(),
					},
					dataType: 'json',
				});
			}
		}
	});

	$('#estado_requisito_select').change(function () {
		if ($('#descripcion_requisito_textarea').val() == '') {
			alertaSimple('ERROR', 'Escriba el requisito', 'top-right', 'error', 3000);
			$(this).val('');
		} else if ($('#estado_requisito_select').val() == 'ESPECIFICO') {
			alertaSimple('INFORME', 'Este requisito solo sera para este programa', 'top-right', 'info', 3000);
		} else if ($('#estado_requisito_select').val() == 'GENERICO') {
			alertaSimple('INFORME', 'Este requisito estara en todos los programas', 'top-right', 'info', 3000);
		}
	});

	$('#categoria_select').change(function () {
		if ($('#descripcion_requisito_textarea').val() == '') {
			alertaSimple('ERROR', 'Escriba el requisito', 'top-right', 'error', 3000);
			$(this).val('');
		}
	});

	$('#requisitos_activos_programa').on('change', 'textarea, select', function (event) {
		alert(event.target.name);
	});
	$('#requisitos_inactivos_programa').on('change', 'textarea, select', function (event) {
		alertaSimple('ERROR', 'No se puede modificar mientras el requisito', 'top-right', 'error', 3000);
	});
});
