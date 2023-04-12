/** @format */

$(document).ready(function () {
	$('.solicitar_tramite').on('click', function (event) {
		event.preventDefault();
		$.ajax({
			url: '/admin_tramite/campos_requisito_tramite',
			data: { id_tramite: $(this).attr('data-value') },
			type: 'post',
			dataType: 'json',
		}).done(function (respuesta) {
			if (typeof respuesta.exito !== 'undefined') {
				$('.psg-contenedor').hide(0).html(respuesta.vista.final_output).fadeIn('slow');
			} else {
				alertaSimple('ERROR', respuesta.error, 'top-right', 'error', 6000);
			}
		});
	});
});
