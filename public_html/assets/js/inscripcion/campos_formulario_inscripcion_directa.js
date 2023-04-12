$(document).ready(function () {
	$('#ciudad_donde_vive').select2({
		width: '100%',
		allowClear: true,
		multiple: false,
		dropdownParent: $('#ciudad_donde_vive').parent(),
		escapeMarkup: function (m) {
			return m;
		},
	});

	$('.fecha_deposito_matricula, .fecha_deposito_inicial,.numero_deposito_cuota_inicial,.numero_deposito_matricula').bootstrapMaterialDatePicker({
		weekStart: 0,
		time: false,
		maxDate: new Date(),
		autoclose: true,
	});

	$('#aniox, #mesx, #diax').change(function () {
		let diax = $('#diax').val();
		let mesx = $('#mesx').val();
		let aniox = $('#aniox').val();
		let error = false;
		let hoy = new Date();
		if ((mesx == 4 || mesx == 6 || mesx == 9 || mesx == 11) && diax == 31) {
			// alert("El mes " + mesx + " no tiene 31 días!");
			swal('Información!', 'El mes ' + mesx + ' no tiene 31 días!', 'info');
			error = true;
		}
		if (mesx == 2) {
			var bisiesto = aniox % 4 == 0 && (aniox % 100 != 0 || aniox % 400 == 0);
			if (diax > 29 || (diax == 29 && !bisiesto)) {
				// alert("Febrero del " + aniox + " no contiene " + diax + " dias!");
				swal('Información!', 'Febrero del ' + aniox + ' no contiene ' + diax + ' dias!', 'info');

				error = true;
			}
		}
		if (error === false) {
			let fecha_nacimiento = aniox + '/' + mesx + '/' + diax;
			if (new Date(fecha_nacimiento).getTime() > hoy.getTime()) {
				// alert('La fecha no es válida, porque supera el día de hoy.');
				swal('Información!', 'La fecha no es válida, porque supera el día de hoy.', 'info');
				error = true;
			}
		}
	});

	$('#revision').on('click', function (e) {
		e.preventDefault();
		$.post(
			'/inscripcion/inscripcion_persona_buscar',
			{
				ci: $('#ci').val(),
				id_planificacion_programa: $(this).attr('data-id-planificacion-programa'),
			},
			function (r) {
				if (typeof r.exito !== 'undefined') {
					swal('INFORMACIÓN', r.exito, 'success');
					$('[name="nombre"]').val(r.datos.nombre);
					$('[name="paterno"]').val(r.datos.paterno);
					$('[name="materno"]').val(r.datos.materno);
					$('[name="genero"]').val(r.datos.genero).trigger('change');
					fecha_nacimiento = new Date(r.datos.fecha_nacimiento);
					fecha_nacimiento.setMinutes(fecha_nacimiento.getMinutes() + fecha_nacimiento.getTimezoneOffset());
					$('[name="diax"]').val(fecha_nacimiento.getDate()).trigger('change');
					$('[name="mesx"]')
						.val(fecha_nacimiento.getMonth() + 1)
						.trigger('change');
					$('[name="aniox"]').val(fecha_nacimiento.getFullYear()).trigger('change');
					$('[name="lugar_nacimiento"]').val(r.datos.lugar_nacimiento).trigger('change');
					$('[name="domicilio"]').val(r.datos.domicilio).trigger('change');
					$('[name="id_pais_nacionalidad"]').val(r.datos.id_pais_nacionalidad).trigger('change');
					$('[name="estado_civil"]').val(r.datos.estado_civil).trigger('change');
					$('[name="oficio_trabajo"]').val(r.datos.oficio_trabajo).trigger('change');
					$('[name="celular"]').val(r.datos.celular).trigger('change');
					$('[name="telefono"]').val(r.datos.telefono).trigger('change');
					$('[name="email"]').val(r.datos.email).trigger('change');

					$('#ci').attr('disabled', true);
					$('#revision').attr('disabled', true);
					$('#insertar-inscripcion').attr('data-id-persona', r.datos.id_persona);
					bloquear_inputs('#frm_campos_inscripcion', ['input', 'textarea', 'select'], ['numero_deposito_matricula', 'fecha_deposito_matricula', 'numero_deposito_cuota_inicial', 'fecha_deposito_inicial']);
				} else if (typeof r.error !== 'undefined') {
					$('#modal_inscripcion_directa').modal('hide');
					swal('INFORMACIÓN', r.error, 'error');
				} else if (typeof r.agregar !== 'undefined') {
					swal('INFORMACIÓN', r.agregar, 'success');
				} else if (typeof r.info !== 'undefined') {
					swal('INFORMACIÓN', r.info, 'error');
				}
			}
		);
	});
	$('#insertar-inscripcion').on('click', function () {
		fecha_nacimiento = $('#aniox').val() + '-' + $('#mesx').val() + '-' + $('#diax').val();
		$.post(
			'/inscripcion/inscripcion_inscripcion_verificar',
			$('#frm_campos_inscripcion').serialize() + ('&id_planificacion_programa=' + $(this).attr('data-id-planificacion-programa') + '&ci=' + $('#ci').val() + '&id_persona=' + $(this).attr('data-id-persona') + '&expedido=' + $('#expedido').val() + ('&fecha_nacimiento=' + fecha_nacimiento)),
			function (r) {
				if (typeof r.exito !== 'undefined') {
					$('#modal_inscripcion_directa').modal('hide');
					swal('INFORMACIÓN', r.exito, 'success');
				} else swal({ html: true, title: 'INFORMACIÓN', text: r.error, type: 'error' });
			},
			'json'
		);
	});
});
function bloquear_inputs(frm, tipos = ['input', 'textarea', 'select'], no_bloquear = []) {
	$(frm + ' ' + tipos.join(',')).each(function () {
		if (!no_bloquear.includes($(this).attr('name'))) {
			$(this).attr('disabled', true);
			$(this).removeAttr('name');
			$(this).removeAttr('id');
		}
		// var input = $(this);
		// alert('Type: ' + input.attr('type') + 'Name: ' + input.attr('name') + 'Value: ' + input.val());
	});
}
