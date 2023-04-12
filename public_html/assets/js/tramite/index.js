/** @format */

$(document).ready(function () {
	$('.solicitar_tramite').on('click', function (event) {
		var elemento = $(this).attr('data-value');
		$.ajax({
			url: window.location.origin + '/auth/ajax_es_autententificado',
		})
			.done(function (respuesta) {
				if (respuesta.exito.id_persona) {
					event.preventDefault();
					window.location.href = window.location.origin + '/admin_tramite/listar_tramites';
				} else if (!respuesta.exito) {
					$.get(window.location.origin + '/auth/login').done(function (respuesta) {
						$('body').hide(0).html(respuesta).fadeIn('slow');
						$('#autentificar').on('click', function (event) {
							event.preventDefault();
							$.ajax({
								url: window.location.origin + '/auth/autentificar',
								type: 'post',
								dataType: 'json',
								data: $('#form_iniciar_sesion').serialize(),
							})
								.done(function (respuesta) {
									if (typeof respuesta.exito !== 'undefined') {
										window.location.href = window.location.origin + '/admin_tramite/listar_tramites';
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
				}
			})
			.fail(function (jqXHR, textStatus) {
				alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
				console.log(jqXHR.responseText);
			});
	});
});
