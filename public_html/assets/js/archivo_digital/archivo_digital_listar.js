/** @format */

$(document).ready(function () {
	var elemento;
	var etiqueta;
	var tipos_archivo;
	$('.adjuntar_archivo').on('click', function (event) {
		elemento = $(this).attr('data-value');
		etiqueta = $(this).attr('data-etiqueta');
		tipos_archivo = $(this).attr('data-tipo-extension');
	});

	$('.adjuntar_archivo').each(function () {
		Dropzone.autoDiscover = false;
		elemento = $(this).attr('data-value');
		var id_tipo_respaldo = $(this).attr('data-id-tipo-respaldo');
		var valido = $(this).attr('data-valido');
		var tiene_respaldo = $(this).attr('data-tiene');
		var accion;
		var myDropzone = $(this).dropzone({
			url: '/archivo_digital/archivo_digital_guardar/?ci=' + $('#ci').val() + '&id_tipo_respaldo=' + $(this).attr('data-id-tipo-respaldo'),
			paramName: 'archivo',
			maxFilesize: $(this).attr('data-tamano').toString(),
			addRemoveLinks: true,
			dictDefaultMessage: '',
			dictResponseError: 'Error al cargar el archivo!',
			dictRemoveFile: 'Eliminar',
			autoProcessQueue: false,
			uploadMultiple: false,
			disablePreview: true,
			parallelUploads: 1,
			maxFiles: 1,
			acceptedFiles: $(this).attr('data-tipo-extension').toString(),
			addedfiles: function (files) {
				var dz = $(this)[0];
				if (files[0].accepted == true)
					if (tiene_respaldo) {
						bootbox.dialog({
							title: '¡Ya existe un respaldo!',
							message: '<p>Como ya existe un respaldo debe elegir entre adjuntar al que existe o reemplazarlo</p>',
							size: 'small',
							animate: false,
							onEscape: false,
							backdrop: false,
							buttons: {
								fee: {
									label: '<i class="fa fa-check-circle-o"></i> Reemplazar',
									className: 'btn btn-rounded btn-block btn-info btn-sm',
									callback: function () {
										accion = 'reemplazar';
										if (valido == 'true')
											bootbox.prompt({
												inputType: 'date',
												size: 'small',
												animate: false,
												title: 'Fecha de Vencimiento del Documento',
												buttons: {
													confirm: {
														label: '<i class="fa fa-check-circle-o"></i> Aceptar',
														className: 'btn btn-rounded btn-block btn-info btn-sm',
													},
													cancel: {
														label: '<i class="fa fa-times-circle-o"></i> Cancelar',
														className: 'btn btn-rounded btn-block btn-warning btn-sm',
													},
												},
												callback: function (result) {
													if (result !== null && result) {
														$(function () {
															dz.options.url = '/archivo_digital/archivo_digital_guardar/?ci=' + $('#ci').val() + '&fecha_vencimiento=' + result + '&id_tipo_respaldo=' + id_tipo_respaldo + '&accion=' + accion + '&id_documento_presentado_persona=' + tiene_respaldo;
															dz.processQueue();
														});
													} else {
														alertaSimple('INFORMACIÓN', 'Seleccione una fecha', 'top-right', 'warning', 2000);
														return false;
													}
												},
											});
										else {
											dz.options.url = '/archivo_digital/archivo_digital_guardar/?ci=' + $('#ci').val() + '&id_tipo_respaldo=' + id_tipo_respaldo + '&accion=' + accion + '&id_documento_presentado_persona=' + tiene_respaldo;
											dz.processQueue();
										}
									},
								},
								fi: {
									label: '<i class="fa fa-times-circle-o"></i> Adjuntar',
									className: 'btn btn-rounded btn-block btn-warning btn-sm',
									callback: function () {
										accion = 'adjuntar';
										if (valido == 'true')
											bootbox.prompt({
												inputType: 'date',
												size: 'small',
												animate: false,
												title: 'Fecha de Vencimiento del Documento',
												buttons: {
													confirm: {
														label: '<i class="fa fa-check-circle-o"></i> Aceptar',
														className: 'btn btn-rounded btn-block btn-info btn-sm',
													},
													cancel: {
														label: '<i class="fa fa-times-circle-o"></i> Cancelar',
														className: 'btn btn-rounded btn-block btn-warning btn-sm',
													},
												},
												callback: function (result) {
													if (result !== null && result) {
														$(function () {
															dz.options.url = '/archivo_digital/archivo_digital_guardar/?ci=' + $('#ci').val() + '&fecha_vencimiento=' + result + '&id_tipo_respaldo=' + id_tipo_respaldo + '&accion=' + accion + '&id_documento_presentado_persona=' + tiene_respaldo;
															dz.processQueue();
														});
													} else {
														alertaSimple('INFORMACIÓN', 'Seleccione una fecha', 'top-right', 'warning', 2000);
														return false;
													}
												},
											});
										else {
											dz.options.url = '/archivo_digital/archivo_digital_guardar/?ci=' + $('#ci').val() + '&id_tipo_respaldo=' + id_tipo_respaldo + '&accion=' + accion + '&id_documento_presentado_persona=' + tiene_respaldo;
											dz.processQueue();
										}
									},
								},
							},
						});
					} else {
						accion = 'insertar';
						if (valido == 'true')
							bootbox.prompt({
								inputType: 'date',
								size: 'small',
								animate: false,
								title: 'Fecha de Vencimiento del Documento',
								buttons: {
									confirm: {
										label: '<i class="fa fa-check-circle-o"></i> Aceptar',
										className: 'btn btn-rounded btn-block btn-info btn-sm',
									},
									cancel: {
										label: '<i class="fa fa-times-circle-o"></i> Cancelar',
										className: 'btn btn-rounded btn-block btn-warning btn-sm',
									},
								},
								callback: function (result) {
									if (result !== null && result) {
										$(function () {
											dz.options.url = '/archivo_digital/archivo_digital_guardar/?ci=' + $('#ci').val() + '&fecha_vencimiento=' + result + '&id_tipo_respaldo=' + id_tipo_respaldo + '&accion=' + accion;
											dz.processQueue();
										});
									} else {
										alertaSimple('INFORMACIÓN', 'Seleccione una fecha', 'top-right', 'warning', 2000);
										return false;
									}
								},
							});
						else {
							dz.options.url = '/archivo_digital/archivo_digital_guardar/?ci=' + $('#ci').val() + '&id_tipo_respaldo=' + id_tipo_respaldo + '&accion=' + accion;
							dz.processQueue();
						}
					}
			},
			init: function () {},
			success: function (file, response) {
				console.log('success');
				console.log(file);
				console.log(response);
				var args = Array.prototype.slice.call(arguments);
				if (typeof args[1].exito !== 'undefined') {
					$.ajax({
						method: 'POST',
						url: '/archivo_digital',
						data: {
							ci: $('#ci').val(),
							id_persona: $('#id_persona').val(),
						},
						dataType: 'html',
					}).done(function (response) {
						$('#modal-body').html(response);
					});
				} else {
					alertaSimple('INFORMACIÓN', args[1].error, 'top-right', 'warning', 2000);
				}
			},
			complete: function (file) {
				console.log('complete');
				console.log(file);
				if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
					this.removeFile(file);
					// alertaSimple(file.status == 'success' ? 'INFORMACIÓN' : 'ERROR', file.name, 'top-right', file.status == 'success' ? 'info' : 'error', 2000);
				}
			},
			error: function (file, message) {
				console.log('error');
				console.log(file);
				console.log(message);
				alertaSimple('INFORMACIÓN', 'El archivo ' + file.name + ' ' + message, 'top-right', 'warning', 4000);
			},
		});
	});
});
