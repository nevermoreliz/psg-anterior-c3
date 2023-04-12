// $('#modal_programa').modal('hide');

/** @format */

$(document).ready(function () {



	// BLOQUE PARA VALIDAR CAMPOS INPUT
	!(function (window, document, $) {
		'use strict';
		$('input,select,textarea,label').not('[type=submit]').jqBootstrapValidation(), $('.skin-square input'), $('.touchspin'), $('.switchBootstrap');
	})(window, document, jQuery);

	/** fin cuando exista cambios en los botones de tipo file mostrara una previsualizacion del archivo */

	// BLOQUE DE VALICADIONES DE ENMASCARAMIENTO
	$('.ci-inputmask').inputmask({
		mask: '9{1,8}[-*{1,2}]',
		greedy: false,
		definitions: {
			'*': {
				validator: '[0-9A-Za-z]',
				cardinality: 1,
				casing: 'upper',
			},
		},
	});

	/**Inicializando para bloquear comandos de pegar y copiar */
	$("#repetir_ci").on('paste', function (e) {
		$("#repetir_ci").val('');
		e.preventDefault();
		// alert('Esta acción está prohibida');
	});

	$('#form_confirmacion').on('submit', function (e) {
		e.preventDefault();
		var formulario = document.getElementById('form_confirmacion');

		$('#detalle_programa').modal('hide');
		agregarCookie('id_publicacion', $('#id_publicacion').val(), 2);

		var ci = $('[name="ci"]').val();
		var repetir_ci = $('[name="repetir_ci"]').val();

		if (ci == repetir_ci) {
			// muestra un modal de carga
			var dialog = bootbox.dialog({
				message: '<p class="text-center mb-0"><i class="fa fa-spin fa-cog"></i> Procesando Informaci&oacute;n</p>',
				centerVertical: true,
				closeButton: false,
			});

			// el dialogo se ocultara despues de 1 segundo
			dialog.init(function () {
				setTimeout(function () {
					dialog.modal('hide');
				}, 1000);
			});

			// setTimeout(function(){ swal("Es correcto su ", "su carnet", "warning");}, 1000);
			$.ajax({
				url: '/auth/ajax_es_autententificado',
			}).done(function (respuesta) {

				if (typeof respuesta.exito.id_persona === 'undefined') {

					$.ajax({
							type: 'post',
							url: '/marketing/verificar_usuario_persona',
							data: new FormData($('#form_confirmacion')[0]),
							processData: false,
							contentType: false,
							cache: false,
							async: false,
							dataType: 'json',
						})
						.done(function (respuesta) {
							if (typeof respuesta.exito !== 'undefined') {
								if (respuesta.resultado == true) {
									setTimeout(function () {
										parametrosModal('#detalle_programa_login', 'Iniciar sesión', 'modal-lg', false, true);
									}, 1200);
									$('#detalle_programa_login-body').html(respuesta.vista);
									$('#form_iniciar_sesion').on('submit', function (event) {
										event.preventDefault();
										event.stopPropagation();
										$.ajax({
												url: window.location.origin + '/auth/autentificar',
												type: 'post',
												dataType: 'json',
												data: $('#form_iniciar_sesion').serialize(),
											})
											.done(function (respuesta) {
												if (typeof respuesta.exito !== 'undefined') {
													window.location.href = window.location.origin + '/principal';
												} else {
													alertaSimple('ERROR', respuesta.error, 'top-right', 'error', 6000);
												}
											})
											.fail(function (jqXHR, textStatus) {
												alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
												// console.log(jqXHR.responseText);
											});
									});
								} else {
									// aqui son los nuevos
									setTimeout(function () {
										bootbox.confirm({
											// <center>
											// <img src = "../../img/posgrado.png" style = "
											// height: 85 px; "?>
											// </center>
											title: `<h5>INFORMACIÓN</h5>`,
											message: `
											 
												<div class="col-md-12 col-lg-12 col-xl-12">
													<div class="card card-inverse card-info">
													
													<img src = "../../assets/images/posgrado_imagen/PosgradoBlanco.png" style = "width: 199px;"?>
														
														<div class="card-body">
															<h3 class="card-title">No estas registrado en nuestra base de datos. Vamos a registrarte con este número de carnet :</h3>
															<center class="m-b-10">
																<a href="#" class="btn btn-inverse">
																	<h1 class=" text-white">
																	` + $('[name="ci"]').val() + `
																	</h1>
																</a>
															</center>															
															<p class="card-title"><h4 class="text-white">Este número será utilizado para <b><u>todos tus trámites administrativos</u></b></p></h4>
														</div>

													</div>
												</div>
												`,
											centerVertical: true,
											animate: false,
											size: 'lg',
											buttons: {
												confirm: {
													label: 'Espere..',
													className: 'btn-info espera',
												},
												cancel: {
													label: 'Cancelar',
													className: 'btn-warning',
												},
											},
											callback: function (result) {
												// console.log(result);
												if (result) {
													formulario.submit();
												} else {
													swal('Cancelaste la solicitud', 'de un nuevo Registro', 'warning');
												}
											},
										});

										jQuery('.modal-backdrop').css('opacity', '1');



										$(".espera").attr('disabled', 'disabled');


										var i = 10; //  set your counter to 1

										function myLoop() { //  create a loop function

											// console.log(i);
											setTimeout(function () { //  call a 3s setTimeout when the loop is called
												$(".espera").html('Espere (' + i + ')s'); //  your code here
												i--; //  increment the counter
												if (i > 0) { //  if the counter < 10, call the loop function
													myLoop(); //  ..  again which will trigger another 
												} else if (i == 0) {
													$(".espera").html('Continuar y <b><u>registrarme</u></b> como nuevo');
													$(".espera").attr('disabled', false);
												} //  ..  setTimeout()
											}, 1000)
										}

										myLoop();

									}, 1200);

								}
							} else {
								alertaSimple('ALERTA', respuesta.error, 'top-right', 'warning', 6000);
							}
						})
						.fail(function (jqXHR, textStatus) {
							alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'warning', 3000);
							// console.log(jqXHR.responseText);
						});
				} else {
					window.location.href = window.location.origin + '/principal';
				}
			});
		} else {
			swal('Numero de Carnet', 'no es identica a la anterior', 'warning');
		}

		// swal({
		//     title: 'Toda la informacion es correcta?',
		//     text: 'desea confirmar la solicitud de la informacion',
		//     icon: 'warning',
		//     buttons: true,
		//     dangerMode: true,
		// }).then((willDelete) => {
		//     if (willDelete) {
		//         swal('su solicitud fue completada correctamente', {
		//             icon: 'success',
		//         });
		//         $.ajax({
		//             type: 'POST',
		//             url: '/marketing/insertar_campos_preinscripcion',
		//             data: new FormData($('#form_inscripcion_online')[0]),
		//             processData: false,
		//             contentType: false,
		//             cache: false,
		//             async: false,
		//         })
		//             .done(function (data) {
		//                 // $('#modal').modal('hide');
		//             })
		//             .fail(function (jqXHR, textStatus) {
		//                 // alert('entro en .fail');
		//                 alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
		//                 console.log(jqXHR.responseText);
		//             });
		//     } else {
		//         swal('usted cancelo la solicitud de informacion');
		//     }
		// });
	});




});