/** @format */

$(document).ready(function () {
	/** validaciones de inputmask :
	 * ejemplos en horizontal/js/mask.init.js
	 */
	$('.email-inputmask').inputmask({
			mask: '*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[*{2,6}][*{1,2}].*{1,}[.*{2,6}][.*{1,2}]',
			greedy: !1,
			onBeforePaste: function (n, a) {
				return (e = e.toLowerCase()).replace('mailto:', '');
			},
			definitions: {
				'*': {
					validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~/-]",
					cardinality: 1,
					casing: 'lower',
				},
			},
		}),
		$('.telefono-inputmask').inputmask('9{1,8}'),
		// $(".telefono-inputmask").inputmask('Regex', {
		// 	regex: "^[1-9][0-9]?$|^100$"
		// }),
		$('.texto-inputmask').inputmask({
			mask: '*{1,24}[ *{1,25}]',
			greedy: false,
			definitions: {
				'*': {
					validator: '[A-Za-záéíóúàèìòùÁÉÍÓÚÀÈÌÒÙ]',
					cardinality: 1,
					casing: 'upper',
				},
			},
		}),
		$('.ci-inputmask').inputmask({
			mask: '9{1,20}[-*{1,20}]',
			greedy: false,
			definitions: {
				'*': {
					validator: '[0-9A-Za-z]',
					cardinality: 1,
					casing: 'upper',
				},
			},
		});
	/** fin validaciones de inputmask */

	/**
	 * Descripción  : Esta function se encarga de asignar Titúlo, Tamaño, onEscape a un Modal
	 * titulo       : Titúlo que desea que poner a su Modal.
	 * tamaño		: modal-lg, modal-sm.
	 * onEscape     : true si desea que la tecla escape cierre el Modal
	 * backdrop     : true si desea que el modal solo se cierre con botones
	 */
	function parametrosModal(idModal, titulo, tamano, onEscape, backdrop) {
		$(idModal + '-title').html(titulo);
		$(idModal + '-dialog').addClass(tamano);
		$(idModal).modal({
			backdrop: backdrop,
			keyboard: onEscape,
			focus: false,
			show: true,
		});
	}
	/** Descripcion : valida los input tipo select textarea */
	!(function (window, document, $) {
		'use strict';
		$('input,select,textarea').not('[type=submit]').jqBootstrapValidation(), $('.skin-square input'), $('.touchspin'), $('.switchBootstrap');
	})(window, document, jQuery);

	$('#form_modal_interesado').on('submit', function (e) {
		event.preventDefault();

		swal({
			title: 'Toda la información es correcta?',
			text: 'desea confirmar la solicitud de la informacion',
			icon: 'warning',
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				swal('su solicitud fue completada correctamente', {
					icon: 'success',
				});
				$.ajax({
						type: 'POST',
						url: '/marketing/enviar_mas_informacion_interesados',
						data: new FormData($('#form_modal_interesado')[0]),
						processData: false,
						contentType: false,
						cache: false,
						async: false,
						// dataType: 'json',
					})
					.done(function (data) {
						console.log(data.url);

						window.open(data.url, '_blank');
						$('#modal').modal('hide');
					})
					.fail(function (jqXHR, textStatus) {
						// alert('entro en .fail');-
						alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
						console.log(jqXHR.responseText);
					});
			} else {
				swal('usted cancelo la solicitud de informacion');
			}
		});

		/**
		 * Este evento se dispara cuando el usuario desea subir su fotografia de su diploma
		 */
	});
});