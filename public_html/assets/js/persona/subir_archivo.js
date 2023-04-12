$(document).ready(function () {
	$('li#' + $('#elemento_dropzone').val()).each(function (index, value) {
		var id_planificacion_programa = $('[name="id_planificacion_programa"]').val();
		var etiqueta = $(this).data('etiqueta');
		var contenedor = $(this).parent('#subir-archivo').next('div');
		Dropzone.autoDiscover = false;
		new Dropzone(this, {
			url: $(this).data('url'),
			paramName: $(this).data('paramname'),
			maxFilesize: $(this).data('maxfilesize'),
			addRemoveLinks: $(this).data('addremovelinks'),
			dictDefaultMessage: $(this).data('dictdefaultmessage'),
			dictResponseError: $(this).data('dictresponseerror'),
			dictRemoveFile: $(this).data('dictremovefile'),
			autoProcessQueue: $(this).data('autoprocessqueue'),
			uploadMultiple: $(this).data('uploadmultiple'),
			disablePreview: $(this).data('disablepreview'),
			parallelUploads: $(this).data('paralleluploads'),
			maxFiles: $(this).data('maxfiles'),
			acceptedFiles: $(this).data('acceptedfiles'),
			addedfiles: function (files) {
				var dz = $(this)[0];
				if (files[0].accepted == true);
			},
			init: function () {
				$.post('programa/programa_programa_respaldos_listar', { id_planificacion_programa, etiqueta }, function (re) {
					contenedor.html(re);
				});
			},
			success: function (file, response) {
				// console.log('success');
				// console.log(file);
				// console.log(response);
				var args = Array.prototype.slice.call(arguments);
				if (typeof args[1].exito !== 'undefined') {
					swal('INFORMACIÓN', args[1].exito, 'success');
					$.post('programa/programa_programa_respaldos_listar', { id_planificacion_programa, etiqueta }, function (re) {
						contenedor.html(re);								
					});
				} else {
					swal('INFORMACIÓN', args[1].error, 'error');
				}
			},
			complete: function (file) {
				// console.log('complete');
				// console.log(file);
				if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
					this.removeFile(file);
					// alertaSimple(file.status == 'success' ? 'INFORMACIÓN' : 'ERROR', file.name, 'top-right', file.status == 'success' ? 'info' : 'error', 2000);
				}
			},
			error: function (file, message) {
				// console.log('error');
				// console.log(file);
				// console.log(message);
				swal('INFORMACIÓN', 'El archivo ' + file.name + ' ' + message, 'error');
			},
		});
	});
});
