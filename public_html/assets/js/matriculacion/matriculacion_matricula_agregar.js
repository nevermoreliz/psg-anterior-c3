$(document).ready(function () {
	!(function (window, document, $) {
		'use strict';
		$('input,select,textarea,label').not('[type=submit]').jqBootstrapValidation(), $('.skin-square input'), $('.touchspin'), $('.switchBootstrap');
	})(window, document, jQuery);
	$('#numero_deposito').inputmask('9{1,30}');
	$('#numero_serie').inputmask('9{1,10}');
	$('#monto_deposito').inputmask('9{1,5}');

	$('#fecha_deposito')
		.bootstrapMaterialDatePicker({
			weekStart: 0,
			time: false,
			maxDate: new Date(),
			autoclose: true,
		})
		.on('change', function (e) {
			$(this).parent('.form-group').removeClass('is-empty');
			$(this).parent('.form-group').addClass('focused');
		});

	$('#form_matricula_agregar').on('submit', function (event) {
		event.preventDefault();
		event.stopPropagation();
		$.ajax({
			url: '/matriculacion/matriculacion_matricula_insertar',
			type: 'post',
			data: $('#form_matricula_agregar').serialize(),
		}).done(function (respuesta) {
			if (typeof respuesta.exito !== 'undefined') {
				swal('INFORMACIÓN', respuesta.exito, 'success');
				$('#historial').modal('hide');
				$.post('/matriculacion/buscar_tarjeta', { id_persona: $('#insertar-matricula').attr('data-id-persona'), id_planificacion_programa: $('#insertar-matricula').attr('data-id-planificacion-programa') }).done(function (respuesta) {
					elemento = $('#' + (parseInt($('#insertar-matricula').attr('data-id-persona')) + parseInt($('#insertar-matricula').attr('data-id-planificacion-programa'))));
					elemento.html(respuesta.vista);
					$(elemento).children('div').removeClass();
				});
				$.post('/matriculacion/matriculacion_inscripcion_actualizar', { id_persona: $('#insertar-matricula').attr('data-id-persona'), id_planificacion_programa: $('#insertar-matricula').attr('data-id-planificacion-programa'), estado_inscripcion: 'MATRICULADO' });
			} else swal({ html: true, title: 'INFORMACIÓN', text: respuesta.error, type: 'info' });
		});
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
