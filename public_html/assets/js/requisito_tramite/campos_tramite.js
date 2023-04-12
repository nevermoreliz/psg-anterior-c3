$(document).ready(function () {
	$('#insertar_tramite').on('click', function (e) {
		e.preventDefault();
		$.ajax({
			method: 'post',
			url: '/requisito_tramite/insertar_tramite',
			data: $('#form_tramite').serialize(),
			dataType: 'json',
		})
			.done(function (respuesta) {
				if (typeof respuesta.exito !== 'undefined') {
					$('#modal').modal('hide');
					$('#requisito_tramite').DataTable().draw();
					$.get('/requisito_tramite/listar_tramite_html').done(function (respuesta) {
						$('#tramites').hide(0).html(respuesta).fadeIn('slow');
					});
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
