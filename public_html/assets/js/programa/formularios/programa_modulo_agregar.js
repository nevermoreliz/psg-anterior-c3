$(document).ready(function () {
	$('#insertar_modulo_programa').on('click', function (e) {
		// $.post('/programa/exist', function (r) {
		// 	var x = r;
		// 	eval(x.func);
		// });
		// return;
		$.ajax({
			type: 'post',
			url: '/programa/progama_modulo_insertar',
			data: $('#form_modulo_programa').serialize() + '&id_planificacion_programa=' + $('[name="id_planificacion_programa"]').val(),
			dataType: 'json',
		})
			.done(function (respuesta) {
				if (typeof respuesta.exito !== 'undefined') {
					swal('INFORMACIÓN', respuesta.exito, 'success');
					$('#modulo-programa').modal('hide');
					$.post(
						'/programa/programa_modulo_listar',
						{ id_planificacion_programa: $('[name="id_planificacion_programa"]').val() },
						function (r) {
							$('#modal-body').html(r.vista);
							parametrosModal('#modal', 'MODULOS DE ' + r.datos.nombre_programa, 'modal-xl', true, 'static');
						},
						'json'
					);
				} else {
					swal({ html: true, title: 'INFORMACIÓN', text: respuesta.error, type: 'error' });
				}
			})
			.fail(function (jqXHR, textStatus) {
				swal('ADVERTENCIA', 'No se encontro el proceso solicitado, por favor intente más tarde', 'error');
			});
	});

	$('#actualizar_modulo_programa').on('click', function (e) {
		$.ajax({
			type: 'post',
			url: '/programa/programa_modulo_actualizar',
			data: $('#form_modulo_programa').serialize() + '&id_planificacion_programa=' + $('[name="id_planificacion_programa"]').val(),
			dataType: 'json',
		})
			.done(function (respuesta) {
				if (typeof respuesta.exito !== 'undefined') {
					$('#modulo-programa').modal('hide');
					swal('INFORMACIÓN', respuesta.exito, 'success');

					$.post(
						'/programa/programa_modulo_listar',
						{ id_planificacion_programa: $('[name="id_planificacion_programa"]').val() },
						function (r) {
							if (typeof respuesta.exito !== 'undefined') {
								$('#modal-body').html(r.vista);
							} else swal('INFORMACIÓN', r.error, 'error');
						},
						'json'
					);
				} else swal({ html: true, title: 'INFORMACIÓN', text: respuesta.error, type: 'error' });
			})
			.fail(function (jqXHR, textStatus) {
				swal('ADVERTENCIA', 'No se encontro el proceso solicitado, por favor intente más tarde', 'error');
			});
	});
	$('#cancelar_modulo_programa').on('click', function (e) {
		$('#campos_modulo_programa').empty();
		$('#contenedor_modulo').hide().css('visibility', 'visible');
	});
});
$('.floating-labels .form-control')
	.on('focus blur', function (i) {
		$(this)
			.parents('.form-group')
			.toggleClass('focused', 'focus' === i.type || this.value.length > 0);
	})
	.trigger('blur'),
	$(function () {
		for (
			var i = window.location,
				e = $('ul#sidebarnav a')
					.filter(function () {
						return this.href == i;
					})
					.addClass('active')
					.parent()
					.addClass('active');
			;

		) {
			if (!e.is('li')) break;
			e = e.parent().addClass('in').parent().addClass('active');
		}
	});
