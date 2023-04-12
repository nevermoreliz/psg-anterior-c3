$(document).ready(function () {
	var controladorTiempo = '';
	window.ajax_listar_posgraduantes = function () {
		var gestion = $('#id_gestion option:selected').text();
		var grado_academico = $('#id_grado_academico option:selected').text();
		var tipo_programa = $('#id_tipo_programa option:selected').text();
		var numero_version = $('#version_programa option:selected').text();
		var estado_inscripcion = $('#estado_inscripcion option:selected').text();
		var texto = $('#texto').val();

		$.post(
			'/matriculacion/inscripcion_buscar_programa_inscritos',
			{
				id_planificacion_programa: $('#datos').attr('data-id-planificacion-programa'),
				gestion,
				grado_academico,
				tipo_programa,
				numero_version,
				estado_inscripcion,
				texto,
			},
			function (respuesta) {
				if (typeof respuesta.exito !== 'undefined') {
					$('#datos').append(respuesta.vista);
					$('#datos_vacios').empty();
				} else if (typeof respuesta.error !== 'undefined') {
					$('#datos_vacios').html('<p class="text-danger">No se encontraron más resultados...</code></p>');
					// alertaSimple('INFORMACIÓN', respuesta.error, 'top-right', 'warning', 3000);
				}
			}
		).fail(function (jqXHR, textStatus) {
			alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
			console.log(jqXHR.responseText);
		});
	};

	$.get('/assets/js/matriculacion/matriculacion_funciones_globales.js');
	ajax_listar_posgraduantes();
	$('#page-content')
		.on('keyup', '#texto', function (e) {
			$('#datos').empty();
			$('#datos_vacios').empty();
			clearTimeout(controladorTiempo);
			controladorTiempo = setTimeout(ajax_listar_posgraduantes, 800);
		})
		.on('change', '#id_gestion, #id_grado_academico, #id_tipo_programa, #version_programa, #estado_inscripcion', function (e) {
			$('#datos').empty();
			$('#datos_vacios').empty();
			ajax_listar_posgraduantes();
		});
});
