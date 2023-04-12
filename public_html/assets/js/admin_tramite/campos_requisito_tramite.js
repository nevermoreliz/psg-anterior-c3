/** @format */

$(document).ready(function () {
	$('#campos_solicitud').on('click', function () {
		$('#campos_requisitos').hide().css('display', 'block');
		$('#campos_solicitud').hide().css('display', 'none');
	});
	$('#cancelar_solicitud').on('click', function () {
		$.ajax({
			url: '/admin_tramite/campos_requisito_tramite/?id_tramite=' + $('[name="id_tramite"]').val(),
			type: 'get',
		})
			.done(function (respuesta) {
				if (typeof respuesta.exito !== 'undefined') {
					$('.psg-contenedor').hide(0).html(respuesta.vista.final_output).fadeIn('slow');
				} else {
					alertaSimple('ERROR', respuesta.error, 'top-right', 'error', 6000);
				}
			})
			.fail(function (jqXHR, textStatus) {
				alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
				console.log(jqXHR.responseText);
			});
	});
	var elemento;
	var etiqueta;
	var tipos_archivo = ['.jpg', '.png', '.gif', '.jpeg', '.jfif', '.pdf', '.doc', '.docx'];
	$('.adjuntar_archivo').on('click', function (event) {
		elemento = $(this).attr('data-value');
		etiqueta = $(this).attr('data-etiqueta');
	});

	$('.contenedor_respaldos').magnificPopup({
		delegate: '.text-dark',
		type: 'image',
	});

	$('#form_campos_tramite').on('submit', function () {
		event.preventDefault();
		var cumple = true;
		$('#requisitos input[type=hidden]').each(function () {
			if ($(this).attr('data-value') == 'true' && $(this).val() === '') {
				alertaSimple('ALERTA', 'Adjunte todos los requisitos OBLIGATORIOS', 'top-right', 'warning', 2000);
				cumple = false;
				return false;
			}
		});
		if (cumple)
			$.ajax({
				type: 'POST',
				url: '/admin_tramite/insertar_solicitud',
				dataType: 'json',
				data: new FormData($('#form_campos_tramite')[0]),
				processData: false,
				contentType: false,
				cache: false,
				async: false,
			})
				.done(function (respuesta) {
					if (typeof respuesta.exito !== 'undefined') {
						alertaSimple('INFORMACIÓN', respuesta.exito, 'top-right', 'info', 6000);
						$.ajax({
							url: '/admin_tramite/campos_requisito_tramite/?id_tramite=' + $('[name="id_tramite"]').val(),
							dataType: 'json',
						})
							.done(function (respuesta) {
								$('.psg-contenedor').hide(0).html(respuesta.vista.final_output).fadeIn('slow');
							})
							.fail(function (jqXHR, textStatus) {
								alertaSimple(jqXHR.statusText, jqXHR.status, 'top-right', 'error', 3000);
								console.log(jqXHR.responseText);
							});
					} else {
						alertaSimple('ERROR', respuesta.error, 'top-right', 'error', 6000);
					}
				})
				.fail(function (jqXHR, textStatus) {
					alertaSimple(jqXHR.statusText, jqXHR.status, 'top-rigth', 'error', 3000);
				});
	});
	var tbl_listar_programas = $('#tbl_listar_programas')
		.DataTable({
			responsive: true,
			processing: true,
			serverSide: true,
			autoWidth: false,
			searching: false,
			language: {
				url: '/assets/plugins/datatables/Spanish.json',
			},
			columns: [
				{
					searchable: true,
					orderable: true,
					targets: 0,
					data: null,
					render: function (data, type, row, meta) {
						return data[0];
					},
				},
				{
					searchable: false,
					orderable: false,
					data: null,
					targets: 1,
					render: function (data, type, row, meta) {
						return moment(data[1]).format('D MMMM YYYY, h:mm:ss a');
					},
				},
				{
					searchable: false,
					orderable: false,
					data: null,
					targets: 2,
					render: function (data, type, row, meta) {
						return data[2] === null ? 'Aun no se Recepciono' : moment(data[2]).format('D MMMM YYYY, h:mm:ss a');
					},
				},
				{
					searchable: false,
					orderable: false,
					data: null,
					targets: 3,
					render: function (data, type, row, meta) {
						return data[3] === null ? 'Aun no se Entrego' : moment(data[3]).format('D MMMM YYYY, h:mm:ss a');
					},
				},

				{
					searchable: true,
					orderable: true,
					targets: 4,
					data: null,
					render: function (data, type, row, meta) {
						return data[4];
					},
				},
				{
					searchable: false,
					orderable: false,
					targets: 5,
					data: null,
					render: function (data, type, row, meta) {
						return data[5];
					},
				},
				{
					searchable: false,
					orderable: false,
					targets: 6,
					data: null,
					render: function (data, type, row, meta) {
						return data[6];
					},
				},
				{
					searchable: false,
					orderable: false,
					targets: 7,
					data: null,
					render: function (data, type, row, meta) {
						return data[7];
					},
				},
			],
			order: [[0, 'desc']],
			ajax: '/admin_tramite/ajax_listar_solicitud/?id_tramite=' + $('[name="id_tramite"]').val() + '&id_persona=' + getCookie('id_persona'),
			dom: 'trp',
			lengthMenu: [
				[10, 20, 30, 50, 100, -1],
				[10, 20, 30, 50, 100, 'Todo'],
			],
		})
		.on('click', '#revisar_solicitud', function (event) {
			$.ajax({
				url: '/admin_tramite/revisar_solicitud',
				type: 'post',
				data: { id_solicitud: $(this).attr('data-value') },
				dataType: 'html',
			}).done(function (respuesta) {});
		});
	$('#tbl_listar_programas').css('font-size', 12);
	tbl_listar_programas.columns.adjust().draw();

	$('.adjuntar_archivo').each(function () {
		Dropzone.autoDiscover = false;
		elemento = $(this).attr('data-value');
		etiqueta = $(this).attr('data-etiqueta');
		$(this).dropzone({
			url: '/persona/guardar_archivo/?id_persona=' + $('#id_persona').val() + '&etiqueta=' + etiqueta,
			paramName: 'archivo',
			maxFilesize: 50,
			addRemoveLinks: true,
			dictDefaultMessage: '',
			dictResponseError: 'Error al cargar el archivo!',
			dictRemoveFile: 'Eliminar',
			uploadMultiple: false,
			disablePreview: true,
			parallelUploads: 1,
			maxFiles: 1,
			acceptedFiles: tipos_archivo.toString(),
			success: function (file, response) {
				var args = Array.prototype.slice.call(arguments);
				if (typeof args[1].exito !== 'undefined') {
					var a = [];
					a =
						$('[name="' + elemento + '"]').val() !== ''
							? $('[name="' + elemento + '"]')
									.val()
									.split(',')
							: [];

					if (tipos_archivo.includes(args[1].extension_archivo)) {
						a.push(args[1].id_multimedia_requisito_presentado_persona);
						$('[name="' + elemento + '"]').val(
							a.filter(function (item, pos, self) {
								return self.indexOf(item) == pos;
							})
						);
						// alertaSimple('INFORMACIÓN', 'Se adiciono ' + e.currentTarget.dataset.name, 'top-right', 'info', 1000);

						listar_respaldos(elemento);
					} else {
						alertaSimple('ERROR', 'Tipo de formato no admitido ' + args[0].name, 'top-right', 'error', 2000);
					}
				} else {
				}
			},
			complete: function (file) {
				if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
					this.removeFile(file);
					alertaSimple(file.status == 'success' ? 'INFORMACIÓN' : 'ERROR', file.name, 'top-right', file.status == 'success' ? 'info' : 'error', 2000);
				}
			},
		});
	});
});

function eliminar_respaldo(id_multimedia_requisito_presentado_persona, elemento) {
	var a = [];
	a =
		$('[name="' + elemento + '"]').val() !== ''
			? $('[name="' + elemento + '"]')
					.val()
					.split(',')
			: [];

	a.splice(a.indexOf(id_multimedia_requisito_presentado_persona.toString()), 1);
	$('[name="' + elemento + '"]').val(a);
	listar_respaldos(elemento);
}
function listar_respaldos(elemento) {
	$('#respaldos_digitales_' + elemento).empty();
	if ($('[name="' + elemento + '"]').val() !== '') {
		$.get('/admin_tramite/listar_respaldos_digitales', {
			id_multimedia_requisito_presentado_persona: $('[name="' + elemento + '"]')
				.val()
				.split(','),
		}).done(function (resultado) {
			resultado.exito.forEach(function (e, indice, array) {
				$('#respaldos_digitales_' + elemento).append(`<div class="badge badge-pill badge-warning"> <a class="text-dark" href="` + e.ruta_archivo + `">` + e.nombre_archivo + ` <span class="badge badge-pill badge-danger">Ver</span></a> <a href="javascript:void(eliminar_respaldo(` + e.id_multimedia_requisito_presentado_persona + `,` + elemento + `))"><span class="font-weight-bold" aria-hidden="true">&times;</span></a></div>`);
			});
		});
	}
}
function getCookie(name) {
	const value = `; ${document.cookie}`;
	const parts = value.split(`; ${name}=`);
	if (parts.length === 2) return parts.pop().split(';').shift();
	else return null;
}
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
