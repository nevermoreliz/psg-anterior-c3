$(document).ready(function () {
	$('.contenedor_respaldos').magnificPopup({
		delegate: '.text-dark',
		type: 'image',
	});
	$('#form_revisar_requisitos').on('submit', function (event) {
		event.preventDefault();
		$.ajax({
			url: '/admin_tramite/actualizar_solicitud',
			type: 'post',
			data: $(this).serialize(),
		})
			.done(function (respuesta) {
				if (typeof respuesta.exito !== 'undefined') {
					$('#modal').modal('hide');
					var tbl_hoja_ruta_enviadas = $('#tbl_listar_solicitudes').DataTable();
					tbl_hoja_ruta_enviadas.draw();
				} else {
					alertaSimple('ERROR', respuesta.error, 'top-right', 'error', 6000);
				}
			})
			.fail(function (jqXHR, textStatus) {
				alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
				console.log(jqXHR.responseText);
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
