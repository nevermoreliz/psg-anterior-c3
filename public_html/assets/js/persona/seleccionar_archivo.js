$(document).ready(function () {
	$('.parent-container').magnificPopup({
		delegate: 'a',
		type: 'image',
	});

	$('.image-popup-vertical-fit').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		mainClass: 'mfp-img-mobile',
		image: {
			verticalFit: true,
		},
	});
	Dropzone.prototype.defaultOptions.dictDefaultMessage = 'Arrastra los archivos aquí para subirlos';
	Dropzone.prototype.defaultOptions.dictFallbackMessage = 'Su navegador no admite la carga de archivos mediante la función de arrastrar y soltar.';
	Dropzone.prototype.defaultOptions.dictFallbackText = 'Utilice el formulario de respaldo a continuación para cargar sus archivos como en los viejos tiempos.';
	Dropzone.prototype.defaultOptions.dictFileTooBig = 'El archivo es demasiado grande ({{filesize}}MiB). Tamaño maximo: {{maxFilesize}}MiB.';
	Dropzone.prototype.defaultOptions.dictInvalidFileType = 'No puede cargar archivos de este tipo.';
	Dropzone.prototype.defaultOptions.dictResponseError = 'El servidor respondió con el código {{statusCode}}.';
	Dropzone.prototype.defaultOptions.dictCancelUpload = 'Cancelar carga';
	Dropzone.prototype.defaultOptions.dictCancelUploadConfirmation = '¿Estás seguro de que deseas cancelar esta carga?';
	Dropzone.prototype.defaultOptions.dictRemoveFile = 'Remover archivo';
	Dropzone.prototype.defaultOptions.dictMaxFilesExceeded = 'No puedes subir más archivos.';
	/** */
	// Dropzone.autoDiscover = false;
	// var myDropzone = new Dropzone('form#subir_archivo', {
	// 	url: '/persona/guardar_archivo/?id_persona=' + $('#id_persona').val(),
	// 	paramName: 'archivo',
	// 	maxFilesize: 50,
	// 	addRemoveLinks: true,
	// 	dictDefaultMessage: '',
	// 	dictResponseError: 'Error al cargar el archivo!',
	// 	dictRemoveFile: 'Eliminar',
	// 	uploadMultiple: false,
	// 	parallelUploads: 1,
	// 	maxFiles: 1,
	// 	//acceptedFiles: '*',
	// });
	// myDropzone.on('complete', function (file) {
	// 	if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
	// 		this.removeFile(file);
	// 		alertaSimple(file.status == 'success' ? 'EXITOSO' : 'ERROR', file.name, 'top-right', file.status == 'success' ? 'info' : 'error', 4000);
	// 		listar_archivos();
	// 	}
	// });
	// $('.eliminar_archivo').on('click', function (event) {
	// 	event.preventDefault();
	// 	event.stopPropagation();
	// 	confirm('¿Esta usted seguro que desea eliminar el archivo?')
	// 		? $.post('/persona/eliminar_archivo', {
	// 				id_multimedia_persona: event.currentTarget.dataset.value,
	// 		  }).done(function (data) {
	// 				alertaSimple('EXITOSO', 'Se elimino el archivo ' + event.currentTarget.dataset.name, 'top-right', 'info', 4000);
	// 				listar_archivos();
	// 		  })
	// 		: false;
	// });
});
