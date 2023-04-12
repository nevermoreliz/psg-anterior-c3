/** @format */

$(document).ready(function () {
	$('.btn_ver_participante').on('click', function () {
		$.ajax({
			url: '/matriculacion/inscripcion_listar_programa_inscritos',
			data: {
				id_planificacion_programa: $(this).attr('data-pp'),
			},
			type: 'post',
			// dataType: 'json',
		}).done(function (respuesta) {
			// console.log(respuesta);
			$('.psg-contenedor').hide(0).html(respuesta).fadeIn('slow');
		});
	});

	$('#todos').on('click', function () {
		// alert('hiciste click en todos');
		$.ajax({
			url: '/coordinador/index',
			data: {
				filtro: $(this).attr('data-estado'),
			},
			type: 'post',
			// dataType: 'json',
		}).done(function (respuesta) {
			// console.log(respuesta);
			$('.psg-contenedor').hide(0).html(respuesta).fadeIn('slow');
		});
	});

	$('#vigentes').on('click', function () {
		// alert('hiciste click en vigentes');
		$.ajax({
			url: '/coordinador/index',
			data: {
				filtro: $(this).attr('data-estado'),
			},
			type: 'post',
			// dataType: 'json',
		}).done(function (respuesta) {
			// console.log(respuesta);
			$('.psg-contenedor').hide(0).html(respuesta).fadeIn('slow');
		});
	});

	$('#finalizados').on('click', function () {
		// alert('hiciste click en finalizados');
		$.ajax({
			url: '/coordinador/index',
			data: {
				filtro: $(this).attr('data-estado'),
			},
			type: 'post',
			// dataType: 'json',
		}).done(function (respuesta) {
			// console.log(respuesta);
			$('.psg-contenedor').hide(0).html(respuesta).fadeIn('slow');
		});
	});
});
