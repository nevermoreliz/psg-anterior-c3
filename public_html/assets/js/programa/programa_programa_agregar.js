$(document).ready(function () {
	$('#insertar_planificacion_programa').on('click', function (e) {
		e.preventDefault();
		$.ajax({
			method: 'post',
			url: '/programa/programa_programa_insertar',
			data: $('#form_planificacion_programa').serialize(),
			dataType: 'json',
		})
			.done(function (respuesta) {
				if (typeof respuesta.exito !== 'undefined') {
					$('#modal').modal('hide');
					$.post('/programa/programa_imprimir', { id_planificacion_programa: respuesta.id_planificacion_programa, tipo: 'formulario_marketing' }, function (r) {
						if (typeof r.exito !== 'undefined') {
							parametrosModal('#modal', 'FORMULARIO DE MARKETING DEL PROGRAMA ' + r.datos.nombre_programa, 'modal-xl', true, 'static');
							$('#modal-body').html('<embed type="application/pdf" src="' + r.pdf + '" width="100%" height="' + $(window).height() + '" style="border: none;" />');
						} else swal('INFORMACIÓN', r.error, 'error');
					});
					swal(
						{
							title: '¿Desea agregar Modulos a este nuevo Programa?',
							text: 'Si desea agregar modulos a este programa presione Si',
							type: 'info',
							showCancelButton: true,
							confirmButtonColor: '#DD6B55',
							confirmButtonText: 'Si',
							cancelButtonText: 'No',
							closeOnConfirm: true,
						},
						function () {
							$.post(
								'/programa/programa_modulo_agregar',
								{ id_planificacion_programa: respuesta.id_planificacion_programa },
								function (r) {
									if (typeof r.exito !== 'undefined') {
										parametrosModal('#modal', 'AGREGAR MODULOS A ' + r.datos.nombre_programa, 'modal-xl', true, 'static');
										$('#modal-body').html(r.vista);
									} else {
										alertaSimple('ERROR', r.error, 'top-right', 'error', 6000);
									}
								},
								'json'
							);
						}
					);
				} else {
					swal({ html: true, title: 'INFORMACIÓN', text: respuesta.error, type: 'error' });
				}
			})
			.fail(function (jqXHR, textStatus) {
				alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
				console.log(jqXHR.responseText);
			});
	});

	$('#actualizar_planificacion_programa').on('click', function (e) {
		e.preventDefault();
		$.ajax({
			method: 'post',
			url: '/programa/programa_programa_actualizar',
			data: $('#form_planificacion_programa').serialize(),
			dataType: 'json',
		})
			.done(function (respuesta) {
				if (typeof respuesta.exito !== 'undefined') {
					$('#modal').modal('hide');

					swal('INFORMACIÓN', respuesta.exito, 'success');
				} else {
					swal({ html: true, title: 'INFORMACIÓN', text: respuesta.error, type: 'error' });
				}
			})
			.fail(function (jqXHR, textStatus) {
				alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
				console.log(jqXHR.responseText);
			});
	});
	$('#form_planificacion_programa').on('change keyup', '#id_grado_academico, #nombre_programa, #id_tipo_programa, #numero_version', function (event) {
		$('[name="sigla_programa"]').val(generarSigla($('[name="id_grado_academico"] option:selected').text(), $('[name="nombre_programa"]').val(), $('[name="id_tipo_programa"] option:selected').text(), $('[name="numero_version"]').val()));

		if ($('[name="sigla_programa"]').val() == '') {
			$('[name="sigla_programa"]').parent('.form-group').removeClass('focused');
			$('[name="sigla_programa"]').parent('.form-group').addClass('is-empty');
		} else {
			$('[name="sigla_programa"]').parent('.form-group').removeClass('is-empty');
			$('[name="sigla_programa"]').parent('.form-group').addClass('focused');
		}
	});

	$('#descripcion_programa').autocomplete({
		params: {},
		noCache: false,
		serviceUrl: '/programa/programa_persona_listar_ajax_autocompletado/',
		minChars: 5,
		onSelect: function (suggestion) {},
		onSearchComplete: function (query, suggestions) {},
	});

	$('#id_gestion')
		.select2({
			allowClear: true,
			dropdownParent: $('#modal'),
			placeholder: '',
			width: '100%',
		})
		.on('change', function (e) {
			$(this).parent('.form-group').removeClass('is-empty');
			$(this).parent('.form-group').addClass('focused');
		});

	$('#id_unidad')
		.select2({
			allowClear: true,
			dropdownParent: $('#modal'),
			placeholder: '',
			width: '100%',
		})
		.on('change', function (e) {
			$(this).parent('.form-group').removeClass('is-empty');
			$(this).parent('.form-group').addClass('focused');
		});

	$('#id_tipo_programa')
		.select2({
			allowClear: true,
			dropdownParent: $('#modal'),
			placeholder: '',
			width: '100%',
		})
		.on('change', function (e) {
			$(this).parent('.form-group').removeClass('is-empty');
			$(this).parent('.form-group').addClass('focused');
		});

	$('#id_grado_academico')
		.select2({
			allowClear: true,
			dropdownParent: $('#modal'),
			placeholder: '',
			width: '100%',
		})
		.on('change', function (e) {
			$(this).parent('.form-group').removeClass('is-empty');
			$(this).parent('.form-group').addClass('focused');
		});
	$('#numero_version')
		.select2({
			allowClear: true,
			dropdownParent: $('#modal'),
			placeholder: '',
			width: '100%',
		})
		.on('change', function (e) {
			$(this).parent('.form-group').removeClass('is-empty');
			$(this).parent('.form-group').addClass('focused');
		});

	$('#fecha_inicio')
		.bootstrapMaterialDatePicker({
			weekStart: 0,
			time: false,
		})
		.on('change', function (e) {
			$(this).parent('.form-group').removeClass('is-empty');
			$(this).parent('.form-group').addClass('focused');
		});

	$('#fecha_fin')
		.bootstrapMaterialDatePicker({
			weekStart: 0,
			time: false,
			minDate: new Date(),
		})
		.on('change', function (e) {
			$(this).parent('.form-group').removeClass('is-empty');
			$(this).parent('.form-group').addClass('focused');
		});

	$('[name="fecha_registro_ceub"]')
		.bootstrapMaterialDatePicker({
			weekStart: 0,
			time: false,
		})
		.on('change', function (e) {
			$(this).parent('.form-group').removeClass('is-empty');
			$(this).parent('.form-group').addClass('focused');
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
