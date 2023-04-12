// $(document).ready(function () {
// 	$('#agregar-matricula').on('click', function (e) {
// 		$.ajax({
// 			url: '/matriculacion/matriculacion_matricula_agregar',
// 			type: 'post',
// 			data: { id_persona: $(this).attr('data-id-persona'), id_planificacion_programa: $(this).attr('data-id-planificacion-programa') },
// 		}).done(function (respuesta) {
// 			$('#historial-body').html(respuesta);
// 			$('#historial-title').html('Agregar Matricula');
// 			$('#historial-button-group').html(
// 				`<button type="button" class="btn btn-info btn-circle btn-lg pulse animated infinite" id="insertar_matricula" aria-hidden="true"><i class="fa fa-save"></i> </button>
// 				<button type="button" class="btn btn-warning btn-circle btn-lg" id="retornar" data-id-persona="` +
// 					$("[name='id_persona']").val() +
// 					`" data-id-planificacion-programa="` +
// 					$("[name='id_planificacion_programa']").val() +
// 					`" aria-hidden="true"><i class="fa fa-mail-reply-all"></i> </button>
// 				<button type="button" class="btn btn-danger btn-circle btn-lg" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> </button>`
// 			);
// 			$('#insertar_matricula').on('click', function () {
// 				$.ajax({
// 					url: '/matriculacion/matriculacion_matricula_insertar',
// 					type: 'post',
// 					data: $('#form_matricula_agregar').serialize(),
// 				}).done(function (respuesta) {
// 					if (typeof respuesta.exito !== 'undefined') {
// 						alertaSimple('INFORMACIÓN', respuesta.exito, 'top-right', 'info', 2000);
// 						ajax_historial_matriculaciones('#retornar');
// 						$('#historial-title').html('Historial de Matriculaciones');
// 					} else {
// 						alertaSimple('ERROR', respuesta.error, 'top-right', 'warning', 2000);
// 					}
// 				});
// 			});
// 			$('#retornar').on('click', function () {
// 				$('#historial-title').html('Historial de Matriculaciones');
// 				ajax_historial_matriculaciones(this);
// 			});
// 		});
// 	});
// 	$('.imprimir-matricula').on('click', function () {
// 		$.ajax({
// 			url: '/matriculacion/matriculacion_imprimir',
// 			data: { id_matricula_gestion: $(this).attr('data-id-matricula-gestion') },
// 			type: 'post',
// 		})
// 			.done(function (respuesta) {
// 				if (typeof respuesta.exito !== 'undefined') {
// 					$('#historial-button-group').html(
// 						`<button type="button" class="btn btn-warning btn-circle btn-lg" id="retornar" data-id-persona="` +
// 							respuesta.datos.id_persona +
// 							`" data-id-planificacion-programa="` +
// 							respuesta.datos.id_planificacion_programa +
// 							`" aria-hidden="true"><i class="fa fa-mail-reply-all"></i> </button>
// 						<button type="button" class="btn btn-danger btn-circle btn-lg" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> </button>`
// 					);

// 					$('#retornar').on('click', function () {
// 						$('#historial-title').html('Historial de Matriculaciones');
// 						ajax_historial_matriculaciones(this);
// 					});
// 					$('#historial-body').html('<embed type="application/pdf" src="' + respuesta.exito + '" width="100%" height="' + $(window).height() + '" style="border: none;" />');
// 					$('#historial-title').html('Imprimir Matricula');
// 				} else {
// 					alertaSimple('ERROR', respuesta.error, 'top-right', 'warning', 2000);
// 				}
// 			})
// 			.fail(function (jqXHR, textStatus) {
// 				alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
// 				console.log(jqXHR.responseText);
// 			});
// 	});
// 	$('.editar-matricula').on('click', function () {
// 		$.ajax({
// 			url: '/matriculacion/matriculacion_matricula_editar',
// 			data: { id_matricula_gestion: $(this).attr('data-id-matricula-gestion') },
// 			type: 'post',
// 		})
// 			.done(function (respuesta) {
// 				$('#historial-body').html(respuesta);
// 				$('#historial-title').html('Editar Matricula');
// 				$('#historial-button-group').html(
// 					`<button type="button" class="btn btn-info btn-circle btn-lg pulse animated infinite" id="actualizar_matricula" data-id-persona="` +
// 						$("[name='id_persona']").val() +
// 						`" data-id-planificacion-programa="` +
// 						$("[name='id_planificacion_programa']").val() +
// 						`" aria-hidden="true"><i class="fa fa-save"></i> </button>
// 					<button type="button" class="btn btn-warning btn-circle btn-lg" id="retornar" data-id-persona="` +
// 						$("[name='id_persona']").val() +
// 						`" data-id-planificacion-programa="` +
// 						$("[name='id_planificacion_programa']").val() +
// 						`" aria-hidden="true"><i class="fa fa-mail-reply-all"></i> </button>
// 					<button type="button" class="btn btn-danger btn-circle btn-lg" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> </button>`
// 				);

// 				$('#retornar').on('click', function () {
// 					$('#historial-title').html('Historial de Matriculaciones');
// 					ajax_historial_matriculaciones(this);
// 				});

// 				$('#actualizar_matricula').on('click', function (e) {
// 					$.ajax({
// 						url: '/matriculacion/matriculacion_matricula_actualizar',
// 						type: 'post',
// 						data: $('#form_matricula_editar').serialize(),
// 					}).done(function (respuesta) {
// 						if (typeof respuesta.exito !== 'undefined') {
// 							alertaSimple('INFORMACIÓN', respuesta.exito, 'top-right', 'info', 2000);
// 							ajax_historial_matriculaciones('#actualizar_matricula');
// 							$('#historial-title').html('Historial de Matriculaciones');
// 						} else {
// 							alertaSimple('ERROR', respuesta.error, 'top-right', 'warning', 2000);
// 						}
// 					});
// 				});
// 			})
// 			.fail(function (jqXHR, textStatus) {
// 				alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
// 				console.log(jqXHR.responseText);
// 			});
// 	});
// });

// window.ajax_historial_matriculaciones = function (e) {
// 	$.ajax({
// 		method: 'post',
// 		url: '/matriculacion/ajax_historial_matriculaciones/',
// 		data: { id_persona: $(e).attr('data-id-persona'), id_planificacion_programa: $(e).attr('data-id-planificacion-programa') },
// 	}).done(function (respuesta) {
// 		$('#historial-button-group').html(
// 			`
// 			<button type="button" class="btn btn-info btn-circle btn-lg pulse animated infinite" id="agregar-matricula" data-id-persona="` +
// 				$(e).attr('data-id-persona') +
// 				`" data-id-planificacion-programa="` +
// 				$(e).attr('data-id-planificacion-programa') +
// 				`" aria-hidden="true"><i class="fa fa-plus"></i></button>
// 			<button type="button" class="btn btn-danger btn-circle btn-lg" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> </button>`
// 		);
// 		$('#historial-body').html(respuesta);
// 	});
// };
